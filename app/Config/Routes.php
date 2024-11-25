<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // Página principal (login)
$routes->post('/login', 'Home::login'); // Procesar login
$routes->get('/salir', 'Home::salir'); // Procesar logout

// Rutas diferenciadas por roles
$routes->get('/inicio', 'Home::inicio'); // Vista para usuarios normales
$routes->get('/admin', 'Home::admin');  // Vista para administradores

// Ruta de acceso denegado
$routes->get('/no_permission', 'Home::noPermission');
