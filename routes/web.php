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



Route::resource('universities', 'UniversityController');
Route::resource('programs', 'ProgramController');
Route::resource('courses', 'CourseController');
Route::resource('companies', 'CompanyController');
Route::resource('scholarships', 'ScholarshipController');
Route::resource('categories', 'CategoryController');
Route::resource('posts', 'PostController');
//Route::resource('states', 'StateController');
Route::resource('comments', 'CommentController');
Route::resource('tests', 'TestController');
Route::resource('/', 'HomepageController');
Route::resource('apply', 'ApplyController');
Route::resource('contacts', 'ContactController');
Auth::routes();
Route::get('contact', function () {
    return view('contact');
});
Route::get('about', function () {
    return view('about');
});

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('postsmanage', 'PostController@manage')->name('postsmanage');
Route::get('universitiesmanage', 'UniversityController@manage')->name('universitiesmanage');

Route::get('coursesmanage', 'CourseController@manage')->name('coursesmanage');
Route::get('blogs', 'CategoryController@blog')->name('blogs');
Route::get('scholarshiplists', 'ScholarshipController@display')->name('scholarshiplists');


Route::resource('dashboards', 'DashboardController');
Route::resource('users','UserController');


//Route::get('search', 'UniversityController@searchUniversities');

//Route::get('/autocomplete', 'AutocompleteController@index');
//Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');




//autocomplete route
Route::get('/autocomplete', 'AutocompleteController@index');
Route::post('/autocomplete/fetch', 'UniversityController@fetch')->name('autocomplete.fetch');
Route::post('/autocomplete/fetchcourse', 'CourseController@fetch')->name('autocomplete.fetchcourse');
//Route::post('/autocomplete/fetchstate', 'StateController@fetch')->name('autocomplete.fetchstate');
Route::post('/autocomplete/fetchpost', 'PostController@fetch')->name('autocomplete.fetchpost');
Route::post('/autocomplete/fetchscholarship', 'ScholarshipController@fetch')->name('autocomplete.fetchscholarship');



//Route::resource('search','SearchController');


//search route
Route::get('search', 'UniversityController@search');
Route::get('searchpost', 'PostController@search');
Route::get('searchcourse', 'CourseController@search');
Route::get('searchscholarship', 'ScholarshipController@search');

//filter route
Route::get('filtercourse', 'CourseController@filter');
Route::get('filterstate', 'UniversityController@filter');
Route::get('filtercompany', 'ScholarshipController@filter');
