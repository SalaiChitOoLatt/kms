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


Auth::routes();

Route::get('/admin', function () {
    return view('admin.dashboard');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get( '/useredit/{id}', 'AdminController@useredit');
// change route because admin route is no longer work with css. <admin/useredit/{id}>
Route::put( '/userupdate/{id}', 'AdminController@userupdate');
Route::delete('/useredit/{id}', 'AdminController@userdelete');

Route::get('/edit/{category_id}', 'CategoryController@edit');
Route::put( '/edit/{category_id}', 'CategoryController@update');
Route::delete('/delete/{id}', 'CategoryController@destroy');

Route::get('/roleedit/{role_id}', 'RoleController@edit');
Route::put( '/roleedit/{role_id}', 'RoleController@update');
Route::delete('/roledelete/{id}', 'RoleController@destroy');

Route::get('/content/{content_id}', 'ContentController@edit');
Route::put( '/contentedit/{content_id}', 'ContentController@update');
Route::delete('/contentdelete/{id}', 'ContentController@destroy');

Route::prefix('category')->group(function() {

    Route::get('/', 'CategoryController@index');
    Route::get('/create', 'CategoryController@create');
    Route::post('/create', 'CategoryController@store')->name('admin.category-create');
    Route::get('/downloadcsv', 'CategoryController@downloadcsv');

});

Route::prefix('content')->group(function() {

    Route::get('/', 'ContentController@index');
    Route::get('/create', 'ContentController@create');
    Route::post('/create', 'ContentController@store')->name('admin.content-create');
    Route::get('/downloadcsv', 'ContentController@downloadcsv');

});


Route::prefix('role')->group(function() {
    Route::get('/', 'RoleController@index');
    Route::get('/create', 'RoleController@create');
    Route::post('/create', 'RoleController@store')->name('admin.role-create');
    Route::get('/downloadcsv', 'RoleController@downloadcsv');
});

Route::prefix('admin')->group(function() {

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get( '/users', 'AdminController@userlists' )->name( 'admin.user-list' );
    Route::get('/createuser', 'AdminController@showUserCreateForm');
    Route::post('/createuser', 'AdminController@createUser')->name('admin.user-create');
    
    Route::get('/about', 'AdminController@about');
    //Route::get( '/useredit/{id}', 'AdminController@edituser');    

    Route::get('/downloadcsv', 'AdminController@downloadcsv');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    
    // Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    
});
