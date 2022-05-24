<?php

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    if(strlen($_POST['nome']) >= 5 && strlen($_POST['email']) >= 5 && strlen($_POST['senha']) >= 5) {
        try {
            $comando = $db->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (:insertNome, :insertEmail, :insertSenha)');
            $senhaCript = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $comando->bindParam(':insertNome', $_POST['nome']);
            $comando->bindParam(':insertEmail', $_POST['email']);
            $comando->bindParam(':insertSenha', $senhaCript);
            $comando->execute();
        } catch (PDOException $e) {
            echo 'Erro ao executar comando no banco de dados: ' . $e->getMessage();
            exit();
        }
    } else {
        echo 'Dados com tamanhos inválidos!';
    }
}

?>

<div class="default-container centralize-elements">
    <a href="index.php"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Home</div>
    </button></a>
    <a href="index.php?p=exercicio2"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 2</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 1</h3>
    <p>Insere no banco de dados o cadastro se todos os campos tiverem tamanho maior que 5 caracteres.</p>
</div>
<div class="default-container centralize-elements">
    <div class="login-wrapper centralize-elements">
        <form action="index.php?p=exercicio1" method="POST">
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