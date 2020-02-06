<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index() 
    {
        // Dapatkan data senarai users
        // $senarai_users = [
        //     ['id' => 1, 'name' => 'Ali', 'username' => 'ali', 'email' => 'ali@gmail.com'],
        //     ['id' => 2, 'name' => 'Abu', 'username' => 'abu', 'email' => 'abu@gmail.com'],
        //     ['id' => 3, 'name' => 'Ahmad', 'username' => 'ahmad', 'email' => 'ahmad@gmail.com'],
        // ];
        // Ambil senarai data users dari table users
        $senarai_users = DB::table('users')
        //->where('role', '=', 'pentadbir')
        //->get();
        ->paginate(2);

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
        // Validasi data dari borang
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'nric' => ['required', 'regex:/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/'],
            'password' => 'required|min:4|confirmed'
        ]);

        // Dapatkan data daripada borang untuk simpan ke dalam table users
        $data = $request->only([
            'name', 
            'nric',
            'no_staf',
            'email', 
            'telefon',  
            'penempatan_id', 
            'jawatan', 
            'role'
        ]);
        // Merge kan password yang di-encrypt ke dalam array $data
        $data['password'] = bcrypt($request->input('password'));

        // Simpan $data ke dalam table users
        DB::table('users')->insert($data);

        // Beri respon redirect ke halaman senarai users
        return redirect('/pentadbir/users');
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