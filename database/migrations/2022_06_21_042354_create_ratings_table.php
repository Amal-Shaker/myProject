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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('id') ;
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('company_id')->on('company_accounts')->onDelete('cascade');
             $table->bigInteger('haj_id')->unsigned();    
            $table->foreign('haj_id')->references('main_haj_sid')->on('haj_accounts')->onDelete('cascade');;
             $table->string('rating_note')->default('');
            $table->integer('rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
};
