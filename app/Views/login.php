<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestión de Tutorías - Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('<?= base_url('images/login-bg.jpg') ?>') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semitransparente */
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            width: 90%;
            max-width: 1200px;
        }

        .left-panel {
            width: 40%;
            text-align: center;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .left-panel img {
            width: 100px;
            margin-bottom: 1rem;
        }

        .left-panel h1 {
            font-size: 1.8rem;
            color: #003865;
        }

        .right-panel {
            width: 60%;
            padding: 2rem;
        }

        .login-form {
            width: 100%;
            max-width: 400px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .btn-primary {
            background-color: #003865;
            border-color: #003865;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .footer-text {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Panel Izquierdo -->
        <div class="left-panel">
            <img src="<?= base_url('images/logo2.png') ?>" alt="Logo Facultad">
            <h1>Reserva de Laboratorios (SIGAU)</h1>
            <p>Ingrese sus credenciales para continuar</p>
        </div>

        <!-- Panel Derecho -->
        <div class="right-panel">
            <div class="login-form bg-white p-4 rounded shadow">
                <form action="<?= base_url('/login') ?>" method="POST">
                    <!-- Usuario -->
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" required>
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                        </div>
                    </div>

                    <!-- Botón Ingresar -->
                    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>

                    <!-- Mensaje de Error -->
                    <?php if (session('mensaje') == '0'): ?>
                        <div class="alert alert-danger text-center mt-3">Usuario o contraseña incorrectos.</div>
                    <?php endif; ?>
                </form>
                <p class="footer-text">¿Olvidaste tu contraseña?</p>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>