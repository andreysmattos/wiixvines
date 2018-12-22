<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vines', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('channel_id')->unsigned();            
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade');

            $table->integer('user_id')->unsigned();            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('channel_name');
            $table->integer('type')->default(1);
            $table->string('title');
            $table->string('link')->unique();
            $table->string('server');
            $table->string('playmode');
            $table->string('pvptype');
            $table->text('description')->nullable();
            $table->integer('view')->default(0);
            $table->integer('comments')->default(0);
            $table->integer('likes')->default(0);            
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
       Schema::dropIfExists('vines');
    }
}
