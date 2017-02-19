<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsMasterclass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions_masterclass', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('masterclass_id')->unsigned()->index() ;
            $table->integer('user_id')->unsigned()->index() ;

            $table->boolean('validate')->default(false) ;
            $table->timestamps();

            $table->foreign('masterclass_id')->references('id')->on('masterclass')->onDelete('cascade') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subscriptions_masterclass');
    }
}
