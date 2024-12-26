
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'BukuController::index');
$routes->get('/buku/create','BukuController::create');
$routes->post('/buku/save','BukuController::save');
$routes->delete('/buku/delete/(:num)',"BukuController::delete/$1");
$routes->get('/buku/edit/(:num)',"BukuController::edit/$1");
$routes->put('/buku/update/(:num)',"BukuController::update/$1");
$routes->get('/buku/(:any)', 'BukuController::detail/$1');
$routes->get('/anggota', 'Anggota::index');
$routes->post('/anggota', 'Anggota::index');
