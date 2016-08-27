<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDropboxesTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dropboxes', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
            $table->integer('lesson_id')->unsigned();
            $table->mediumInteger('assignment_id')->unsigned();
            $table->mediumInteger('user_id')->unsigned();
            $table->text('message')->nullable();
            $table->string('filepath');
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
		Schema::drop('dropboxes');
	}

}
