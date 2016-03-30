<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancerTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_task', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('tId')->unsigned();
            $table->integer('fId')->unsigned();
            $table->string('mbComment');
            $table->double('mbBid');
            $table->date('mbDate');
            $table->time('mbTime');

            $table->timestamps();

            $table->foreign('tId')->references('id')
                  ->on('tasks')->onDelete('cascade');

            $table->foreign('fId')->references('id')
                  ->on('freelancers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('freelancer_task');
    }
}
