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

Route::get('/home', 'HomeController@index')->name('home');

//Rutas

Route::middleware(['auth',])->group(function(){

    Route::get('admin/locales', function () {
        return view('admin.local.index');
    })->name('locales.index');

    Route::get('admin/tickets', function () {
        return view('admin.ticket.index');
    })->name('tickets.index');

    Route::resource('admin/local', 'admin\LocalController', ['except' => 'show', 'create', 'edit']);

    Route::resource('admin/ticket', 'admin\TicketController');

});
