<?php

use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTemporal extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases_temporal', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->date('purchase_date');		   
		   $newtable->float('amount');
		   $newtable->integer('provider_id')->nullable()->unsigned();
		   $newtable->integer('purchase_id')->nullable()->unsigned();
		   $newtable->timestamps();
		   $newtable->softDeletes();
		   $newtable->foreign('provider_id')->references('id')->on('providers');
		   $newtable->foreign('purchase_id')->references('id')->on('purchases');
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
		Schema::drop('purchases_temporal');		
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}