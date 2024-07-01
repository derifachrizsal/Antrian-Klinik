<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/adm', 'Backend\DashboardController::index');
$routes->get('/', 'Frontend\HomeController::index');
$routes->get('/dokter', 'Frontend\DokterController::index');
$routes->get('/poli', 'Frontend\PoliController::index');
$routes->get('/daftar', 'Frontend\DaftarController::index');
// $routes->get('/', 'Home::index');

