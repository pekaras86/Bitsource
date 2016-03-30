<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('fId')->unsigned();
            $table->integer('eId')->unsigned();
            $table->string('tTitle');
            $table->integer('tTotalBids')->unsigned();
            $table->double('tAverageBids')->unsigned();
            $table->string('tCondition');
            $table->double('tBudget');
            $table->string('tDescription');
            $table->string('tSkills');
            $table->date('inStartDate');
            $table->date('inEndDate');
            $table->time('inStartTime');
            $table->time('inEndTime');
            
            $table->timestamps();

            $table->foreign('fId')->references('id')
                  ->on('freelancers')->onDelete('cascade');

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
        Schema::drop('tasks');
    }
}
