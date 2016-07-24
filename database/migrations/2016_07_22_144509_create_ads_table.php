<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eId')->unsigned();
            $table->string('adTitle');
            $table->string('adCompany');
            $table->string('adType');
            $table->string('adCity');
            $table->string('adStudies');
            $table->string('adDesc');
            $table->string('adProvisions');
            $table->string('adEmail');
            $table->string('adWebsite');
            
            $table->timestamps();

            $table->foreign('eId')->references('id')
                  ->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ads');
    }
}
