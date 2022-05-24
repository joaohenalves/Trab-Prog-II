<?php

require_once 'banco.php';
include_once 'header.php';

if(isset($_GET['p'])) {
    $page = $_GET['p'] . '.php';
    if(file_exists($page)) {
        include_once $page;
    } else {
        include_once 'erro.php';
    }
} else {
    header('Location: index.php?p=home');
    exit();
}

include_once 'footer.php';