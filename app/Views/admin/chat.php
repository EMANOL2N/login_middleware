<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chat - Tutor</title>

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

        .chat-box {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background-color: #fff;
            height: 400px;
            overflow-y: auto;
        }

        .chat-message {
            margin-bottom: 10px;
        }

        .chat-message.student {
            text-align: left;
        }

        .chat-message.tutor {
            text-align: right;
        }

        .chat-message p {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 15px;
            margin: 0;
        }

        .chat-message.student p {
            background-color: #f0f0f0;
            color: #333;
        }

        .chat-message.tutor p {
            background-color: #003865;
            color: #fff;
        }

        .chat-input {
            margin-top: 15px;
        }

        .btn-send {
            background-color: #003865;
            color: #fff;
        }

        .btn-send:hover {
            background-color: #0056b3;
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
        <h1>Chat</h1>
        <p>Comunícate en tiempo real con tus tutorados.</p>

        <!-- Chat Box -->
        <div class="chat-box">
            <!-- Ejemplo de mensajes -->
            <div class="chat-message student">
                <p><strong>Estudiante:</strong> Hola, ¿podemos hablar sobre la tutoría del jueves?</p>
            </div>
            <div class="chat-message tutor">
                <p><strong>Tutor:</strong> Claro, ¿qué dudas tienes?</p>
            </div>
            <div class="chat-message student">
                <p><strong>Estudiante:</strong> Quiero confirmar el horario y el tema que vamos a tratar.</p>
            </div>
            <div class="chat-message tutor">
                <p><strong>Tutor:</strong> Perfecto, será el jueves a las 10:00 AM y veremos Álgebra Lineal.</p>
            </div>
        </div>

        <!-- Input para enviar mensajes -->
        <form class="chat-input" action="<?= base_url('/admin/chat/send') ?>" method="post">
            <div class="input-group">
                <input type="text" name="message" class="form-control" placeholder="Escribe tu mensaje aquí..." required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-send"><i class="fas fa-paper-plane"></i> Enviar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>