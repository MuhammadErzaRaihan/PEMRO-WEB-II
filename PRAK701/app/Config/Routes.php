<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

$routes->get('/', 'Home::index');
$routes->get('home', 'Buku::index', ['filter' => 'auth']);

$routes->get('/register', 'Register::index');
$routes->post('/register/process', 'Register::process');

$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');

$routes->get('/buku/create', 'Buku::create', ['filter' => 'auth']);
$routes->post('buku/store', 'Buku::store', ['filter' => 'auth']);
$routes->get('buku/edit/(:num)', 'Buku::edit/$1', ['filter' => 'auth']);
$routes->match(['post', 'put'], 'buku/update/(:num)', 'Buku::update/$1', ['filter' => 'auth']);
$routes->match(['get', 'delete'], 'buku/delete/(:num)', 'Buku::delete/$1', ['filter' => 'auth']);
