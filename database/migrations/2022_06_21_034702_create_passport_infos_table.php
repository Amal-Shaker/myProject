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
        Schema::create('passport_infos', function (Blueprint $table) {
            $table->string('name1');
            $table->string('name2');
            $table->string('name3');
            $table->string('name4');
            $table->string('passport_number', 9)->primary();
            $table->string('passport_expiry');
            $table->bigInteger('main_haj_sid')->unsigned()->index();
            $table->foreign('main_haj_sid')->references('main_haj_sid')->on('haj_accounts')->onDelete('cascade');
            $table->string('passport_image');
            $table->string('haj_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passport_infos');
    }
};
