<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseRevisionsTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_revisions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->string('title');
            $table->text('description');
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
		Schema::drop('course_revisions');
	}

}
