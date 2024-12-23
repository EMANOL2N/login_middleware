<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tutorías Finalizadas - Estudiante</title>

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
        <h1>Tutorías Finalizadas</h1>
        <p>Aquí puedes visualizar el historial de las tutorías que has tenido.</p>

        <div class="card">
            <div class="card-header">Historial de Tutorías</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Tutor</th>
                            <th>Tema Tratado</th>
                            <th>Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Datos cargados -->
                        <tr>
                            <td>2024-12-10</td>
                            <td>Juan Pérez</td>
                            <td>Introducción a la Programación</td>
                            <td>Resolví todas mis dudas y la sesión fue clara.</td>
                        </tr>
                        <tr>
                            <td>2024-12-12</td>
                            <td>María López</td>
                            <td>Ecuaciones Diferenciales</td>
                            <td>El tutor explicó conceptos avanzados de forma sencilla.</td>
                        </tr>
                        <tr>
                            <td>2024-12-15</td>
                            <td>Juan Pérez</td>
                            <td>Álgebra Lineal</td>
                            <td>El tutor me ayudó a entender los conceptos básicos.</td>
                        </tr>
                        <tr>
                            <td>2024-12-18</td>
                            <td>María López</td>
                            <td>Estadística Descriptiva</td>
                            <td>Una sesión excelente para preparar el examen.</td>
                        </tr>
                        <tr>
                            <td>2024-12-20</td>
                            <td>Juan Pérez</td>
                            <td>Introducción a la Física</td>
                            <td>El tutor aclaró dudas que tenía sobre el tema.</td>
                        </tr>
                        <!-- Agregar más filas según sea necesario -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>