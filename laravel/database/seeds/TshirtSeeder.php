<?php

use Illuminate\Database\Seeder;
use App\Tshirt;

class TshirtSeeder extends Seeder
{
    
        public function run()
    {
        factory(Tshirt::class, 6) -> create();
    }
    
}