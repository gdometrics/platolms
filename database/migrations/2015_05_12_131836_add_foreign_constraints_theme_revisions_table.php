<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignConstraintsThemeRevisionsTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('theme_revisions', function($table)
		{
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('theme_id')->references('id')->on('templates')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('theme_revisions', function($table)
		{
            $table->dropForeign('account_id');
            $table->dropForeign('theme_id');
		});
	}

}
