<?php

Route::post('/admin/login', 'AuthController@login')->name('admin.login');

Route::prefix('Admin')->group(function () {
    Route::get('/login', function () {
        return view('Admin.loginAdmin');
    });
    Route::group(['middleware' => 'roles', 'roles' => ['Admin']], function () {

        Route::get('/logout/logout', 'AuthController@logout')->name('user.logout');
        Route::get('/home', 'AuthController@index')->name('admin.dashboard');

        // Profile Route
        Route::prefix('profile')->group(function () {
            Route::get('/index', 'profileController@index')->name('profile.index');
            Route::post('/index', 'profileController@update')->name('profile.update');
        });

        // Admin Routes
        Route::prefix('Admin')->group(function () {
            Route::get('/index', 'AdminController@index')->name('Admin.index');
            Route::get('/allData', 'AdminController@allData')->name('Admin.allData');
            Route::post('/create', 'AdminController@create')->name('Admin.create');
            Route::get('/edit/{id}', 'AdminController@edit')->name('Admin.edit');
            Route::post('/update', 'AdminController@update')->name('Admin.update');
            Route::get('/destroy/{id}', 'AdminController@destroy')->name('Admin.destroy');
        });

        /** Sections */
        Route::prefix('Sections')->group(function () {
            Route::get('/index', 'SectionsController@index')->name('Sections.index');
            Route::get('/allData', 'SectionsController@allData')->name('Sections.allData');
            Route::post('/create', 'SectionsController@create')->name('Sections.create');
            Route::get('/edit/{id}', 'SectionsController@edit')->name('Sections.edit');
            Route::post('/update', 'SectionsController@update')->name('Sections.update');
            Route::get('/destroy/{id}', 'SectionsController@destroy')->name('Sections.destroy');
        });

        /** Programs */
        Route::prefix('Programs')->group(function () {
            Route::get('/index', 'ProgramsController@index')->name('Programs.index');
            Route::get('/allData', 'ProgramsController@allData')->name('Programs.allData');
            Route::post('/create', 'ProgramsController@create')->name('Programs.create');
            Route::get('/edit/{id}', 'ProgramsController@edit')->name('Programs.edit');
            Route::post('/update', 'ProgramsController@update')->name('Programs.update');
            Route::get('/destroy/{id}', 'ProgramsController@destroy')->name('Programs.destroy');
        });

        /** Program_videos */
        Route::prefix('Program_videos')->group(function () {
            Route::get('/index', 'Program_videosController@index')->name('Program_videos.index');
            Route::get('/allData', 'Program_videosController@allData')->name('Program_videos.allData');
            Route::post('/create', 'Program_videosController@create')->name('Program_videos.create');
            Route::get('/edit/{id}', 'Program_videosController@edit')->name('Program_videos.edit');
            Route::post('/update', 'Program_videosController@update')->name('Program_videos.update');
            Route::get('/destroy/{id}', 'Program_videosController@destroy')->name('Program_videos.destroy');
        });

        /** User */
        Route::prefix('User')->group(function () {
            Route::get('/index', 'UserController@index')->name('User.index');
            Route::get('/allData', 'UserController@allData')->name('User.allData');
            Route::get('/destroy/{id}', 'UserController@destroy')->name('User.destroy');
            Route::get('/show/{id}', 'UserController@show')->name('User.show');

        });

        /** Contact_us */
        Route::prefix('Contact_us')->group(function () {
            Route::get('/index', 'Contact_usController@index')->name('Contact_us.index');
            Route::get('/allData', 'Contact_usController@allData')->name('Contact_us.allData');
            Route::get('/edit/{id}', 'Contact_usController@edit')->name('Contact_us.edit');
            Route::post('/update', 'Contact_usController@update')->name('Contact_us.update');

        });

        /** Testimonials */
        Route::prefix('Testimonials')->group(function () {
            Route::get('/index', 'TestimonialsController@index')->name('Testimonials.index');
            Route::get('/allData', 'TestimonialsController@allData')->name('Testimonials.allData');
            Route::post('/create', 'TestimonialsController@create')->name('Testimonials.create');
            Route::get('/edit/{id}', 'TestimonialsController@edit')->name('Testimonials.edit');
            Route::post('/update', 'TestimonialsController@update')->name('Testimonials.update');
            Route::get('/destroy/{id}', 'TestimonialsController@destroy')->name('Testimonials.destroy');
        });

        /** DrHanadi*/
        Route::prefix('DrHanadi')->group(function () {
            Route::get('/index', 'DrHanadiController@index')->name('DrHanadi.index');
            Route::get('/allData', 'DrHanadiController@allData')->name('DrHanadi.allData');
            Route::get('/edit/{id}', 'DrHanadiController@edit')->name('DrHanadi.edit');
            Route::post('/update', 'DrHanadiController@update')->name('DrHanadi.update');

        });

        /** Gallery */
        Route::prefix('Gallery')->group(function () {
            Route::get('/index', 'GalleryController@index')->name('Gallery.index');
            Route::get('/allData', 'GalleryController@allData')->name('Gallery.allData');
            Route::post('/create', 'GalleryController@create')->name('Gallery.create');
            Route::get('/edit/{id}', 'GalleryController@edit')->name('Gallery.edit');
            Route::post('/update', 'GalleryController@update')->name('Gallery.update');
            Route::get('/destroy/{id}', 'GalleryController@destroy')->name('Gallery.destroy');
        });

        /** NewsLetter */
        Route::prefix('NewsLetter')->group(function () {
            Route::get('/index', 'NewsLetterController@index')->name('NewsLetter.index');
            Route::get('/allData', 'NewsLetterController@allData')->name('NewsLetter.allData');
            Route::get('/destroy/{id}', 'NewsLetterController@destroy')->name('NewsLetter.destroy');
    });
});
});

