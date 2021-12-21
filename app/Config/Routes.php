<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Admin::dashboard');

$routes->get('/ticket/create', 'Ticket::create');
$routes->get('/ticket/edit/(:segment)', 'Ticket::edit/$1');
$routes->delete('/ticket/(:num)', 'Ticket::delete/$1');
$routes->get('/ticket/(:any)', 'Ticket::detail/$1');

$routes->get('/tiket/create', 'Tiket::create');
$routes->get('/tiket/edit/(:segment)', 'Tiket::edit/$1');
$routes->delete('/tiket/(:num)', 'Tiket::delete/$1');
$routes->get('/tiket/(:any)', 'Tiket::detail/$1');

$routes->get('/kereta/create', 'Kereta::create', ['filter' => 'role:admin']);
$routes->get('/kereta/edit/(:segment)', 'Kereta::edit/$1', ['filter' => 'role:admin']);
$routes->delete('/kereta/(:num)', 'Kereta::delete/$1', ['filter' => 'role:admin']);
$routes->get('/kereta/(:any)', 'Kereta::detail/$1', ['filter' => 'role:admin']);

$routes->get('/jadwal/(:any)', 'Jadwal::index/$1', ['filter' => 'role:admin']);
$routes->get('/jadwal/edit/(:segment)', 'Jadwal::edit/$1', ['filter' => 'role:admin']);

$routes->get('/admin', 'Admin::index' , ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index' , ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1' , ['filter' => 'role:admin']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
