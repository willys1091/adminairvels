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

    Route::get('category', "CategoryController@index");
    Route::get('category/create', "CategoryController@create");
    Route::post('category' , "CategoryController@store");
    Route::get('category/{id}/edit' , "CategoryController@edit");
    Route::Patch('category/{id}' , "CategoryController@update");

    Route::get('country', "CountryController@index");
    Route::get('country/create', "CountryController@create");
    Route::post('country' , "CountryController@store");
    Route::get('country/{id}/edit' , "CountryController@edit");
    Route::Patch('country/{id}' , "CountryController@update");

    Route::get('destination', "DestinationController@index");
    Route::get('destination/create', "DestinationController@create");
    Route::post('destination' , "DestinationController@store");
    Route::get('destination/{id}/show' , "DestinationController@show");
    Route::get('destination/{id}/edit' , "DestinationController@edit");
    Route::Patch('destination/{id}' , "DestinationController@update");
    
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