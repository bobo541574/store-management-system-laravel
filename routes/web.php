<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* dashboard - home */

// use Carbon\Carbon;

Route::get('/', 'HomeController@index')->name('dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* status update */
Route::post('status/update/{status}', 'HomeController@ajaxRequestFromStatus')->name('status.update');

Route::group(['namespace' => 'Backend'], function () {


    /* state for cities */
    Route::get('/state/{id}/cities', 'CityController@ajaxRequestFromState')->name('states.cities');

    /* city for townships */
    Route::get('/city/{id}/townships', 'TownshipController@ajaxRequestFromCity')->name('cities.townships');

    Route::group(['middleware' => 'auth'], function () {
        Route::group(['middleware' => 'role:Staff'], function () {
            /* state resource routes */
            Route::resource('states', 'StateController');

            /* city resource routes */
            Route::resource('cities', 'CityController');

            /* category resource routes */
            Route::delete('categories/{id}/soft-delete', 'CategoryController@softDelete')->name('categories.softDelete');
            Route::resource('categories', 'CategoryController')->except('show');
            Route::get('categories/{name}', 'CategoryController@show')->name('categories.show');
            Route::get('categories/trash/list', 'CategoryController@trash')->name('categories.trash');
            Route::post('categories/{id}/restore', 'CategoryController@restore')->name('categories.restore');

            /* sub_category resource routes */
            Route::delete('subcategories/{id}/soft-delete', 'SubCategoryController@softDelete')->name('subcategories.softDelete');
            Route::resource('subcategories', 'SubCategoryController');
            Route::get('subcategories/trash/list', 'SubCategoryController@trash')->name('subcategories.trash');
            Route::post('subcategories/{id}/restore', 'SubCategoryController@restore')->name('subcategories.restore');

            /* brand resource routes */
            Route::delete('brands/{id}/soft-delete', 'BrandController@softDelete')->name('brands.softDelete');
            Route::resource('brands', 'BrandController');
            Route::get('brands/trash/list', 'BrandController@trash')->name('brands.trash');
            Route::post('brands/{id}/restore', 'BrandController@restore')->name('brands.restore');

            /* supplier resource routes */
            Route::resource('suppliers', 'SupplierController');
        });

        Route::group(['middleware' => 'role:Admin'], function () {
            /* user resource routes */
            Route::resource('users', 'UserController');
            Route::post('assigns/{id}/create', 'UserController@assignCreate')->name('users.role.create');
            Route::post('assigns', 'UserController@assignStore')->name('users.role.store');

            /* role resource routes */
            Route::resource('roles', 'RoleController');

            /* color resource routes */
            Route::resource('colors', 'ColorAttributeController');

            /* size resource routes */
            Route::resource('sizes', 'SizeAttributeController');

            /* product resource routes */
            Route::resource('products', 'ProductController');

            /* product attributes */
            Route::post('attributes/{id}', 'ProductController@attributeRemove')->name('attributes.remove');
            Route::get('attributes', 'ProductController@showExtraCost')->name('attributes.show.extra');
            Route::patch('attributes/add-extra', 'ProductController@addExtraCostToAttributes')->name('attributes.add.extra');
            // Route::put('attributes/{id}', 'ProductController@addExtraCost')->name('attributes.add.extra');

            /* township resource routes */
            Route::resource('townships', 'TownshipController');

            /* payment resource routes */
            Route::resource('payments', 'PaymentController');

            /* order resource routes */
            Route::resource('orders', 'OrderController');

            /* checkout resource routes */
            Route::resource('checkouts', 'CheckoutController');

            /* report resource routes */
            // Route::resource('reports', 'ReportController');
            Route::get('reports/orders/{date?}', 'ReportController@orderList')->name('reports.orders');
            Route::get('reports/products/{date?}', 'ReportController@productList')->name('reports.products');
            Route::post('reports/exports/{type}', 'ReportController@export')->name('reports.exports');
        });
    });
});