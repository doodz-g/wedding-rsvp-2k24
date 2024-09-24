<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// guest /rsvp
$routes->get('/', 'UserController::index');
$routes->get('rsvp/(:any)', 'UserController::getInviteeData/$1');
$routes->get('/generate', 'UserController::inviteIDGenerator');
$routes->post('/confirm', 'UserController::confirmRSVP');
$routes->get('qr/(:any)', 'UserController::qrLanding/$1');

//admin // superadmin
$routes->post('/admin/companions', 'AdminController::getCompanions');
$routes->get('/admin/table', 'AdminController::tableView');
$routes->get('/admin/settings', 'AdminController::getSettings');
$routes->post('/admin/update-settings', 'AdminController::updateSettings');
$routes->get('/admin/update-graph', 'AdminController::updateGraph');
$routes->post('/admin/check-companions', 'AdminController::checkDuplicateCompanions');
$routes->get('/admin/export', 'ExportController::export');
$routes->post('admin/submit', 'AdminController::addInvitee');
$routes->post('admin/update', 'AdminController::editInvitee');
$routes->post('admin/refresh', 'AdminController::getUsers');
$routes->post('admin/delete', 'AdminController::deleteGuest');
$routes->post('admin/table-assignment', 'AdminController::assignGuestTable');
$routes->get('/dashboard', 'AdminController::index', ['filter' => 'auth']);
$routes->post('admin/delete/companion', 'AdminController::deleteGuestCompanion');
$routes->get('/login', 'LoginController::index');
$routes->post('/login/authenticate', 'LoginController::authenticate');
$routes->get('/logout', 'LoginController::logout');
$routes->get('upload-image', 'ImageController::uploadImage');
$routes->get('optimized-image/(:any)', 'ImageController::getOptimizedImage/$1');


