<?php

$servidor = 'localhost';
$bd = 'simple_pagina_web_autoadministrable';
$usuario = 'root';
$password = '#Emiliano.32';

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$password);
} catch (Exception $err) {
    echo $err->getMessage();
}