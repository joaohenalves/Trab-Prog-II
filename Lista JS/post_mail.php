<?php

$mensagem = file_get_contents('php://input');

// $mensagem = json_decode($mensagem);
//decode retirado para o comando de escrita colocar no arquivo a string inteira do json (só pra mostrar que essa página recebeu tudo certo)

$arquivo = 'arqvExc6.txt';
$filePointer = fopen($arquivo, "w");
fwrite($filePointer, $mensagem);
fclose($filePointer);