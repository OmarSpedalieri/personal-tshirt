<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    protected $fillable = [

        'processing_name',
        'image',
        'hash',      
    ];

    // public function tshirt() {
    //     return $this -> belongsTo(Tshirt::class);
    // }
}