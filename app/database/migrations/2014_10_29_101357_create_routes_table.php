<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('routes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('route_type_id')->unsigned();
			$table->foreign('route_type_id')->references('id')->on('route_types')->onDelete('cascade')->onUpdate('cascade');
			$table->string('prefix');
			$table->integer('strip');
			$table->string('addbefore')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('routes');
	}

}
