<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('age');
			$table->integer('blood_type_id')->unsigned();
			$table->string('bags_num');
			$table->string('hospital_name');
			$table->string('hospital_location');
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->integer('client_id')->unsigned();
			$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
			$table->integer('city_id')->unsigned();
			$table->string('phone');
			$table->text('notes');
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}