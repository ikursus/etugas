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
    
    // Routing untuk dashboard pentadbir
    Route::get('dashboard', function () {
        return view('template_pentadbir.dashboard');
    });

    // Routing pentadbir untuk pengurusan users (tambah,edit,delete)
    Route::get('users', function() {

        // Dapatkan data senarai users
        $users = [
            ['id' => 1, 'name' => 'Ali', 'username', 'ali', 'email' => 'ali@gmail.com'],
            ['id' => 2, 'name' => 'Abu', 'username', 'abu', 'email' => 'abu@gmail.com'],
            ['id' => 3, 'name' => 'Ahmad', 'username', 'ahmad', 'email' => 'ahmad@gmail.com'],
        ];

        return view('template_pentadbir.template_users.senarai');
    });

    Route::get('users/create', function() {
        return 'Halaman borang tambah user';
    });

    Route::post('users/create', function() {
        return 'Borang telah berjaya dihantar';
    });

    Route::get('users/{id}/edit', function($id) {
        return 'Halaman borang edit user ' . $id;
    });

    Route::patch('users/{id}/edit', function($id) {
        return 'Rekod berjaya dikemaskini ' . $id;
    });

    Route::delete('users/{id}', function($id) {
        return 'Rekod berjaya dihapuskan ' . $id;
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');