<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteWidgetsTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('site_widgets', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('site_widget_type')->unsigned();
            $table->string('name');
            $table->text('content')->nullable();
            $table->text('options')->nullable();
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
		Schema::drop('site_widgets');
	}

}
