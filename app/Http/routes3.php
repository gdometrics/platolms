<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

    # Home Page
    Route::get('/', 'WelcomeController@index');
    
	/** ------------------------------------------
	 *   Sessions and Signup
	 *  ------------------------------------------
	 */
        Route::controllers([
            'auth' => 'Auth\AuthController',
            'password' => 'Auth\PasswordController',
        ]);


    /** ------------------------------------------
	 *  App Routes
	 *  ------------------------------------------
	 */
		Route::group(['prefix' => 'admin'], function()
		{

            #  Account Routes
            Route::group(['prefix' => 'account'], function()
            {
                Route::get('/{id}', ['as' => 'app.account.show', 'uses' => 'Accounts\AccountController@show']);
            });

            # Blog Routes
            Route::group(['prefix' => 'blog'], function()
            {
                Route::get('/all', ['as' => 'app.blog.posts', 'uses' => 'Blog\BlogsController@posts']);
                Route::get('/{slug}/create', ['as' => 'app.blog.creat', 'uses' => 'Blog\BlogsController@create']);
                Route::post('/{slug}/store', ['as' => 'app.blog.storee', 'uses' => 'Blog\BlogsController@store']);
                Route::get('/{slug}/edit', ['as' => 'app.blog.edit', 'uses' => 'Blog\BlogsController@edit']);
                Route::post('/{slug}/image', ['as' => 'app.blog.image', 'uses' => 'Blog\BlogsController@image']);
                Route::post('/{slug}/update', ['as' => 'app.blog.update', 'uses' => 'Blog\BlogsController@update']);
                Route::post('/{slug}/destroy', ['as' => 'app.blog.destroy', 'uses' => 'Blog\BlogsController@destroy']);
                Route::post('/{slug}/restore', ['as' => 'app.blog.restore', 'uses' => 'Blog\BlogsController@restore']);
            });
            
            # Catalogue Routes
            Route::group(['prefix' => 'catalogue'], function()
            {
                Route::get('/', ['as' => 'app.catalogue.index', 'uses' => 'Catalogue\CatalogueController@index']);
                Route::get('/{id}/create', ['as' => 'app.catalogue.create', 'uses' => 'Catalogue\BlogsController@create']);
                Route::post('/{id}/store', ['as' => 'app.catalogue.store', 'uses' => 'Catalogue\BlogsController@store']);
                Route::get('/{id}', ['as' => 'app.catalogue.show', 'uses' => 'Catalogue\CatalogueController@show']);
                Route::get('/{id}/edit', ['as' => 'app.catalogue.edit', 'uses' => 'Catalogue\CatalogueController@edit']);
                Route::post('/{id}/image', ['as' => 'app.catalogue.image', 'uses' => 'Catalogue\CatalogueController@image']);
                Route::post('/{id}/update', ['as' => 'app.catalogue.update', 'uses' => 'Catalogue\CatalogueController@update']);
                Route::post('/{id}/destroy', ['as' => 'app.catalogue.destroy', 'uses' => 'Catalogue\CatalogueController@destroy']);
                Route::post('/{id}/restore', ['as' => 'app.catalogue.restore', 'uses' => 'Catalogue\CatalogueController@restore']);
            });
            
            # Course Routes
            Route::group(['prefix' => 'courses'], function()
            {
                Route::get('/', ['as' => 'app.course.index', 'uses' => 'Courses\CourseController@index']);
                Route::get('/{id}/create', ['as' => 'app.course.create', 'uses' => 'Courses\CourseController@create']);
                Route::post('/{id}/store', ['as' => 'app.course.store', 'uses' => 'Courses\CourseController@store']);
                Route::get('/{id}', ['as' => 'app.course.show', 'uses' => 'Courses\CourseController@show']);
                Route::get('/{id}/edit', ['as' => 'app.course.edit', 'uses' => 'Courses\CourseController@edit']);
                Route::post('/{id}/image', ['as' => 'app.course.image', 'uses' => 'Courses\CourseController@image']);
                Route::post('/{id}/update', ['as' => 'app.course.update', 'uses' => 'Courses\CourseController@update']);
                Route::post('/{id}/destroy', ['as' => 'app.course.destroy', 'uses' => 'Courses\CourseController@destroy']);
                Route::post('/{id}/restore', ['as' => 'app.course.restore', 'uses' => 'Courses\CourseController@restore']);
                # Course Articles
                Route::post('/{id}/articles', ['as' => 'app.course.index', 'uses' => 'Courses\ArticlesController@index']);
                # Conversations Articles
                # Chat Routes
                # Exam Routes
                # Templates Routes
                # Layout Routes
                # Syllabus Routes

                    # Lesson Routes
                    Route::get('/lessons/all', ['as' => 'app.lesson.index', 'uses' => 'Courses\LessonsController@index']);
                    Route::get('/{id}/lessons/create', ['as' => 'app.lesson.create', 'uses' => 'Courses\LessonsController@create']);
                    Route::post('/{id}/lessons/store', ['as' => 'app.lesson.store', 'uses' => 'Courses\LessonsController@store']);
                    Route::get('/{id}/{lessonid}', ['as' => 'app.lesson.show', 'uses' => 'Courses\LessonsController@show']);
                    Route::get('/{id}/{lessonid}/edit', ['as' => 'app.lesson.edit', 'uses' => 'Courses\LessonsController@edit']);
                    Route::post('/{id}/{lessonid}/image', ['as' => 'app.lesson.image', 'uses' => 'Courses\LessonsController@image']);
                    Route::post('/{id}/{lessonid}/update', ['as' => 'app.lesson.update', 'uses' => 'Courses\LessonsController@update']);
                    Route::post('/{id}/{lessonid}/destroy', ['as' => 'app.lesson.destroy', 'uses' => 'Courses\LessonsController@destroy']);
                    Route::post('/{id}/{lessonid}/restore', ['as' => 'app.lesson.restore', 'uses' => 'Courses\LessonsController@restore']);
                    # Lesson Assignments
                    Route::post('/{id}/articles', ['as' => 'app.course.restore', 'uses' => 'Courses\CourseController@restore']);
                    # Lesson Resources
                    Route::post('/{id}/articles', ['as' => 'app.course.restore', 'uses' => 'Courses\CourseController@restore']);
                    # Test Routes

                        # Module Routes
                        Route::get('/{lessonid}/modules/all', ['as' => 'app.module.index', 'uses' => 'Courses\ModulesController@index']);
                        Route::get('/{id}/{lessonid}/modules/create', ['as' => 'app.module.create', 'uses' => 'Courses\ModulesController@create']);
                        Route::post('/{id}/{lessonid}/modules/store', ['as' => 'app.module.store', 'uses' => 'Courses\ModulesController@store']);
                        Route::get('/{id}/{lessonid}/{moduleid}', ['as' => 'app.module.show', 'uses' => 'Courses\ModulesController@show']);
                        Route::get('/{id}/{lessonid}/{moduleid}/edit', ['as' => 'app.module.edit', 'uses' => 'Courses\ModulesController@edit']);
                        Route::post('/{id}/{lessonid}/{moduleid}/image', ['as' => 'app.module.image', 'uses' => 'Courses\ModulesController@image']);
                        Route::post('/{id}/{lessonid}/{moduleid}/update', ['as' => 'app.module.update', 'uses' => 'Courses\ModulesController@update']);
                        Route::post('/{id}/{lessonid}/{moduleid}/destroy', ['as' => 'app.module.destroy', 'uses' => 'Courses\ModulesController@destroy']);
                        Route::post('/{id}/{lessonid}/{moduleid}/restore', ['as' => 'app.module.restore', 'uses' => 'Courses\ModulesController@restore']);
                        # Quiz Routes

                            # Page Routes
                            Route::get('/{lessonid}/{moduleid}/pages/all', ['as' => 'app.page.index', 'uses' => 'Courses\PagesController@index']);
                            Route::get('/{id}/{lessonid}/{moduleid}/pages/create', ['as' => 'app.page.create', 'uses' => 'Courses\PagesController@create']);
                            Route::post('/{id}/{lessonid}/{moduleid}/pages/store', ['as' => 'app.page.store', 'uses' => 'Courses\PagesController@store']);
                            Route::get('/{id}/{lessonid}/{moduleid}/{pageid}', ['as' => 'app.page.show', 'uses' => 'Courses\PagesController@show']);
                            Route::get('/{id}/{lessonid}/{moduleid}/{pageid}/edit', ['as' => 'app.page.edit', 'uses' => 'Courses\PagesController@edit']);
                            Route::post('/{id}/{lessonid}/{moduleid}/{pageid}/image', ['as' => 'app.page.image', 'uses' => 'Courses\PagesController@image']);
                            Route::post('/{id}/{lessonid}/{moduleid}/{pageid}/update', ['as' => 'app.page.update', 'uses' => 'Courses\PagesController@update']);
                            Route::post('/{id}/{lessonid}/{moduleid}/{pageid}/destroy', ['as' => 'app.page.destroy', 'uses' => 'Courses\PagesController@destroy']);
                            Route::post('/{id}/{lessonid}/{moduleid}/{pageid}/restore', ['as' => 'app.page.restore', 'uses' => 'Courses\PagesController@restore']);
                            # Asset Routes

                                # Page Routes
                                Route::get('/{lessonid}/{moduleid}/pages/all', ['as' => 'app.page.index', 'uses' => 'Courses\PagesController@index']);
                                Route::get('/{id}/{lessonid}/{moduleid}/pages/create', ['as' => 'app.page.create', 'uses' => 'Courses\PagesController@create']);
                                Route::post('/{id}/{lessonid}/{moduleid}/pages/store', ['as' => 'app.page.store', 'uses' => 'Courses\PagesController@store']);
                                Route::get('/{id}/{lessonid}/{moduleid}/{pageid}', ['as' => 'app.page.show', 'uses' => 'Courses\PagesController@show']);
                                Route::get('/{id}/{lessonid}/{moduleid}/{pageid}/edit', ['as' => 'app.page.edit', 'uses' => 'Courses\PagesController@edit']);
                                Route::post('/{id}/{lessonid}/{moduleid}/{pageid}/image', ['as' => 'app.page.image', 'uses' => 'Courses\PagesController@image']);
                                Route::post('/{id}/{lessonid}/{moduleid}/{pageid}/update', ['as' => 'app.page.update', 'uses' => 'Courses\PagesController@update']);
                                Route::post('/{id}/{lessonid}/{moduleid}/{pageid}/destroy', ['as' => 'app.page.destroy', 'uses' => 'Courses\PagesController@destroy']);
                                Route::post('/{id}/{lessonid}/{moduleid}/{pageid}/restore', ['as' => 'app.page.restore', 'uses' => 'Courses\PagesController@restore']);

            });
            
            
        });


    /** ------------------------------------------
	 *  Front End - Routes
	 *  ------------------------------------------
    Route::group(['domain' => '{account}.myapp.com'], function(){
        Route::get('user/{id}', function($account, $id){
        });
    });
    */
                         
        Route::group(['prefix' => 'app'], function()
        {
            # Dashboard
            # Catalogue
            # My Courses
                # Lessons
                    # Modules
                        # Pages
                        # Quiz
                    # Test
                    # Resouces
                # Exam
                # Grades
                # Syllabus
                # Chat
                # Articles
        });

                     
                     
	/** ------------------------------------------
	 *  Page Routes
	 *  ------------------------------------------
	 */
	
		Route::get('/sitemap', ['as' => 'pages.index', 'uses' => 'SitePagesController@index']);
		Route::get('/contact', ['as' => 'pages.contact', 'uses' => 'SitePagesController@contact']);
		Route::get('/about', ['as' => 'pages.about', 'uses' => 'SitePagesController@about']);
		Route::get('/faq', ['as' => 'pages.faq', 'uses' => 'SitePagesController@faq']);
		Route::get('/terms', ['as' => 'pages.terms', 'uses' => 'SitePagesController@terms']);
		Route::get('/blog', ['as' => 'pages.blog', 'uses' => 'Blog\BlogsController@index']);
		Route::get('/blog/{slug}', ['as' => 'pages.show', 'uses' => 'Blog\BlogsController@show']);

