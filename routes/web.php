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

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//theses Controller
Route::resource('/theses', 'ThesisController');
Route::get('/theses/ajax/theses', 'ThesisController@theses');

//categories
Route::resource('/categories', 'CategoryController');
Route::get('/categories/ajax/categories', 'CategoryController@categories');

//programs
Route::resource('/programs', 'ProgramController');
Route::get('/programs/ajax/programs', 'ProgramController@programs');


//institute
Route::resource('/institutes', 'InstituteController');
Route::get('/theses/ajax/institutes', 'InstituteController@institutes');

//users
Route::resource('/users', 'UserController');
Route::get('/users/ajax/users', 'UserController@users');

//reports
Route::get('/report', 'ReportController@index');
Route::get('/report/list-of-books', 'ReportController@listOfBooks');
Route::get('/report/books-by-institute', 'ReportController@booksByInstitute');
Route::get('/report/most-viewed', 'ReportController@mostViewed');





Route::get('/', 'ClientHomeController@index');

Route::get('/client/home/search/{search}', 'ClientHomeController@searchdata');

Route::get('/client/autocomplete/search/{key}', 'AutoCompleteController@search');

Route::get('/client/pdfviewer/{id}/{fileid}/', 'ClientHomeController@pdfviewer');

Route::get('/client/viewpdf/{id}/{fileid}/', 'ClientHomeController@viewpdf');


