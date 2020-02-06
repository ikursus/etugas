<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

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
        ->orderBy('id', 'desc')
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
            'no_staf' => ['required', 'unique:users,no_staf'],
            'email' => ['required', 'email', 'unique:users,email'],
            'nric' => ['required', 'regex:/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/', 'unique:users,nric'],
            'password' => 'required|min:4|confirmed'
        ]);

        // // Dapatkan data daripada borang untuk simpan ke dalam table users
        // $data = $request->only([
        //     'name', 
        //     'nric',
        //     'no_staf',
        //     'email', 
        //     'telefon',  
        //     'penempatan_id', 
        //     'jawatan', 
        //     'role'
        // ]);
        // // Merge kan password yang di-encrypt ke dalam array $data
        // $data['password'] = bcrypt($request->input('password'));

        // Simpan $data ke dalam table users
        // DB::table('users')->insert($data);
        $data = $request->all();
        User::create($data);

        // Beri respon redirect ke halaman senarai users
        return redirect('/pentadbir/users');
    }

    public function edit($id)
    {
        // Dapatkan data dari table users berdasarkan $id
        $user = DB::table('users')->where('id', '=', $id)->first();

        // Beri respon paparkan template edit user beserta rekod $user
        return view('template_pentadbir.template_users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data dari borang
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'nric' => ['required', 'regex:/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/'],
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
        // jika password tidak kosong (iaitu diisi dengan password baru)
        if (!empty($request->input('password')))
        {
            $data['password'] = bcrypt($request->input('password'));
        }
        
        // Simpan $data ke dalam table users berdasarkan ID
        DB::table('users')->where('id', '=', $id)->update($data);

        // Beri respon redirect ke halaman senarai users
        return redirect('/pentadbir/users')->with('mesej-sukses', 'Rekod telah berjaya dikemaskini!');
    }

    public function destroy($id)
    {
        // Dapatkan rekod yang ingin dihapuskan dan hapuskan ia
        DB::table('users')->where('id', '=', $id)->delete();

        // Beri respon redirect ke halaman senarai users
        return redirect('/pentadbir/users')->with('mesej-sukses', 'Rekod telah berjaya dihapuskan!');
    }
}
