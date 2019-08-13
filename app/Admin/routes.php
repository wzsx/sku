<?php

use Illuminate\Routing\Router;
//use App\Admin\Actions\Post\Replicate;
//
//$grid->actions(function ($actions) {
//    $actions->add(new Replicate);
//});

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('/goods',GoodsController::class);
    $router->resource('/good',GoodController::class);//sku
//    $router->resource('sku-models', SkuController::class);
//    $router->resource('skus-models', SkusController::class);
    $router->resource('/sku',SkuController::class);


});
