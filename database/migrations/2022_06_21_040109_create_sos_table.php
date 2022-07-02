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
        Schema::create('sos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sid')->unsigned(); //make it as a foregin key or not
            $table->foreign('sid')->references('main_haj_sid')->on('haj_accounts')->onDelete('cascade');
            $table->string('address');
            $table->integer('isFinish')->default(0);
            $table->string('latitude');
            $table->string('longitude');
            $table->bigInteger('company_id')->unsigned();
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
        Schema::dropIfExists('sos');
    }
};
