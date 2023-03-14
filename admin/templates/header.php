<?php
session_start();

$url_base = 'http://localhost/simple-pagina-web-autoadministrable/admin/'; // url que tiene el sitio. Si se sube a un hosting, cambiar y poner el dominio correspondiente.

if (!isset($_SESSION['usuario'])) {
    header('Location: ' . $url_base . 'login');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Panel administrativo</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .img {
            max-inline-size: 100%;
            block-size: auto;
            aspect-ratio: 16/9;
            object-fit: cover;
            object-position: center;
        }
    </style>
</head>

<body class="bg-light">

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?= $url_base; ?>">Administrador</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $url_base; ?>secciones/servicios/" aria-current="page">💼 Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $url_base; ?>secciones/portafolio">🗂️ Portafolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $url_base; ?>secciones/nosotros">👥 Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $url_base; ?>secciones/equipo">🤝 Equipo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $url_base; ?>secciones/usuarios/">🪪 Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $url_base; ?>secciones/configuraciones">⚙️ Configuraciones</a>
                        </li>
                    </ul>
                    <div class="pt-4 pt-lg-0">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="btn btn-outline-secondary d-block" href="<?= $url_base; ?>cerrar" role="button">🔑 Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">