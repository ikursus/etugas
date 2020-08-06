<?php

// Halaman utama sebelum login
Route::get('/', function() {
    // return view('welcome');
    return redirect()->route('login');
});
// Route untuk authentication
Auth::routes(['register' => false]);
// Route untuk home page selepas login
Route::get('/home', 'HomeController@index')->name('home');

/*
 * Senarai routing untuk bahagian pengguna / user biasa
 * Prefix routing adalah: /pengguna
 *  
 */
Route::group([
    'middleware' => 'auth'
], function () {

    // Routing untuk dashboard pengguna
    Route::get('dashboard', function () {
        return view('template_pengguna.dashboard');
    });

    // Route untuk laporan pengguna
    Route::post('laporan/datatables', 'LaporanController@datatables')->name('laporan.datatables');
    Route::resource('laporan', 'LaporanController')->only(['index', 'create', 'store', 'show']);

    // Route untuk kemaskini profile
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('profile', 'ProfileController@update')->name('profile.update');
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
    })->name('dashboard');

    // Routing pentadbir untuk pengurusan users (senarai, tambah,edit,delete)
    Route::post('users/datatables', 'UserController@datatables');
    Route::resource('users', 'UserController');
    // Route untuk laporan pengguna

    Route::get('laporan/export', 'ExportLaporanController@export')->name('export.laporan');
    Route::post('laporan/datatables', 'LaporanController@datatables')->name('export.laporan');

    Route::resource('laporan', 'LaporanController')->only(['index', 'create', 'store', 'show', 'destroy']);

    Route::resource('penempatan', 'PenempatanController')->only(['index', 'create', 'store', 'show', 'destroy']);

    Route::resource('perkara', 'PerkaraController')->only(['index', 'create', 'store', 'show', 'destroy']);
});
