<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliahs';
    protected $guarded = [];
    public $timestamps = false;

    public function jadwalKuliahs(){
        return $this->hasMany('App\Models\JadwalKuliah', 'id', 'hari_id');
    }
}
