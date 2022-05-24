<?php

try {
    if(isset($_POST['email']) && isset($_POST['nome']) && isset($_POST['senha']) && isset($_GET['id'])) {
        $senhaCript = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $comando = $db->prepare('UPDATE usuarios SET email = :email, nome = :nome, senha = :senha WHERE id = :id');
        $comando->bindParam(':id', $_GET['id']);
        $comando->bindParam(':email', $_POST['email']);
        $comando->bindParam(':nome', $_POST['nome']);
        $comando->bindParam(':senha', $senhaCript);
        $comando->execute();
        $message2 = 'Dados do usuário atualizados com sucesso!';
    }
    
    else if(isset($_GET['id'])) {
        $comando = $db->prepare('SELECT * FROM usuarios WHERE id = :id');
        $comando->bindParam(':id', $_GET['id']);
        $comando->execute();
        $resultado = $comando->fetch();
        if(!$resultado) {
            $message = 'O usuário requisitado não existe.';
        } else {
            $message = 'Editando o usuário: ' . $resultado['nome'] . ' - Email: ' . $resultado['email'];
        }
    } else {
        $_GET['id'] = '';
    }
} catch (PDOException $e) {
    echo 'Erro ao realizar comando: ' . $e->getMessage();
    exit();
}

?>

<div class="default-container centralize-elements">
    <a href="index.php?p=exercicio12"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 12</div>
    </button></a>
    <a href="index.php?p=exercicio14"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 14</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 13</h3>
    <p>Recebe um ID via GET e atualiza as informações do usuário.</p>
    <p>Este exercício está integrado com o exercício 10, que pode ser acessado <a href="index.php?p=exercicio10">aqui.</a></p>
</div>

<?php 

    if(isset($resultado)) {
        echo '<h3 style="margin-top: 20px; margin-bottom: 20px; color: white; font-family: Arial">' . $message . '</h3>';
    }
    
?>

<div class="default-container centralize-elements">
    <div class="login-wrapper centralize-elements">
        <form action="index.php?p=exercicio13&id=<?=$_GET['id']?>" method="POST">
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

if (isset($message2)) {
    echo '
        <div class="default-container">
            <h3>' . $message2 . '</h3>
        </div>
    ';
}

?>
