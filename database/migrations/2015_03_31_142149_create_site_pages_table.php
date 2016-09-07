<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitePagesTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('site_pages', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('layout_id')->unsigned();
            $table->integer('top_panel')->nullable();
            $table->integer('bottom_panel')->nullable();
            $table->integer('left_panel')->nullable();
            $table->integer('right_panel')->nullable();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('page_content');
            $table->text('featured_video');
            $table->text('featured_image');
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
		Schema::drop('site_pages');
	}

}
