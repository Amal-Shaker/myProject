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
        Schema::create('haj_apps', function (Blueprint $table) {
            $table->id('id')->autoIncrement();
            $table->bigInteger('old_classid');
            $table->bigInteger('main_haj_sid')->unsigned()->index();; //make it as a foregin key or not
            $table->foreign('main_haj_sid')->references('main_haj_sid')->on('haj_accounts')->onDelete('cascade');
            $table->integer('season');
            $table->string('ip');
            $table->string('mabile_number');
            $table->string('address');
            $table->string('Company_name');
            $table->dateTime('regdate');
            $table->integer('app_haj_count');
            $table->text('companionList');
            $table->bigInteger('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('company_id')->on('company_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('haj_apps');
    }
};
