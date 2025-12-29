<?php

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('logger', '\Verbum\Logger\Controllers\LoggerAdmin::index');
});
