<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokerhandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pokerhands', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('owner')->unsigned();
			$table->string('firstCard');
			$table->string('secondCard');
			$table->string('thirdCard');
			$table->string('fourthCard');
			$table->string('fifthCard');
			$table->text('description');
			$table->timestamps();
		});

		Schema::table('pokerhands', function(Blueprint $table)
		{
			$table->foreign('owner')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pokerhands');
	}

}
