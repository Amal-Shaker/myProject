<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('haj_accounts', function (Blueprint $table) {
            $table->id('main_haj_sid');
            $table->string('name1');
            $table->string('name2');
            $table->string('name3');
            $table->string('name4');
            $table->integer('status');
            $table->integer('region');
            $table->integer('season');
            $table->integer('haj_relationship');
            $table->string('gender');
            $table->string('mother_name');
            $table->string('area');
            $table->string('city');
            $table->string('street');
            $table->string('house_no');
            $table->string('mobile');
            $table->string('tel');
            $table->string('birth_place');
            $table->string('sid_muhrem');
            $table->date('dob');
            $table->integer('social_status');
            $table->integer('age');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('room_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('room_id')->references('room_id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('haj_accounts');
    }
};
