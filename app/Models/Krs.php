<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $table = "krs";
    protected $guarded = [];
    public $timestamps = false;


    public function mahasiswa()
    {
        return $this->belongsTo("App\Models\Mahasiswa", "mahasiswa_id", "id");
    }

    public function krsDetails()
    {
        return $this->hasMany('App\Models\KrsDetail', 'krs_id', 'id');
    }
}
