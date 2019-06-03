<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('customers', CustomerController::class);
    $router->resource('products', ProductsController::class);
    //$router->resource('product_skus', ProductSkusController::class);
    $router->resource('orders', OrdersController::class);

	$router->get('/product_skus', 'ProductSkusController@index')->name('product_skus.index');
	$router->get('/product_skus/create', 'ProductSkusController@create')->name('product_skus.create');
	$router->post('/product_skus', 'ProductSkusController@store')->name('product_skus.store');
	$router->get('/product_skus/{product_sku}', 'ProductSkusController@show')->name('product_skus.show');
	$router->get('/product_skus/{product_sku}/edit', 'ProductSkusController@edit')->name('product_skus.edit');
	$router->put('/product_skus/{product_sku}', 'ProductSkusController@update')->name('product_skus.update');
	$router->delete('/product_skus/{product_sku}', 'ProductSkusController@destroy')->name('product_skus.destroy');
    $router->get('datas/getProduct', 'DatasController@getProduct');

});
