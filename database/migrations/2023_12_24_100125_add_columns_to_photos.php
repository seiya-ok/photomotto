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
        Schema::creat('photos', function (Blueprint $table) {
            $table->string('camerabody')->nullable();
            $table->string('cameralens')->nullable();
            $table->string('camerasoft')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::creat('photos', function (Blueprint $table) {
           $table->dropColumn('camerabody');
           $table->dropColumn('cameralens');
           $table->dropColumn('camerasoft');
        });
    }
};
