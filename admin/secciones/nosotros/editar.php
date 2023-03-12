<?php
include '../../config/bd.php';

if (isset($_GET['id'])) {
    $idAEditar = (isset($_GET['id'])) ? $_GET['id'] : '';
    $sql = "SELECT *
            FROM
            tbl_nosotros
            WHERE
            id = :id";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':id', $idAEditar);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    // Guardamos la info traída de la bd -gracias a la consulta anterior- en variables que usaremos en los values de los input para completar dichos campos.
    $fecha = $registro['fecha'];
    $titulo = $registro['titulo'];
    $descripcion = $registro['descripcion'];
    $imagen = $registro['imagen'];
    // 2da opción
    // No crear las variables que hicimos arriba y usar en los values de los inputs el $registro['nombrecolumnaBD'];
}

// Actualizamos la información del registro.
if ($_POST) {
    $idAEditar = (isset($_GET['id'])) ? $_GET['id'] : '';
    $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : "";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";

    $sql = "UPDATE
            tbl_nosotros
            SET
            fecha = :fecha,
            titulo = :titulo,
            descripcion = :descripcion
            WHERE
            id = :id";

    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':id', $idAEditar);
    $sentencia->bindParam(':fecha', $fecha);
    $sentencia->bindParam(':titulo', $titulo);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->execute();

    // Si hay una imagen...
    if (!empty($_FILES['imagen']['tmp_name'])) {

        $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
        // Adjuntamos imagen
        $fechaImagen = new DateTime();
        $nombreArchivoImagen = (!empty($imagen)) ? $fechaImagen->getTimestamp() . '_' . $imagen : '';
        $tmpImagen = $_FILES['imagen']['tmp_name'];

        move_uploaded_file($tmpImagen, '../../../assets/img/nosotros/' . $nombreArchivoImagen);

        // Borramos la imagen anterior de la carpeta portafolio
        $sql = "SELECT
                imagen
                FROM
                tbl_nosotros
                WHERE
                id = :id";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':id', $idAEditar);
        $sentencia->execute();
        // Buscamos el registro en cuestión.
        $registro = $sentencia->fetch(PDO::FETCH_LAZY);

        // Si existe, lo borramos.
        if (isset($registro['imagen'])) {
            if (file_exists('../../../assets/img/nosotros/' . $registro['imagen'])) {
                // unlink = Rorra físicamente la imagen.
                unlink('../../../assets/img/nosotros/' . $registro['imagen']);
            }
        }

        // // Actualizamos la bd.
        $sql = "UPDATE
            tbl_nosotros
            SET
            imagen = :imagen
            WHERE
            id = :id";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':imagen', $nombreArchivoImagen);
        $sentencia->bindParam(':id', $idAEditar);
        $sentencia->execute();
    }

    $mensaje = 'Proyecto modificado con éxito.';
    header('Location: http://localhost/simple-pagina-web-autoadministrable/admin/secciones/nosotros/?mensaje=' . $mensaje);
}




include '../../templates/header.php';
?>

<!---------------------------------------------------->

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
                        <label for="id" class="form-label fw-semibold">Id</label>
                        <input value="<?= $idAEditar; ?>" type="text" class="form-control shadow-sm" name="id" id="id" aria-describedby="helpId" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label fw-semibold">Fecha</label>
                        <input value="<?= $fecha; ?>" type="text" class="form-control shadow-sm" name="fecha" id="fecha" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label fw-semibold">Título</label>
                        <input value="<?= $titulo; ?>" type="text" class="form-control shadow-sm" name="titulo" id="titulo" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="form-label fw-semibold">Descripción</label>
                        <textarea class="form-control shadow-sm" name="descripcion" id="descripcion" rows="3"><?= $descripcion; ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="imagen" class="form-label fw-semibold">Imagen</label>
                        <br>
                        <img class="img-fluid rounded-2" src="../../../assets/img/nosotros/<?= $imagen; ?>" alt="" width="100" height="100">
                        <input type="file" class="form-control shadow-sm mt-2" name="imagen" id="imagen" aria-describedby="helpId" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-primary fw-semibold px-md-4 py-md-2 me-2">Actualizar</button>
                    <a name="" id="" class="btn btn-outline-secondary fw-semibold px-md-4 py-md-2" href="<?= $url_base; ?>/secciones/nosotros" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>