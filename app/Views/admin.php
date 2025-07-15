<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema de Reserva de Laboratorios - UNA PUNO</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        /* Navbar fijo */
        nav.navbar {
            background-color: #fff;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
            padding: 0.5rem 1rem;
            z-index: 1100;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #0d3b66;
        }
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        .navbar-nav .nav-link {
            color: #333;
            font-weight: 500;
            margin-right: 1rem;
        }
        .navbar-nav .nav-link.active {
            color: #0d3b66;
        }
        .user-info {
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }
        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin: 0 0.5rem;
        }
        .sidebar {
            position: fixed;
            top: 56px;
            left: 0;
            height: calc(100vh - 56px);
            width: 70px;
            background-color: #1d2d50;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 0;
            transition: width 0.3s;
            overflow: hidden;
        }
        .sidebar:hover { width:220px; overflow-y:auto; }
        .sidebar a {
            color: #a9bcd0;
            width:100%;
            padding:15px 10px;
            display:flex;
            align-items:center;
            text-decoration:none;
            transition:background-color .3s;
        }
        .sidebar a i { min-width:30px; text-align:center; }
        .sidebar a:hover, .sidebar a.active {
            background-color:#0d3b66;
            color:#fff;
        }
        .sidebar a span {
            margin-left:10px;
            opacity:0;
            transition:opacity .3s;
        }
        .sidebar:hover a span { opacity:1; }

        .content {
            margin-left:70px;
            padding:20px;
            transition:margin-left .3s;
        }
        .sidebar:hover ~ .content { margin-left:220px; }

        @media (max-width: 768px) {
            .sidebar, .sidebar:hover { width:220px; position:relative; }
            .content, .sidebar:hover ~ .content { margin-left:0; padding:15px; }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="navbar-brand d-flex align-items-center">
        <img src="<?= base_url('images/logo1.png') ?>" alt="Logo UNA">
        UNA - PUNO
        </a>
        <div class="user-info ml-auto d-flex align-items-center">
        <span><?= session('username') ?? 'Invitado' ?></span>
        <img src="https://i.pravatar.cc/40" alt="Foto Usuario" />
        <!-- Cerrar sesión -->
        <a href="<?= base_url('/salir') ?>" class="btn btn-outline-danger btn-sm ml-3">Cerrar Sesión</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="<?= base_url('/admin') ?>" class="<?= current_url()==base_url('/admin') ? 'active' : '' ?>">
            <i class="fas fa-home"></i> <span>Inicio</span>
        </a>
        <a href="<?= base_url('/admin/laboratorios') ?>" class="<?= current_url()==base_url('/admin/laboratorios')?'active':'' ?>">
        <i class="fas fa-flask"></i><span>Laboratorios</span>
    </a>
    </div>

<!-- Main Content -->
<div class="content">
    <!-- Card de Bienvenida -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body text-center py-5">
        <h2 class="card-title display-4 font-weight-bold mb-3">
            <i class="fas fa-flask text-primary"></i>
            Bienvenido al Sistema de Reserva de Laboratorios
        </h2>
        <p class="card-text lead mb-4">
            Desde aquí puedes gestionar tus reservas de laboratorios de manera sencilla.
        </p>
        <a href="<?= base_url('/admin/laboratorios') ?>" class="btn btn-primary btn-lg">
            <i class="fas fa-calendar-plus mr-2"></i> Reservar Laboratorio
        </a>
        </div>
    </div>
</div>

    <!-- Bootstrap y FontAwesome JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>