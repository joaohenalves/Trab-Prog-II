<?php

header('Content-type: application/json');


$dados = [];

$dados['id'] = 2323;
$dados['conteudo'] = 'conteúdo que deve ser colocado dentro de um div novo.';

echo json_encode($dados);