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
Route::resource('/admin/animalcategories', 'Admin\AnimalCategoriesController');

Route::get('/admin', 'Admin\DashboardController@dashboard')->name('admin.index');

Route::get('/admin/articles', 'Admin\ArticlesController@index')->name('admin.articles.index');

Route::get('/employee', 'Employee\EditController@index');
