<?php

use Illuminate\Database\Migrations\Migration;

class CreatePermissions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function($newtable)
		{
			$newtable->integer('module_id')->nullable()->unsigned();
			$newtable->integer('profile_id')->nullable()->unsigned();			
			$newtable->boolean('read');
			$newtable->boolean('edit');
			$newtable->boolean('delete');
			$newtable->boolean('add');

			$newtable->timestamps();
			$newtable->softDeletes();
			
			$newtable->foreign('module_id')->references('id')->on('modules');
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
		Schema::drop('permissions');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}