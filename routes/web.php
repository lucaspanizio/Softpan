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

Route::get('/', 'Admin\ControllerUser@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


$this->group(['prefix' => 'admin'], function () {
    
    /* Rotas do Usuário */
    Route::get('user', 'Admin\ControllerUser@index')->name('admin.user.index');
    Route::put('user', 'Admin\ControllerUser@store')->name('admin.user.store');
    Route::patch('user', 'Admin\ControllerUser@update')->name('admin.user.update');
    Route::delete('user', 'Admin\ControllerUser@destroy')->name('admin.user.destroy');

    /* Rotas do Cliente */
    Route::get('client', 'Admin\ControllerClient@index')->name('admin.client.index');
    Route::put('client', 'Admin\ControllerClient@store')->name('admin.client.store');
    Route::patch('client', 'Admin\ControllerClient@update')->name('admin.client.update');
    Route::delete('client', 'Admin\ControllerClient@destroy')->name('admin.client.destroy');

    /* Rotas do Fornecedor */
    Route::get('provider', 'Admin\ControllerProvider@index')->name('admin.provider.index');
    Route::put('provider', 'Admin\ControllerProvider@store')->name('admin.provider.store');
    Route::patch('provider', 'Admin\ControllerProvider@update')->name('admin.provider.update');
    Route::delete('provider', 'Admin\ControllerProvider@destroy')->name('admin.provider.destroy');

    /* Rotas da Empresa */
    Route::get('company', 'Admin\ControllerCompany@index')->name('admin.company.index');
    Route::put('company', 'Admin\ControllerCompany@store')->name('admin.company.store');
    Route::patch('company', 'Admin\ControllerCompany@update')->name('admin.company.update');
    Route::delete('company', 'Admin\ControllerCompany@destroy')->name('admin.company.destroy');

});
