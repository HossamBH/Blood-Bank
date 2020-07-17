<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone');
			$table->string('email');
			$table->string('fb_link');
			$table->string('twitter_link');
			$table->string('youtube_link');
			$table->string('wapp_link');
			$table->string('insta_link');
			$table->string('gmail_link');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}