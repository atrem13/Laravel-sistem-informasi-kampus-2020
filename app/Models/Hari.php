<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    protected $table = 'haris';
    protected $guarded = [];
    public $timestamps = false;

    public function jadwalKuliahs(){
        return $this->hasMany('App\Models\JadwalKuliah', 'id', 'hari_id');
    }
}
