<?php
include '../../config/bd.php';

if (isset($_GET['id'])) {
    $idABorrar = (isset($_GET['id'])) ? $_GET['id'] : "";

    // Borramos la imagen de la carpeta portafolio
    $sql = "SELECT
            imagen
            FROM
            tbl_equipo
            WHERE
            id = :id";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':id', $idABorrar);
    $sentencia->execute();
    // Buscamos el registro en cuestión.
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    // Si existe, lo borramos.
    if (isset($registro['imagen'])) {
        if (file_exists('../../../assets/img/equipo/' . $registro['imagen'])) {
            // unlink = Rorra físicamente la imagen.
            unlink('../../../assets/img/equipo/' . $registro['imagen']);
        }
    }
    
    // Borramos el registro de la bd.
    $sql = "DELETE FROM tbl_equipo WHERE id=:id";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':id', $idABorrar);
    $sentencia->execute();
    header('Location: http://localhost/simple-pagina-web-autoadministrable/admin/secciones/equipo/');
}

$sql = "SELECT *
        FROM
        tbl_equipo";
$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$lista_equipo = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include '../../templates/header.php';
?>

<!---------------------------------------------->

<h1 class="mb-4 pb-3 border-bottom">Equipo</h1>

<a class="btn btn-outline-secondary fw-semibold mb-4" href="<?= $url_base; ?>" role="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left mb-1 me-1" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Volver
</a>
<div>
    <a class="btn btn-primary fw-semibold mb-4 me-2" href="crear" role="button">Nuevo integrante</a>
</div>

<div class="card shadow">
    <div class="card-header py-3 fs-5 fw-semibold text-center">
        Equipo publicado en su página web
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Redes</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_equipo as $item) { ?>
                        <tr>
                            <td scope="row"> <?= $item['id']; ?> </td>
                            <td>
                                <img class="img-fluid rounded-2 img border"
                                 src="../../../assets/img/equipo/<?= $item['imagen']; ?>" alt="" width="100" height="100">
                            </td>
                            <td> <?= $item['nombrecompleto']; ?> </td>
                            <td> <?= $item['puesto']; ?> </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="https://facebook.com/<?= $item['facebook']; ?>" class="text-decoration-none" title="Facebook" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                        </svg>
                                    </a>
                                    <a href="https://twitter.com/<?= $item['twitter']; ?>" class="text-decoration-none" title="Twitter" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                        </svg>
                                    </a>
                                    <a href="https://linkedin.com/in/<?= $item['linkedin']; ?>" class="text-decoration-none" title="Linkedin" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-linkedin me-3 me-md-0" viewBox="0 0 16 16">
                                            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-primary btn-sm fw-semibold px-3" href="<?= $url_base; ?>secciones/equipo/editar?id=<?= $item['id']; ?>" role="button" title="Editar el registro">
                                        Editar
                                    </a>
                                    <a class="btn btn-outline-secondary btn-sm fw-semibold" href="<?= $url_base; ?>secciones/equipo/?id=<?= $item['id']; ?>" role="button" title="Eliminar el registro">
                                        Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>





<?php include '../../templates/footer.php'; ?>