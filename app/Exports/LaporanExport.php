<?php

namespace App\Exports;

use App\Laporan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromQuery, WithMapping
{
    use Exportable;

    public $year;
    public $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        if (!is_null($this->year))
        {
            $sql = Laporan::query()
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month);
        }

        if (!is_null($this->year))
        {
            $sql = Laporan::query()
            ->whereYear('created_at', $this->year);
        }

        if (!is_null($this->month))
        {
            $sql = Laporan::query()
            ->whereMonth('created_at', $this->month);
        }
        
        else
        {
            $sql = Laporan::query();
        }

        return $sql;
    }

    public function map($laporan): array
    {
        return [
            $laporan->id,
            $laporan->user->name ?? null,
            $laporan->penempatan->kod ?? null,
            $laporan->catatan_tambahan ?? null,
            $laporan->created_at
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'PETUGAS',
            'PENEMPATAN',
            'CATATAN',
            'TARIKH'
        ];
    }
}
