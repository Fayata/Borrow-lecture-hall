<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->add('login', 'LoginController::index');

$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::processLogin');