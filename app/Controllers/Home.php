<?php

namespace App\Controllers;

use App\Models\AclModel;
use CodeIgniter\I18n\Time;
use App\Models\ReservationsModel;

class Home extends BaseController
{
    // Página principal (login)
    public function index(): string
    {
        $mensaje = session('mensaje');
        return view('login', ["mensaje" => $mensaje]);
    }

    // Vista para estudiante (docente)
    public function inicio()
    {
        $session = session();

        // Verificar si el usuario tiene rol de user
        if ($session->get('role_id') != 2) {
            // Redirigir al usuario a "Acceso Denegado" si no es user
            return redirect()->to(base_url('/no_permission'));
        }
        // Mostrar la vista de usuario si el rol es válido
        return view('inicio');
    }

    // Vista de acceso denegado
    public function noPermission()
    {
        return view('no_permission');
    }

    // Vista para administrador
    public function admin()
    {
        $session = session();

        // Verificar si el usuario tiene rol de admin
        if ($session->get('role_id') != 1) {
            return redirect()->to(base_url('/no_permission'));
        }

        // Mostrar la vista de administrador si el rol es válido
        return view('admin');
    }

    // Vista de laboratorio para el administrador
    public function laboratoriosAdmin()
    {
        $session = session();
        if ($session->get('role_id') != 1) {
            return redirect()->to(base_url('/no_permission'));
        }
        // Obtener eventos desde la base de datos
        $db = \Config\Database::connect();
        $builder = $db->table('reservations r');
        $builder->select('r.id, u.username AS title, r.start_time AS start, r.end_time AS end, r.lab_id');
        $builder->join('users u', 'u.id = r.user_id');
        $events = $builder->get()->getResultArray();
        return view('admin/laboratorios', ['events' => $events]);
    }

    // Vista de laboratorio para docentes
    public function laboratoriosDocentes()
    {
        $session = session();

        if ($session->get('role_id') != 2) {
            return redirect()->to(base_url('/no_permission'));
        }

        // Obtener eventos desde la base de datos
        $db = \Config\Database::connect();
        $builder = $db->table('reservations r');
        $builder->select('r.id, u.username AS title, r.start_time AS start, r.end_time AS end, r.lab_id');
        $builder->join('users u', 'u.id = r.user_id');
        $events = $builder->get()->getResultArray();

        // Pasar los eventos a la vista
        return view('docente/laboratorios', ['events' => $events]);
    }

    // Función para iniciar sesión
    public function login()
    {
        $AclModel = new AclModel();
        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        // Obtén los datos del usuario
        $datosUsuario = $AclModel->obtenerUsuario(['username' => $usuario]);

        // Verifica si el usuario existe y la contraseña es correcta
        if (count($datosUsuario) > 0 && password_verify($password, $datosUsuario[0]['password'])) {
            // Guarda datos del usuario en la sesión
            $session = session();
            $session->set([
                'id_usuario' => $datosUsuario[0]['id'],
                'username' => $datosUsuario[0]['username'],
                'role_id' => $datosUsuario[0]['role_id'],
                'is_logged_in' => true,
            ]);

            // Redirige según el rol del usuario
            if ($datosUsuario[0]['role_id'] == 1) {
                return redirect()->to(base_url('/admin'));
            } elseif ($datosUsuario[0]['role_id'] == 2) {
                return redirect()->to(base_url('/inicio'));
            } else {
                return redirect()->to(base_url('/no_permission'));
            }
        } else {
            return redirect()->to(base_url('/'))->with('mensaje', 'Usuario o contraseña incorrectos.');
        }
    }

    // Función para cerrar sesión
    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }

    /** Devuelve los eventos para FullCalendar */
    public function laboratoriosEvents()
    {
        $session = session();
        if ($session->get('role_id') != 1 && $session->get('role_id') != 2) {
            return $this->response->setStatusCode(403); // Verificar acceso
        }

        $lab = $this->request->getGet('lab'); // Recibe el parámetro lab_id desde el frontend

        // Calcula inicio y fin de la semana actual
        $startWeek = Time::now()->startOfWeek()->toDateTimeString();
        $endWeek   = Time::now()->endOfWeek()->toDateTimeString();

        $db = \Config\Database::connect();
        $builder = $db->table('reservations');
        $builder->select('r.id, u.username AS title, r.start_time AS start, r.end_time AS end');
        $builder->join('users u', 'u.id = r.user_id');
        $builder->where('r.lab_id', (int)$lab); // Filtra los eventos por el laboratorio
        $builder->where('r.start_time >=', $startWeek);
        $builder->where('r.end_time <=', $endWeek);
        $events = $builder->get()->getResultArray();

        return $this->response->setJSON($events); // Retorna los eventos específicos del laboratorio
    }

    // Función para guardar una nueva reserva
    public function guardarReserva()
    {
            $session = session();
        if ($session->get('role_id') != 1 && $session->get('role_id') != 2) {
            return $this->response->setStatusCode(403); // Verificar acceso
        }

        $userId = $session->get('id_usuario');
        $labId  = $this->request->getPost('lab_id');
        $date   = $this->request->getPost('date');
        $startT = $this->request->getPost('start_time');
        $endT   = $this->request->getPost('end_time');

        // Validar que esté dentro de la semana actual
        // Obtener el lunes de la semana actual
        $startWeek = date('Y-m-d', strtotime('monday this week'));
        // Obtener el domingo de la semana actual
        $endWeek = date('Y-m-d', strtotime('sunday this week'));

        $startDateTime = strtotime("$date $startT");
        $endDateTime = strtotime("$date $endT");

        // Comprobar si la fecha de inicio y fin están dentro de la semana actual
        if ($startDateTime < strtotime($startWeek) || $endDateTime > strtotime($endWeek)) {
            return redirect()->back()->with('error', 'Solo puedes reservar en la semana actual.');
        }

        // Verificar solapamientos
        $reservationsModel = new ReservationsModel();
        if ($reservationsModel->checkForOverlap($labId, $startDateTime, $endDateTime)) {
            return redirect()->back()->with('error', 'Ese horario ya está reservado.');
        }

        // Insertar reserva
        $reservationsModel->insertReservation([
            'user_id'    => $userId,
            'lab_id'     => $labId,
            'start_time' => date('Y-m-d H:i:s', $startDateTime),
            'end_time'   => date('Y-m-d H:i:s', $endDateTime),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Reserva creada correctamente.');
    }
}
