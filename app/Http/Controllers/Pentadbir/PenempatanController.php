<?php

namespace App\Http\Controllers\Pentadbir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penempatan;
use DataTables;

class PenempatanController extends Controller
{
    /**
     * Datatables of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables()
    {
        $query = Penempatan::query();

        return DataTables::of($query)
        ->addColumn('actions', function ($item) {
            return view('template_pentadbir.template_penempatan.actions', compact('item'));
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
        return view('template_pentadbir.template_penempatan.index');
    }

    public function create()
    {
        return view('template_pentadbir.template_penempatan.create');
    }

    public function store(Request $request)
    {
        // Validasi data dari borang
        $request->validate([
            'kod' => ['required'],
            'negeri' => ['required'],
            'bahagian' => ['required']
        ]);

        
        $data = $request->all();

        Penempatan::create($data);

        // Beri respon redirect ke halaman senarai users
        return redirect()->route('pentadbir.penempatan.index')->with('mesej-sukses', 'Rekod berjaya ditambah');
    }

    public function edit(Penempatan $penempatan)
    {

        return view('template_pentadbir.template_penempatan.edit', compact('penempatan'));
    }

    public function update(Request $request, Penempatan $penempatan)
    {
        // Validasi data dari borang
        $request->validate([
            'kod' => ['required'],
            'negeri' => ['required'],
            'bahagian' => ['required']
        ]);

        // Dapatkan data daripada borang untuk simpan ke dalam table users
        $data = $request->all();
        
        // Simpan $data ke dalam table users berdasarkan ID
        $penempatan->update($data);

        // Beri respon redirect ke halaman senarai users
        return redirect()->route('pentadbir.penempatan.index')->with('mesej-sukses', 'Rekod telah berjaya dikemaskini!');
    }

    public function destroy(Penempatan $penempatan)
    {
        // Dapatkan rekod yang ingin dihapuskan dan hapuskan ia
        if ($penempatan->users()->count() > 0)
        {
            // Beri respon redirect ke halaman senarai users
            return redirect()->route('pentadbir.penempatan.index')->with('mesej-gagal', 'Rekod tidak dapat dihapuskan kerana maklumat penempatan digunakan pada akaun pengguna!');
        }

        $penempatan->delete();

        // Beri respon redirect ke halaman senarai users
        return redirect()->route('pentadbir.penempatan.index')->with('mesej-sukses', 'Rekod telah berjaya dihapuskan!');
    }
}
