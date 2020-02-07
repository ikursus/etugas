<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'user_id',
        'penempatan_id',
        'catatan_tambahan'
    ];

    public function details()
    {
        return $this->hasMany(LaporanDetail::class, 'laporan_id');
    }

    public function penempatan()
    {
        return $this->belongsTo(Penempatan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
