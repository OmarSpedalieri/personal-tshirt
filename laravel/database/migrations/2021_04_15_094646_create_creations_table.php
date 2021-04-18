<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreationsTable extends Migration
{
    public function up()
    {
        Schema::create('creations', function (Blueprint $table) {
            $table->id();

            
            $table->string('processing_name');
            $table->longText('image');
            $table->string('hash');

            // $table -> unsignedBigInteger('tshirt_id');
            
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('creations');
    }
}
