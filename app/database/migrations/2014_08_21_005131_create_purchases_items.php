<?php

use Illuminate\Database\Migrations\Migration;

class CreatePurchasesItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases_items', function($newtable)
        {		  
           $newtable->increments('id'); 
           $newtable->integer('purchase_id')->nullable()->unsigned();
           $newtable->integer('purchase_temporal_id')->nullable()->unsigned();
           $newtable->integer('item_id')->nullable()->unsigned();
		   $newtable->integer('quantity');
		   $newtable->float('discount');
		   $newtable->float('price_per_unit');		   		   
		   $newtable->timestamps();
		   $newtable->softDeletes();
		   $newtable->foreign('purchase_id')->references('id')->on('purchases');
		   $newtable->foreign('purchase_temporal_id')->references('id')->on('purchases_temporal');
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
		Schema::drop('purchases_items');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}