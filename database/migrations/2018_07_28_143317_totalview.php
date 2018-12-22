<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Totalview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('totalview', function (Blueprint $table) {
            $table->engine = 'InnoDB';  

            $table->increments('id');
            $table->integer('vine_id')->unsigned();            
            $table->foreign('vine_id')->references('id')->on('vines')->onDelete('cascade');


            $table->string('visit_ip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('totalview');
    }
}
