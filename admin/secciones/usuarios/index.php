<?php 
include '../../config/bd.php';

if (isset($_GET['id'])) {
    $idABorrar = (isset($_GET['id'])) ? $_GET['id'] : "";
    $sql = "DELETE 
            FROM 
            tbl_usuarios 
            WHERE 
            id=:id";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':id', $idABorrar);
    $sentencia->execute();
    header('Location: http://localhost/simple-pagina-web-autoadministrable/admin/secciones/usuarios/');
}

$sql = "SELECT * 
        FROM 
        tbl_usuarios";
$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include '../../templates/header.php'; 
?>

<!---------------------------------------------->

<h1 class="mb-4 pb-3 border-bottom">Usuarios</h1>

<a class="btn btn-outline-secondary fw-semibold mb-4" href="<?= $url_base; ?>" role="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left mb-1 me-1" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Volver
</a>
<div>
    <a class="btn btn-primary fw-semibold mb-4 me-2" href="crear" role="button">Nuevo usuario</a>
</div>

<div class="card shadow">
    <div class="card-header py-3 fs-5 fw-semibold text-center">
       Usuarios que administran su página web
    </div>
    <div class="card-body">

        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de usuario</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col"></th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_usuarios as $usuario) { ?>
                        <tr>
                            <td scope="row"> <?= $usuario['id']; ?> </td>
                            <td> <?= $usuario['usuario']; ?> </td>
                            <td> <?= $usuario['correo']; ?> </td>
                            <td></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a name="" id="" class="btn btn-primary btn-sm fw-semibold px-3" href="<?= $url_base; ?>secciones/usuarios/editar?id=<?= $usuario['id']; ?>" role="button" title="Editar el registro">
                                        Editar
                                    </a>
                                    <a name="" id="" class="btn btn-outline-secondary btn-sm fw-semibold" href="<?= $url_base; ?>secciones/usuarios/?id=<?= $usuario['id']; ?>" role="button" title="Eliminar el registro">
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
