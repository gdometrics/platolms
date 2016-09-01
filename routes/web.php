<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', 'WelcomeController@index')->name('welcome');

// Public Blog Routes

// Logged In User Routes
Route::group(['namespace' => 'Admin', 'prefix' => env('ADMIN_URI')], function () 
{

	// Dashboard
	Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

	// Accounts
	Route::group(['namespace' => 'Accounts'], function () 
	{
		// Invoices
		Route::resource('invoices', 'InvoicesController');
		// Roles
		Route::resource('roles', 'RolesController');
		// Students
		Route::resource('students', 'StudentsController');
		// Transcripts
		Route::resource('transcripts', 'TranscriptsController');
		// Users
		Route::resource('users', 'UsersController');
	});

	// Blog
	Route::group(['namespace' => 'Blogs'], function () 
	{
		// Categories
		Route::resource('categories', 'CategoriesController');
		// Posts
		Route::resource('posts', 'PostsController');
		// Replies
		Route::resource('replies', 'RepliesController');
		// Tags
		Route::resource('tags', 'TagsController');
	});

	// Catalogue
	Route::group(['namespace' => 'Catalogue'], function () 
	{
		// Catalogues
		Route::resource('catalogues', 'CataloguesController');
		// Majors
		Route::resource('majors', 'MajorsController');
		// Majors
		Route::resource('minors', 'MinorsController');
		// Semesters
		Route::resource('semesters', 'SemestersController');
	});

	// Courses
	Route::group(['namespace' => 'Courses'], function () 
	{
		// Articles
		Route::resource('articles', 'ArticlesController');
		// Assets
		Route::resource('assets', 'AssetsController');
		// Assignments
		Route::resource('assignments', 'AssignmentsController');
		// Chat
		Route::resource('chats', 'ChatsController');
		// Conversations
		Route::resource('conversations', 'ConversationsController');
		// Courses
		Route::resource('courses', 'CoursesController');
		// Grading
		Route::resource('grading', 'GradingController');
		// Layouts
		Route::resource('layouts', 'LayoutsController');
		// Lessons
		Route::resource('lessons', 'LessonsController');
		// Modules
		Route::resource('modules', 'ModulesController');
		// Pages
		Route::resource('pages', 'PagesController');
		// Resources
		Route::resource('resources', 'ResourcesController');
		// Syllabus
		Route::resource('syllabus', 'SyllabusController');
		// Templates
		Route::resource('templates', 'TemplatesController');
		// Testing
		Route::resource('testing', 'TestingsController');
	});

});

// Logged In User Routes
Route::group(['namespace' => 'Portal', 'prefix' => env('PORTAL_URI')], function () 
{

	// Dashboard
	Route::get('/', 'HomeController@dashboard')->name('portal.dashboard');

	// Account
	Route::group(['namespace' => 'Accounts'], function () 
	{
		// Catalogues
		Route::resource('catalogues', 'CataloguesController', ['only' => ['index', 'show']]);
		// Majors
		Route::resource('majors', 'MajorsController', ['only' => ['index', 'show']]);
		// Profiles
		Route::resource('profiles', 'ProfilesController', ['only' => ['show', 'edit', 'update']]);
		// Semesters
		Route::resource('semesters', 'SemestersController', ['only' => ['index', 'show']]);
	});

	// Courses
	Route::group(['namespace' => 'Courses'], function () 
	{
		// Articles
		Route::resource('articles', 'ArticlesController', ['only' => ['index', 'show']]);
		// Assets
		Route::resource('assets', 'AssetsController', ['only' => ['index', 'show']]);
		// Assignments
		Route::resource('assignments', 'AssignmentsController', ['only' => ['index', 'show']]);
		// Chat
		Route::resource('chats', 'ChatsController', ['only' => ['index', 'show']]);
		// Conversations
		Route::resource('conversations', 'ConversationsController', ['only' => ['index', 'show']]);
		// Courses
		Route::resource('courses', 'CoursesController', ['only' => ['index', 'show']]);
		// Grading
		Route::resource('grading', 'GradingController', ['only' => ['index', 'show']]);
		// Layouts
		Route::resource('layouts', 'LayoutsController', ['only' => ['index', 'show']]);
		// Lessons
		Route::resource('lessons', 'LessonsController', ['only' => ['index', 'show']]);
		// Modules
		Route::resource('modules', 'ModulesController', ['only' => ['index', 'show']]);
		// Pages
		Route::resource('pages', 'PagesController', ['only' => ['index', 'show']]);
		// Resources
		Route::resource('resources', 'ResourcesController', ['only' => ['index', 'show']]);
		// Syllabus
		Route::resource('syllabus', 'SyllabusController', ['only' => ['index', 'show']]);
		// Testing
		Route::resource('testing', 'TestingsController', ['only' => ['index', 'show']]);
	});

});

Route::get('/home', 'Portal\HomeController@index')->name('home');

// Auth Routes
Auth::routes();
