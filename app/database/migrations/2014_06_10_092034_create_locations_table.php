<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('localizations', function($t) {

            $t->increments('id');
            $t->integer('user_id')->unsigned();
            $t->string('name');
            $t->string('city');
            $t->string('street');
            $t->decimal('lat');
            $t->decimal('lng');
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
        Schema::drop('localizations');
	}

}
