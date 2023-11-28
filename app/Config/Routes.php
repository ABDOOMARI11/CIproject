<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// app/Config/Routes.php

$routes->get('/reclamation', 'ReclamationController::index');
$routes->get('/reclamation/create', 'ReclamationController::create');
$routes->post('/reclamation/store', 'ReclamationController::store');
$routes->get('/reclamation/edit/(:num)', 'ReclamationController::edit/$1');
$routes->post('/reclamation/update/(:num)', 'ReclamationController::update/$1');
$routes->get('/reclamation/delete/(:num)', 'ReclamationController::delete/$1');

// app/Config/Routes.php

$routes->get('/', 'Auth::login');
$routes->post('/login', 'Auth::processLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::processRegister');
$routes->get('/logout', 'Auth::logout');

