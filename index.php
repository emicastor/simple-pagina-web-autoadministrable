<?php
include 'admin/config/bd.php';

// Sección servicios
$sql = "SELECT * FROM tbl_servicios";
$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Sección portafolio
$sql = "SELECT * FROM tbl_portafolio";
$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Sección nosotros
$sql = "SELECT * FROM tbl_nosotros";
$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$lista_nosotros = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Sección equipo
$sql = "SELECT * FROM tbl_equipo";
$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$lista_equipo = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Sección configuración
$sql = "SELECT * FROM tbl_configuraciones";
$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$lista_configuraciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// // Para evitar poner los índices del array (los [] con números), creo un array asociativo y luego uso ese array con el nombre que le quiera dar entre []
// $nueva_lista = [
//     'titulo_principal' => $lista_configuraciones[0]['valor']
// ];
// // Así quedaría en el html
// <?= $nueva_lista['titulo_principal']['valor'];

// Debug
// print_r('<pre>');
// print_r($lista_configuraciones);
// print_r('<pre>');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>José Aragón - Fotógrafo freelance</title>
    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">
                <span class="fw-bold fs-4"><?= $lista_configuraciones[20]['valor']; ?></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portafolio">Portafolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#nosotros">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#equipo">Equipo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading"><?= $lista_configuraciones[0]['valor']; ?></div>
            <div class="masthead-heading text-uppercase"><?= $lista_configuraciones[1]['valor']; ?></div>
            <a class="btn btn-primary btn-xl text-dark fw-semibold text-uppercase" href="<?= $lista_configuraciones[3]['valor']; ?>" role="button"><?= $lista_configuraciones[2]['valor']; ?></a>
        </div>
    </header>
    <!-- Servicios-->
    <section class="page-section" id="servicios">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?= $lista_configuraciones[4]['valor']; ?></h2>
                <h3 class="section-subheading text-muted"><?= $lista_configuraciones[5]['valor']; ?></h3>
            </div>
            <div class="row text-center">

                <?php foreach ($lista_servicios as $servicio) { ?>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa <?= $servicio['icono']; ?> fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><?= $servicio['titulo']; ?></h4>
                        <p class="text-muted"><?= $servicio['descripcion']; ?></p>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portafolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?= $lista_configuraciones[6]['valor']; ?></h2>
                <h3 class="section-subheading text-muted"><?= $lista_configuraciones[7]['valor']; ?></h3>
            </div>
            <div class="row">
                <!-- Portfolio items -->
                <?php foreach ($lista_portafolio as $proyecto) { ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item card border-0 h-100">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?= $proyecto['id']; ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid img" loading="lazy" src="assets/img/portafolio/<?= $proyecto['imagen']; ?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?= $proyecto['titulo']; ?></div>
                                <div class="portfolio-caption-subheading text-muted"><?= $proyecto['categoria']; ?></div>
                            </div>
                        </div>
                    </div>
                    <!-- Portfolio Modals-->
                    <!-- Portfolio item 1 modal popup-->
                    <div class="portfolio-modal modal fade" id="portfolioModal<?= $proyecto['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="modal-body">
                                                <!-- Project details-->
                                                <h2 class="text-uppercase"><?= $proyecto['titulo']; ?></h2>
                                                <p class="item-intro text-muted"><?= $proyecto['subtitulo']; ?></p>
                                                <img class="img-fluid d-block mx-auto" loading="lazy" src="assets/img/portafolio/<?= $proyecto['imagen']; ?>" alt="..." />
                                                <p><?= $proyecto['descripcion']; ?></p>
                                                <ul class="list-inline">
                                                    <li>
                                                        <strong>Cliente:</strong>
                                                        <?= $proyecto['cliente']; ?>
                                                    </li>
                                                    <li>
                                                        <strong>Categoría:</strong>
                                                        <?= $proyecto['categoria']; ?>
                                                    </li>
                                                    <li>
                                                        <strong>Link:</strong>
                                                        <a href="<?= $proyecto['url']; ?>"><?= $proyecto['url']; ?></a>
                                                    </li>
                                                </ul>
                                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                    <i class="fas fa-xmark me-1"></i>
                                                    Cerrar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Nosotros-->
    <section class="page-section" id="nosotros">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?= $lista_configuraciones[8]['valor']; ?></h2>
                <h3 class="section-subheading text-muted"><?= $lista_configuraciones[9]['valor']; ?></h3>
            </div>
            <ul class="timeline">
                <?php
                $cont = 1;
                foreach ($lista_nosotros as $registro) { ?>
                    <!-- Si el resto es igual a 0, quiere decir que es par y entonces va a estar ubicado del lado derecho de la pantalla ya que agrego a <li> la clase timeline-inverted -->
                    <li <?= (($cont % 2) == 0) ? 'class="timeline-inverted"' : ""; ?>>
                        <div class="timeline-image"><img class="rounded-circle img-fluid img" loading="lazy" src="assets/img/nosotros/<?= $registro['imagen']; ?>" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?= $registro['fecha']; ?></h4>
                                <h4 class="subheading"><?= $registro['titulo']; ?></h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted"><?= $registro['descripcion']; ?></p>
                            </div>
                        </div>
                    </li>
                <?php
                    $cont++;
                }; ?>

                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4 class="pt-3">
                            <?= $lista_configuraciones[19]['valor']; ?>
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Equipo-->
    <section class="page-section bg-light" id="equipo">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?= $lista_configuraciones[10]['valor']; ?></h2>
                <h3 class="section-subheading text-muted"><?= $lista_configuraciones[11]['valor']; ?></h3>
            </div>
            <div class="row">
                <?php foreach ($lista_equipo as $item) { ?>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle img" loading="lazy" src="assets/img/equipo/<?= $item['imagen']; ?>" alt="..." />
                            <h4><?= $item['nombrecompleto']; ?></h4>
                            <p class="text-muted"><?= $item['puesto']; ?></p>
                            <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/<?= $item['twitter']; ?>" aria-label="Parveen Anand Twitter Profile" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://facebook.com/<?= $item['facebook']; ?>" aria-label="Parveen Anand Facebook Profile" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://linkedin.com/in/<?= $item['linkedin']; ?>" aria-label="Parveen Anand LinkedIn Profile" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">Estamos para ayudarlo a mejorar en su rubro sea cual fuere éste, ya que siempre hay una imagen que exhibir.</p>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Clients-->
    <!-- <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Contacto-->
    <section class="page-section bg-dark" id="contacto">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-lg-9 text-white">
                    <h2 class="section-heading"><?= $lista_configuraciones[12]['valor']; ?></h2>
                    <h3 class="mb-5 mb-lg-0">Y nosotros estaremos allí para hacerlo <span class="text-decoration-underline">realidad</span></h3>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <a class="btn btn-primary btn-xl text-dark fw-semibold text-uppercase" href="<?= $lista_configuraciones[15]['valor']; ?>" role="button"><?= $lista_configuraciones[14]['valor']; ?></a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-5 my-lg-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start mt-2 mt-lg-0 order-3 order-lg-0" id="year"></div>
                <div class="col-lg-4 my-3 my-lg-0 order-2 order-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/<?= $lista_configuraciones[16]['valor']; ?>" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://facebook.com/<?= $lista_configuraciones[17]['valor']; ?>" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://linkedin.com/in/<?= $lista_configuraciones[18]['valor']; ?>" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <ul class="nav d-flex justify-content-center">
                        <li class="nav-item"><a class="nav-link text-dark" href="#servicios">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="#portafolio">Portafolio</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="#nosotros">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="#equipo">Equipo</a></li>
                    </ul>
                </div>
            </div>
            <div class="row align-items-center mt-5 pt-2">
                <div class="col-6 col-sm-4 col-lg-2 mx-auto">
                    <a href="https://emicastor.com.ar/agencia" class="d-flex flex-column align-items-center text-decoration-none mb-2 pb-2">
                        <span class="text-dark fw-semibold">Emiliano Castor</span>
                        <span class="px-1 bg-dark text-white fw-bold py-1" style="font-size: 8.5px;">DESARROLLADOR WEB</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/scripts.js"></script>

</body>

</html>