<?php

Route::get('/', function() {
    
    return view('welcome');
});

/*
 * Senarai routing untuk bahagian pengguna / user biasa
 * Prefix routing adalah: /pengguna
 *  
 */
Route::group([
    'prefix' => 'pengguna', 
    'middleware' => 'auth'
], function () {

    // Routing untuk dashboard pengguna
    Route::get('dashboard', function () {
        return view('template_pengguna.dashboard');
    });
    // Route untuk laporan pengguna
    Route::resource('laporan', 'LaporanController')->only(['index', 'create', 'store', 'show']);
});

/*
 * Senarai routing untuk bahagian pentadbir
 * Prefix routing adalah: /pentadbir
 *  
 */
Route::group([
    'prefix' => 'pentadbir', 
    'middleware' => ['auth', 'pentadbir.only'],
    'namespace'  => 'Pentadbir',
    'as' => 'pentadbir.'
], function () {

    // Routing untuk root address /pentadbir
    Route::get('/', function() {
        return redirect('pentadbir/dashboard');
    });
    
    // Routing untuk dashboard pentadbir
    Route::get('dashboard', function () {
        return view('template_pentadbir.dashboard');
    });

    // Routing pentadbir untuk pengurusan users (senarai, tambah,edit,delete)
    Route::get('users', 'UserController@index')->name('users.index');
    Route::get('users/tambah', 'UserController@create')->name('users.create');
    Route::post('users/create', 'UserController@store')->name('users.store');
    Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::patch('users/{id}/edit', 'UserController@update');
    Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy');
    // Route::resource('UserController');
    // Route untuk laporan pengguna

    Route::resource('laporan', 'LaporanController')->only(['index', 'create', 'store', 'show', 'destroy']);
    Route::get('export/laporan/', 'ExportLaporanController@export')->name('export.laporan');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');