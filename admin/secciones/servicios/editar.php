<?php
include '../../config/bd.php';

// Recupeamos la información.
if (isset($_GET['id'])) {
    $idAEditar = (isset($_GET['id'])) ? $_GET['id'] : "";
    $sql = "SELECT * FROM tbl_servicios WHERE id=:id";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':id', $idAEditar);
    $sentencia->execute();
    // header('Location: http://localhost/simple-pagina-web-autoadministrable/admin/secciones/servicios/');
    $registro = $sentencia->fetch(PDO::FETCH_LAZY); // FETCH_LAZY porque recupero un solo registro.

    // Guardo la info recuperada de la bd en variables.
    $icono = $registro['icono'];
    $titulo = $registro['titulo'];
    $descripcion = $registro['descripcion'];
}

// Actualizamos la información.
if ($_POST) {
    $idAEditar = (isset($_POST['id'])) ? $_POST['id'] : "";
    $icono = (isset($_POST['icono'])) ? $_POST['icono'] : "";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";

    $sql = "UPDATE tbl_servicios 
            SET icono = :icono, titulo = :titulo, descripcion = :descripcion 
            WHERE id = :id";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':id', $idAEditar);
    $sentencia->bindParam(':icono', $icono);
    $sentencia->bindParam(':titulo', $titulo);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->execute();

    // Modal hecho con la librería SweetAlert2.
    $modal = '<script src="http://localhost/simple-pagina-web-autoadministrable/admin/assets/js/editar.js"></script>';
}

include '../../templates/header.php';
?>

<!---------------------------------------------------->
<?php if (isset($modal)) {
    echo $modal;
} ?>
<h1 class="mb-4 pb-3 border-bottom">Servicios</h1>

<a class="btn btn-outline-secondary fw-semibold mb-4" href="<?= $url_base; ?>/secciones/servicios" role="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left mb-1 me-1" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Volver
</a>
<div>
    <a class="btn btn-primary fw-semibold mb-4 me-2" href="<?= $url_base; ?>/secciones/servicios" role="button">
        Ver lista de servicios
    </a>
</div>

<div class="card shadow">
    <div class="card-header py-3 fs-5 fw-semibold text-center">
        Editar un servicio
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 mx-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id" class="form-label fw-semibold">Id</label>
                        <input value="<?= $idAEditar; ?>" type="text" class="form-control shadow-sm" name="id" id="id" aria-describedby="helpId" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="icono" class="form-label fw-semibold">Ícono</label>
                        <input value="<?= $icono; ?>" type="text" class="form-control shadow-sm" name="icono" id="icono" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label fw-semibold">Título</label>
                        <input value="<?= $titulo; ?>" type="text" class="form-control shadow-sm" name="titulo" id="titulo" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="form-label fw-semibold">Descripción</label>
                        <input value="<?= $descripcion; ?>" type="text" class="form-control shadow-sm" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-primary fw-semibold px-md-4 py-md-2 me-2">Actualizar</button>
                    <a name="" id="" class="btn btn-outline-secondary fw-semibold px-md-4 py-md-2" href="<?= $url_base; ?>secciones/servicios" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>