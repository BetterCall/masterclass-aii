<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubscritionsMusic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('concert_music', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('concert_id')->unsigned()->index();
            $table->integer('music_id')->unsigned()->index();

            $table->foreign('concert_id')->references('id')->on('concerts')->onDelete('cascade');
            $table->foreign('music_id')->references('id')->on('musics')->onDelete('cascade');
        });

        Schema::create('subscriptions_music', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('concert_music_id')->unsigned()->index();
            $table->integer('instrument_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('concert_music_id')->references('id')->on('concert_music')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subscriptions_music');
        Schema::drop('concert_music ');
    }
}
