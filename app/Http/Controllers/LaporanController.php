<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\LaporanDetail;
use App\Perkara;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cara nak dapatkan butiran user yg tengah login
        // $loggedUser = Auth::user(); // kena set use Auth;
        $loggedUser = auth()->user();

        $senarai_laporan = Laporan::where('user_id', '=', $loggedUser->id)->paginate(10);

        return view('template_pengguna.template_laporan.index', compact('senarai_laporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $senarai_perkara = Perkara::select('id', 'butiran')->get();

        return view('template_pengguna.template_laporan.create', compact('senarai_perkara'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi borang
        $request->validate([
            'tandakan.*' => 'required|in:YA,TIDAK'
        ]);

        // Dapatkan data daripada borang
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['penempatan_id'] = auth()->user()->penempatan_id;

        // Simpan rekod bagi table laporans
        $laporan = Laporan::create($data);

        // Simpan rekod bagi table laporan_details
        foreach ($data['perkara'] as $detail)
        {
            LaporanDetail::create([
                'laporan_id' => $laporan->id,
                'perkara_id' => $detail,
                'tandakan' => $data['tandakan'][$detail],
                'catatan' => $data['catatan'][$detail]
            ]);
        }

        return redirect()->route('laporan.index')->with('mesej-sukses', 'Laporan berjaya dikirimkan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        return view('template_pengguna.template_laporan.show', compact('laporan'));
    }
}
