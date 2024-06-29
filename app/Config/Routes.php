<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Backend\DashboardController::index');
$routes->get('/home', 'Frontend\HomeController::index');
// $routes->get('/', 'Home::index');
