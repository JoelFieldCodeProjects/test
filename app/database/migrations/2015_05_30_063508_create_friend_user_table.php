<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('friends_users', function($table) {
 			$table->increments('id');
 			$table->integer('user_id'); // foreign key
 			$table->integer('friend_id'); // foreign key
 			/* $table->integer('total')->default(0); */
});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('friends_users');
	}

}
