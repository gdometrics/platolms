<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitePageLayoutsTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('site_page_layouts', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
            $table->string('name');
            $table->integer('page_content')->nullable();
            $table->string('top_panel')->nullable();
            $table->string('bottom_panel')->nullable();
            $table->string('left_panel')->nullable();
            $table->string('right_panel')->nullable();
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
		Schema::drop('site_page_layouts');
	}

}
