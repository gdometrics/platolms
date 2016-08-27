<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('email')->unique();
			$table->string('password', 60);
            $table->string('first');
            $table->string('last');
            $table->mediumText('bio');
            $table->text('img')->nullable();
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('address')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->integer('postal')->nullable();
            $table->string('state', 40)->nullable();
            $table->string('country', 40)->nullable();
            $table->string('timezone')->nullable();
            $table->string('phone')->nullable();
		    $table->string('stripe_id')->nullable();
		    $table->string('card_brand')->nullable();
		    $table->string('card_last_four')->nullable();
		    $table->timestamp('trial_ends_at')->nullable();
		    $table->ipAddress('ip')->nullable();
            $table->softDeletes();
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
