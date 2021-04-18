<?php

use Illuminate\Database\Seeder;
use App\Tshirt;
use App\Creation;

class CreationSeeder extends Seeder
{
   
    public function run()
    {
      factory(Creation::class, 0) -> create();
     
    }
}