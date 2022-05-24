<?php

$arquivo = 'database.sqlite';

$db = null;

try {

    $deve_inicializar_banco = false;

    if(!file_exists($arquivo)) {
        $deve_inicializar_banco = true;
    }

    $db = new PDO("sqlite:$arquivo");

    if ($deve_inicializar_banco) {
        $db->exec('CREATE TABLE usuarios (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome VARCHAR(60),
            email VARCHAR(100),
            senha VARCHAR(32)
            )');  
    }

} catch (PDOException $e) {
    echo 'Erro com o banco de dados: ' . $e->getMessage();
    exit();
}