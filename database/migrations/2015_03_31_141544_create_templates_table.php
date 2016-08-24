<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('templates', function(Blueprint $table)
		{
			$table->increments('id');
            $table->mediumInteger('author_id')->unsigned();
            $table->mediumInteger('revision_id')->unsigned();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('desc');
            $table->string('filepath');
            $table->mediumInteger('price')->unsigned();
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
		Schema::drop('templates');
	}

}
