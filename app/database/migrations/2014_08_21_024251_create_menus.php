<?php

use Illuminate\Database\Migrations\Migration;

class CreateMenus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->string('name', 200);
		   $newtable->string('icon', 100);
		   $newtable->integer('module_id')->nullable()->unsigned();	

		   $newtable->timestamps();
		   $newtable->softDeletes();
		   
		   $newtable->foreign('module_id')->references('id')->on('modules');
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
		Schema::drop('menus');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}