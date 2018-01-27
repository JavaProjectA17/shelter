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
/*
Route::get('/', function () {
    return view('welcome');
<<<<<<< HEAD
});*/

Route::get('/employee', 'Employee\EditController@index');



/*main*/
Route::get('/', ['as' => 'index', 'uses' => 'User\MainController@index']);
Route::get('/about', ['as' => 'about', 'uses' => 'User\MainController@about']);
Route::get('/new', ['as' => 'new', 'uses' => 'User\MainController@new']);
Route::get('/contacts', ['as' => 'contacts', 'uses' => 'User\MainController@contacts']);

Route::get('/add_new_cattery', function(){
    return view('main/add_new_cattery');
});



Route::resource('/admin/animalcategories', 'Admin\AnimalCategoriesController');

Route::get('/employee', 'Employee\EditController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::resource('/kind_of_animals', 'Kind_of_animalsController');
    Route::resource('/animals', 'AnimalsController');
});
