<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeFreelancerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_freelancer', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('fId')->unsigned();
            $table->integer('eId')->unsigned();
            $table->string('rTitle');
            $table->string('rComment');
            $table->date('rDate');
            $table->time('rTime');

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
        Schema::drop('employee_freelancer');
    }
}
