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
Route::get('/terms', 'RegisterChurchController@terms');
Route::get('/acceptUserInvite/{token}', 'InviteController@showInvitedUserForm')->name('accept');
Route::post('/acceptUserInvite/{token}', 'InviteController@acceptInvitedUser')->name('register-invite');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/settings', 'SettingsController@church');
    Route::put('/settings', 'SettingsController@churchchange');
    Route::get('/settings/categories', 'CategoriesController@index');
    Route::post('/settings/categories', 'CategoriesController@store');
    Route::put('/settings/categories/{category}', 'CategoriesController@update');
    Route::delete('/settings/categories/{category}', 'CategoriesController@destroy');
    Route::get('/settings/user', 'SettingsController@user');
    Route::put('/settings/user', 'SettingsController@userchange');
    Route::get('/settings/users', 'ChurchUsersController@index');
    Route::post('/settings/users', 'ChurchUsersController@sendInvite');
    Route::put('/manageuserpermissions/{user}', 'ChurchUsersController@updatePermissions')->name('update-permissions');
    Route::delete('/deleteuser/{user}', 'ChurchUsersController@destroy')->name('delete-user');
});
