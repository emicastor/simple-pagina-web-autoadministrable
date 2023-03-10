<?php
include '../../config/bd.php';
// Hacemos la consulta.
if (isset($_GET['id'])) {
    $idAEditar = (isset($_GET['id'])) ? $_GET['id'] : "";
    $sql = "SELECT *
            FROM 
            tbl_portafolio 
            WHERE 
            id = :id";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':id', $idAEditar);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    // Luego, recuperamos los datos de esa consulta.
    $titulo = $registro['titulo'];
    $subtitulo = $registro['subtitulo'];
    $imagen = $registro['imagen'];
    $descripcion = $registro['descripcion'];
    $cliente = $registro['cliente'];
    $categoria = $registro['categoria'];
    $url = $registro['url'];
}

if ($_POST) {
    $idAEditar = (isset($_POST['id'])) ? $_POST['id'] : "";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $subtitulo = (isset($_POST['subtitulo'])) ? $_POST['subtitulo'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
    $cliente = (isset($_POST['cliente'])) ? $_POST['cliente'] : "";
    $categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : "";
    $url = (isset($_POST['url'])) ? $_POST['url'] : "";

    $sql = "UPDATE
            tbl_portafolio
            SET
            titulo = :titulo,
            subtitulo = :subtitulo,
            descripcion = :descripcion,
            cliente = :cliente,
            categoria = :categoria,
            url = :url
            WHERE
            id = :id";

    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':id', $idAEditar);
    $sentencia->bindParam(':titulo', $titulo);
    $sentencia->bindParam(':subtitulo', $subtitulo);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->bindParam(':cliente', $cliente);
    $sentencia->bindParam(':categoria', $categoria);
    $sentencia->bindParam(':url', $url);
    $sentencia->execute();

    // Si hay una imagen...
    if (!empty($_FILES['imagen']['tmp_name'])) {

        $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
        // Adjuntamos imagen
        $fechaImagen = new DateTime();
        $nombreArchivoImagen = (!empty($imagen)) ? $fechaImagen->getTimestamp() . '_' . $imagen : '';
        $tmpImagen = $_FILES['imagen']['tmp_name'];

        move_uploaded_file($tmpImagen, '../../../assets/img/portafolio/' . $nombreArchivoImagen);

        // Borramos la imagen anterior de la carpeta portafolio
        $sql = "SELECT
                imagen
                FROM
                tbl_portafolio
                WHERE
                id = :id";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindParam(':id', $idAEditar);
        $sentencia->execute();
        // Buscamos el registro en cuestión.
        $registro = $sentencia->fetch(PDO::FETCH_LAZY);

        // Si existe, lo borramos.
        if (isset($registro['imagen'])) {
            if (file_exists('../../../assets/img/portafolio/' . $registro['imagen'])) {
                // unlink = Rorra físicamente la imagen.
                unlink('../../../assets/img/portafolio/' . $registro['imagen']);
            }
        }

        // // Actualizamos la bd.
        $sql = "UPDATE
            tbl_portafolio
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
    header('Location: http://localhost/simple-pagina-web-autoadministrable/admin/secciones/portafolio/?mensaje=' . $mensaje);
}

include '../../templates/header.php';
?>



<!---------------------------------------------------->

<h1 class="mb-4 pb-3 border-bottom">Portafolio</h1>
<a class="btn btn-outline-secondary fw-semibold mb-4" href="<?= $url_base; ?>secciones/portafolio" role="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left mb-1 me-1" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Volver
</a>
<div>
    <a class="btn btn-primary fw-semibold mb-4 me-2" href="<?= $url_base; ?>secciones/portafolio" role="button">Ver lista de proyectos</a>
</div>

<div class="card shadow">
    <div class="card-header py-3 fs-5 fw-semibold text-center">
        Editar un proyecto
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
                        <label for="titulo" class="form-label fw-semibold">Título</label>
                        <input value="<?= $titulo; ?>" type="text" class="form-control shadow-sm" name="titulo" id="titulo" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="subtitulo" class="form-label fw-semibold">Subtítulo</label>
                        <input value="<?= $subtitulo; ?>" type="text" class="form-control shadow-sm" name="subtitulo" id="subtitulo" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label for="imagen" class="form-label fw-semibold">Imagen</label>
                        <br>
                        <img class="img-fluid rounded-2" src="../../../assets/img/portafolio/<?= $imagen; ?>" alt="" width="100" height="100">
                        <input type="file" class="form-control shadow-sm mt-2" name="imagen" id="imagen" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="form-label fw-semibold">Descripción</label>
                        <!-- <input type="text" class="form-control shadow-sm" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder=""> -->
                        <textarea class="form-control shadow-sm" name="descripcion" id="descripcion" rows="3"><?= $descripcion; ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="cliente" class="form-label fw-semibold">Cliente</label>
                        <input value="<?= $cliente; ?>" type="text" class="form-control shadow-sm" name="cliente" id="cliente" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label for="categoria" class="form-label fw-semibold">Categoría</label>
                        <input value="<?= $categoria; ?>" type="text" class="form-control shadow-sm" name="categoria" id="categoria" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label for="url" class="form-label fw-semibold">URL del proyecto</label>
                        <input value="<?= $url; ?>" type="text" class="form-control shadow-sm" name="url" id="url" aria-describedby="helpId" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-primary fw-semibold px-md-4 py-md-2 me-2">Actualizar</button>
                    <a name="" id="" class="btn btn-outline-secondary fw-semibold px-md-4 py-md-2" href="<?= $url_base; ?>secciones/portafolio" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>




<?php include '../../templates/footer.php'; ?>