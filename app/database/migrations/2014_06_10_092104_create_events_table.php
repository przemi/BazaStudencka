<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('events', function($t) {

            $t->increments('id');
            $t->integer('localization_id')->unsigned();
            $t->integer('user_id')->unsigned();
            $t->string('name');
            $t->text('info')->nullable();
            $t->datetime('date');
            $t->boolean('active')->default(1);
            $t->timestamps();

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('events');
	}

}
