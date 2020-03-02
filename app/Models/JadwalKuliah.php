<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalKuliah extends Model
{
    protected $table = 'jadwal_kuliahs';
    protected $guarded = [];
    public $timestamps = false;

    public function hari(){
        return $this->belongsTo('App\Models\Hari', 'hari_id', 'id');
    }
    public function ruangan(){
        return $this->belongsTo('App\Models\Ruangan', 'ruangan_id', 'id');
    }
    public function matakuliah(){
        return $this->belongsTo('App\Models\Matakuliah', 'matakuliah_id', 'id');
    }
    public function dosen(){
        return $this->belongsTo('App\Models\Dosen', 'dosen_id', 'id');
    }
}

