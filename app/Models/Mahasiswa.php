<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;
// use Sofa\Eloquence\Eloquence;


class Mahasiswa extends Model
{
    protected $table = "mahasiswas";
    protected $guarded = [];
    public $timestamps = false;

    public function prodi()
    {
        return $this->belongsTo("App\Models\Prodi", "prodi_id", "id");
    }
}
