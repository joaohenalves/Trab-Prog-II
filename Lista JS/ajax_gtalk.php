<?php

header('Content-type: application/json');

$dados = [];

$dados['uid'] = 23424334;
$dados['contacts'][0]['name'] = 'Fulano Silva';
$dados['contacts'][0]['msg'] = '@Rio';
$dados['contacts'][0]['icon'] = 'camera_green.png';
$dados['contacts'][1]['name'] = 'Denio Duarte';
$dados['contacts'][1]['msg'] = 'UFFS';
$dados['contacts'][1]['icon'] = 'circle_green.png';
$dados['contacts'][2]['name'] = 'Fulano Santos';
$dados['contacts'][2]['msg'] = '';
$dados['contacts'][2]['icon'] = 'camera_green.png';
$dados['contacts'][3]['name'] = 'Fulano Oliveira';
$dados['contacts'][3]['msg'] = '';
$dados['contacts'][3]['icon'] = 'circle_green.png';

echo json_encode($dados);