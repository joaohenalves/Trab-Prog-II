<?php

session_start();

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
    if(podeLogar($_POST['email'], $_POST['senha'], $db)) {
        $_SESSION['usuarioAutenticado'] = $_POST['email'];
        $message = 'Usuário ' . $_SESSION['usuarioAutenticado'] . ' autenticado com sucesso!';
    } else {
        header('Location: index.php?p=exercicio9&erro=1');
        exit();
    }
}

?>

<div class="default-container centralize-elements">
    <a href="index.php?p=exercicio8"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 8</div>
    </button></a>
    <a href="index.php?p=exercicio10"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 10</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 9</h3>
    <p>Autentica o usuário através de Session, utilizando a função do exercício anterior.</p>
</div>
<div class="default-container centralize-elements">
    <div class="login-wrapper centralize-elements">
        <form action="index.php?p=exercicio9" method="POST">
            <label>Email</label>
            <input type="email" name="email">
            <label>Senha</label>
            <input type="password" name="senha">
            <button type="submit" style="margin: 0px auto 0px auto" class="centralize-elements">
                <div class="inner-button centralize-elements">Login</div>
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
} else if(isset($_GET['erro'])) {
    echo '
    <div class="default-container">
        <h3>Erro! Usuário e/ou senha informados não existem!</h3>
    </div>
';
}

?>