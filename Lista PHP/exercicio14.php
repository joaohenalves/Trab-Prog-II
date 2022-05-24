<?php

function somaIdsByDominio($dominio, $db) {
    try {
        $soma = 0;
        $comando = $db->prepare('SELECT id FROM usuarios WHERE email LIKE :dominio');
        $comando->bindValue(':dominio', '%'.$dominio);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado) > 0) {
            foreach($resultado as $linha) {
                $soma += $linha['id'];
            }
        } else {
            $soma = 'Nenhum usuário encontrado com o domínio desejado!';
        }
        return $soma;
    } catch (PDOException $e) {
        echo 'Erro ao realizar comando: ' . $e->getMessage();
        exit();
    }
}

if(isset($_POST['dominio'])) {
    $soma = somaIdsByDominio($_POST['dominio'], $db);
}

?>

<div class="default-container centralize-elements">
    <a href="index.php?p=exercicio13"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 13</div>
    </button></a>
    <a href="index.php?p=exercicio15"><button class="centralize-elements">
        <div class="inner-button centralize-elements">Exercício 15</div>
    </button></a>
</div>
<div class="default-container">
    <h3>Exercício 14</h3>
    <p>Faz a soma dos IDs dos usuários que possuem email pertencente ao domínio informado.</p>
</div>
<div class="default-container centralize-elements">
    <div class="login-wrapper centralize-elements">
        <form action="index.php?p=exercicio14" method="POST">
            <label>Domínio</label>
            <input type="text" name="dominio">
            <div class="centralize-elements">
                <button type="submit" class="centralize-elements">
                    <div class="inner-button centralize-elements">Buscar</div>
                </button>
            </div>
        </form>
    </div>
</div>

<?php

if (isset($soma)) {
    echo '
        <div class="result-container">
            <p>Resultado da soma:</p>
            <p>' . $soma . '</p>
        </div>
    ';
}

?>
