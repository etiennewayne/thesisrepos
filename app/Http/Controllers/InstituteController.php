<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institute;
class InstituteController extends Controller
{
    //

    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $institutes = Institute::all();
        return view('institute/institute')->with('institutes', $institutes);
    }


    public function store(Request $req){
        $validator = $req->validate([
            'instituteCode' => ['string', 'required', 'unique:institutes'],
            'instituteDesc' => ['string', 'required']
        ]);

        $data = Institute::create([
            'instituteCode' => strtoupper($req->instituteCode),
            'instituteDesc' => strtoupper($req->instituteDesc)
        ]);

        return redirect('/institutes')->with('success', 'Institute successfully saved');
    }

    public function create(){

        return view('institute/institutecreate');
    }

    public function edit($id){
        $institute = Institute::find($id);
        return view('institute/instituteedit')->with('institute',$institute);
    }

    public function update(Request $req, $id){
        $data = Institute::find($id);
        $data->instituteCode = strtoupper($req->instituteCode);
        $data->instituteDesc = strtoupper($req->instituteDesc);
        $data->save();

        return redirect('/institutes')->with('updated','Successfully updated');
    }

    public function destroy($id){
        Institute::destroy($id);
        return redirect('/institutes')->with('deleted', 'Successfully deleted.');

    }

    public function institutes(){
        $data = \DB::table('institutes as a')
        
        ->select('a.instituteID','a.instituteCode',
            'a.instituteDesc'
        )
        ->get();
        return $data;
    }


}
