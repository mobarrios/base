<?php

use Illuminate\Database\Migrations\Migration;

class CreateSubmenus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('submenus', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->string('name', 200);
		   $newtable->string('icon', 100);
		   $newtable->integer('menu_id')->nullable()->unsigned();
		   $newtable->integer('module_id')->nullable()->unsigned();	

		   $newtable->timestamps();
		   $newtable->softDeletes();
		   
		   $newtable->foreign('menu_id')->references('id')->on('menus');
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
		Schema::drop('submenus');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}