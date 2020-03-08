<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhsDetail extends Model
{
    protected $table = 'khs_details';
    protected $guarded = [];
    public $timestamps = false;

    public function krsDetail(){
        return $this->belongsTo('App\Models\KrsDetail', 'krs_detail_id', 'id');
    }

    public function khs(){
        return $this->belongsTo('App\Models\Khs', 'khs_id', 'id');
    }
}
