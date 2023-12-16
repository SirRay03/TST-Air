<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/airport/add-airport', 'AirportController::addAirportPage');

$routes->get('/', 'Home::index');
$routes->get('/flights', 'FlightAPI::flights');
$routes->post('booking/create', 'BookingAPI::create');
$routes->post('booking/pay/(:any)', 'BookingAPI::pay/$1');
$routes->get('/airport/add-airport', 'AirportController::addAirportPage');
$routes->post('/airport/add', 'AirportController::add');
$routes->get('/flight/add-flight', 'FlightController::addFlightPage');
$routes->get('/flight', 'FlightController::viewFlightPage');