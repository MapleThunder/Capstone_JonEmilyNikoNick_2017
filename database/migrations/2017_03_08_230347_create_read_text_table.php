<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('read_texts', function (Blueprint $table) {
        $table->increments('id');
        $table->string('content');
        $table->integer('read_for_user');
        $table->rememberToken();
        $table->timestamps();
      });

      Schema::table('read_texts', function ($table) {
        //set foreign keys
        $table->foreign('read_for_user')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('read_texts');
    }
}
