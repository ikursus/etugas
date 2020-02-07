<?php

Route::get('/', function() {
    
    return view('welcome');
});

/*
 * Senarai routing untuk bahagian pengguna / user biasa
 * Prefix routing adalah: /pengguna
 *  
 */
Route::group(['prefix' => 'pengguna', 'middleware' => 'auth'], function () {

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
Route::group(['prefix' => 'pentadbir', 'middleware' => 'auth'], function () {

    // Routing untuk root address /pentadbir
    Route::get('/', function() {
        return redirect('pentadbir/dashboard');
    });
    
    // Routing untuk dashboard pentadbir
    Route::get('dashboard', function () {
        return view('template_pentadbir.dashboard');
    });

    // Routing pentadbir untuk pengurusan users (senarai, tambah,edit,delete)
    Route::get('users', 'UserController@index');
    Route::get('users/create', 'UserController@create');
    Route::post('users/create', 'UserController@store');
    Route::get('users/{id}/edit', 'UserController@edit');
    Route::patch('users/{id}/edit', 'UserController@update');
    Route::delete('users/{id}', 'UserController@destroy');
    // Route::resource('UserController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');