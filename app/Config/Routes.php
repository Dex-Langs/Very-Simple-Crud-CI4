<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/makanan', 'MakananController::index');
$routes->get('/rate', 'RatingController::index');
$routes->get('/tambahmakanan', 'MakananController::add');
$routes->post('/storemakanan', 'MakananController::do_add');
$routes->get('/minuman', 'MinumanController::index');
$routes->add('/ratemakanan/(:num)/(:num)', 'RatingController::rateMakanan/$1/$2');
$routes->post('/create-review', 'RatingController::createReview');


