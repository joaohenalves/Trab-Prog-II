<?php

function podeLogar($email, $senha, $db) {
    try {
        $comando = $db->prepare('SELECT email, senha FROM usuarios WHERE email = :email');
        $comando->bindParam(':email', $email);
        $comando->execute();
        $usuario = $comando->fetch();
        if(!$usuario) {
            return false;
        } else {
            if(password_verify($senha, $usuario['senha'])) {
                return true;
            } else {
                return false;
            }
        }
    } catch (PDOException $e) {
        echo 'Erro ao realizar comando: ' . $e->getMessage();
        exit();
    }
}

if(isset($_POST['email']) && isset($_POST['senha'])) {
    $result = podeLogar($_POST['email'], $_POST['senha'], $db);
    if($result == true) {
        $message = 'Usuário pode fazer login!';
    } else {
        $message = 'Erro! Usuário e/ou senha informados não existem!';
    }
}

?>

<div class="default-container centralize-elements">
    <a href="index.php?p=exercicio7"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 7</div>
    </button></a>
    <a href="index.php?p=exercicio9"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 9</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 8</h3>
    <p>Busca se os dados informados correspondem a algum usuário do banco de dados.</p>
</div>
<div class="default-container centralize-elements">
    <div class="login-wrapper centralize-elements">
        <form action="index.php?p=exercicio8" method="POST">
            <label>Email</label>
            <input type="email" name="email">
            <label>Senha</label>
            <input type="password" name="senha">
            <div class="centralize-elements">
                <button type="submit" class="centralize-elements">
                    <div class="inner-button centralize-elements">Login</div>
                </button>
            </div>
        </form>
    </div>
</div>

<?php

if (isset($message)) {
    echo '
        <div class="default-container">
            <p>' . $message . '</p>
        </div>
    ';
}

?>