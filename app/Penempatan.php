<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penempatan extends Model
{
    // Maklumat table yang perlu model ini hubungi
    protected $table = 'penempatan';

    protected $fillable = [
    	'kod',
    	'negeri',
    	'bahagian',
    	'tingkat',
    	'unit'
    ];

    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
