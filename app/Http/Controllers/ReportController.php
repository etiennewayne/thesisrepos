<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

  	public function __construct(){
		$this->middleware('admin');
	}


	public function index(){
		return view('report.report');
	}

	public function listOfBooks(){

		return view('report.list-of-books');
	}

	public function booksByInstitute(){

		return view('report.books-by-institute');
	}


	public function mostViewed(){

		return view('report.most-viewed');
	}



}
