<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');


            $table->integer('page_id')->unsigned();
            $table->foreign('page_id')->references('id')->on('vines')->onDelete('cascade');

            $table->string('page_title');            

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('channel_id')->unsigned();
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade');

            $table->string('channel_name');

            $table->string('image')->nullable();     


            $table->integer('to_channel_id')->unsigned();
            $table->foreign('to_channel_id')->references('id')->on('channels')->onDelete('cascade');

            $table->string('to_channel_name');


            $table->longText('comment');

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
        Schema::dropIfExists('comments');
    }
}
