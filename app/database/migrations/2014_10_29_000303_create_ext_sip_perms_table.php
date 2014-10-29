<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtSipPermsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ext_sip_perms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ext_sip_phone_id')->unsigned();
			$table->foreign('ext_sip_phone_id')->references('id')->on('ext_sip_phone')->onDelete('cascade')->onUpdate('cascade');
			$table->enum('perm', array('no', 'password', 'yes'))->default('yes');
			$table->string('password');
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
		Schema::drop('ext_sip_perms');
	}

}
