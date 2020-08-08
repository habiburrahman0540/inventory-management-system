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
Route::apiResource('/all-extra-information','Api\InformationController');
Route::get('/all-data-information','Api\InformationController@allinformation');
Route::get('/vat','Api\InformationController@vat');
Route::apiResource('/alluser', 'UserController');
Route::apiResource('/all-product', 'Api\ProductController');
Route::post('/stock-update/{id}', 'Api\ProductController@stockupdate');
Route::apiResource('/all-expense', 'Api\ExpenseController');
Route::get('/get-product-by-catid/{id}', 'Api\PosController@getallproductbycatid');
Route::get('/addToCard/{id}', 'Api\CardController@addToCard');
Route::get('/card/product', 'Api\CardController@productshowtocard');
Route::get('/remove/cardItems/{id}', 'Api\CardController@removeitems');
Route::get('/Cardproductincrement/{id}', 'Api\CardController@proincrement');
Route::get('/Cardproductdecrement/{id}', 'Api\CardController@prodecrement');

Route::post('/orderdone', 'Api\PosController@orderdone');
Route::get('/today-sales-report', 'Api\ReportsController@todaysales');
Route::get('/monthly-sales-report', 'Api\ReportsController@monthlysales');
Route::get('/yearly-sales-report', 'Api\ReportsController@yearlysales');
Route::get('/total-due-amount', 'Api\ReportsController@totaldue');
Route::get('/today-total-due', 'Api\ReportsController@todaytotaldue');
Route::get('/total-due', 'Api\ReportsController@alltotaldue');
Route::get('/total-product', 'Api\ReportsController@alltotalproduct');
Route::get('/today-total-sales', 'Api\ReportsController@todaytotalsales');
Route::get('/monthly-total-sales', 'Api\ReportsController@monthlytotalsales');
Route::get('/yearly-total-sales', 'Api\ReportsController@yearlytotalsales');
Route::get('/today-total-collection', 'Api\ReportsController@todaytotalcollection');
Route::get('/order-details/{id}', 'Api\ReportsController@orderdetails');
Route::get('/order-orderdetails/{id}', 'Api\ReportsController@allorderdetails');
