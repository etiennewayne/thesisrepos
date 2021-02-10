<?php

namespace App\Http\Controllers;
use App\Category;
use App\Thesisfile;
use App\Program;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;


class ThesisController extends Controller
{
    //


    public function __construct()
    {

         $this->middleware('rpersonnel');

    }

    public function index(){

        $theses = Thesisfile::all();

        return view('/thesis/thesis')->with('theses', $theses);
    }


    public function create(){

        $categories = Category::all();
        $programs = Program::all();

        return view('thesis/thesiscreate')
            ->with('categories', $categories)
            ->with('programs', $programs);
    }

    public function store(Request $request){

        $validator = $request->validate([
            'thesistitle' => ['string', 'required', 'unique:thesisfiles'],
            'thesisdesc' => ['string', 'required'],
            'author' => ['string', 'required'],
            'bookyear' => ['string', 'required'],
            'abstractfile'  => ['required','mimes:pdf','max:50048'],
            // 'thesisfile'  => ['required','mimes:doc,docx,pdf,txt','max:10000'],
            'tagwords' => ['string', 'required'],

        ],
        [
            'abstractfile.required' => 'A file is required',
            'abstractfile.mimes' => 'The file must be a type of pdf.',
        ]);


        $fileid = time();

        $abstract_name = $fileid.'_abstract.'.$request->abstractfile->extension();
       // $thesis_name = $fileid.'_thesis.'.$request->thesisfile->extension();

        $request->abstractfile->move(public_path('abstractfile'), $abstract_name);
       // $request->thesisfile->move(public_path('thesisfile'), $thesis_name);

        $data = Thesisfile::create([
            'thesistitle' => strtoupper($request->thesistitle),
            'thesisdesc' => strtoupper($request->thesisdesc),
            'author' => strtoupper($request->author),
            'bookyear' => $request->bookyear,
            'abstractfile' => $abstract_name,
            //'thesisfile' => $thesis_name,
            'datesubmitted' => $request->datesubmitted,
            'tagWords' => strtoupper($request->tagwords),
            'programID' => $request->programid,
            'categoryID' => $request->categoryid,

           // 'abstractfile' => $request->abstractfile
        ]);

        return redirect('/panel/theses')->with('success', 'Thesis successfully uploaded and saved.');
        //return $request->file('abstractfile');
    }





    public function update(Request $req, $id){

        $data = Thesisfile::find($id);
        $data->thesistitle = $req->thesistitle;
        $data->thesisdesc = $req->thesisdesc;
        $data->author = $req->author;
        $data->bookyear = $req->bookyear;
        $data->datesubmitted = $req->datesubmitted;
        $data->tagWords = $req->tagwords;
        $data->categoryID = $req->categoryid;
        $data->programID = $req->programid;
        $data->save();

        return redirect('/panel/theses')->with('updated','Successfully updated.');
    }

     public function edit($id){

        $thesis = Thesisfile::find($id);

        $categories = Category::all();

        $programs = Program::all();


        return view('thesis/thesisedit')
        ->with('thesis', $thesis)
        ->with('categories', $categories)
        ->with('programs', $programs);

    }


    public function destroy($id){

        $data = Thesisfile::find($id);

        //$path_abstract = public_path('abstractfile', );

        File::delete(public_path('abstractfile') .'/'. $data->abstractfile);
        File::delete(public_path('thesisfile') .'/'. $data->thesisfile);
       // File::delete(public_path('thesisfile'), $data->thesisfile);

        Thesisfile::destroy($id);
        return 'success';
        //return redirect('/theses')->with('deleted', 'Successfully deleted.');

        //return public_path('abstractfile') .'/'. $data->abstractfile;
        //return redirect('/theses')->with('deleted', 'Successfully deleted.');
    }


    public function theses(){
        $data = \DB::table('thesisfiles as a')
        ->join('categories as b', 'a.categoryID','b.categoryID')
        ->join('programs as c', 'a.programID','c.programID')
        //->where('a.access_code', $acode)
        ->select('a.thesisfileID','a.thesistitle',
            'a.thesisdesc',
            'a.author',
            'b.categoryID',
            'b.category',
            'c.programID',
            'c.programCode',
            'c.programDesc'
        )
        ->get();
        return $data;
    }


    public function ReportTheses(){
        $data = \DB::table('thesisfiles as a')
        ->join('categories as b', 'a.categoryID','b.categoryID')
        ->join('programs as c', 'a.programID','c.programID')
        //->where('a.access_code', $acode)
        ->select('a.thesisfileID','a.thesistitle',
            'a.thesisdesc',
            'a.author',
            'b.categoryID',
            'b.category',
            'c.programID',
            'c.programCode',
            'c.programDesc'
        )
        ->get();
        return view('report.list-of-books')
        ->with('data', $data);
    }




}
