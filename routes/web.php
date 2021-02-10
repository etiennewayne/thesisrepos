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
    if(Auth::check()){

        if(AUth::user()->role == strtolower('administrator') || Auth::user()->role == strtolower('RESEARCH PERSONNEL')){
            return redirect('/admin//home');
        }else if(Auth::user()->role == strtolower('student')){
            return redirect('/client');
        }else{
            return redirect('/client');
        }
    }


    return redirect('/login');
});






Auth::routes();

Route::get('/panel/home', 'HomeController@index')->name('home');


//institute
Route::resource('/panel/institutes', 'InstituteController');
Route::get('/panel/theses/ajax/institutes', 'InstituteController@institutes');

//programs
Route::resource('/panel/programs', 'ProgramController');
Route::get('/panel/programs/ajax/programs', 'ProgramController@programs');

//categories
Route::resource('/panel/categories', 'CategoryController');
Route::get('/panel/categories/ajax/categories', 'CategoryController@categories');


//theses Controller
Route::resource('/panel/theses', 'ThesisController');
Route::get('/panel/theses/ajax/theses', 'ThesisController@theses');


//users
Route::resource('/panel/users', 'UserController');
Route::get('/users/ajax/users', 'UserController@users');
Route::get('/panel/uploader/users', 'UserController@uploaderIndex');
Route::post('/panel/uploader/store', 'UserController@storeUploadUsers');


//reports
Route::get('/panel/report', 'ReportController@index');
Route::get('/panel/report/list-of-books', 'ReportController@listOfBooks');
Route::get('/panel/report/books-by-institute', 'ReportController@showBooksByInstitute');
Route::get('/panel/report/books-by-institute/{institute}', 'ReportController@booksByInstitute');
Route::get('/panel/report/most-viewed', 'ReportController@mostViewed');





Route::get('/client', 'ClientHomeController@index');

Route::get('/client/search', 'ClientHomeController@showClientSearch');

Route::get('/client/home/search/{search}', 'ClientHomeController@searchdata');

Route::get('/client/autocomplete/search/{key}', 'AutoCompleteController@search');

//Route::get('/client/pdfviewer/{id}/{fileid}/', 'ClientHomeController@pdfviewer');

Route::get('/client/pdfviewer/{id}/', 'ClientHomeController@pdfviewer');


Route::get('/client/viewpdf/{id}/{fileid}/', 'ClientHomeController@viewpdf');



Route::get('/logout', function(){
	\Auth::logout();
	return redirect('/login');

});
