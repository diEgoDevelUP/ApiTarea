<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/api/cliente', 'ClientesController::index');
$routes->get('/api/cliente/(:num)', 'ClientesController::show/$1');
$routes->post('/api/cliente', 'ClientesController::create');
$routes->patch('/api/cliente/(:num)', 'ClientesController::update/$1');
$routes->delete('/api/cliente/(:num)', 'ClientesController::delete/$1');
