<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uId')->unsigned(); 
            $table->string('pLocation')->nullable();
            $table->string('pCategory')->nullable();
            $table->string('pTitle')->nullable();
            $table->longText('pDescription')->nullable();
            $table->string('pSkills')->nullable();
            $table->integer('pSalary')->unsigned();
            $table->string('pPortfolio')->nullable();
            $table->timestamps();

            $table->foreign('uId')->references('id')
                      ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }
}
