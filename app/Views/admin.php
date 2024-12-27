<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Panel de Administrador - UNA PUNO</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-color: #f7f9fc;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #003865;
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

        .navbar .nav-link {
            color: #fff !important;
        }

        .sidebar {
            background-color: #003865;
            color: #fff;
            height: 100vh;
            position: fixed;
            padding: 20px 10px;
            width: 250px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 4px;
            margin-bottom: 5px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #0056b3;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">UNA PUNO - Admin</a>
        <div class="ml-auto">
            <span class="navbar-text text-white mr-3"><?= session('usuario') ?> (ADMIN)</span>
            <a href="<?= base_url('/salir') ?>" class="btn btn-outline-light">Cerrar Sesión</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Panel de Control</h4>
        <a href="<?= current_url() == base_url('/admin') ? '#' : base_url('/admin') ?>" 
           class="<?= current_url() == base_url('/admin') ? 'active' : '' ?>"><i class="fas fa-home"></i> Inicio</a>
        <a href="<?= base_url('/admin/mis_tutorados') ?>" 
           class="<?= current_url() == base_url('/admin/mis_tutorados') ? 'active' : '' ?>"><i class="fas fa-users"></i> Mis Tutorados</a>
        <a href="<?= base_url('/admin/tutorias_finalizadas') ?>" 
           class="<?= current_url() == base_url('/admin/tutorias_finalizadas') ? 'active' : '' ?>"><i class="fas fa-file-alt"></i> Tutorías Finalizadas</a>
        <a href="<?= base_url('/admin/chat') ?>" 
           class="<?= current_url() == base_url('/admin/chat') ? 'active' : '' ?>"><i class="fas fa-comments"></i> Chat</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Bienvenido, <?= session('usuario') ?>.</h1>
        <p>Desde aquí puedes gestionar las diferentes secciones del sistema.</p>

        <!-- Panel de Consulta DNI -->
        <div class="card">
            <div class="card-header">Consulta DNI</div>
            <div class="card-body">
                <form action="<?= base_url('/admin/consultarDNI') ?>" method="POST">
                    <div class="form-group">
                        <label for="dni">Número de DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingresa el DNI" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Consultar</button>
                </form>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger mt-3"><?= $error ?></div>
                <?php endif; ?>

                <?php if (isset($persona)): ?>
                    <div class="mt-3">
                        <h5>Información Encontrada:</h5>
                        <ul>
                            <li><strong>Nombre:</strong> <?= $persona->nombres ?></li>
                            <li><strong>Apellido Paterno:</strong> <?= $persona->apellidoPaterno ?></li>
                            <li><strong>Apellido Materno:</strong> <?= $persona->apellidoMaterno ?></li>
                            <li><strong>DNI:</strong> <?= $persona->numeroDocumento ?></li>
                        </ul>
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