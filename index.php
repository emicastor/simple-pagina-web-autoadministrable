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
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />

    <style>
        .img {
            max-inline-size: 100%;
            block-size: auto;
            aspect-ratio: 1/1;
            object-fit: cover;
            object-position: center center;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
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
            <div class="masthead-subheading">Welcome To Our Studio!</div>
            <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            <a class="btn btn-primary btn-xl text-dark fw-semibold" href="#servicios">COTIZACIÓN ¡GRATIS!</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="servicios">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Servicios</h2>
                <h3 class="section-subheading text-muted">El low-cost que te conviene</h3>
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
                <h2 class="section-heading text-uppercase">Portafolio</h2>
                <h3 class="section-subheading text-muted">Revisá mis últimos trabajos</h3>
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
                                <img class="img-fluid img" src="assets/img/portafolio/<?= $proyecto['imagen']; ?>" alt="..." />
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
                                                <img class="img-fluid d-block mx-auto" src="assets/img/portafolio/<?= $proyecto['imagen']; ?>" alt="..." />
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
                <h2 class="section-heading text-uppercase">Historia</h2>
                <h3 class="section-subheading text-muted">El paso a paso para llegar a donde estoy hoy</h3>
            </div>
            <ul class="timeline">
                <?php
                $cont = 1;
                foreach ($lista_nosotros as $registro) { ?>
                    <!-- Si el resto es igual a 0, quiere decir que es par y entonces va a estar ubicado del lado derecho de la pantalla ya que agrego a <li> la clase timeline-inverted -->
                    <li <?= (($cont % 2) == 0) ? 'class="timeline-inverted"' : ""; ?>>
                        <div class="timeline-image"><img class="rounded-circle img-fluid img" src="assets/img/nosotros/<?= $registro['imagen']; ?>" alt="..." /></div>
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
                        <h4>
                            ¡Vos podés
                            <br />
                            ser el
                            <br />
                            <strong>próximo!</strong>
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Equipo-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Equipo</h2>
                <h3 class="section-subheading text-muted">Me acompañan los mejores profesionales en su rubro</h3>
            </div>
            <div class="row">
                <?php foreach ($lista_equipo as $item) { ?>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle img" src="assets/img/equipo/<?= $item['imagen']; ?>" alt="..." />
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
                    <h2 class="section-heading">Siempre habrá una imagen que recordar</h2>
                    <h3 class="mb-5 mb-lg-0">Y nosotros estaremos allí para hacerlo <span class="text-decoration-underline">realidad</span></h3>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-center">
                    <a class="btn btn-primary btn-xl text-dark fw-semibold" href="mailto:contacto@emicastor.com.ar" role="button">CONTACTANOS</a>
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
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
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
                        <span class="px-1 bg-dark text-white fw-semibold" style="font-size: 9px;">DESARROLLADOR WEB</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>