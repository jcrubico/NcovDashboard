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
Route::group(['namespace' => 'Dashboard'], function() {
    Route::get('/', 'DashboardController@index');
    Route::get('/api/get/country/list', 'DashboardController@getCountryList');
    Route::get('/api/get/country/cases', 'DashboardController@getCountryCases');
    Route::get('/api/get/country/total/cases', 'DashboardController@getCountryTotalCases');
});
