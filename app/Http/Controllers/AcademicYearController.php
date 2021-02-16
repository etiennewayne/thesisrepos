<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AcademicYear;



class AcademicYearController extends Controller
{
    //

    public function __construct(){
        $this->middleware('admin');
    }


    public function index(){
        return view('academicyear.academicyear');
    }


    public function create(){
        return view('academicyear.academicyearcreate');
    }


    public function store(Request $req){
        $validate = $req->validate([
            'acode' => ['required', 'string', 'max:20', 'unique:academicyears'],
            'acode_desc' => ['required', 'string', 'max:100']
        ]);

        AcademicYear::create([
            'acode'=>$req->acode,
            'acode_desc'=>$req->acode_desc
        ]);

        return redirect('/panel/academicyear')
        ->with('success', 'Academic year added successfully.');
    }




    public function edit($id){
        $ay = AcademicYear::find($id);
        return view('academicyear.academicyearedit')
        ->with('ay', $ay);
    }

    public function update(Request $req, $id){

        $validate = $req->validate([
            'acode' => ['required', 'string', 'max:20', 'unique:academicyears'],
            'acode_desc' => ['required', 'string', 'max:100']
        ]);


        $ay = AcademicYear::find($id);
        $ay->acode = $req->acode;
        $ay->acode_desc = $req->acode_desc;
        $ay->save();

        return redirect('/panel/academicyear')
        ->with('updated', 'Academic year updated successfully.');

    }

    public function destroy($id){
        AcademicYear::destroy($id);

        return redirect('/panel/academicyear')
        ->with('deleted', 'Academic year deleted successfully.');

    }


    public function ajaxAY(){
        return \DB::table('academicyears')
        ->get();
    }


}
