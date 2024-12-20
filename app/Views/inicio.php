<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio - Usuario</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: #fff;
        }
        .user-card {
            background-color: #ffffff;
            color: #333;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: 30px auto;
        }

        .alert {
            max-width: 800px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bienvenido - <?= session('usuario') ?></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/salir') ?>">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="user-card text-center">
            <h1 class="mb-4">Consultar Estudiante</h1>
            <p class="lead">Ingrese el código del estudiante para obtener sus datos.</p>

            <!-- Formulario para consultar estudiante -->
            <form action="<?= base_url('inicio/consultarEstudiante') ?>" method="post" class="text-center">
                <label for="codigo" class="text-white">Código del Estudiante:</label>
                <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Ejemplo: 123456" required>
                <button type="submit" class="btn btn-primary mt-3">Consultar</button>
            </form>

            <!-- Mostrar errores -->
            <?php if (isset($error)): ?>
                <div class="alert alert-danger mt-3"><?= $error ?></div>
            <?php endif; ?>

            <!-- Mostrar datos del estudiante -->
            <?php if (isset($nombres)): ?>
                <div class="alert alert-success mt-3">
                    <h4>Datos del Estudiante:</h4>
                    <p><strong>Nombres:</strong> <?= $nombres ?></p>
                    <p><strong>Apellidos:</strong> <?= $apellidos ?></p>
                    <p><strong>Correo Institucional:</strong> <?= $correo ?></p>
                    <p><strong>Celular:</strong> <?= $celular ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
