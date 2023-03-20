<?php
include '../../config/bd.php';

if ($_POST) {
    // Recibimos los valores envíados por el formulario.
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "";
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";

    $sql = "INSERT INTO 
            tbl_usuarios (usuario, password, correo) 
            VALUES 
            (:usuario, :password, :correo)";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':usuario', $usuario);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam(':correo', $correo);
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
<h1 class="mb-4 pb-3 border-bottom">Usuarios</h1>

<a class="btn btn-outline-secondary fw-semibold mb-4" href="<?= $url_base; ?>/secciones/usuarios" role="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left mb-1 me-1" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Volver
</a>
<div>
    <a class="btn btn-primary fw-semibold mb-4 me-2" href="<?= $url_base; ?>/secciones/usuarios" role="button">Ver lista de usuarios</a>
</div>

<div class="card shadow">
    <div class="card-header py-3 fs-5 fw-semibold text-center">
        Crear un usuario nuevo
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 mx-auto">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="usuario" class="form-label fw-semibold">Nombre de usuario</label>
                        <input type="text" class="form-control shadow-sm" name="usuario" id="usuario" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" class="form-control shadow-sm" name="password" id="password" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label fw-semibold">Correo electrónico</label>
                        <input type="email" class="form-control shadow-sm" name="correo" id="correo" aria-describedby="helpId" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-primary fw-semibold px-md-4 py-md-2 me-2">Agregar</button>
                    <a name="" id="" class="btn btn-outline-secondary fw-semibold px-md-4 py-md-2" href="<?= $url_base; ?>secciones/usuarios" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../../templates/footer.php'; ?>