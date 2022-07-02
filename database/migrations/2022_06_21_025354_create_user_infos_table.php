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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id('sid',9);
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
};
