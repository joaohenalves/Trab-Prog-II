<?php

if(isset($_POST['email']) && strlen($_POST['email']) != 0) {
    try {
        $comando = $db->prepare('SELECT * FROM usuarios WHERE email = :email');
        $comando->bindParam(':email', $_POST['email']);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        if(!$resultado) {
            $message = 'O usuário requisitado não existe.';
        } else {
            $message = 'Informações buscadas com sucesso!';
        }
    } catch (PDOException $e) {
        echo 'Erro ao realizar comando: ' . $e->getMessage();
        exit();
    }
}

?>

<div class="default-container centralize-elements">
    <a href="index.php?p=exercicio10"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 10</div>
    </button></a>
    <a href="index.php?p=exercicio12"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 12</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 11</h3>
    <p>Busca informações do usuário cujo email e igual ao email informado.</p>
</div>
<div class="default-container centralize-elements">
    <div class="login-wrapper centralize-elements">
        <form action="index.php?p=exercicio11" method="POST">
            <label>Email</label>
            <input type="email" name="email">
            <button type="submit" style="margin: 0px auto 0px auto" class="centralize-elements">
                <div class="inner-button centralize-elements">Buscar</div>
            </button>
        </form>
    </div>
</div>

<?php

if (isset($message)) {
    echo '
        <div class="result-container" style="margin-top: -100px">
            <h3>' . $message . '</h3>
    ';
    if (count($resultado) > 0) {
        foreach($resultado as $linha) {
            echo '<p>ID: '. $linha['id'] . ' - Nome: ' . $linha['nome'] . ' - Email: ' . $linha['email'] . '</p>';
        }
    }
    echo '</div>';
}

?>