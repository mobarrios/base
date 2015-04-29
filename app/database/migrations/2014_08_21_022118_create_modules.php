<?php

use Illuminate\Database\Migrations\Migration;

class CreateModules extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modules', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->string('name', 200);

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
		Schema::drop('modules');
	}

}