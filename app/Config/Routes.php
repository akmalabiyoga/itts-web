<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MainController::index');
$routes->get('/about', 'MainController::about');
$routes->get('/services', 'MainController::services');
$routes->get('/portfolio', 'MainController::portfolio');
$routes->get('/staffs', 'MainController::staffs');
$routes->get('/contact', 'MainController::contact');

$routes->group('admin', function($routes) {
    $routes->get('', 'AdminController::index');
    $routes->post('web_config', 'AdminController::webConfig');
    $routes->group('services', function($routes) {
        $routes->get('', 'AdminController::services');
        $routes->post('store', 'AdminController::storeService');
        $routes->get('edit/(:num)', 'AdminController::editService/$1');
        $routes->post('update/(:num)', 'AdminController::updateService/$1');
        $routes->get('delete/(:num)', 'AdminController::deleteService/$1');
    });
    $routes->group('portfolios', function($routes) {
        $routes->get('', 'AdminController::portfolios');
        $routes->post('store', 'AdminController::storePortfolio');
        $routes->get('edit/(:num)', 'AdminController::editPortfolio/$1');
        $routes->post('update/(:num)', 'AdminController::updatePortfolio/$1');
        $routes->get('delete/(:num)', 'AdminController::deletePortfolio/$1');
    });
    $routes->group('staffs', function($routes) {
        $routes->get('', 'AdminController::staffs');
        $routes->post('store', 'AdminController::storeStaff');
        $routes->get('edit/(:num)', 'AdminController::editStaff/$1  ');
        $routes->post('update/(:num)', 'AdminController::updateStaff/$1');
        $routes->get('delete/(:num)', 'AdminController::deleteStaff/$1');
    });
});
