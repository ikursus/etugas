<?php

namespace App\Http\Controllers\Pentadbir;

use App\Http\Controllers\Controller;

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
    public function index(Request $request)
    {
        // Cara nak dapatkan butiran user yg tengah login
        // $loggedUser = Auth::user(); // kena set use Auth;
        $loggedUser = auth()->user();

        if ($request->has('year') 
        && $request->has('month') 
        && !empty($request->input('year')) 
        && !empty($request->input('month')))
        {
            $senarai_laporan = Laporan::whereYear('created_at', $request->year)
            ->whereMonth('created_at', $request->month)
            ->paginate(10);
        }

        elseif ($request->has('year') && !empty($request->input('year')))
        {
            $senarai_laporan = Laporan::whereYear('created_at', $request->year)
            ->paginate(10);
        }

        elseif ($request->has('month') && !empty($request->input('month')))
        {
            $senarai_laporan = Laporan::whereMonth('created_at', $request->month)
            ->paginate(10);
        }

        else
        {
            $senarai_laporan = null;
        }

        

        return view('template_pentadbir.template_laporan.index', compact('senarai_laporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $senarai_perkara = Perkara::select('id', 'butiran')->get();

        return view('template_pentadbir.template_laporan.create', compact('senarai_perkara'));
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

        return redirect()->route('pentadbir.laporan.index')->with('mesej-sukses', 'Laporan berjaya dikirimkan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        return view('template_pentadbir.template_laporan.show', compact('laporan'));
    }

    /**
     * Delete the specified resource.
     *
     * @param  \App\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('pentadbir.laporan.index')->with('mesej-sukses', 'Laporan berjaya dihapuskan!');
    }
}
