<?php

function insereSeguro($nome, $email, $senha, $db) {
    try {
        $comando = $db->prepare('SELECT email FROM usuarios WHERE email = :email');
        $comando->bindParam(':email', $email);
        $comando->execute();
        $resultado = $comando->fetch();
        if(!$resultado) {
            $inserir = $db->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (:insertNome, :insertEmail, :insertSenha)');
            $senhaCript = password_hash($senha, PASSWORD_DEFAULT);
            $inserir->bindParam(':insertNome', $nome);
            $inserir->bindParam(':insertEmail', $email);
            $inserir->bindParam(':insertSenha', $senhaCript);
            $inserir->execute();
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo 'Erro ao realizar comando: ' . $e->getMessage();
        exit();
    }
}

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $result = insereSeguro($_POST['nome'], $_POST['email'], $_POST['senha'], $db);
    if($result == true) {
        $message = 'Usuário cadastrado com sucesso!';
    } else {
        $message = 'Erro! Usuário com email já existente no banco de dados!';
    }
}

?>

<div class="default-container centralize-elements">
    <a href="index.php?p=exercicio6"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 6</div>
    </button></a>
    <a href="index.php?p=exercicio8"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 8</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 7</h3>
    <p>Cadastra no banco de dados o usuário apenas se o email informado ainda não estiver cadastrado.</p>
</div>
<div class="default-container centralize-elements">
<div class="login-wrapper centralize-elements">
    <form action="index.php?p=exercicio7" method="POST">
        <label>Nome</label>
        <input type="text" name="nome">
        <label>Email</label>
        <input type="email" name="email">
        <label>Senha</label>
        <input type="password" name="senha">
        <button type="submit" style="margin: 0px auto 0px auto" class="centralize-elements">
            <div class="inner-button centralize-elements">Cadastrar</div>
        </button>
    </form>
</div>
</div>

<?php

if (isset($message)) {
    echo '
        <div class="default-container">
            <h3>' . $message . '</h3>
        </div>
    ';
}

?>