<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{
    protected $table = 'hak_akses';
    protected $guarded = [];
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\User', 'hak_akses_id', 'id');
    }
}
