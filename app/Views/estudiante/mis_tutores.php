<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mis Tutores - Estudiante</title>

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
        <h1>Mis Tutores</h1>
        <p>Aquí puedes visualizar el listado de tus tutores asignados.</p>

        <div class="card">
            <div class="card-header">Listado de Tutores</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Horario Disponible</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se debe cargar la información de los tutores -->
                        <tr>
                            <td>Juan Pérez</td>
                            <td>juan.perez@unap.edu.pe</td>
                            <td>Lunes a Viernes, 9:00 - 12:00</td>
                        </tr>
                        <tr>
                            <td>María López</td>
                            <td>maria.lopez@unap.edu.pe</td>
                            <td>Martes y Jueves, 10:00 - 14:00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>