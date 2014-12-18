<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeventsTable extends Migration {

	/* Run the migrations */
	public function up()
	{
		Schema::create('hevents', function($table) {

		    $table->increments('id');
			$table->date('event_date');
		    $table->integer('participants')->unsigned();
			$table->integer('units')->unsigned();
		    $table->boolean('is_complete')->default(0);
			$table->date('completed_date')->nullable();
			$table->integer('user_id')->unsigned(); # Important! FK has to be unsigned because the PK it will reference is auto-incrementing
			$table->integer('service_id')->unsigned(); # Important! FK has to be unsigned because the PK it will reference is auto-incrementing
		    $table->timestamps();
		    # Foreign keys
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('service_id')->references('id')->on('services');
		});
	}

	/* Reverse the migrations */
	public function down()
	{
		Schema::drop('hevents');
	}

}
