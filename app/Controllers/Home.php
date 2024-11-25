<?php

namespace App\Controllers;

use App\Models\AclModel; // Usar AclModel

class Home extends BaseController
{
    public function index(): string
    {
        $mensaje = session('mensaje');
        return view('login', ["mensaje" => $mensaje]);
    }

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

    public function noPermission()
    {
        return view('no_permission'); // Crear una vista para mostrar "Acceso Denegado"
    }

    public function admin()
    {
        $session = session();

        // Verificar si el usuario tiene rol de admin
        if ($session->get('role_id') != 1) {
            // Redirigir al usuario a "Acceso Denegado" si no es admin
            return redirect()->to(base_url('/no_permission'));
        }

        // Mostrar la vista de administrador si el rol es válido
        return view('admin');
    }

    public function login()
    {
        // Recibir datos del formulario
        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        // Instanciar el modelo
        $AclModel = new \App\Models\AclModel();
        $datosUsuario = $AclModel->obtenerUsuario(['username' => $usuario]);

        // Validar credenciales
        if (count($datosUsuario) > 0 && password_verify($password, $datosUsuario[0]['password'])) {
            // Guardar datos en la sesión
            $session = session();
            $session->set([
                "id" => $datosUsuario[0]['id'], // ID del usuario
                "usuario" => $datosUsuario[0]['username'],
                "role_id" => $datosUsuario[0]['role_id'] // Rol del usuario
            ]);

            // Redirigir según el rol
            if ($datosUsuario[0]['role_id'] == 1) { // Admin
                return redirect()->to(base_url('/admin')); // Ruta de admin
            } elseif ($datosUsuario[0]['role_id'] == 2) { // User
                return redirect()->to(base_url('/inicio')); // Ruta de usuario
            } else {
                // Rol desconocido: redirigir a acceso denegado
                return redirect()->to(base_url('/no_permission'));
            }
        } else {
            // Credenciales incorrectas
            return redirect()->to(base_url('/'))->with('mensaje', 'Usuario o contraseña incorrectos.');
        }
    }


    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
