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

Route::get('/', "MainController@index");
Route::post('auth', "MainController@auth");
Route::get('forgot', "MainController@forgot");

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', "MainController@dashboard");
    
    Route::get('people/{modul}', "PeopleController@index");
    Route::get('people/{modul}/create', "PeopleController@create");
    Route::post('people', "PeopleController@store");
    Route::get('people/{modul}/{id}/edit', "PeopleController@edit");
    Route::patch('people/{id}', "PeopleController@update");

    Route::get('role', "RoleController@index");
    Route::get('role/create', "RoleController@create");
    Route::post('role' , "RoleController@store");
    Route::get('role/{id}/edit' , "RoleController@edit");
    Route::Patch('role/{id}' , "RoleController@update");

    Route::get('logout', "MainController@logout");
});