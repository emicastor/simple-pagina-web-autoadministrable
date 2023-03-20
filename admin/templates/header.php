<?php
session_start();

$url_base = 'http://localhost/simple-pagina-web-autoadministrable/admin/'; // url que tiene el sitio. Si se sube a un hosting, cambiar y poner el dominio correspondiente.

if (!isset($_SESSION['usuario'])) {
    header('Location: ' . $url_base . 'login');
}
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Panel administrativo</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- Jquery Datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- Jquery Datatable JS -->
    <script charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSS custom| -->
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body class="bg-light d-flex flex-column h-100">

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 shadow-sm" aria-label="Offcanvas navbar large">
            <div class="container">
                <a class="navbar-brand" href="<?= $url_base; ?>">Panel</a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                    <div class="container px-3">
                        <div class="offcanvas-header border-bottom">
                            <a class="navbar-brand" href="<?= $url_base; ?>">Panel administrativo</a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
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
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">