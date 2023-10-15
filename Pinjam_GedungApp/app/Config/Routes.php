<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->add('login', 'LoginController::index');

$routes->get('home', 'Home::home');

// route for login
$routes->get('login', 'Login::index');
$routes->post('login', 'Login::processLogin');
$routes->get('logout', 'Login::processLogout');
$routes->add('register', 'Auth::processRegister');