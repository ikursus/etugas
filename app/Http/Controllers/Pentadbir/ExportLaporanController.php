<?php

namespace App\Http\Controllers\Pentadbir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportLaporanController extends Controller
{
    public function export(Request $request) 
    {
        $timestamp = date('Y-m-d');
        $year = $request->input('year');
        $month = $request->input('month');

        return Excel::download(new LaporanExport($year, $month),  $timestamp . '-laporan.xlsx');
    }
}
