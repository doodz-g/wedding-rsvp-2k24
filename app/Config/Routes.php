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
$routes->post('/admin/validate-otp', 'AdminController::validateOTP');
$routes->get('/admin/settings', 'AdminController::getSettings');
$routes->post('/admin/settings-qr', 'AdminController::updateQRSettings');
$routes->post('/admin/update-settings', 'AdminController::updateSettings');
$routes->get('/admin/update-graph', 'AdminController::updateGraph');
$routes->post('/admin/get-notifications', 'AdminController::getNotifications');
$routes->post('/admin/update-notification', 'AdminController::updateNotification');
$routes->post('/admin/check-companions', 'AdminController::checkDuplicateCompanions');
$routes->get('/admin/sync', 'ExportController::syncDataToExportTable');
$routes->get('admin/export', 'ExportController::export');
$routes->post('admin/submit', 'AdminController::addInvitee');
$routes->post('admin/update', 'AdminController::editInvitee');
$routes->post('admin/refresh', 'AdminController::refresh');
$routes->post('admin/delete', 'AdminController::deleteGuest');
$routes->post('admin/send-otp', 'AdminController::sendOTP');
$routes->post('admin/table-assignment', 'AdminController::assignGuestTable');
$routes->get('/dashboard', 'AdminController::index', ['filter' => 'auth']);
$routes->post('admin/delete/companion', 'AdminController::deleteGuestCompanion');
$routes->get('/login', 'LoginController::index');
$routes->post('/login/authenticate', 'LoginController::authenticate');
$routes->get('/logout', 'LoginController::logout');
$routes->get('upload-image', 'ImageController::uploadImage');
$routes->get('optimized-image/(:any)', 'ImageController::getOptimizedImage/$1');

$routes->get('admin/table', 'TableController::index');
$routes->get('admin/table-refresh', 'TableController::refresh');



$routes->get('admin/send-email', 'EmailController::sendEmail');


