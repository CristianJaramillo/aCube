<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNavigationAppsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('navigation_apps', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('title');
			$table->string('url');
			$table->string('url_target')->nullable();
			$table->string('icon')->nullable();
			$table->string('label_htm')->nullable();
			$table->string('sub')->nullable();
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
		Schema::dropIfExists('navigation_apps');
	}

}
