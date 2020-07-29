<?php

use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
   
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
Route::apiResource('/all-employee','Api\EmployeeController');
Route::apiResource('/all-supplier','Api\SupplierController');
Route::apiResource('/all-category','Api\CategoryController');
Route::apiResource('/all-customer','Api\CustomerController');
Route::apiResource('/alluser', 'UserController');
Route::apiResource('/all-product', 'Api\ProductController');
Route::post('/stock-update/{id}', 'Api\ProductController@stockupdate');
Route::apiResource('/all-expense', 'Api\ExpenseController');
Route::get('/get-product-by-catid/{id}', 'Api\PosController@getallproductbycatid');