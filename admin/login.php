<?php require_once 'config/bd.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="bg-light">
    <header>

    </header>

    <main class="container">

        <div class="row vh-100 align-items-center text-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4 mx-auto">
                <div class="card shadow">
                    <h1 class="card-header bg-white fs-2 py-4 fw-semibold">Inicio de sesión</h1>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control shadow-sm" name="usuario" id="usuario" placeholder="Nombre de usuario">
                                <label for="usuario">Nombre de usuario</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control shadow-sm" name="password" id="password" placeholder="Contraseña">
                                <label for="password">Contraseña</label>
                            </div>
                            <a href="index" class="btn btn-primary btn-lg d-block fw-semibold mt-4">Iniciar sesión</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer>

    </footer>
</body>

</html>