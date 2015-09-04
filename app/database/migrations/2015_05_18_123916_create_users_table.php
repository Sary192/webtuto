<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
	        $table->increments('id');
	        $table->string('name', 40);
			$table->string('surname1', 50);
			$table->string('surname2', 50);
			$table->string('email', 200)->unique();
	        $table->string('password');
	        $table->smallInteger('role');
			$table->tinyInteger('activated');
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
		Schema::drop('users');
	}

}
