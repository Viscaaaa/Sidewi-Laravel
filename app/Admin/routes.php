<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\DesaController;
use App\Admin\Controllers\DestinasiDesaController;
use App\Admin\Controllers\AssetDestinasiController;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('desa-wisatas', DesaController::class);
    $router->resource('destinasi-wisatas', DestinasiDesaController::class);
    $router->resource('asset-destinasi', AssetDestinasiController::class);
});
