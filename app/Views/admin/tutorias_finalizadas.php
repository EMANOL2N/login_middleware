<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tutorías Finalizadas - Tutor</title>

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
        <a class="navbar-brand" href="#">UNA PUNO - Tutor</a>
        <div class="ml-auto">
            <span class="navbar-text text-white mr-3"><?= session('usuario') ?> (TUTOR)</span>
            <a href="<?= base_url('/salir') ?>" class="btn btn-outline-light">Cerrar Sesión</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Panel de Control</h4>
        <a href="<?= base_url('/admin') ?>" class="<?= current_url() == base_url('/admin') ? 'active' : '' ?>"><i class="fas fa-home"></i> Inicio</a>
        <a href="<?= base_url('/admin/mis_tutorados') ?>" class="<?= current_url() == base_url('/admin/mis_tutorados') ? 'active' : '' ?>"><i class="fas fa-users"></i> Mis Tutorados</a>
        <a href="<?= base_url('/admin/tutorias_finalizadas') ?>" class="<?= current_url() == base_url('/admin/tutorias_finalizadas') ? 'active' : '' ?>"><i class="fas fa-file-alt"></i> Tutorías Finalizadas</a>
        <a href="<?= base_url('/admin/chat') ?>" class="<?= current_url() == base_url('/admin/chat') ? 'active' : '' ?>"><i class="fas fa-comments"></i> Chat</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Tutorías Finalizadas</h1>
        <p>Aquí puedes visualizar el historial de las tutorías que has completado con tus tutorados.</p>

        <div class="card">
            <div class="card-header">Historial de Tutorías</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Estudiante</th>
                            <th>Código</th>
                            <th>Tema Tratado</th>
                            <th>Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Datos cargados -->
                        <tr>
                            <td>2024-12-10</td>
                            <td>YIMMY CRISTHIAN MOROCCO APAZA</td>
                            <td>217349</td>
                            <td>Introducción a la Programación</td>
                            <td>El estudiante resolvió todas sus dudas exitosamente.</td>
                        </tr>
                        <tr>
                            <td>2024-12-12</td>
                            <td>RUTH SANDRA ANCCORI CESPEDES</td>
                            <td>215386</td>
                            <td>Ecuaciones Diferenciales</td>
                            <td>La sesión fue útil para comprender los conceptos.</td>
                        </tr>
                        <tr>
                            <td>2024-12-15</td>
                            <td>RUTH KARINA CUSI HUANACUNI</td>
                            <td>215311</td>
                            <td>Álgebra Lineal</td>
                            <td>El estudiante solicitó más tutorías para reforzar el tema.</td>
                        </tr>
                        <tr>
                            <td>2024-12-18</td>
                            <td>EMANOL JESUS TITO MELO</td>
                            <td>217624</td>
                            <td>Estadística Descriptiva</td>
                            <td>La sesión fue clara y comprendió todos los temas.</td>
                        </tr>
                        <tr>
                            <td>2024-12-20</td>
                            <td>YOEL CRISTIAN CATACORA CHECALLA</td>
                            <td>217229</td>
                            <td>Introducción a la Física</td>
                            <td>El estudiante tuvo dudas menores, pero se resolvieron.</td>
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