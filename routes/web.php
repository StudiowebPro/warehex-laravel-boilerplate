<?php

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

Route::get('/', function () {
    return view('welcome');
});

includeRouteFiles(base_path('amp/Access/Back/User/routes/'));
includeRouteFiles(base_path('amp/Access/Front/User/routes/'));

