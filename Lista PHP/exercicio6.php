<?php

function deleteByRande($idMin, $idMax, $db) {
    try {
        $comando = $db->prepare('DELETE FROM usuarios WHERE (id >= :idMin AND id <= :idMax)');
        $comando->bindParam(':idMin', $idMin);
        $comando->bindParam(':idMax', $idMax);
        $comando->execute();
    } catch (PDOException $e) {
        echo 'Erro ao realizar comando: ' . $e->getMessage();
        exit();
    }
}

if(isset($_POST['idMin']) && isset($_POST['idMax'])) {
    deleteByRande($_POST['idMin'], $_POST['idMax'], $db);
    $message = 'IDs dentro dos intervalos ' . $_POST['idMin'] . ' e ' . $_POST['idMax'] . ' deletados!';
}

?>

<div class="default-container centralize-elements">
    <a href="index.php?p=exercicio5"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 5</div>
    </button></a>
    <a href="index.php?p=exercicio7"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 7</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 6</h3>
    <p>Apaga os usuários cujos ids sejam iguais ou maiores que ID min e menor ou iguais a ID max.</p>
</div>
<div class="default-container centralize-elements">
    <div class="login-wrapper centralize-elements">
        <form action="index.php?p=exercicio6" method="POST">
            <label>ID min</label>
            <input type="text" name="idMin">
            <label>ID max</label>
            <input type="text" name="idMax">
            <button type="submit" style="margin: 0px auto 0px auto" class="centralize-elements">
                <div class="inner-button centralize-elements">Deletar</div>
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