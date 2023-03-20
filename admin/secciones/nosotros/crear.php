<?php
include '../../config/bd.php';

if ($_POST) {
    $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : "";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
    $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";

    $fechaImagen = new DateTime();
    $nombreArchivoImagen = (!empty($imagen)) ? $fechaImagen->getTimestamp() . '_' . $imagen : '';
    $tmpImagen = $_FILES['imagen']['tmp_name'];

    if (!empty($tmpImagen)) {
        move_uploaded_file($tmpImagen, '../../../assets/img/nosotros/' . $nombreArchivoImagen);
    }

    $sql = "INSERT INTO
            tbl_nosotros (fecha, titulo, descripcion, imagen)
            VALUES
            (:fecha, :titulo, :descripcion, :imagen)";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':fecha', $fecha);
    $sentencia->bindParam(':titulo', $titulo);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->bindParam(':imagen', $nombreArchivoImagen);
    $sentencia->execute();

    // Modal hecho con la librería SweetAlert2.
    $modal = '<script src="http://localhost/simple-pagina-web-autoadministrable/admin/assets/js/crear.js"></script>';
}
include '../../templates/header.php';
?>

<!---------------------------------------------------->
<?php if (isset($modal)) {
    echo $modal;
} ?>
<h1 class="mb-4 pb-3 border-bottom">Nosotros</h1>

<a class="btn btn-outline-secondary fw-semibold mb-4" href="<?= $url_base; ?>/secciones/nosotros" role="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left mb-1 me-1" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Volver
</a>
<div>
    <a class="btn btn-primary fw-semibold mb-4 me-2" href="<?= $url_base; ?>/secciones/nosotros" role="button">Ver lista nosotros</a>
    <a class="btn btn-warning fw-semibold mb-4" href="http://localhost/simple-pagina-web-autoadministrable/#nosotros" role="button">Ver cambios realizados</a>
</div>

<div class="card shadow">
    <div class="card-header py-3 fs-5 fw-semibold text-center">
        Crear un acontecimiento nuevo
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 mx-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="fecha" class="form-label fw-semibold">Fecha</label>
                        <input type="text" class="form-control shadow-sm" name="fecha" id="fecha" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label fw-semibold">Título</label>
                        <input type="text" class="form-control shadow-sm" name="titulo" id="titulo" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="form-label fw-semibold">Descripción</label>
                        <textarea class="form-control shadow-sm" name="descripcion" id="descripcion" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="imagen" class="form-label fw-semibold">Imagen</label>
                        <input type="file" class="form-control shadow-sm" name="imagen" id="imagen" aria-describedby="helpId" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-primary fw-semibold px-md-4 py-md-2 me-2">Agregar</button>
                    <a name="" id="" class="btn btn-outline-secondary fw-semibold px-md-4 py-md-2" href="<?= $url_base; ?>secciones/nosotros" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>




<?php include '../../templates/footer.php'; ?>