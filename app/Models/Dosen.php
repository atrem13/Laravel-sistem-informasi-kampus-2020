<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;


class Dosen extends Model
{
    protected $table = "dosens";
    protected $guarded = [];
    public $timestamps = false;

    public function jadwalKuliahs(){
        return $this->hasMany('App\Models\JadwalKuliah', 'id', 'hari_id');
    }
}
