<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuringMachinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('turing_machines', function($table) {
	        $table->increments('id');
	        $table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
	        $table->string('name', 40);
			$table->smallInteger('state');
			$table->text('description');
			$table->text('data');
			$table->timestamps();//Created_at y Updated_at
			$table->rememberToken();
    	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('turing_machines');
	}

}
