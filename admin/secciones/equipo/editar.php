<?php
include '../../config/bd.php';

if (isset($_GET['id'])) {
    $idAEditar = (isset($_GET['id'])) ? $_GET['id'] : '';
    $sql = "SELECT *
            FROM
            tbl_equipo
            WHERE
            id = :id";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':id', $idAEditar);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    // Guardamos la info traída de la bd -gracias a la consulta anterior- en variables que usaremos en los values de los input para completar dichos campos.
    $imagen = $registro['imagen'];
    $nombre = $registro['nombrecompleto'];
    $puesto = $registro['puesto'];
    $twitter = $registro['twitter'];
    $facebook = $registro['facebook'];
    $linkedin = $registro['linkedin'];
    // 2da opción
    // No crear las variables que hicimos arriba y usar en los values de los inputs el $registro['nombrecolumnaBD'];
}

if ($_POST) {
    $idAEditar = (isset($_POST['id'])) ? $_POST['id'] : '';
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : '';
    $twitter = (isset($_POST['twitter'])) ? $_POST['twitter'] : '';
    $facebook = (isset($_POST['facebook'])) ? $_POST['facebook'] : '';
    $linkedin = (isset($_POST['linkedin'])) ? $_POST['linkedin'] : '';

    $sql = "UPDATE
            tbl_equipo
            SET
            nombrecompleto = :nombre,
            puesto = :puesto,
            twitter = :twitter,
            facebook = :facebook,
            linkedin = :linkedin
            WHERE
            id = :id";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':id', $idAEditar);
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':puesto', $puesto);
    $sentencia->bindParam(':twitter', $twitter);
    $sentencia->bindParam(':facebook', $facebook);
    $sentencia->bindParam(':linkedin', $linkedin);
    $sentencia->execute();

    // Si hay una imagen...
    if (!empty($_FILES['imagen']['tmp_name'])) {
        $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : '';
        // La guardamos en la carpeta.
        $fechaImagen = new DateTime();
        $nombreArchivoImagen = (!empty($imagen)) ? $fechaImagen->getTimestamp() . '_' . $imagen : '';
        $tmpImagen = $_FILES['imagen']['tmp_name'];

        move_uploaded_file($tmpImagen, '../../../assets/img/equipo/' . $nombreArchivoImagen);

        // Buscamos en la carpeta la imagen anterior
        $sql = "SELECT
                imagen
                FROM
                tbl_equipo
                WHERE
                id = :id";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':id', $idAEditar);
        $sentencia->execute();
        $registro = $sentencia->fetch(PDO::FETCH_LAZY);

        // Si la imagen existe...
        if (isset($registro['imagen'])) {
            if (file_exists('../../../assets/img/equipo/' . $registro['imagen'])) {
                // La eliminamos...
                unlink('../../../assets/img/equipo/' . $registro['imagen']);
            }
        }

        // Y actualizamos el campo imagen del registro en la bd...
        $sql = "UPDATE
                tbl_equipo
                SET
                imagen = :imagen
                WHERE
                id = :id";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':imagen', $nombreArchivoImagen);
        $sentencia->bindParam(':id', $idAEditar);
        $sentencia->execute();
    }

    // Modal hecho con la librería SweetAlert2.
    $modal = '<script src="http://localhost/simple-pagina-web-autoadministrable/admin/assets/js/editar.js"></script>';
}

include '../../templates/header.php';
?>

<!---------------------------------------------------->
<?php if (isset($modal)) {
    echo $modal;
} ?>
<h1 class="mb-4 pb-3 border-bottom">Equipo</h1>

<a class="btn btn-outline-secondary fw-semibold mb-4" href="<?= $url_base; ?>/secciones/equipo" role="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left mb-1 me-1" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Volver
</a>
<div>
    <a class="btn btn-primary fw-semibold mb-4 me-2" href="<?= $url_base; ?>/secciones/equipo" role="button">Ver lista equipo</a>
    <a class="btn btn-warning fw-semibold mb-4" href="http://localhost/simple-pagina-web-autoadministrable/#equipo" role="button">Ver cambios realizados</a>
</div>

<div class="card shadow">
    <div class="card-header py-3 fs-5 fw-semibold text-center">
        Editar un integrante nuevo
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
                        <label for="nombre" class="form-label fw-semibold">Nombre y Apellido</label>
                        <input value="<?= $nombre; ?>" type="text" class="form-control shadow-sm" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="puesto" class="form-label fw-semibold">Puesto</label>
                        <input value="<?= $puesto; ?>" type="text" class="form-control shadow-sm" name="puesto" id="puesto" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label for="imagen" class="form-label fw-semibold">Imagen</label>
                        <br>
                        <img class="img-fluid rounded-2 border" src="../../../assets/img/equipo/<?= $imagen; ?>" alt="" width="100" height="100">
                        <input type="file" class="form-control shadow-sm mt-2" name="imagen" id="imagen" aria-describedby="helpId" placeholder="">
                    </div>
                    <label for="" class="form-label fw-semibold mb-3">Redes sociales</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">www.twitter.com/</span>
                        <input value="<?= $twitter; ?>" type="text" class="form-control shadow-sm" name="twitter" id="twitter" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">www.facebook.com/</span>
                        <input value="<?= $facebook; ?>" type="text" class="form-control shadow-sm" name="facebook" id="facebook" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">www.linkedin.com/in/</span>
                        <input value="<?= $linkedin; ?>" type="text" class="form-control shadow-sm" name="linkedin" id="linkedin" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <button type="submit" class="btn btn-primary fw-semibold px-md-4 py-md-2 me-2">Actualizar</button>
                    <a name="" id="" class="btn btn-outline-secondary fw-semibold px-md-4 py-md-2" href="<?= $url_base; ?>secciones/equipo" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include '../../templates/footer.php'; ?>