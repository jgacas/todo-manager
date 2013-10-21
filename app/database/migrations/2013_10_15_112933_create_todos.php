<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTodos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('todos', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('title');
			$table->boolean('completed');
			$table->integer('importance');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->on_update('cascade')->on_delete('cascade');
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
		Schema::drop('todos');
	}

}