<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostRepliesTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_replies', function(Blueprint $table)
		{
			$table->increments('id');
            $table->mediumInteger('author_id')->unsigned();
            $table->mediumInteger('post_id')->unsigned();
            $table->string('title');
            $table->text('content');
            $table->text('attachment');
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
		Schema::drop('post_replies');
	}

}
