<?php

$request = $_SERVER['REQUEST_URI'];
$path = '/undangan/';

switch ($request) {
    case $path :
        require __DIR__ . '/home.php';
        break;
    case $path."katalog" :
        require __DIR__ . '/katalog.php';
        break;
    case $path."katalog/" :
        require __DIR__ . '/katalog.php';
        break;
    default:
        require __DIR__ . '/invitation.php';
        break;
}
