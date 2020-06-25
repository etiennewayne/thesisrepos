<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    //



	public function __construct(){
		$this->middleware('admin');
	}


    public function index(){

    	$users = DB::table('vw_users')->get();

    	//$users = User::all();
    	return view('user/user')->with('users', $users);
    	//return $users;
    }

    public function create(){

    	$institutes = DB::table('institutes')->get();
    	$programs = DB::table('programs')->get();


    	return view('user/usercreate')->with('programs', $programs)
    	->with('institutes', $institutes);
    	//return $programs;
    }


	public function store(Request $req){
		//$validator(array $data = [], array $rules = [], array $messages = [], array $customAttributes = []);

		$validator = $req->validate([
			'username' => ['string', 'max:30', 'required', 'unique:users'],
			'lname' => ['string', 'max:50', 'required'],
			'fname' => ['string', 'max:50', 'required'],
			
			'password' => ['required', 'string', 'min:1', 'confirmed'],
		]);


		//$program = DB::table('programs')->where('programCode', $req->programCode)->first();
		//$institute = DB::table('institutes')->where('instituteCode', $req->instituteCode)->first();


		$data = User::create([
			'username' => $req->username,
			'lname' => $req->lname,
			'fname' => $req->fname,
			'mname' => $req->mname,
			'password' => Hash::make($req['password']),
			'programID' => $req->programID,
			'position' => $req->position
		]);

		return redirect('/users')->with('success','User successfully addded.');
	}


	public function edit($id){
		$user = DB::table('vw_users')->where('id', $id)->first();

		$institutes = DB::table('institutes')->get();
    	$programs = DB::table('programs')->get();



		return view('user/useredit')->with('user', $user)
		->with('programs', $programs)
		->with('institutes', $institutes);
	}

	public function update(Request $req, $id){

		$data = User::find($id);
		$data->lname = $req->lname;
		$data->fname = $req->fname;
		$data->mname = $req->mname;
		$data->programID = $req->programID;
		$data->position = $req->position;
		$data->save();

        return redirect('/users')->with('updated','Successfully updated.');
	}

	public function destroy($id){
		User::destroy($id);
		return redirect('/users')->with('deleted', 'Successfully deleted');
	}


	public function users(){
        $data = \DB::table('users as a')
        ->join('programs as b', 'a.programID', 'b.programID')
        ->select('a.*', 'b.*')
        ->get();
        return $data;
    }

}
