<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mis Tutorados - Tutor</title>

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
        <h1>Mis Tutorados</h1>
        <p>Aquí puedes visualizar el listado de los estudiantes que tienes a tu cargo como tutor.</p>

        <div class="card">
            <div class="card-header">Listado de Tutorados</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Código</th>
                            <th>Correo Institucional</th>
                            <th>Celular</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Datos cargados -->
                        <tr>
                            <td>YIMMY CRISTHIAN</td>
                            <td>MOROCCO APAZA</td>
                            <td>217349</td>
                            <td>ymoroco@est.unap.edu.pe</td>
                            <td>910906209</td>
                        </tr>
                        <tr>
                            <td>RUTH SANDRA</td>
                            <td>ANCCORI CESPEDES</td>
                            <td>215386</td>
                            <td>ranccori@est.unap.edu.pe</td>
                            <td>935551377</td>
                        </tr>
                        <tr>
                            <td>RUTH KARINA</td>
                            <td>CUSI HUANACUNI</td>
                            <td>215311</td>
                            <td>rcusi@est.unap.edu.pe</td>
                            <td>931910380</td>
                        </tr>
                        <tr>
                            <td>EMANOL JESUS</td>
                            <td>TITO MELO</td>
                            <td>217624</td>
                            <td>emtito@est.unap.edu.pe</td>
                            <td>940575267</td>
                        </tr>
                        <tr>
                            <td>YOEL CRISTIAN</td>
                            <td>CATACORA CHECALLA</td>
                            <td>217229</td>
                            <td>ycatacora@est.unap.edu.pe</td>
                            <td>966386577</td>
                        </tr>
                        <tr>
                            <td>DAVID SALOMON</td>
                            <td>LOPEZ TICONA</td>
                            <td>217273</td>
                            <td>dlopez@est.unap.edu.pe</td>
                            <td>930822836</td>
                        </tr>
                        <tr>
                            <td>JOSE DAVID</td>
                            <td>ARIAS VILCA</td>
                            <td>217221</td>
                            <td>jarias@est.unap.edu.pe</td>
                            <td>900997322</td>
                        </tr>
                        <tr>
                            <td>ADA ROCIO</td>
                            <td>CONDORI QUILCA</td>
                            <td>217059</td>
                            <td>N/A</td>
                            <td>926606027</td>
                        </tr>
                        <tr>
                            <td>RUTH KARINA</td>
                            <td>TITO TITO</td>
                            <td>214452</td>
                            <td>rtito@est.unap.edu.pe</td>
                            <td>918203275</td>
                        </tr>
                        <tr>
                            <td>EDITH ENMA</td>
                            <td>ORTEGA CONDORI</td>
                            <td>215871</td>
                            <td>eortega@est.unap.edu.pe</td>
                            <td>970576605</td>
                        </tr>
                        <!-- Agregar más filas según sea necesario -->
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