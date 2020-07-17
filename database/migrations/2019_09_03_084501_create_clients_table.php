<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('phone');
			$table->string('password');
			$table->string('email');
			$table->date('birth_date');
			$table->date('last_donate');
			$table->integer('city_id')->unsigned();
			$table->integer('blood_type_id')->unsigned();
			$table->string('pin_code')->nullable();
			$table->string('api_token', 60)->unique()->nullable();

		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}