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

/*main*/
Route::get('/', ['as' => 'index', 'uses' => 'User\MainController@index']);
Route::get('/about', ['as' => 'about', 'uses' => 'User\MainController@about']);
Route::get('/new', ['as' => 'new', 'uses' => 'User\MainController@new']);
Route::get('/contacts', ['as' => 'contacts', 'uses' => 'User\MainController@contacts']);

Route::get('/add_new_shelter', ['as' => 'add_new_shelter', 'uses' => 'Employee\ShelterController@create']);
Route::post('/send_form', ['as' => 'send_form', 'uses' => 'Employee\ShelterController@send_form']);

Route::resource('/admin/animalcategories', 'Admin\AnimalCategoriesController');

Route::get('/employee', 'Employee\EditController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//*
//*   admin routes
//*

Route::get('/admin', 'HomeController@admin');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('/kinds', 'Admin\KindsController');
    Route::resource('/animals', 'Admin\AnimalsController');
});