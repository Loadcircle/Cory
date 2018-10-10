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

Route::get('/', 'LandingController@index')->name('index');
//guardar boletas
Route::post('saveTicket', 'LandingController@store')->name('ticket.store');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

//Rutas

Route::middleware(['auth',])->group(function(){

    Route::get('admin/locales', function () {
        return view('admin.local.index');
    })->name('locales.index');

    Route::get('admin/tickets', function () {
        return view('admin.ticket.index');
    })->name('tickets.index');

    //Locales
    Route::resource('admin/local', 'admin\LocalController', ['except' => 'show', 'create', 'edit']);

    //Administrar Tickets
    Route::get('admin/ticket/{results}', 'admin\TicketController@index')->name('ticket.index');
    Route::get('admin/ticketE/{email}', 'admin\TicketController@email')->name('ticket.email');
    Route::get('admin/ticketR/{rut}', 'admin\TicketController@rut')->name('ticket.rut');
    Route::get('admin/ticketL/{id}', 'admin\TicketController@local')->name('ticket.local');
    //Actualizar consumo
    Route::put('admin/ticketC/{id}', 'admin\TicketController@consume')->name('ticket.consume');

    //totales boletas
    Route::get('admin/ticketT', 'admin\TicketController@counter')->name('ticket.counter');

});
