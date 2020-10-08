<?php

namespace App\Http\Controllers;


use App\Program;
use Illuminate\Http\Request;
use App\Institute;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    //


    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $programs = DB::table('vw_programs')
        ->get();
        return view('program/program')->with('programs', $programs);
    }


    public function create(){
        $institutes = Institute::all();
        return view('program/programcreate')
        ->with('institutes', $institutes);
    }

    public function store(Request $req){



        $vaidator = $req->validate([
            'programCode' => ['string', 'required', 'unique:programs'],
            'programDesc' => ['string', 'required'],

        ]);

        $data = Program::create([
            'programCode' => strtoupper($req->programCode),
            'programDesc' => strtoupper($req->programDesc),
            'instituteID' => strtoupper($req->instituteCode)
        ]);

        return redirect('/admin/programs')->with('success', 'Program successfully saved');
        //return $req->instituteCode;
    }


    public function update(Request $req, $id){

        $data = Program::find($id);
        $data->programCode = $req->programCode;
        $data->programDesc = $req->programDesc;
        $data->instituteID = $req->instituteCode;
        $data->save();
        return redirect('/admin/programs')->with('updated','Successfully updated.');
    }

    public function edit($id){
        $institutes = Institute::all();

        $program = DB::table('programs as a')
        ->join('institutes as b', 'a.instituteID', 'b.instituteID')
        ->select('a.programID','a.programCode',
            'a.programDesc', 'a.instituteID', 'b.instituteCode', 'b.instituteDesc'
        )
         ->where('a.programID', $id)->first();

        return view('program/programedit')->with('program', $program)
        ->with('institutes', $institutes);
        // return $program->programCode;
       
    }

    public function destroy($id){
        Program::destroy($id);
        return 'success';
        //return redirect('/programs')->with('deleted','Successfully deleted.');
    }

    public function programs(){
        $data = \DB::table('programs as a')
        ->join('institutes as b', 'b.instituteID', 'a.instituteID')
        ->select('a.programID','a.programCode',
            'a.programDesc', 'a.instituteID', 'b.instituteCode'
        )
        ->get();
        return $data;
    }




}
