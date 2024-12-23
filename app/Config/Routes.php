<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Página principal (Login)
$routes->get('/', 'Home::index'); // Página principal (login)
$routes->post('/login', 'Home::login'); // Procesar login
$routes->get('/salir', 'Home::salir'); // Procesar logout

// Rutas diferenciadas por roles
$routes->get('/inicio', 'Home::inicio'); // Vista para estudiantes
$routes->get('/admin', 'Home::admin');  // Vista para administradores

// Ruta para consultar DNI en el panel de administración
$routes->post('/admin/consultarDNI', 'Home::consultarDNI');

// Rutas para las secciones del panel administrativo
$routes->get('/admin/mis_tutorados', 'Home::misTutorados'); // Mis Tutorados
$routes->get('/admin/tutorias_finalizadas', 'Home::tutoriasFinalizadas'); // Tutorías Finalizadas
$routes->get('/admin/chat', 'Home::chat'); // Chat

// Rutas específicas para estudiantes
$routes->get('/estudiante/mis_tutores', 'Home::misTutores'); // Mis Tutores
$routes->get('/estudiante/tutorias_finalizadas', 'Home::tutoriasFinalizadasEstudiante'); // Tutorías Finalizadas
$routes->get('/estudiante/chat', 'Home::chatEstudiante'); // Chat para estudiantes

// Ruta para consultar código de estudiante
$routes->post('/inicio/consultarEstudiante', 'Home::consultarEstudiante'); // Consulta de código de estudiante

// Ruta de acceso denegado
$routes->get('/no_permission', 'Home::noPermission'); // Vista para acceso denegado
