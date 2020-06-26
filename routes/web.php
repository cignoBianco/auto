<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/admin_panel/categories', 'AdminCategoryController@index')->name('admin_panel/category');
    Route::get('/admin_panel/create-category', 'AdminCategoryController@createForm')->name('admin_panel/create-category');
    Route::post('/admin_panel/create-category', 'AdminCategoryController@create')->name('admin_panel/create-category');
    Route::get('/admin_panel/update-category/{id}', 'AdminCategoryController@updateForm')->name('admin_panel/update-category');
    Route::post('/admin_panel/update-category/{id}', 'AdminCategoryController@update')->name('admin_panel/update-category');
    Route::get('/admin_panel/delete-category/{id}', 'AdminCategoryController@delete')->name('admin_panel/delete-category');
    
    Route::get('/admin_panel', 'AdminController@index')->name('admin_panel');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
