<?php

function retornaId($email, $senha, $db) {
    try {
        $comando = $db->prepare('SELECT * FROM usuarios WHERE email = :email');
        $comando->bindParam(':email', $email);
        $comando->execute();
        $resultado = $comando->fetch();
        if(!$resultado) {
            return -1;
        } else {
            if(password_verify($senha, $resultado['senha'])) {
                return $resultado['id'];
            }
        }
    } catch (PDOException $e) {
        echo 'Erro ao realizar consulta: ' . $e->getMessage();
        exit();
    }
}

if(isset($_POST['email']) && isset($_POST['senha'])) {
    $id = retornaId($_POST['email'], $_POST['senha'], $db);
    if($id == -1) {
        $id = 'O usuário não foi encontrado!';
    }
}

?>

<div class="default-container centralize-elements">
    <a href="index.php?p=exercicio1"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 1</div>
    </button></a>
    <a href="index.php?p=exercicio3"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 3</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 2</h3>
    <p>Retorna o ID do usuário que possui o email e senha informados.</p>
</div>
<div class="default-container centralize-elements">
    <div class="login-wrapper centralize-elements">
        <form action="index.php?p=exercicio2" method="POST">
            <label>Email</label>
            <input type="email" name="email">
            <label>Senha</label>
            <input type="password" name="senha">
            <button type="submit" style="margin: 0px auto 0px auto" class="centralize-elements">
                <div class="inner-button centralize-elements">Buscar</div>
            </button>
        </form>
    </div>
</div>

<?php

if (isset($id)) {
    echo '
        <div class="default-container">
            <h3>Usuário retornado:</h3>
            <p>' . $id . '</p>
        </div>
    ';
}

?>