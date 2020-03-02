<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = "ruangans";
    protected $guarded = [];
    public $timestamps = false;

    public function jadwalKuliahs(){
        return $this->hasMany('App\Models\JadwalKuliah', 'id', 'hari_id');
    }
}
