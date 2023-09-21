<?php

$request = $_SERVER['REQUEST_URI'];
$path = '/';

switch ($request) {
    case $path :
        require __DIR__ . '/home.php';
        break;
    default:
        require __DIR__ . '/invitation.php';
        break;
}
