<?php

function deletaUsuariosPorDominio($dominio, $db) {
    try {
        $comando = $db->prepare('DELETE FROM usuarios WHERE email LIKE :dominio');
        $comando->bindValue(':dominio', '%'.$dominio);
        $comando->execute(); 
    } catch (PDOException $e) {
        echo 'Erro ao realizar comando: ' . $e->getMessage();
        exit();
    }
}

if(isset($_POST['dominio'])) {
    deletaUsuariosPorDominio($_POST['dominio'], $db);
    $message = 'Usuários com o domínio ' . $_POST['dominio'] . ' removidos do banco de dados!';
}

?>

<div class="default-container centralize-elements">
    <a href="index.php?p=exercicio2"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 2</div>
    </button></a>
    <a href="index.php?p=exercicio4"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 4</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 3</h3>
    <p>Apaga todos os usuários que possuem email pertencente ao domínio informado.</p>
</div>
<div class="default-container centralize-elements">
    <div class="login-wrapper centralize-elements">
        <form action="index.php?p=exercicio3" method="POST">
            <label>Domínio</label>
            <input type="text" name="dominio">
            <div class="centralize-elements">
                <button type="submit" class="centralize-elements">
                    <div class="inner-button centralize-elements">Deletar</div>
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