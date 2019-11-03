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

Route::get('/admin', function () {
    return view('admin.dashboard');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get( '/useredit/{id}', 'AdminController@useredit');
// change route because admin route is no longer work with css. <admin/useredit/{id}>
Route::put( '/userupdate/{id}', 'AdminController@userupdate');
Route::delete('/useredit/{id}', 'AdminController@userdelete');

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get( '/users', 'AdminController@userlists' )->name( 'admin.user-list' );
    Route::get('/createuser', 'AdminController@showUserCreateForm');
    Route::get('/about', 'AdminController@about');
    //Route::get( '/useredit/{id}', 'AdminController@edituser');

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    
    // Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    
});
