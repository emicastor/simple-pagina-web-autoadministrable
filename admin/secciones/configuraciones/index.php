<?php
include '../../config/bd.php';

if (isset($_GET['id'])) {
    $idABorrar = (isset($_GET['id'])) ? $_GET['id'] : "";
    $sql = "DELETE 
            FROM 
            tbl_configuraciones 
            WHERE 
            id=:id";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindParam(':id', $idABorrar);
    $sentencia->execute();
    header('Location: http://localhost/simple-pagina-web-autoadministrable/admin/secciones/configuraciones/');
}

$sql = "SELECT * 
        FROM 
        tbl_configuraciones";
$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$lista_configuraciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);


include '../../templates/header.php';
?>

<!-- En el CRUD solo vamos a permitir la edición. No se va a poder agregar ni borrar ningún registro.
Las configuraciones ya deben estar predefinidas para evitar así que el usuario pueda borrar o dañar la página web -->

<h1 class="mb-4 pb-3 border-bottom">Configuraciones</h1>

<a class="btn btn-outline-secondary fw-semibold mb-4" href="<?= $url_base; ?>" role="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left mb-1 me-1" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Volver
</a>
<div>
    <a class="btn btn-primary fw-semibold mb-4 me-2 d-none" href="crear" role="button">Nueva configuración</a>
</div>

<div class="card shadow">
    <div class="card-header py-3 fs-5 fw-semibold text-center">
        Configuraciones de su página web
    </div>
    <div class="card-body">

        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de la configuración</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_configuraciones as $config) { ?>
                        <tr>
                            <td scope="row"> <?= $config['id']; ?> </td>
                            <td> <?= $config['nombreconfiguracion']; ?> </td>
                            <td> <?= $config['valor']; ?> </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a name="" id="" class="btn btn-primary btn-sm fw-semibold px-3" href="<?= $url_base; ?>secciones/configuraciones/editar?id=<?= $config['id']; ?>" role="button" title="Editar el registro">
                                        Editar
                                    </a>
                                    <a name="" id="" class="btn btn-outline-secondary btn-sm fw-semibold d-none" href="<?= $url_base; ?>secciones/configuraciones/?id=<?= $config['id']; ?>" role="button" title="Eliminar el registro">
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