<?php

try {
    $comando = $db->prepare('SELECT id, nome, email FROM usuarios');
    $comando->execute();
    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro ao realizar comando: ' . $e->getMessage();
    exit();
}

?>

<div class="buttons-container centralize-elements">
    <a href="index.php?p=exercicio9"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 9</div>
    </button></a>
    <a href="index.php?p=exercicio11"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 11</div>
    </button></a>
</div>
<div class="main-desc">
    <h3>Exercício 10</h3>
    <p>Lista todos os usuários existentes no banco de dados.</p>
</div>
<div class="result-container">
    <h3>Resultados:</h3>
    <?php

        if (count($resultado) > 0) {
            foreach($resultado as $linha) {
                echo '<p><a href="index.php?p=exercicio13&id=' . $linha['id'] . '">' . $linha['nome'] . '</a> (' . $linha['email'] . ')</p>';
            }
        } else {
            echo '<p>Nenhum usuário encontrado</p>';
        }

    ?>
</div>