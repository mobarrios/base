<?php

use Illuminate\Database\Migrations\Migration;

class CreateObrassociales extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('obrassociales', function($newtable)
        {
		   $newtable->increments('id');
		   $newtable->string('name', 100);
		   $newtable->string('address', 100);
		   $newtable->string('city', 100);
		   $newtable->string('province', 100);
		   $newtable->string('zip_code', 100);
		   $newtable->string('telephone', 100);
		   $newtable->string('fax', 100);
		   $newtable->string('email', 100);
		   $newtable->string('cuit', 100);
		   $newtable->string('iva_conditions', 100);
		   $newtable->string('observations', 100);

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
		Schema::drop('obras_sociales');
	}
}