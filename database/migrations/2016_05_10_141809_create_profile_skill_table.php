<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_skill', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('pId')->unsigned();
            $table->integer('sId')->unsigned();

            $table->timestamps();

            $table->foreign('pId')->references('id')
                  ->on('profiles')->onDelete('cascade');

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
        Schema::drop('profile_skill');
    }
}
