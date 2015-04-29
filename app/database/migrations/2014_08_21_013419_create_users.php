<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->string('name', 100);
		   $newtable->string('last_name', 100);
		   $newtable->string('email', 100);
		   $newtable->string('password', 500);
		   $newtable->string('remember_token', 500);
		   $newtable->integer('profile_id')->nullable()->unsigned();

		   $newtable->timestamps();
		   $newtable->softDeletes();
		   
		   $newtable->foreign('profile_id')->references('id')->on('profiles');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::drop('users');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}