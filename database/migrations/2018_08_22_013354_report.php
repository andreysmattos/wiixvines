<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Report extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
            Schema::create('reports', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('from_user_id')->unsigned();
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
                   

            $table->integer('page_id')->unsigned();
            $table->foreign('page_id')->references('id')->on('vines')->onDelete('cascade');

            $table->string('channel_name');

            $table->string('page_title');            

            $table->string('title');
            $table->longText('message');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
           Schema::dropIfExists('reports');
    }
}
