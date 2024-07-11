<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// BackEnd
$routes->get('/adm', 'Backend\DashboardController::index');
$routes->get('/adm/pasien', 'Backend\PasienController::index');
// Backend | dokter
$routes->get('/adm/dokter', 'Backend\DokterController::index');
$routes->add('/adm/dokter/add', 'Backend\DokterController::tambah');
$routes->add('/adm/dokter/(:segment)/edit', 'Backend\DokterController::edit/$1');
$routes->get('/adm/dokter/(:segment)/delete', 'Backend\DokterController::delete/$1');
$routes->get('/adm/user', 'Backend\UserController::index');
$routes->add('/adm/user/add', 'Backend\UserController::tambah');
// Backend | pasien
$routes->get('/adm/pasien', 'Backend\PasienController::index');
$routes->add('/adm/pasien/add', 'Backend\PasienController::tambah');
$routes->add('/adm/pasien/(:segment)/edit', 'Backend\PasienController::edit/$1');
$routes->get('/adm/pasien/(:segment)/delete', 'Backend\PasienController::delete/$1');

// FrontEnd
$routes->get('/', 'Frontend\HomeController::index');
$routes->get('/dokter', 'Frontend\DokterController::index');
$routes->get('/poli', 'Frontend\PoliController::index');
$routes->get('/daftar', 'Frontend\DaftarController::index', ['filter' => 'auth']);
$routes->get('/login', 'Frontend\LoginController::index');
$routes->add('/datapasien', 'Frontend\DataPasienController::index');
$routes->add('/login/register', 'Frontend\LoginController::register');
// $routes->get('/', 'Home::index')

