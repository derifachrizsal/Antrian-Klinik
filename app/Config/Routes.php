<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// BackEnd
$routes->get('/adm', 'Backend\DashboardController::index');
$routes->get('/adm/pasien', 'Backend\PasienController::index');
$routes->get('/adm/dokter', 'Backend\DokterController::index');
$routes->add('/adm/dokter/add', 'Backend\DokterController::tambah');

// FrontEnd
$routes->get('/', 'Frontend\HomeController::index');
$routes->get('/dokter', 'Frontend\DokterController::index');
$routes->get('/poli', 'Frontend\PoliController::index');
$routes->get('/daftar', 'Frontend\DaftarController::index', ['filter' => 'auth']);
$routes->get('/login', 'Frontend\LoginController::index');

// $routes->get('/', 'Home::index')

