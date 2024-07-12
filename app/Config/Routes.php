<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// BackEnd
$routes->get('/adm', 'Backend\DashboardController::index');
// Backend | dokter
$routes->get('/adm/dokter', 'Backend\DokterController::index');
$routes->add('/adm/dokter/add', 'Backend\DokterController::tambah');
$routes->add('/adm/dokter/(:segment)/edit', 'Backend\DokterController::edit/$1');
$routes->get('/adm/dokter/(:segment)/delete', 'Backend\DokterController::delete/$1');
$routes->get('/adm/dokter/(:segment)/detail', 'Backend\DokterController::detail/$1');
// Backend | User
$routes->get('/adm/user', 'Backend\UserController::index');
$routes->add('/adm/user/add', 'Backend\UserController::tambah');
$routes->add('/adm/user/(:segment)/edit', 'Backend\UserController::edit/$1');
$routes->get('/adm/user/(:segment)/delete', 'Backend\UserController::delete/$1');
// Backend | pasien
$routes->get('/adm/pasien', 'Backend\PasienController::index');
$routes->add('/adm/pasien/add', 'Backend\PasienController::tambah');
$routes->add('/adm/pasien/(:segment)/edit', 'Backend\PasienController::edit/$1');
$routes->get('/adm/pasien/(:segment)/delete', 'Backend\PasienController::delete/$1');
$routes->get('/adm/pasien/(:segment)/detail', 'Backend\PasienController::detail/$1');

// Frontend
$routes->get('/', 'Frontend\HomeController::index');
$routes->get('/dokter', 'Frontend\DokterController::index');
$routes->get('/poli', 'Frontend\PoliController::index');
$routes->get('/login', 'Frontend\LoginController::index');
$routes->add('/datapasien', 'Frontend\DataPasienController::index');
$routes->get('/antrian', 'Frontend\AntrianController::index');
// Frontend | Login
$routes->add('/login/login', 'Frontend\LoginController::login');
$routes->add('/login/register', 'Frontend\LoginController::register');
$routes->get('/login/logout', 'Frontend\LoginController::logout');
// Frontend | Daftar
$routes->get('/daftar', 'Frontend\DaftarController::index', ['filter' => 'auth']);
$routes->add('/daftar/daftarpasien', 'Frontend\DaftarController::daftarPasien', ['filter' => 'auth']);
$routes->get('/daftar/getDokter/(:segment)', 'Frontend\DaftarController::getDokter/$1', ['filter' => 'auth']);
// $routes->add('/daftar/daftarantrian', 'Frontend\DaftarController::daftarAntrian', ['filter' => 'auth']);
// $routes->get('/', 'Home::index')

