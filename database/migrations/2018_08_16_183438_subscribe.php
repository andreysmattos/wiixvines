<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subscribe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribes', function (Blueprint $table) {
            $table->engine = 'InnoDB';  

            $table->increments('id');

            $table->integer('from_channel_id')->unsigned();            
            $table->foreign('from_channel_id')->references('id')->on('channels')->onDelete('cascade');

            $table->string('from_channel_name');            
            $table->foreign('from_channel_name')->references('name')->on('channels')->onDelete('cascade');


            $table->integer('to_channel_id')->unsigned();            
            $table->foreign('to_channel_id')->references('id')->on('channels')->onDelete('cascade');

            $table->string('to_channel_name');            
            $table->foreign('to_channel_name')->references('name')->on('channels')->onDelete('cascade');


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
       Schema::dropIfExists('subscribes');
    }
}
