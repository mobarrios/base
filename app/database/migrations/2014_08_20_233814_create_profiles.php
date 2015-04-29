<?php

use Illuminate\Database\Migrations\Migration;

class CreateProfiles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function($newtable)
		{
			$newtable->increments('id');
			$newtable->string('profile', 500);
			
			$newtable->timestamps();
			$newtable->softDeletes();
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