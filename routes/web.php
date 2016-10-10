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
Route::group(['namespace' => 'Admin', 'prefix' => env('ADMIN_URI'), 'middleware' => ['admin.access']], function () 
{

	// Dashboard
	Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

	// Accounts
	Route::group(['namespace' => 'Accounts', 'as' => 'admin.'], function () 
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
		Route::get('/admins', 'UsersController@admins')->name('admins.index');
		Route::get('/users/import/{type}', 'UsersController@importUsers')->name('users.import');
		Route::post('/users/import', 'UsersController@addMultipleUsers')->name('users.upload.multiple');
		Route::get('/users/{user}/authentication', 'UsersController@editAuth')->name('users.edit.auth');
		Route::post('/users/{user}/authentication', 'UsersController@updateAuth')->name('users.update.auth');
		Route::post('/users/{user}/avatar', 'UsersController@updateAvatar')->name('users.update.avatar');
		Route::post('/users/delete/multiple', 'UsersController@deleteMultipleUsers')->name('users.delete.multiple');
		Route::post('/users/attach/roles', 'UsersController@attachRoles')->name('users.attach.roles');
		Route::resource('users', 'UsersController');

	});

	// Site
	Route::group(['namespace' => 'Site', 'as' => 'admin.'], function () 
	{
		// Blog Categories
		Route::resource('categories', 'CategoriesController');
		// Site Pages
		Route::resource('sitepages', 'SitePagesController');
		// Blog Posts
		Route::resource('posts', 'PostsController');
		// Blog Replies
		Route::resource('replies', 'RepliesController');
		// Blog Tags
		Route::resource('tags', 'TagsController');
	});

	// Catalogue
	Route::group(['namespace' => 'Catalogue', 'as' => 'admin.'], function () 
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
	Route::group(['namespace' => 'Courses', 'as' => 'admin.'], function () 
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
Route::group(['namespace' => 'Portal', 'prefix' => env('PORTAL_URI'), 'middleware' => ['portal.access']], function () 
{

	// Dashboard
	Route::get('/', 'HomeController@dashboard')->name('portal.dashboard');

	// Account
	Route::group(['namespace' => 'Accounts', 'as' => 'portal.'], function () 
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
	Route::group(['namespace' => 'Courses', 'as' => 'portal.'], function () 
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

// File Routes
Route::get('avatars/{id}/{img}', function ($id, $img) {
    return \Image::make(storage_path() . '/app/uploads/' . $id . '/avatar/' . $img)->response();
});

Route::get('avatars/r/{id}/{img}', function ($id, $img) {
    $path = storage_path() . '/app/uploads/' . $id . '/avatar/';
	if (File::isDirectory($path . 'resized/') and $path . 'resized/') 
	{
	    return \Image::make($path . 'resized/' . $img)->response();
	}
    return \Image::make($path . $img)->response();
});

// Auth Routes
Auth::routes();
