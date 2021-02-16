<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class StudentController extends Controller
{
    //


    public function __construct(){
		$this->middleware('admin');
	}



    public function index(){

    	// $users = DB::table('users as a')
        //     ->leftJoin('programs as b', 'a.programID', 'b.programID')
        //     ->select('a.id', 'a.username', 'a.lname', 'a.fname', 'a.mname', 'a.programID', 'b.programCode', 'a.position', 'a.apwd', 'a.acode')
        //     ->get();
        $ay = DB::table('academicyears')->get();
    	return view('student.student')
        ->with('ays', $ay);
    }


    public function create(){

        $institutes = DB::table('institutes')->get();
    	$programs = DB::table('programs')->get();
        $ay = DB::table('academicyears')->orderBy('acode', 'asc')->get();

        return view('student.studentcreate')
        ->with('programs', $programs)
    	->with('institutes', $institutes)
        ->with('ay', $ay);
    }

    public function store(Request $req){

        $validator = $req->validate([
			'username' => ['string', 'max:30', 'required', 'unique:users'],
			'lname' => ['string', 'max:50', 'required'],
			'fname' => ['string', 'max:50', 'required'],
			'password' => ['required', 'string', 'min:1', 'confirmed'],
		]);


        $data = User::create([
			'username' => $req->username,
			'lname' => strtoupper(trim($req->lname)),
			'fname' => strtoupper(trim($req->fname)),
			'mname' => strtoupper(trim($req->mname)),
			'password' => Hash::make($req['password']),
			'programID' => $req->programID,
			'position' => strtoupper(trim($req->position)),
            'apwd' => $req['password'],
            'acode' => $req->acode
		]);


        return redirect('/panel/students')
        ->with('success', 'Successfully added.');
    }


    public function edit($id){

        $user = DB::table('users as a')
            ->join('programs as b', 'a.programID', 'b.programID')
            ->where('id', $id)
            ->first();


        $ay = DB::table('academicyears')->orderBy('acode', 'asc')->get();
		$institutes = DB::table('institutes')->get();
    	$programs = DB::table('programs')->get();



        return view('student.studentedit')->with('user', $user)
		->with('programs', $programs)
		->with('institutes', $institutes)
        ->with('ay', $ay);
    }


    public function update(Request $req, $id){

        $validator = $req->validate([
			'username' => ['string', 'max:30', 'required'],
			'lname' => ['string', 'max:50', 'required'],
			'fname' => ['string', 'max:50', 'required'],
		]);


		$data = User::find($id);
		$data->lname = strtoupper(trim($req->lname));
		$data->fname = strtoupper(trim($req->fname));
		$data->mname = strtoupper(trim($req->mname));
		$data->programID = $req->programID;
		$data->position = strtoupper(trim($req->position));

		if($req->password != ""){
            $data->password = Hash::make($req->password);
            $data->apwd = $req->password;
        }
        $data->acode = $req->acode;
		$data->save();

        return redirect('/panel/students')->with('updated','Successfully updated.');

    }
















    //delete data from the row of datatable
    public function destroy($id){
		User::destroy($id);
		return 'success';
		//return redirect('/users')->with('deleted', 'Successfully deleted');
	}



	public function studentDelete($ay){
        DB::table('users')
            ->where('acode', $ay)
            ->delete();
        return 'success';
    }








    public function students(Request $req){
        $users = DB::table('users as a')
            ->leftJoin('programs as b', 'a.programID', 'b.programID')
            ->where('position', 'STUDENT')
            ->where('acode', $req->acode)
            ->select('a.id', 'a.username', 'a.lname', 'a.fname', 'a.mname', 'a.programID', 'b.programCode', 'a.position', 'a.apwd', 'a.acode')
        ->get();

        return $users;
    }










    public function uploaderIndex(){

	    return view('student.student-uploader');
    }

    public function storeUploadUsers(Request $req){

        $arr = json_decode($req->users_json);

        //echo json_decode($req->question_json);
		$programid=0;

        foreach($arr as $item) { //foreach element in $arr
            //echo $item->question; //etc

			//get program id of from programCode given in the excel
			$program = \DB::table('programs')
			->where('programCode', trim($item->Program_Code))
			->first();


		 	//filter program so that system will issue ID
			if($program){
				$programid = $program->programID;
			}
			else{
				$programid = 0;
			}



			\DB::table('users')->insertOrIgnore([
                'username' => trim($item->ID_No),
                'lname' => strtoupper(trim($item->Lastname)),
                'fname' => strtoupper(trim($item->Firstname)),
                'mname' => strtoupper(trim($item->Middlename)),
                'password' => Hash::make($item->Password),
                'programID' => $programid,
                'position' => strtoupper(trim($item->Position)),
                'apwd' => $item->Password,
				'acode' => $item->Academicyear_Code,
            ]);
        }

        return redirect('/panel/students')
            ->with('success', 'Users successfully addded');
    }



}
