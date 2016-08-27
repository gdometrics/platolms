<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalsTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('finals', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->string('title');
            $table->date('due')->nullable();
            $table->mediumInteger('possible')->unsigned()->nullable();
            $table->softDeletes();
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
		Schema::drop('finals');
	}

}
