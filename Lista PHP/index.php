<?php

require_once 'banco.php';
include_once 'header.php';

if(isset($_GET['p'])) {
    $page = $_GET['p'] . '.php';
    include_once $page;
} else {
    header('Location: index.php?p=home');
    exit();
}

include_once 'footer.php';