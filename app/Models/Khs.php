<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khs extends Model
{
    protected $table = 'khs';
    protected $guarded = [];
    public $timestamps = false;

    public function krs()
    {
        return $this->belongsTo('App\Models\Krs', 'krs_id', 'id');
    }

    public function khsDetails()
    {
        return $this->hasMany('App\Models\KhsDetail', 'khs_id', 'id');
    }

}
