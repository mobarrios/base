<?php

use Illuminate\Database\Migrations\Migration;

class CreateItemsCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items_categories', function($newtable)
        {		   
           $newtable->increments('id');
           $newtable->integer('items_id')->nullable()->unsigned();
		   $newtable->integer('categories_id')->nullable()->unsigned();
		   		   
		   $newtable->timestamps();
		   $newtable->softDeletes();
		   
		   $newtable->foreign('items_id')->references('id')->on('items')->onDelete('cascade');
		   $newtable->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
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
		Schema::drop('items_categories');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}