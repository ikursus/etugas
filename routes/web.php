<?php

Route::get('/', function() {
    
    return view('welcome');
});

Route::get('users', function() {
    return 'Halaman senarai users';
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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');