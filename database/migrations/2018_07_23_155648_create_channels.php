<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('channels', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('name')->unique();
            $table->integer('subscribe')->default(0);
            $table->string('description')->nullable();
            $table->string('default_item')->nullable();
            $table->string('keycode')->unique();
            $table->string('image')->nullable();
            $table->string('all_color')->nullable();

            $table->string('bg_color')->nullable();
            $table->string('channel_nick')->nullable();
            $table->string('header_text_color')->nullable();
            $table->string('bg_header')->nullable();
            
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
        Schema::dropIfExists('channels');
    }
}
