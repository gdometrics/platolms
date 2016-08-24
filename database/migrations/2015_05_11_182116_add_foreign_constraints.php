<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignConstraints extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		// FIRST
		$add_account_foreign_key = ['catalogues', 'semesters', 'courses', 'lessons', 'modules', 'pages', 'templates', 'resources', 'assets', 'dropboxes', 'scores', 'quizzes', 'questions', 'attempts', 'conversations', 'articles', 'grades', 'finals', 'syllabi', 'majors', 'minors', 'layouts', 'receipts', 'transcripts', 'logs', 'records', 'semester_types', 'assignment_types'];
		foreach ($add_account_foreign_key as $table_name)
		{
			Schema::table($table_name, function($table)
			{
				$table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
			});
		}

		// NEXT
		$add_account_lesson_foreign_key = ['chats'];
 		foreach ($add_account_lesson_foreign_key as $table_name)
		{
			Schema::table($table_name, function($table)
			{
	            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
	            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
			});
		}

		// NEXT
		$add_assignments_foreign_key = ['assignments'];
		foreach ($add_assignments_foreign_key as $table_name)
		{
			Schema::table($table_name, function($table)
			{
	            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
	            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
	            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
			});
		}

		
		// NEXT
		$add_replies_foreign_key = ['replies'];
		foreach ($add_replies_foreign_key as $table_name)
		{
			Schema::table($table_name, function($table)
			{
	            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
	            $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('cascade');
	            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
	            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');
			});
		}
        
        
        // NEXT
		$add_course_revisions_foreign_key = ['course_revisions'];
		foreach ($add_course_revisions_foreign_key as $table_name)
		{
			Schema::table($table_name, function($table)
			{
	            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
	            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			});
		}
            



	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// FIRST
		$add_account_foreign_key = ['catalogues', 'semesters', 'courses', 'lessons', 'modules', 'pages', 'templates', 'resources', 'assets', 'dropboxes', 'scores', 'quizzes', 'questions', 'attempts', 'conversations', 'articles', 'grades', 'finals', 'syllabi', 'majors', 'minors', 'layouts', 'receipts', 'transcripts', 'logs', 'records', 'semester_types', 'assignment_types'];
		foreach ($add_account_foreign_key as $table_name)
		{
			Schema::table($table_name, function($table)
			{
				$table->dropForeign('account_id');
			});
		}
		

		// NEXT
		$add_account_lesson_foreign_key = ['chats'];
 		foreach ($add_account_lesson_foreign_key as $table_name)
		{
			Schema::table($table_name, function($table)
			{
	            $table->dropForeign('account_id');
	            $table->dropForeign('lesson_id');
			});
		}


		// NEXT
		$add_assignments_foreign_key = ['assignments'];
		foreach ($add_assignments_foreign_key as $table_name)
		{
			Schema::table($table_name, function($table)
			{
	            $table->dropForeign('account_id');
	            $table->dropForeign('course_id');
	            $table->dropForeign('lesson_id');
			});
		}

		
		// NEXT
		$add_replies_foreign_key = ['replies'];
		foreach ($add_replies_foreign_key as $table_name)
		{
			Schema::table($table_name, function($table)
			{
	            $table->dropForeign('account_id');
	            $table->dropForeign('conversation_id');
	            $table->dropForeign('article_id');
	            $table->dropForeign('chat_id');
			});
		}
        
        
        // NEXT
		$add_course_revisions_foreign_key = ['course_revisions'];
		foreach ($add_course_revisions_foreign_key as $table_name)
		{
			Schema::table($table_name, function($table)
			{
	            $table->dropForeign('account_id');
	            $table->dropForeign('course_id');
			});
		}
            
	}

}
