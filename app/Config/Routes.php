<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('rsvp/(:any)', 'UserController::getInviteeData/$1');
$routes->get('/generate', 'UserController::inviteIDGenerator');
$routes->post('/confirm', 'UserController::confirmRSVP');
$routes->get('qr/(:any)', 'UserController::qrLanding/$1');


$routes->get('/admin', 'AdminController::index');
$routes->post('/admin/companions', 'AdminController::getCompanions');
$routes->get('/admin/export', 'ExportController::export');
$routes->post('admin/submit', 'AdminController::addInvitee');
$routes->post('admin/refresh', 'AdminController::getUsers');

$routes->get('/login', 'LoginController::index');
$routes->post('/login/authenticate', 'LoginController::authenticate');
$routes->get('/logout', 'LoginController::logout');