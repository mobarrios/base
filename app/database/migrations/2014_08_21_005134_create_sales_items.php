<?php

use Illuminate\Database\Migrations\Migration;

class CreateSalesItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_items', function($newtable)
        {		  
           $newtable->increments('id'); 
           $newtable->integer('sale_id')->nullable()->unsigned();
           $newtable->integer('sale_temporal_id')->nullable()->unsigned();
           $newtable->integer('item_id')->nullable()->unsigned();
		   $newtable->integer('quantity');
		   $newtable->float('discount');
		   $newtable->float('price_per_unit');		   		   
		   $newtable->timestamps();
		   $newtable->softDeletes();
		   $newtable->foreign('sale_id')->references('id')->on('sales');
		   $newtable->foreign('sale_temporal_id')->references('id')->on('sales_temporal');
		   $newtable->foreign('item_id')->references('id')->on('items');
		  
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
		Schema::drop('sales_items');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}