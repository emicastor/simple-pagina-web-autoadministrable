<?php
include '../../config/bd.php';

$sql = "SELECT * FROM tbl_portafolio";
$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);
include '../../templates/header.php';
?>

<!---------------------------------------------->

<h1 class="mb-4 pb-3 border-bottom">Portafolio</h1>

<a class="btn btn-outline-secondary fw-semibold mb-4" href="<?= $url_base; ?>" role="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left mb-1 me-1" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Volver
</a>
<div>
    <a class="btn btn-primary fw-semibold mb-4 me-2" href="crear" role="button">Nuevo proyecto</a>
</div>

<div class="card shadow">
    <div class="card-header py-3 fs-5 fw-semibold text-center">
        Proyectos publicados en su página web
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Subtítulo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Url</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_portafolio as $proyecto) { ?>
                        <tr>
                            <td scope="row"> <?= $proyecto['id']; ?> </td>
                            <td> <?= $proyecto['titulo']; ?> </td>
                            <td> <?= $proyecto['subtitulo']; ?> </td>
                            <td> <?= $proyecto['imagen']; ?> </td>
                            <td> 
                                <a class="text-decoration-none badge rounded-pill text-bg-secondary mb-1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Ver
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <?= $proyecto['descripcion']; ?>
                                </div>
                            </td>
                            <td> <?= $proyecto['cliente']; ?> </td>
                            <td> <?= $proyecto['categoria']; ?> </td>
                            <td> <?= $proyecto['url']; ?> </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-primary btn-sm fw-semibold px-3" href="<?= $url_base; ?>/secciones/portafolio/editar?id=<?= $proyecto['id']; ?>" role="button" title="Editar el registro">
                                        Editar
                                    </a>
                                    <a class="btn btn-outline-secondary btn-sm fw-semibold" href="<?= $url_base; ?>/secciones/portafolio/?id=<?= $proyecto['id']; ?>" role="button" title="Eliminar el registro">
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