<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_task', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('sId')->unsigned();
            $table->integer('tId')->unsigned();

            $table->timestamps();

            $table->foreign('sId')->references('id')
                  ->on('skills')->onDelete('cascade');

            $table->foreign('tId')->references('id')
                  ->on('tasks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skill_task');
    }
}
