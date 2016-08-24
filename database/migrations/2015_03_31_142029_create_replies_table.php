<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('replies', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->integer('lesson_id')->unsigned();
            $table->mediumInteger('author_id')->unsigned();
            $table->integer('conversation_id')->unsigned()->nullable();
            $table->integer('article_id')->unsigned()->nullable();
            $table->integer('chat_id')->unsigned()->nullable();
            $table->string('title');
            $table->text('content');
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
		Schema::drop('replies');
	}

}
