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

		 $data = \DB::table('thesisfiles as a')
        ->join('categories as b', 'a.categoryID','b.categoryID')
        ->join('programs as c', 'a.programID','c.programID')

        //->where('a.access_code', $acode)
        ->select('a.thesisfileID','a.thesistitle',
            'a.thesisdesc',
            'a.author',
            'b.categoryID',
            'b.category',
            'a.noViews',
            'c.programID',
            'c.programCode',
            'c.programDesc'
        )
        ->get();

        return view('report.list-of-books')
        ->with('data', $data);
	}

	public function showBooksByInstitute(){
		$institutes = \DB::table('institutes')
		->orderBy('instituteCode', 'asc')
		->get();
		return view('report.books-by-institute')->with('institutes', $institutes);
	}

	public function booksByInstitute($instituteCode){

	
		$data = \DB::table('thesisfiles as a')
        ->join('categories as b', 'a.categoryID','b.categoryID')
        ->join('programs as c', 'a.programID','c.programID')
        ->join('institutes as d', 'c.instituteID','d.instituteID')
        ->where('instituteCode', $instituteCode)
        ->select('a.thesisfileID','a.thesistitle',
            'a.thesisdesc',
            'a.author',
            'b.categoryID',
            'b.category',
            'a.noViews',
            'c.programID',
            'c.programCode',
            'c.programDesc',
            'd.instituteCode',
            'd.instituteDesc'
        )
        ->get();

		return view('report.books-by-institute-view')
		->with('data', $data)
		->with('instituteCode', $instituteCode);
	}


	public function mostViewed(){

		$data = \DB::table('thesisfiles as a')
        ->join('categories as b', 'a.categoryID','b.categoryID')
        ->join('programs as c', 'a.programID','c.programID')
        ->join('institutes as d', 'c.instituteID','d.instituteID')
        ->orderBy('noViews', 'desc')
        ->select('a.thesisfileID','a.thesistitle',
            'a.thesisdesc',
            'a.author',
            'b.categoryID',
            'b.category',
            'a.noViews',
            'c.programID',
            'c.programCode',
            'c.programDesc',
            'd.instituteCode',
            'd.instituteDesc'
        )
        ->take(5)
        ->get();

      

		return view('report.most-viewed')
		->with('data', $data);
	}



}
