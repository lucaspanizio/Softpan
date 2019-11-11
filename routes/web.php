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

Route::get('/home', 'HomeController@index')->name('home');

/* Rotas */
$this->group(['prefix' => 'admin'], function () {
    
    /* Painel de Controle */
    Route::get('dashboard', 'Admin\ControllerDashboard@index')->name('admin.dashboard.index');
    
    /* Relatórios */
    // Route::get('reports', 'Admin\ControllerReport@index')->name('admin.report.index');
    Route::get('reports', 'Admin\ControllerReport@teste')->name('admin.report.teste');
    
    /* Usuários */
    Route::get('users', 'Admin\ControllerUser@index')->name('admin.user.index');
    Route::put('users', 'Admin\ControllerUser@store')->name('admin.user.store');
    Route::patch('users', 'Admin\ControllerUser@update')->name('admin.user.update');
    Route::delete('users', 'Admin\ControllerUser@destroy')->name('admin.user.destroy');

    /* Empresas */
    Route::get('companies', 'Admin\ControllerCompany@index')->name('admin.company.index');
    Route::put('companies', 'Admin\ControllerCompany@store')->name('admin.company.store');
    Route::patch('companies', 'Admin\ControllerCompany@update')->name('admin.company.update');
    Route::delete('companies', 'Admin\ControllerCompany@destroy')->name('admin.company.destroy');
    
    /* Transações - Contas a Pagar ou Contas a Receber */
    Route::get('transaction/{t}', 'Admin\ControllerTransaction@index')->name('admin.transaction.index');
    Route::put('transaction/{t}', 'Admin\ControllerTransaction@store')->name('admin.transaction.store');
    Route::patch('transaction', 'Admin\ControllerTransaction@update')->name('admin.transaction.update');
    Route::post('transaction', 'Admin\ControllerTransaction@liquidate')->name('admin.transaction.liquidate');
    Route::delete('transaction', 'Admin\ControllerTransaction@destroy')->name('admin.transaction.destroy');
    
    /* Entidades - Clientes ou Fornecedores  */
    Route::get('entity/{e}', 'Admin\ControllerEntity@index')->name('admin.entity.index');
    Route::put('entity{e}', 'Admin\ControllerEntity@store')->name('admin.entity.store');
    Route::patch('entity', 'Admin\ControllerEntity@update')->name('admin.entity.update');
    Route::delete('entity', 'Admin\ControllerEntity@destroy')->name('admin.entity.destroy');
});

Auth::routes();