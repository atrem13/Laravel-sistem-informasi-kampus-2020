<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KrsDetail extends Model
{
    protected $table = "krs_details";
    protected $guarded = [];
    public $timestamps = false;

    public function krs()
    {
        return $this->belongsTo('App\Models\Krs', 'krs_id', 'id');
    }

    public function jadwalKuliah()
    {
        return $this->belongsTo('App\Models\JadwalKuliah','jadwal_kuliah_id', 'id');
    }

    public function khsDetails()
    {
        return $this->hasMany('App\Models\KhsDetail', 'krs_detail_id', 'id');
    }
}
