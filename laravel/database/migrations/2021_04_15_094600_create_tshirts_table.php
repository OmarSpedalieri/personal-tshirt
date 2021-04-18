<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTshirtsTable extends Migration
{

    public function up()
    {
        Schema::create('tshirts', function (Blueprint $table) {
            $table -> id();
        
            $table -> string ('name',30);
            $table -> string ('url');

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tshirts');
    }
}
