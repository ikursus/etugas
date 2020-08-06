<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perkara extends Model
{
    // Maklumat table perkara yang perlu dihubungi
    protected $table = 'perkara';

    protected $fillable = ['butiran'];
}
