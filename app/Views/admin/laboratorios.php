<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laboratorios – Sistema de Reserva de Laboratorios</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar */
        nav.navbar {
            background-color: #fff;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
            padding: .5rem 1rem;
            z-index: 1100;
            position: fixed; /* Fijamos el navbar en la parte superior */
            top: 0;
            left: 0;
            width: 100%;
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
        .user-info {
            font-size: .9rem;
            display: flex;
            align-items: center;
        }
        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin: 0 .5rem;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 56px; /* Aseguramos que el sidebar empiece debajo del navbar */
            left: 0;
            height: calc(100vh - 56px); /* Ajustamos la altura del sidebar */
            width: 70px;
            background-color: #1d2d50;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 0;
            transition: width .3s;
            overflow: hidden;
            z-index: 1000; /* Aseguramos que el sidebar esté debajo del navbar */
        }
        .sidebar:hover { width: 220px; overflow-y: auto; }
        .sidebar a {
            color: #a9bcd0;
            width: 100%;
            padding: 15px 10px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: background-color .3s;
        }
        .sidebar a i { min-width: 30px; text-align: center; }
        .sidebar a:hover, .sidebar a.active {
            background-color: #0d3b66;
            color: #fff;
        }
        .sidebar a span {
            margin-left: 10px;
            opacity: 0;
            transition: opacity .3s;
        }
        .sidebar:hover a span { opacity: 1; }

        /* Content */
        .content {
            margin-left: 70px;
            padding: 20px;
            transition: margin-left .3s;
            margin-top: 56px; /* Ajustamos para que el contenido empiece debajo del navbar */
        }
        .sidebar:hover~.content {
            margin-left: 220px; /* Ajustamos cuando el sidebar se expande */
        }

        /* Calendar container */
        #calendar {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 1rem;
        }

        @media (max-width: 768px) {
            .sidebar, .sidebar:hover { width: 220px; position: relative; }
            .content, .sidebar:hover ~ .content { margin-left: 0; padding: 15px; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="<?= base_url('/inicio') ?>" class="navbar-brand d-flex align-items-center">
            <img src="<?= base_url('images/logo1.png') ?>" alt="Logo UNA"> UNA - PUNO
        </a>
        <div class="user-info ml-auto">
            <span><?= session('username') ?? 'Invitado' ?></span>
            <img src="https://i.pravatar.cc/40" alt="Foto Usuario" />
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
    <!-- Formulario de Reserva -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header"><h5></i>Nueva Reserva</h5></div>
        <div class="card-body">
            <?php
                $monday = date('Y-m-d', strtotime('monday this week'));
                $sunday = date('Y-m-d', strtotime('sunday this week'));
            ?>
            <form action="<?= base_url('/docente/laboratorios/reservar') ?>" method="post" class="form-inline">
                <?= csrf_field() ?>

                <label class="mr-2">Laboratorio</label>
                <select name="lab_id" class="form-control mr-3">
                    <option value="1">LAB01</option>
                </select>

                <label class="mr-2">Día</label>
                <input type="date" name="date" class="form-control mr-3" min="<?= $monday ?>" max="<?= $sunday ?>" required/>

                <label class="mr-2">Desde</label>
                <input type="time" name="start_time" class="form-control mr-3" required/>

                <label class="mr-2">Hasta</label>
                <input type="time" name="end_time" class="form-control mr-3" required/>

                <button type="submit" class="btn btn-primary">Reservar</button>
            </form>
        </div>
    </div>

    <!-- Selector y Calendario -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5><i class="fas fa-clock text-primary"></i> Horario de Laboratorios</h5>
        <select id="labSelector" class="form-control w-auto">
            <option value="1">LAB01</option>
        </select>
    </div>

    <div id="calendar"></div>
</div>

<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const BASE    = '<?= base_url() ?>';
        const labSel  = document.getElementById('labSelector');
        const calEl   = document.getElementById('calendar');

        // Array de eventos obtenidos del controlador
        const events = <?php echo json_encode($events); ?>;

        const calendar = new FullCalendar.Calendar(calEl, {
            initialView: 'timeGridWeek',
            locale: 'es',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridWeek,timeGridDay'
            },
            slotMinTime: '07:00:00',
            slotMaxTime: '20:00:00',
            allDaySlot: false,
            events: function(info, success, failure) {
                const colorArray = ['#ff0000', '#00ff00', '#0000ff', '#ff7f00', '#ff00ff', '#00ffff']; // Colores variados
                events.forEach(event => {
                    event.backgroundColor = colorArray[Math.floor(Math.random() * colorArray.length)];
                });
                success(events);
            }
        });

        calendar.render();

        labSel.addEventListener('change', () => {
            calendar.refetchEvents();
        });
    });
</script>

</body>
</html>
