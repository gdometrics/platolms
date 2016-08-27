<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayoutsTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('layouts', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
            $table->string('name');
            $table->string('columns');
            $table->string('sidebar_orientation')->nullable();
            $table->string('sidebar_side')->nullable();
            $table->string('sidebar_column')->nullable();
            $table->string('sidebar_break')->nullable();
            $table->string('column_one');
            $table->string('column_two')->nullable();
            $table->string('column_three')->nullable();
            $table->string('column_four')->nullable();
            $table->string('header')->nullable();
            $table->string('footer')->nullable();
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
		Schema::drop('layouts');
	}

}
