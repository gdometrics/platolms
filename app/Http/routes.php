<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

	Route::get('/', 'WelcomeController@index');

	/** ------------------------------------------
	 *  Page Routes -> Defined specific pages
	 *  ------------------------------------------
	 */
	
		Route::get('/sitemap', ['as' => 'pages.index', 'uses' => 'SitePagesController@index']);
		Route::get('/contact', ['as' => 'pages.contact', 'uses' => 'SitePagesController@contact']);
		Route::post('/contact', ['as' => 'contact.submit', 'uses' => 'SitePagesController@processContact']);
		Route::get('/about', ['as' => 'pages.about', 'uses' => 'SitePagesController@about']);
		Route::get('/features', ['as' => 'pages.features', 'uses' => 'SitePagesController@features']);
		Route::get('/courses', ['as' => 'pages.courses', 'uses' => 'SitePagesController@courses']);
		Route::get('/courses/kids', ['as' => 'pages.courses.kids', 'uses' => 'SitePagesController@coursesKids']);
		Route::get('/courses/teens', ['as' => 'pages.courses.teens', 'uses' => 'SitePagesController@coursesTeens']);
		Route::get('/tracks', ['as' => 'pages.courses.tracks', 'uses' => 'SitePagesController@tracks']);
		Route::get('/faq', ['as' => 'pages.faq', 'uses' => 'SitePagesController@faq']);
		Route::get('/terms', ['as' => 'pages.terms', 'uses' => 'SitePagesController@terms']);
		Route::get('/charterschools', ['as' => 'pages.charterschools', 'uses' => 'SitePagesController@charterSchools']);
		Route::post('/charterschools', ['as' => 'charterschools.submit', 'uses' => 'SitePagesController@processCharterSchools']);

		Route::post('/register', ['as' => 'courses.registration', 'uses' => 'RegistrationController@registration']);

		Route::get('/blog', ['as' => 'pages.blog', 'uses' => 'BlogsController@index']);
		Route::get('/blog/{slug}', ['as' => 'pages.show', 'uses' => 'BlogsController@show']);

				
	// Route::get('home', 'HomeController@index');

    
	/** ------------------------------------------
	 *   Sessions and Signup
	 *  ------------------------------------------
	 */

	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);


    /** ------------------------------------------
	 *  App Routes - php artisan make:controller PhotoController / http://laravel.com/docs/5.0/controllers#restful-resource-controllers
        Route::resource('photo', 'PhotoController'); / Route::resource('photos.comments', 'PhotoCommentController'); - photos/{photos}/comments/{comments}
	 *  ------------------------------------------
	 */
		Route::group(['prefix' => 'admin'], function()
		{
            #  Account Routes
            Route::resource('account', 'Admin\Accounts\AccountController');
            # Blog Routes
            Route::resource('blog', 'Admin\Blog\BlogsController');
            # Templates Routes
            Route::resource('templates', 'Admin\Course\TemplatesController');
            # Layouts Routes
            Route::resource('layouts', 'Admin\Course\LayoutsController');
            # Catalogue Routes
            Route::resource('catalogue', 'Admin\Catalogue\CatalogueController');
            # Course Routes
            Route::resource('catalogue.course', 'Admin\Course\CourseController');
                # Course Articles
                Route::resource('catalogue.course', 'Admin\Course\CourseController');
                # Conversations Articles
                Route::resource('catalogue.course.conversation', 'Admin\Course\ConversationsController');
                # Chat Routes
                Route::resource('catalogue.course.chat', 'Admin\Course\ChatController');
                # Exam Routes
                Route::resource('catalogue.course.exam', 'Admin\Course\TestingController');
                # Syllabus Routes
                Route::resource('catalogue.course', 'Admin\Course\CourseController');
                # Lesson Routes
                Route::resource('catalogue.course.lesson', 'Admin\Courses\LessonsController');
                    # Lesson Assignments
                    Route::resource('catalogue.course.lesson.module', 'Admin\Courses\AssignmentsController');
                    # Lesson Resources
                    Route::resource('catalogue.course.lesson.resources', 'Admin\Courses\ResourcesController');
                    # Test Routes
                    Route::resource('catalogue.course.lesson.testing', 'Admin\Courses\TestingController');
                    # Grading Routes
                    Route::resource('catalogue.course.lesson.grading', 'Admin\Courses\GradingController');
                    # Module Routes
                    Route::resource('catalogue.course.lesson.module', 'Admin\Courses\ModulesController');
                        # Quiz Routes
                        Route::resource('catalogue.course.lesson.module.quiz', 'Admin\Courses\TestingController');
                        # Page Routes
                        Route::resource('catalogue.course.lesson.module.page', 'Admin\Courses\PagesController');
                        # Asset Routes
                        Route::resource('catalogue.course.lesson.module.asset', 'Admin\Courses\AssetsController');
        });


    /** ------------------------------------------
	 *  Front End - Routes - Route::group(['domain' => '{account}.myapp.com'], function(){   Route::get('user/{id}', function($account, $id){});   });
	 *  ------------------------------------------
     */
        Route::group(['prefix' => 'portal'], function()
        {
            # Dashboard
            Route::resource('dashboard', 'Portal\DashboardController');
            # Catalogue
            Route::resource('catalogue', 'Portal\Catalogue\CatalogueController');
            # My Courses
            Route::resource('course', 'Portal\Course\CoursesController');
                # Exam
                Route::resource('course.exam', 'Portal\Course\TestingController');
                # Grades
                Route::resource('course.grade', 'Portal\Course\GradingController');
                # Syllabus
                Route::resource('course.syllabus', 'Portal\Course\SyllabusController');
                # Chat
                Route::resource('course.chat', 'Portal\Course\ChatController');
                # Conversations Articles
                Route::resource('course.articles', 'Portal\Course\ConversationsController');
                # Lessons
                Route::resource('course.lesson', 'Portal\Course\LessonsController');
                    # Assignments
                    Route::resource('course.lesson.assignment', 'Portal\Course\AssignmentsController');
                    # Test
                    Route::resource('course.lesson.test', 'Portal\Course\TestingController');
                    # Resouces
                    Route::resource('course.lesson.resource', 'Portal\Course\ResourcesController');
                    # Modules
                    Route::resource('course.lesson.module', 'Portal\Course\ModulesController');
                        # Pages
                        Route::resource('course.lesson.module.page', 'Portal\Course\PagesController');
                        # Quiz
                        Route::resource('course.lesson.module.quiz', 'Portal\Course\TestingController');
        });


