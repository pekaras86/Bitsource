<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('email')->unique();
            $table->string('password', 60);
            
            $table->string('uFName')->nullable();
            $table->string('uLName')->nullable();
            $table->string('uLocation')->nullable();
            $table->string('uCategory')->nullable();
            $table->string('uTitle')->nullable();
            $table->longText('uDescription')->nullable();
            $table->string('uSkills')->nullable();
            $table->integer('uSalary')->unsigned();
            $table->string('uPortfolio')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
