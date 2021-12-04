<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Details extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function(Blueprint $table){
            $table->increments('id');
            $table->string('welcome-message');
            $table->string('about-me');
            $table->string('current-work');
            $table->string('past-work');
            $table->json('skills');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            
            //Foreign key user_id, references id on the users table
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}