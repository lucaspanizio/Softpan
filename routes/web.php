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

/* Rotas */
$this->group(['prefix' => 'admin'], function () {

    /* Usuários */
    Route::get('user', 'Admin\ControllerUser@index')->name('admin.user.index');
    Route::put('user', 'Admin\ControllerUser@store')->name('admin.user.store');
    Route::patch('user', 'Admin\ControllerUser@update')->name('admin.user.update');
    Route::delete('user', 'Admin\ControllerUser@destroy')->name('admin.user.destroy');
    
    /* Empresas */
    Route::get('company', 'Admin\ControllerCompany@index')->name('admin.company.index');
    Route::put('company', 'Admin\ControllerCompany@store')->name('admin.company.store');
    Route::patch('company', 'Admin\ControllerCompany@update')->name('admin.company.update');
    Route::delete('company', 'Admin\ControllerCompany@destroy')->name('admin.company.destroy');

    /* Transações - Contas a Pagar ou Contas a Receber */
    Route::get('transaction', 'Admin\ControllerTransaction@index')->name('admin.transaction.index');
    Route::put('transaction', 'Admin\ControllerTransaction@store')->name('admin.transaction.store');
    Route::patch('transaction', 'Admin\ControllerTransaction@update')->name('admin.transaction.update');
    Route::delete('transaction', 'Admin\ControllerTransaction@destroy')->name('admin.transaction.destroy');

    /* Entidades - Clientes ou Fornecedores  */
    Route::get('entity', 'Admin\ControllerEntity@index')->name('admin.entity.index');
    Route::get('entity', 'Admin\ControllerEntity@store')->name('admin.entity.store');
    Route::get('entity', 'Admin\ControllerEntity@update')->name('admin.entity.update');
    Route::get('entity', 'Admin\ControllerEntity@destroy')->name('admin.entity.destroy');
});

