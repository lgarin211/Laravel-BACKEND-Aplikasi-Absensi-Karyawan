<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.as'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('/genset', UserController::class);
    $router->resource('/pegawai', PegawaiController::class);
    $router->resource('/log_absens', LogabsenController::class);
    $router->resource('/presened', PegawaiFinis::class);
    $router->resource('/present', Pegawainotyet::class);

});
