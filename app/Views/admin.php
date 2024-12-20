<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - Panel de Control</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
        }
        .admin-card {
            background-color: #ffffff;
            color: #333;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            margin: 30px auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="admin-card">
            <h3>Consulta DNI</h3>
            <!-- Formulario para ingresar DNI -->
            <form action="<?= base_url('admin/consultarDNI') ?>" method="POST">
                <div class="form-group">
                    <label for="dni">Número de DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingresa el DNI">
                </div>
                <button type="submit" class="btn btn-primary">Consultar</button>
            </form>

            <!-- Mostrar mensaje de error si no se encuentra el DNI -->
            <?php if (isset($error)): ?>
                <div class="alert alert-danger mt-4">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <!-- Mostrar datos si el DNI fue encontrado -->
            <?php if (isset($persona)): ?>
                <div class="mt-4">
                    <h5>Información de la Persona</h5>
                    <ul>
                        <li><strong>DNI:</strong> <?= $persona->numeroDocumento ?></li>
                        <li><strong>Nombre:</strong> <?= $persona->nombres ?></li>
                        <li><strong>Apellido Paterno:</strong> <?= $persona->apellidoPaterno ?></li>
                        <li><strong>Apellido Materno:</strong> <?= $persona->apellidoMaterno ?></li>
                        <li><strong>Tipo de Documento:</strong> <?= $persona->tipoDocumento ?></li>
                        <li><strong>Dígito Verificador:</strong> <?= $persona->digitoVerificador ?></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
