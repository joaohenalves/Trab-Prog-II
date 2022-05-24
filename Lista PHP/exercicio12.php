<?php

if(isset($_POST['dominio']) && strlen($_POST['dominio']) > 0) {
    try {
        $comando = $db->prepare('SELECT nome, email FROM usuarios WHERE email LIKE :dominio');
        $comando->bindValue(':dominio', '%'.$_POST['dominio']);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        if(!$resultado) {
            $message = 'Não existem usuários com email deste domínio.';
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
    <a href="index.php?p=exercicio11"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 11</div>
    </button></a>
    <a href="index.php?p=exercicio13"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 13</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 12</h3>
    <p>Apaga os usuários que possuem email pertencente ao domínio informado.</p>
</div>
<div class="default-container centralize-elements">
    <div class="login-wrapper centralize-elements">
        <form action="index.php?p=exercicio12" method="POST">
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
    ';
    if (count($resultado) > 0) {
        foreach($resultado as $linha) {
            echo '<p>'. $linha['nome'] . ' (' . $linha['email'] . ')</p>';
        }
    }
    echo '</div>';
}

?>