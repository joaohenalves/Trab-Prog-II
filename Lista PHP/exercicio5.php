<?php

function atualizaTudo($id, $campos, $db) {
    try {
        $comando = $db->prepare('UPDATE usuarios SET nome = :novoNome, email = :novoEmail, senha = :novaSenha WHERE id = :id');
        $campos['senha'] = password_hash($campos['senha'], PASSWORD_DEFAULT);
        $comando->bindParam(':id', $id);
        $comando->bindParam(':novoNome', $campos['nome']);
        $comando->bindParam(':novoEmail', $campos['email']);
        $comando->bindParam(':novaSenha', $campos['senha']);
        $comando->execute();
    } catch (PDOException $e) {
        echo 'Erro ao realizar comando: ' . $e->getMessage();
        exit();
    }
}

if(isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $campos = [];
    $campos['nome'] = $_POST['nome'];
    $campos['email'] = $_POST['email'];
    $campos['senha'] = $_POST['senha'];

    atualizaTudo($_POST['id'], $campos, $db);
    $message = 'Usuário com ID: ' . $_POST['id'] . ' teve seus dados atualizados com sucesso!';
}

?>

<div class="default-container centralize-elements">
    <a href="index.php?p=exercicio4"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 4</div>
    </button></a>
    <a href="index.php?p=exercicio6"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 6</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 5</h3>
    <p>Atualiza todos os dados do usuário que possui o ID informado.</p>
</div>
<div class="default-container centralize-elements">
    <div class="login-wrapper centralize-elements">
        <form action="index.php?p=exercicio5" method="POST">
            <label>ID</label>
            <input type="text" name="id">
            <label>Novo Nome</label>
            <input type="text" name="nome">
            <label>Novo Email</label>
            <input type="email" name="email">
            <label>Nova Senha</label>
            <input type="password" name="senha">
            <button type="submit" style="margin: 0px auto 0px auto" class="centralize-elements">
                <div class="inner-button centralize-elements">Atualizar</div>
            </button>
        </form>
    </div>
</div>

<?php

if (isset($message)) {
    echo '
        <div class="result-container" style="margin-top: 100px">
            <h3>' . $message . '</h3>
        </div>
    ';
}

?>