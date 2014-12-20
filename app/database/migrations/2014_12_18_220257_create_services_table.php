<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function($table) {

		    $table->increments('id');
		    $table->string('servname')->unique();
		    $table->string('servdesc');
		    $table->integer('cost_unit')->unsigned();
		    $table->string('unit');
		    $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('services');
	}

}
