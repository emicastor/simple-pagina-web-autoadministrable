<?php 
include '../../config/bd.php'; 

if ($_POST) {
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
    $puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : "";
    $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
    $twiiter = (isset($_POST['twitter'])) ? $_POST['twitter'] : "";
    $facebook = (isset($_POST['facebook'])) ? $_POST['facebook'] : "";
    $linkedin = (isset($_POST['linkedin'])) ? $_POST['linkedin'] : "";

    $fechaImagen = new DateTime();
    $nombreArchivoImagen = (!empty($imagen)) ? $fechaImagen->getTimestamp() . '_' . $imagen : '';
    $tmpImagen = $_FILES['imagen']['tmp_name'];

    if (!empty($tmpImagen)) {
        move_uploaded_file($tmpImagen, '../../../assets/img/equipo/' . $nombreArchivoImagen);
    }

    $sql = "INSERT INTO
            tbl_equipo (imagen, nombrecompleto, puesto, twitter, facebook, linkedin)
            VALUES
            (:imagen, :nombrecompleto, :puesto, :twitter, :facebook, :linkedin)";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':imagen', $nombreArchivoImagen);
    $sentencia->bindParam(':nombrecompleto', $nombre);
    $sentencia->bindParam(':puesto', $puesto);
    $sentencia->bindParam(':twitter', $twiiter);
    $sentencia->bindParam(':facebook', $facebook);
    $sentencia->bindParam(':linkedin', $linkedin);
    $sentencia->execute();
}

include '../../templates/header.php'; 
?>


<!---------------------------------------------------->
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
        Agregar un integrante nuevo
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 mx-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold">Nombre y Apellido</label>
                        <input type="text" class="form-control shadow-sm" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="puesto" class="form-label fw-semibold">Puesto</label>
                        <input type="text" class="form-control shadow-sm" name="puesto" id="puesto" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label for="imagen" class="form-label fw-semibold">Imagen</label>
                        <input type="file" class="form-control shadow-sm" name="imagen" id="imagen" aria-describedby="helpId" placeholder="">
                    </div>
                    <label for="twitter" class="form-label fw-semibold mb-3">Redes sociales</label>
                    <div class="mb-3">
                        <label for="twitter" class="form-label fw-semibold">Twitter</label>
                        <input type="text" class="form-control shadow-sm" name="twitter" id="twitter" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="facebook" class="form-label fw-semibold">Facebook</label>
                        <input type="text" class="form-control shadow-sm" name="facebook" id="facebook" aria-describedby="helpId" placeholder="">
                    </div><div class="mb-3">
                        <label for="linkedin" class="form-label fw-semibold">Linkedin</label>
                        <input type="text" class="form-control shadow-sm" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="">
                    </div>
                    
                    <button type="submit" class="btn btn-primary fw-semibold px-md-4 py-md-2 me-2">Agregar</button>
                    <a name="" id="" class="btn btn-outline-secondary fw-semibold px-md-4 py-md-2" href="<?= $url_base; ?>/secciones/equipo" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>