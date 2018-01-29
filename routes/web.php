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

Route::get('/add_new_shelter', ['as' => 'add_new_shelter', 'uses' => 'Employee\ShelterController@create']);
Route::post('send_form', function () {
    return redirect('add_new_shelter')->with('status', 'Thank you for your appeal. In the near future, the admin has to process it!');
});

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
//Route::group(['middleware' => 'auth', 'prefix' => 'employee'], function () {
//    Route::resource('/animals', 'Employee\AnimalsController');
//});

Route::group(['as' => 'employee.', 'prefix' => 'employee', 'namespace' => 'Employee'], function () {
    Route::resource('animals', 'AnimalsController');
});
