<?php

namespace App\Http\Controllers\Pentadbir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Perkara;
use DataTables;

class PerkaraController extends Controller
{
    /**
     * Datatables of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables()
    {
        $query = Perkara::query();

        return DataTables::of($query)
        ->addColumn('actions', function ($item) {
            return view('template_pentadbir.template_perkara.actions', compact('item'));
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
        return view('template_pentadbir.template_perkara.index');
    }

    public function create()
    {
        return view('template_pentadbir.template_perkara.create');
    }

    public function store(Request $request)
    {
        // Validasi data dari borang
        $request->validate([
            'butiran' => ['required'],
        ]);

        
        $data = $request->all();

        Perkara::create($data);

        // Beri respon redirect ke halaman senarai users
        return redirect()->route('pentadbir.perkara.index')->with('mesej-sukses', 'Rekod berjaya ditambah');
    }

    public function edit(Perkara $perkara)
    {

        return view('template_pentadbir.template_perkara.edit', compact('perkara'));
    }

    public function update(Request $request, Perkara $perkara)
    {
        // Validasi data dari borang
        $request->validate([
            'butiran' => ['required']
        ]);

        // Dapatkan data daripada borang untuk simpan ke dalam table users
        $data = $request->all();
        
        // Simpan $data ke dalam table users berdasarkan ID
        $perkara->update($data);

        // Beri respon redirect ke halaman senarai users
        return redirect()->route('pentadbir.perkara.index')->with('mesej-sukses', 'Rekod telah berjaya dikemaskini!');
    }

    public function destroy(Perkara $perkara)
    {
        $perkara->delete();

        // Beri respon redirect ke halaman senarai users
        return redirect()->route('pentadbir.perkara.index')->with('mesej-sukses', 'Rekod telah berjaya dihapuskan!');
    }
}
