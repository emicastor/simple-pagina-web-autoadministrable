<?php
include '../../config/bd.php';

if ($_POST) {
    // Recibimos los valores envíados por el formulario.
    $nombreconfiguracion = (isset($_POST['nombreconfiguracion'])) ? $_POST['nombreconfiguracion'] : "";
    $valor = (isset($_POST['valor'])) ? $_POST['valor'] : "";

    $sql = "INSERT INTO 
            tbl_configuraciones (nombreconfiguracion, valor) 
            VALUES 
            (:nombreconfiguracion, :valor)";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':nombreconfiguracion', $nombreconfiguracion);
    $sentencia->bindParam(':valor', $valor);
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
<h1 class="mb-4 pb-3 border-bottom">Configuraciones</h1>

<a class="btn btn-outline-secondary fw-semibold mb-4" href="<?= $url_base; ?>secciones/configuraciones" role="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left mb-1 me-1" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Volver
</a>
<div>
    <a class="btn btn-primary fw-semibold mb-4 me-2" href="<?= $url_base; ?>secciones/configuraciones" role="button">Ver lista de configuraciones</a>
</div>

<div class="card shadow">
    <div class="card-header py-3 fs-5 fw-semibold text-center">
        Crear una configuración nueva
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 mx-auto">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nombreconfiguracion" class="form-label fw-semibold">Nombre de la configuración</label>
                        <input type="text" class="form-control shadow-sm" name="nombreconfiguracion" id="nombreconfiguracion" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="valor" class="form-label fw-semibold">Texto a escribir</label>
                        <input type="text" class="form-control shadow-sm" name="valor" id="valor" aria-describedby="helpId" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-primary fw-semibold px-md-4 py-md-2 me-2">Agregar</button>
                    <a name="" id="" class="btn btn-outline-secondary fw-semibold px-md-4 py-md-2" href="<?= $url_base; ?>secciones/configuraciones" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>