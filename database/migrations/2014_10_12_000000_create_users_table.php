<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('sex')->nullable();
            $table->date('birthday')->nullable();
            $table->integer('age')->nullable();
            $table->string('birthplace')->nullable();
            $table->bigInteger('height')->unsigned()->nullable();
            $table->bigInteger('weight')->unsigned()->nullable();
            $table->string('skill')->nullable();
            $table->string('influence')->nullable();
            $table->string('background')->nullable();
            $table->string('hobby')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('blog')->nullable();
            $table->text('PR')->nullable();

            
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
