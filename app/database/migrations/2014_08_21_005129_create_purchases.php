<?php

use Illuminate\Database\Migrations\Migration;

class CreatePurchases extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->date('purchase_date');
		   $newtable->integer('provider_id')->nullable()->unsigned();
		   $newtable->float('amount');		   
		   $newtable->timestamps();
		   $newtable->softDeletes();
		   $newtable->foreign('provider_id')->references('id')->on('providers');
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
		Schema::drop('purchases');		
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}