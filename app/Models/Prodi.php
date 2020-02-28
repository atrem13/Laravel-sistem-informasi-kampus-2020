<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Prodi extends Model
{
    protected $table = "prodis";
    protected $guarded = [];
    public $timestamps = false;

    // use Searchable;
    // public function searchableAs()
    // {
    //     return 'nama';
    // }

    public function mahasiswas()
    {
        return $this->hasMany("App\Models\Mahasiswa", "id", "prodi_id");
    }
}
