<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserDashboardConfigsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_dashboard_configs', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->foreign('id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->string('breadcrumbs');
			$table->boolean('no_main_header')->default(false);
			$table->string('page_body_prop');
			$table->string('page_html_prop');
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
		Schema::dropIfExists('user_dashboard_configs');
	}

}
