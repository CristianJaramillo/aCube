<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtSipPhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ext_sip_phones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->string('name')->unique();
			$table->string('secret')->default('acube');
			$table->string('accountcode')->unique();
			$table->integer('callgroup')->default(1)->unsigned();
			$table->integer('pickupgroup')->default(1)->unsigned();
			$table->string('mailbox');
			$table->string('callerid');
			$table->string('host')->default('dynamic');
			$table->enum('nat', array('comedia', 'force_rpost', 'no', 'yes'))->default('yes');
			$table->enum('type', array('friend', 'peer', 'user'))->default('friend');
			$table->string('context')->default('phones');
			$table->string('dtmfmode');
			$table->string('defaultuser');
			$table->string('fromdoiman');
			$table->enum('insecure', array('invite', 'no', 'port', 'port,invite'))->default('port,invite');
			$table->enum('language', array('en', 'es'))->default('es');
			$table->string('deny')->default('0.0.0.0/0.0.0.0');
			$table->string('permit')->default('0.0.0.0/0.0.0.0');
			$table->enum('qualify', array('no', 'yes'))->default('yes');
			$table->string('mohsuggest')->default('default');
			$table->string('setvar');
			$table->string('disallow')->default('all');
			$table->string('allow')->default('g729;ulaw;alaw');
			$table->enum('callcounter', array('no','yes'))->default('yes');
			$table->integer('calllimit')->default(99);
			$table->integer('ringtime')->default(20);
			$table->enum('getintercomed', array('no', 'yes'))->default('yes');
			$table->enum('forwardvoicemail', array('no', 'yes'))->default('yes');
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
		Schema::dropIfExists('ext_sip_phones');
	}

}
