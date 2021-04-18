<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Creation;
use Faker\Generator as Faker;

$factory->define(Creation::class, function (Faker $faker) {
    return [
        
        'processing_name' => $faker -> firstNameMale,
        'image' => $faker -> unique()-> md5,//faking IMg64 string
        'hash' => $faker -> unique()->uuid // faking hash
    ];
});
