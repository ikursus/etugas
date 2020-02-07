<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanDetail extends Model
{
    protected $fillable = [
        'laporan_id',
        'perkara_id',
        'tandakan',
        'catatan'
    ];

    public function perkara()
    {
        return $this->belongsTo(Perkara::class);
    }
}
