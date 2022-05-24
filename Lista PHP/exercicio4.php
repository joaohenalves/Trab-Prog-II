<?php

function atualizaNome($id, $nome, $db) {
    try {
        $comando = $db->prepare('UPDATE usuarios SET nome = :novoNome WHERE id = :id');
        $comando->bindParam(':id', $id);
        $comando->bindParam(':novoNome', $nome);
        $comando->execute();
    } catch (PDOException $e) {
        echo 'Erro ao realizar comando: ' . $e->getMessage();
        exit();
    }
}

if(isset($_POST['id']) && isset($_POST['nome'])) {
    atualizaNome($_POST['id'], $_POST['nome'], $db);
    $message = 'Usuário com ID: ' . $_POST['id'] . ' teve seu nome atualizado com sucesso!';
}

?>

<div class="buttons-container centralize-elements">
    <a href="index.php?p=exercicio3"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 3</div>
    </button></a>
    <a href="index.php?p=exercicio5"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 5</div>
    </button></a>
</div>
<div class="main-desc">
    <h3>Exercício 4</h3>
    <p>Atualiza o nome do usuário que possui o ID informado.</p>
</div>
<div class="login-wrapper">
<div class="centralize-elements login-box">
    <form action="index.php?p=exercicio4" method="POST">
        <label>ID</label>
        <input type="text" name="id">
        <label>Novo Nome</label>
        <input type="text" name="nome">
        <button type="submit" style="margin: 0px auto 0px auto" class="centralize-elements">
            <div class="inner-button centralize-elements">Atualizar</div>
        </button>
    </form>
</div>
</div>

<?php

if (isset($message)) {
    echo '
        <div class="result-container">
            <h3>' . $message . '</h3>
        </div>
    ';
}

?>