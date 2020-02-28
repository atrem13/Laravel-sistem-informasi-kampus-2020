<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;


class Dosen extends Model
{
    protected $table = "dosens";
    protected $guarded = [];
    public $timestamps = false;

    // use Searchable;
    // public function searchableAs()
    // {
    //     return 'nama';
    // }
}
