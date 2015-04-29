<?php

use Illuminate\Database\Migrations\Migration;

class CreateSales extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->date('sale_date');
		   $newtable->integer('client_id')->nullable()->unsigned();
		   $newtable->float('amount');		   
		   $newtable->timestamps();
		   $newtable->softDeletes();
		   $newtable->foreign('client_id')->references('id')->on('clients');
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
		Schema::drop('sales');		
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}