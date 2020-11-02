<?php

use App\Models\ProductAttribute;
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

Route::get('/', 'HomeController@index')->name('dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
            Route::resource('categories', 'CategoryController')->except('show');
            Route::get('/categories/{name}', 'CategoryController@show')->name('categories.show');

            /* sub_category resource routes */
            Route::resource('subcategories', 'SubCategoryController');

            /* brand resource routes */
            Route::resource('brands', 'BrandController');

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
            Route::put('attributes/{id}', 'ProductController@addExtraCost')->name('attributes.add.extra');

            /* township resource routes */
            Route::resource('townships', 'TownshipController');

            /* payment resource routes */
            Route::resource('payments', 'PaymentController');

            /* order resource routes */
            Route::resource('orders', 'OrderController');

            /* checkout resource routes */
            Route::resource('checkouts', 'CheckoutController');
        });
    });
});