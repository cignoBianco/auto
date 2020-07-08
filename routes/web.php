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

    Route::get('/admin_panel/orders', 'AdminOrderController@index')->name('admin_panel/order');
    Route::get('/admin_panel/create-order', 'AdminOrderController@createForm')->name('admin_panel/create-order');
    Route::post('/admin_panel/create-order', 'AdminOrderController@create')->name('admin_panel/create-order');
    Route::get('/admin_panel/update-order/{id}', 'AdminOrderController@updateForm')->name('admin_panel/update-order');
    Route::post('/admin_panel/update-order/{id}', 'AdminOrderController@update')->name('admin_panel/update-order');
    Route::get('/admin_panel/delete-order/{id}', 'AdminOrderController@delete')->name('admin_panel/delete-order');

    Route::get('/admin_panel/providers', 'AdminProviderController@index')->name('admin_panel/provider');
    Route::get('/admin_panel/create-provider', 'AdminProviderController@createForm')->name('admin_panel/create-provider');
    Route::post('/admin_panel/create-provider', 'AdminProviderController@create')->name('admin_panel/create-provider');
    Route::get('/admin_panel/update-provider/{id}', 'AdminProviderController@updateForm')->name('admin_panel/update-provider');
    Route::post('/admin_panel/update-provider/{id}', 'AdminProviderController@update')->name('admin_panel/update-provider');
    Route::get('/admin_panel/delete-provider/{id}', 'AdminProviderController@delete')->name('admin_panel/delete-provider');

    Route::get('/admin_panel/users', 'AdminUserController@index')->name('admin_panel/user');
    Route::get('/admin_panel/create-user', 'AdminUserController@createForm')->name('admin_panel/create-user');
    Route::post('/admin_panel/create-user', 'AdminUserController@create')->name('admin_panel/create-user');
    Route::get('/admin_panel/update-user/{id}', 'AdminUserController@updateForm')->name('admin_panel/update-user');
    Route::post('/admin_panel/update-user/{id}', 'AdminUserController@update')->name('admin_panel/update-user');
    Route::get('/admin_panel/delete-user/{id}', 'AdminUserController@delete')->name('admin_panel/delete-user');

    Route::get('/admin_panel/products', 'AdminAutoProductController@index')->name('admin_panel/product');
    Route::get('/admin_panel/create-product', 'AdminAutoProductController@createForm')->name('admin_panel/create-product');
    Route::post('/admin_panel/create-product', 'AdminAutoProductController@create')->name('admin_panel/create-product');
    Route::get('/admin_panel/update-product/{id}', 'AdminAutoProductController@updateForm')->name('admin_panel/update-product');
    Route::post('/admin_panel/update-product/{id}', 'AdminAutoProductController@update')->name('admin_panel/update-product');
    Route::get('/admin_panel/delete-product/{id}', 'AdminAutoProductController@delete')->name('admin_panel/delete-product');
    
    Route::get('/admin_panel/parts', 'AdminAutoPartController@index')->name('admin_panel/part');
    Route::get('/admin_panel/create-part', 'AdminAutoPartController@createForm')->name('admin_panel/create-part');
    Route::post('/admin_panel/create-part', 'AdminAutoPartController@create')->name('admin_panel/create-part');
    Route::post('/admin_panel/create-part-excel', 'AdminAutoPartController@createFromExcel')->name('admin_panel/create-part-excel');
    Route::get('/admin_panel/update-part/{id}', 'AdminAutoPartController@updateForm')->name('admin_panel/update-part');
    Route::post('/admin_panel/update-part/{id}', 'AdminAutoPartController@update')->name('admin_panel/update-part');
    Route::get('/admin_panel/delete-part/{id}', 'AdminAutoPartController@delete')->name('admin_panel/delete-part');

    Route::get('/admin_panel/categories', 'AdminCategoryController@index')->name('admin_panel/category');
    Route::get('/admin_panel/create-category', 'AdminCategoryController@createForm')->name('admin_panel/create-category');
    Route::post('/admin_panel/create-category', 'AdminCategoryController@create')->name('admin_panel/create-category');
    Route::get('/admin_panel/update-category/{id}', 'AdminCategoryController@updateForm')->name('admin_panel/update-category');
    Route::post('/admin_panel/update-category/{id}', 'AdminCategoryController@update')->name('admin_panel/update-category');
    Route::get('/admin_panel/delete-category/{id}', 'AdminCategoryController@delete')->name('admin_panel/delete-category');
    
    Route::get('/admin_panel', 'AdminController@index')->name('admin_panel');
});

Route::get('/welcome', function () {return view('welcome');});

Route::get('/consierge/parthner', 'HomeController@GetConsiergeParthner');
Route::get('/consierge/about', 'HomeController@GetConsiergeAbout');
Route::get('/consierge/faq', 'HomeController@GetConsiergeFaq');
Route::get('/consierge', 'HomeController@GetConsierge')->name('consierge');

Route::get('/catalog', 'HomeController@ShowCatalog')->name('catalog');
Route::get('/catalog/oem', 'HomeController@ShowCatalogOem')->name('catalog/oem');
Route::get('/stol-zakazov', 'HomeController@ShowTable')->name('stol-zakazov');
Route::get('/poisk-po-nomeru', 'HomeController@ShowParts')->name('poisk-po-nomeru');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');


Auth::routes();
/*Route::get('/', function () {
    return view('home'); 
});*/

