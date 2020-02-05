<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {

        // Dapatkan data senarai users
        $senarai_users = [
            ['id' => 1, 'name' => 'Ali', 'username' => 'ali', 'email' => 'ali@gmail.com'],
            ['id' => 2, 'name' => 'Abu', 'username' => 'abu', 'email' => 'abu@gmail.com'],
            ['id' => 3, 'name' => 'Ahmad', 'username' => 'ahmad', 'email' => 'ahmad@gmail.com'],
        ];

        $page_title = '<h1>Senarai Users</h1>';

        // Beri respon paparkan template senarai.php dan attachkan variable $users
        // return view('template_pentadbir.template_users.senarai', ['senarai_users' => $senarai_users, 'page_title' => $page_title]);
        // return view('template_pentadbir.template_users.senarai')->with('senarai_users', $senarai_users)->with('page_title', $page_title);
        return view('template_pentadbir.template_users.senarai', 
        compact('senarai_users', 'page_title'));
    }

    public function create()
    {
        return view('template_pentadbir.template_users.tambah');
    }

    public function store(Request $request)
    {
        return $request->all();
    }

    public function edit($id)
    {
        return 'Halaman borang edit user ' . $id;
    }

    public function update($id)
    {
        return 'Rekod berjaya dikemaskini ' . $id;
    }

    public function destroy($id)
    {
        return 'Rekod berjaya dihapuskan ' . $id;
    }
}
