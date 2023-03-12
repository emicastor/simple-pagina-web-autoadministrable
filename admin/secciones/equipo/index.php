<?php 
include '../../config/bd.php';
include '../../templates/header.php'; 

$sql = "SELECT *
        FROM
        tbl_equipo";
$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$lista_equipo = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<!---------------------------------------------->

<h1 class="mb-4 pb-3 border-bottom">Nosotros</h1>

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
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Redes</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_equipo as $item) { ?>
                        <tr>
                            <td scope="row"> <?= $item['id']; ?> </td>
                            <td> <?= $item['nombrecompleto']; ?> </td>
                            <td> <?= $item['puesto']; ?> </td>
                            <td>
                                <img class="img-fluid rounded-2 img" src="../../../assets/img/nosotros/<?= $item['imagen']; ?>" alt="" width="100" height="100">
                            </td>
                            <td> <span class="d-inline-block bg-secondary rounded-circle p-2 me-3"></span><?= $item['twitter']; ?>
                            <br>
                            <span class="d-inline-block bg-secondary rounded-circle p-2 me-3"></span><?= $item['facebook']; ?>
                            <span class="d-inline-block bg-secondary rounded-circle p-2 me-3"></span><?= $item['linkedin']; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-primary btn-sm fw-semibold px-3" href="<?= $url_base; ?>secciones/equipo/editar?id=<?= $item['id']; ?>" role="button" title="Editar el registro">
                                        Editar
                                    </a>
                                    <a class="btn btn-outline-secondary btn-sm fw-semibold" href="<?= $url_base; ?>/secciones/equipo/?id=<?= $item['id']; ?>" role="button" title="Eliminar el registro">
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
