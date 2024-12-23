<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio - Estudiante</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">UNA PUNO - Estudiante</a>
        <div class="ml-auto">
            <span class="navbar-text text-white mr-3"><?= session('usuario') ?> (ESTUDIANTE)</span>
            <a href="<?= base_url('/salir') ?>" class="btn btn-outline-light">Cerrar Sesión</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Panel de Control</h4>
        <a href="<?= base_url('/inicio') ?>" class="<?= current_url() == base_url('/inicio') ? 'active' : '' ?>"><i class="fas fa-home"></i> Inicio</a>
        <a href="<?= base_url('/estudiante/mis_tutores') ?>" class="<?= current_url() == base_url('/estudiante/mis_tutores') ? 'active' : '' ?>"><i class="fas fa-user"></i> Mis Tutores</a>
        <a href="<?= base_url('/estudiante/tutorias_finalizadas') ?>" class="<?= current_url() == base_url('/estudiante/tutorias_finalizadas') ? 'active' : '' ?>"><i class="fas fa-file-alt"></i> Tutorías Finalizadas</a>
        <a href="<?= base_url('/estudiante/chat') ?>" class="<?= current_url() == base_url('/estudiante/chat') ? 'active' : '' ?>"><i class="fas fa-comments"></i> Chat</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <div class="card-header">Consultar Estudiante</div>
            <div class="card-body">
                <p class="lead">Ingrese el código del estudiante para obtener sus datos.</p>

                <!-- Formulario para consultar estudiante -->
                <form action="<?= base_url('inicio/consultarEstudiante') ?>" method="post">
                    <label for="codigo">Código del Estudiante:</label>
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
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
