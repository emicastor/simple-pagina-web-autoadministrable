<?php

$servidor = 'localhost';
$bd = 'simple_pagina_web_autoadministrable';
$usuario = 'root';
$password = '';

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$password);
} catch (Exception $err) {
    echo $err->getMessage();
}