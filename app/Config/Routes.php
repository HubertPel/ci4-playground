<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin::index');

    $routes->group('animals', function ($routes) {
        $routes->get('/', 'Admin\Animals::index');
        $routes->get('deleted', 'Admin\Animals::deleted');

        $routes->get('create', 'Admin\Animals::create');
        $routes->post('store', 'Admin\Animals::store');

        $routes->get('edit/(:num)', 'Admin\Animals::edit/$1');
        $routes->post('update/(:num)', 'Admin\Animals::update/$1');

        $routes->get('delete/(:num)', 'Admin\Animals::delete/$1');
        $routes->get('restore/(:num)', 'Admin\Animals::restore/$1');
    });
});
