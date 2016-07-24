<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_skill', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('aId')->unsigned();
            $table->integer('sId')->unsigned();

            $table->timestamps();

            $table->foreign('aId')->references('id')
                  ->on('ads')->onDelete('cascade');

            $table->foreign('sId')->references('id')
                  ->on('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ad_skill');
    }
}
