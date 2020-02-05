<?php

Route::get('/', function() {
    
    return view('welcome');
});

/*
 * Senarai routing untuk bahagian pengguna / user biasa
 * Prefix routing adalah: /pengguna
 *  
 */
Route::group(['prefix' => 'pengguna'], function () {

    // Routing untuk dashboard pengguna
    Route::get('dashboard', function () {
        return view('template_pengguna.dashboard');
    });
});

/*
 * Senarai routing untuk bahagian pentadbir
 * Prefix routing adalah: /pentadbir
 *  
 */
Route::group(['prefix' => 'pentadbir'], function () {

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
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');