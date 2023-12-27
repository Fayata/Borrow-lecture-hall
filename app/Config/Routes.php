<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// Routing
$routes->get('/', 'AuthController::login');
$routes->get('/home', 'Home::index');

// auth
$routes->post('/auth/processLogin', 'AuthController::processLogin');

$routes->get('/register', 'AuthController::register');
$routes->post('/auth/processRegister', 'AuthController::processRegister');

$routes->get('/logout', 'AuthController::logout');

$routes->get('/client/dashboard', 'ClientController::index');
$routes->get('/admin/dashboard', 'AdminController::index');

$routes->get('/logout', 'AdminController::logout');

// admin & client
$routes->get('/admin', 'AdminController::admin');
$routes->get('/admin/create', 'AdminController::create');
$routes->post('/admin/store', 'AdminController::store');
$routes->get('/admin/edit/(:num)', 'AdminController::edit/$1');
$routes->post('/admin/update/(:num)', 'AdminController::update/$1');
$routes->get('/admin/delete/(:num)', 'AdminController::delete/$1');

$routes->get('/client', 'ClientController::client');

// crud ruangan
$routes->get('/rooms', 'RoomController::index');
$routes->get('/rooms/create', 'RoomController::create');
$routes->post('/rooms/store', 'RoomController::store');
$routes->get('/rooms/edit/(:num)', 'RoomController::edit/$1');
$routes->post('/rooms/update/(:num)', 'RoomController::update/$1');
$routes->get('/rooms/delete/(:num)', 'RoomController::delete/$1');

// booking
$routes->get('booking', 'BookingController::index');
$routes->get('booking/list', 'BookingController::listRooms');
$routes->get('booking/register/(:num)', 'BookingController::RegistrationForm/$1');
$routes->post('booking/register/store', 'BookingController::register');
