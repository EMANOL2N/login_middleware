<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Página principal (Login)
$routes->get('/', 'Home::index');  // Página principal (login)
$routes->post('/login', 'Home::login');  // Procesar login
$routes->get('/salir', 'Home::salir');  // Procesar logout

// Rutas para docentes
$routes->get('/inicio', 'Home::inicio');  // Vista para docentes

// Rutas para administradores
$routes->get('/admin', 'Home::admin');  // Vista para administradores

// Laboratorios Admin
$routes->get('/admin/laboratorios', 'Home::laboratoriosAdmin');  // Ver lista de laboratorios
$routes->get('/admin/laboratorios/crear', 'Home::crearLaboratorio');  // Crear nuevo laboratorio
$routes->get('/admin/laboratorios/reservar/(:num)', 'Home::reservarLaboratorio/$1');  // Reservar laboratorio (admin)
$routes->post('/admin/laboratorios/reservar', 'Home::guardarReserva');  // Guardar reserva (admin)

// Rutas para docentes
$routes->get('/docente/laboratorios', 'Home::laboratoriosDocentes');  // Ver lista de laboratorios
$routes->get('/docente/laboratorios/reservar/(:num)', 'Home::reservarLaboratorio/$1');  // Reservar laboratorio (docente)
$routes->post('/docente/laboratorios/reservar', 'Home::guardarReserva');  // Guardar reserva (docente)

// Ruta para acceso denegado
$routes->get('/no_permission', 'Home::noPermission');  // Vista para acceso denegado
