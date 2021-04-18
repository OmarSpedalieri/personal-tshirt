<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tshirt;
use Faker\Generator as Faker;

$factory->define(Tshirt::class, function (Faker $faker) {
    return [
      
        'name' => $faker -> randomElement(['canotta', 't-shirt','scollata', 'maniche lunghe']),
        'url' => $faker -> word
    ];
});
