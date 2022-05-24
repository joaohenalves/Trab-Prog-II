<?php

function trocaNomeExcetoIntervalo($nome, $idMin, $idMax, $db) {
    try {
        $comando = $db->prepare('UPDATE usuarios SET nome = :nome WHERE id < :idMin OR id > :idMax');
        $comando->bindParam(':idMin', $idMin);
        $comando->bindParam(':idMax', $idMax);
        $comando->bindParam(':nome', $nome);
        $comando->execute();
    } catch (PDOException $e) {
        echo 'Erro ao realizar comando: ' . $e->getMessage();
        exit();
    }
}

if(isset($_POST['nome']) && isset($_POST['idMin']) && isset($_POST['idMax'])) {
    trocaNomeExcetoIntervalo($_POST['nome'], $_POST['idMin'], $_POST['idMax']);
    $message = 'Troca efetuada com sucesso!';
}

?>

<div class="default-container centralize-elements">
    <a href="index.php?p=exercicio14"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 14</div>
    </button></a>
    <a href="index.php"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Home</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 15</h3>
    <p>Atualiza os nomes de todos os usuarios cujos IDs estão fora do intervalo ID min e ID max para o nome informado </p>
</div>
<div class="default-container centralize-elements">
    <div class="login-wrapper centralize-elements">
        <form action="index.php?p=exercicio15" method="POST">
            <label>Novo Nome</label>
            <input type="text" name="nome">
            <label>ID min</label>
            <input type="text" name="idMin">
            <label>ID max</label>
            <input type="text" name="idMax">
            <button type="submit" style="margin: 0px auto 0px auto" class="centralize-elements">
                <div class="inner-button centralize-elements">Atualizar</div>
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
