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

Route::get('/admin/home', 'HomeController@index')->name('home');


//institute
Route::resource('/admin/institutes', 'InstituteController');
Route::get('/admin/theses/ajax/institutes', 'InstituteController@institutes');

//programs
Route::resource('/admin/programs', 'ProgramController');
Route::get('/admin/programs/ajax/programs', 'ProgramController@programs');

//categories
Route::resource('/admin/categories', 'CategoryController');
Route::get('/admin/categories/ajax/categories', 'CategoryController@categories');


//theses Controller
Route::resource('/admin/theses', 'ThesisController');
Route::get('/admin/theses/ajax/theses', 'ThesisController@theses');


//users
Route::resource('/admin/users', 'UserController');
Route::get('/users/ajax/users', 'UserController@users');

//reports
Route::get('/admin/report', 'ReportController@index');
Route::get('/admin/report/list-of-books', 'ReportController@listOfBooks');
Route::get('/admin/report/books-by-institute', 'ReportController@showBooksByInstitute');
Route::get('/admin/report/books-by-institute/{institute}', 'ReportController@booksByInstitute');
Route::get('/admin/report/most-viewed', 'ReportController@mostViewed');





Route::get('/client', 'ClientHomeController@index');

Route::get('/client/search', 'ClientHomeController@showClientSearch');

Route::get('/client/home/search/{search}', 'ClientHomeController@searchdata');

Route::get('/client/autocomplete/search/{key}', 'AutoCompleteController@search');

Route::get('/client/pdfviewer/{id}/{fileid}/', 'ClientHomeController@pdfviewer');

Route::get('/client/viewpdf/{id}/{fileid}/', 'ClientHomeController@viewpdf');



Route::get('/logout', function(){
	\Auth::logout();
	return redirect('/login');

});
