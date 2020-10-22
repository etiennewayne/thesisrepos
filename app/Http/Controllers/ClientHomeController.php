<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thesisfile;
use App\Counterlog;
use Auth;


use Illuminate\Support\Facades\DB;
use Response;

class ClientHomeController extends Controller
{
    //

	public function __construct(){
		$this->middleware('auth');
	}



    public function index(){

        $theses = DB::table('thesisfiles')
        ->orderBy('noViews', 'desc')
        ->take(5)
        ->get();

        return view('/client/welcomepage')
        ->with('theses', $theses);
        
    }

    public function showClientSearch(){
        return view('/client/home');
    }


    public function searchdata($data){

        $theses = DB::table('thesisfiles')
        ->whereRaw('thesistitle like ? or tagWords like ?', ['%' . $data . '%', '%' . $data . '%'])
        ->get();
    	return view('/client/search')->with('theses', $theses);
    }

    public function viewpdf($id, $fileid){
        //return $fileid;

        /*return response()->file(asset('abstractfile/' . $fileid), [
            'Content-Disposition' => 'inline; filename="'. $fileid .'"'
        ]);*/

         //$data = Thesisfile::find($thesisid);

        // DB::table('thesisfiles')
        // ->where('thesisfileID', $id)
        // ->update(['noViews' => DB::raw('noViews+1')]);

        
        $userid = Auth::id();

        DB::table('counterlogs')
        ->insert(['user_id'=> $userid , 'thesisfileID' => $id]);


        $headers = ['application/pdf'];
      
        return response()->file('abstractfile/' . $fileid, $headers);
    }

    public function pdfviewer($id, $fileid){
        $pdfurl = 'client/viewpdf/'.$id.'/'.$fileid;
        $thesis = \DB::table('thesisfiles')
        ->where('thesisfileID', $id)
        ->first();

        DB::table('thesisfiles')
        ->where('thesisfileID', $id)
        ->increment('noViews', 1);


        return view('client.pdfviewer')
        ->with('pdfurl',  $pdfurl)
        ->with('thesis',  $thesis);
    }

}
