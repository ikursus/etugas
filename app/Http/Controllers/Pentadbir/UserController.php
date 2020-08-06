<?php

namespace App\Http\Controllers\Pentadbir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Penempatan;
use DataTables;

class UserController extends Controller
{
    /**
     * Datatables of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables()
    {
        $query = User::with('penempatan')
        ->select('users.*');

        return DataTables::of($query)
        ->addColumn('actions', function ($item) {
            return view('template_pentadbir.template_users.actions', compact('item'));
        })
        ->addIndexColumn()
        ->rawColumns(['actions', 'created_at'])
        ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view('template_pentadbir.template_users.index');
    }

    public function create()
    {
        $senarai_penempatan = Penempatan::orderBy('bahagian', 'asc')->get();
        return view('template_pentadbir.template_users.create', compact('senarai_penempatan'));
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

        
        $data = $request->all();

        User::create($data);

        // Beri respon redirect ke halaman senarai users
        return redirect()->route('pentadbir.users.index')->with('mesej-sukses', 'Rekod berjaya ditambah');
    }

    public function edit(User $user)
    {
        // Beri respon paparkan template edit user beserta rekod $user
        $senarai_penempatan = Penempatan::orderBy('bahagian', 'asc')->get();

        return view('template_pentadbir.template_users.edit', compact('user', 'senarai_penempatan'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi data dari borang
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'nric' => ['required', 'regex:/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/'],
        ]);

        // Dapatkan data daripada borang untuk simpan ke dalam table users
        $data = $request->except('password');
        // Merge kan password yang di-encrypt ke dalam array $data
        // jika password tidak kosong (iaitu diisi dengan password baru)
        if (!empty($request->input('password')) && !is_null($request->input('password')))
        {
            $data['password'] = $request->input('password');
        }
        
        // Simpan $data ke dalam table users berdasarkan ID
        $user->update($data);

        // Beri respon redirect ke halaman senarai users
        return redirect()->route('pentadbir.users.index')->with('mesej-sukses', 'Rekod telah berjaya dikemaskini!');
    }

    public function destroy(User $user)
    {
        // Dapatkan rekod yang ingin dihapuskan dan hapuskan ia
        $user->delete();

        // Beri respon redirect ke halaman senarai users
        return redirect()->route('pentadbir.users.index')->with('mesej-sukses', 'Rekod telah berjaya dihapuskan!');
    }
}
