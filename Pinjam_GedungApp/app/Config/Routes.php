<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->add('login', 'LoginController::index');

$routes->get('home', 'Home::home');

// route for login
$routes->get('login', 'user\Login::index');
$routes->post('login', 'user\Login::processLogin');
$routes->get('logout', 'user\Login::processLogout');
$routes->get('Register', 'Register::index');
$routes->post('Register', 'Register::processRegister');