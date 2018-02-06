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
Route::get('/add_new_shelter', ['as' => 'add_new_shelter', 'uses' => 'User\MainController@add_new_shelter']);
Route::post('/add_new_shelter', ['as' => 'add_new_shelter.create', 'uses' => 'Employee\ShelterController@create']);


Route::get('/admin', 'Admin\DashboardController@dashboard')->name('admin.index');

Route::get('/admin/articles', 'Admin\ArticlesController@index')->name('admin.articles.index');

Route::get('/employee', 'Employee\EditController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//*
//*   admin routes
//*

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::resource('/slider','Admin\SliderImagesController');
}); //This route group is responsible for slider CRUD


//Route::resource('/admin/animalcategories', 'Admin\AnimalCategoriesController'); //make for example on lesson

Route::post('admin/{id}/active', ['uses' => 'Admin\SheltersController@toggleActive', 'as' => 'admin.']);

Route::get('/admin/home', 'HomeController@admin');

Route::get('/admin/shelters/approved', ['uses' => 'Admin\SheltersController@approved', 'as' => 'admin.shelters.approved']);
Route::get('/admin/shelters/waiting_to_approve', ['uses' => 'Admin\SheltersController@waiting_to_approve', 'as' => 'admin.shelters.waiting_to_approve']);

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('/animalcategorys', 'Admin\AnimalCategoriesController');
    Route::resource('/animals', 'Admin\AnimalsController');
    Route::resource('/shelters', 'Admin\SheltersController');
    Route::resource('/novelties', 'Admin\NoveltiesController');
    Route::resource('/users', 'Admin\UsersController');
});

Route::group(['as' => 'employee.', 'prefix' => 'employee', 'namespace' => 'Employee'], function () {
    Route::resource('animals', 'AnimalsController');
});
