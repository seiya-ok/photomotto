<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->string('name');
            $table->string('photo_file')->default('images/default_photo.jpg');
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('image_url');
            $table->string('tag')->nullable();
            $table->dateTime('date_taken')->nullable();
            $table->timestamps();
    });
    }


    /**
     * Reverse the migrations.
     * 
     *@return viod
     */
    public function down()
    {
         Schema::dropIfExists('photos');//
          

    }
};
