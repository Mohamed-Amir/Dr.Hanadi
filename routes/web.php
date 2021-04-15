<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::group(['prefix' => LaravelLocalization::setLocale(),

    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {




Route::get('/', function () {
    $current =1;
    return view('home',compact('current'));
});
/** General pages */
Route::get('/contacts', 'GeneralController@contacts')->name('General.contacts');
Route::get('/about_dr', 'GeneralController@about_dr')->name('General.about_dr');
Route::get('/contact_us', 'GeneralController@contact_us')->name('General.contact_us');


/** User */
Route::get('/sign_in', 'UserController@sign_in')->name('User.sign_in');
Route::get('/logged', 'UserController@logged')->name('User.logged');
Route::get('/myProfile', 'UserController@myProfile')->name('User.myProfile');
Route::get('/sign_up', 'UserController@sign_up')->name('User.sign_up');
Route::get('/saveUser', 'UserController@saveUser')->name('User.saveUser');
Route::get('/profile', 'UserController@profile')->name('user.profile');
Route::get('/logout', 'UserController@logout')->name('userFront.logout');

/** Sections */
Route::get('/singleSection/{id}', 'SectionsController@singleSection')->name('Sections.singleSection');

/**Programs */
Route::get('/singlePrograms/{id}', 'ProgramsController@singleProgram')->name('Programs.singlePrograms');

/**Gallery */
Route::get('/Gallery', 'GeneralController@Gallery')->name('Gallery.images');

});