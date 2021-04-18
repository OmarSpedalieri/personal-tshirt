<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tshirt extends Model
{
    protected $fillable = [

        'name',
        'url',      
    ];

    // public function creations() {
    //     return $this -> belongsToMany(Creation::class);
    // }
}
