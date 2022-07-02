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
        Schema::create('companions', function (Blueprint $table) {
            $table->id('sid');            
            $table->string('address');
            $table->string('name1');
            $table->string('name2');
            $table->string('name3');
            $table->string('name4');
            $table->string('gender');
            $table->string('mother_name');
            $table->string('area');
            $table->string('city');
            $table->string('street');
            $table->string('house_no');
            $table->string('mobile');
            $table->string('tel');
            $table->string('birth_place');
            $table->date('dob');
            $table->integer('social_status');
            $table->integer('age');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('main_haj_sid')->unsigned()->index();
            $table->foreign('main_haj_sid')->references('main_haj_sid')->on('haj_accounts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companions');
    }
};
