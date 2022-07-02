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
        Schema::create('tafwijs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->dateTime('dateTime');
            $table->tinyInteger('type')->default(0);
            $table->bigInteger('sid')->unsigned()->index();                                                                       //make it as a foregin key or not
            $table->foreign('sid')->references('main_haj_sid')->on('haj_accounts')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tafwijs');
    }
};
