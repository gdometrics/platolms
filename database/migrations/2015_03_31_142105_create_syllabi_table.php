<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSyllabiTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('syllabi', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->text('content')->nullable();
            $table->text('attachment')->nullable();
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
		Schema::drop('syllabi');
	}

}
