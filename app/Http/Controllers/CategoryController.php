<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Program;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    //


    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){

        $categories = DB::table('categories as a')
        ->join('programs as b', 'a.programID', 'b.programID')
        ->get();
        
        return view('/category/category')->with('categories', $categories);
    }


    public function create(){

        $programs = Program::all();

        return view('category/categorycreate')
        ->with('programs', $programs);

    }

    public function store(Request $request){

        $validator = $request->validate([
            'category' => ['string', 'required', 'unique:categories'],
            'programid' => ['int', 'required'],
        ]);

        $data = Category::create([
            'category' => strtoupper($request->category),
            'programID' => $request->programid
        ]);

            return redirect('/panel/categories')->with('success', 'Category successfully added.');
    }


    public function edit($id){
        $programs = Program::all();

        $category = Category::find($id);
        return view('category/categoryedit')
        ->with('programs', $programs)
        ->with('category', $category);
    }

    public function update(Request $request, $id){
        $category = Category::find($id);

        //$category->categoryID = $request->categoryID;
        $category->category = $request->category;
        $category->programID = $request->programid;
        $category->save();

        return redirect('/panel/categories')->with('updated', 'Categories successfully updated.');
    }

    public function destroy($id){
        Category::destroy($id);
        return redirect('/panel/categories')->with('deleted', 'Successfully deleted.');
    }


    public function categories(){
        $data = \DB::table('categories as a')
        ->join('programs as b', 'a.programID', 'b.programID')
        ->join('institutes as c', 'b.instituteID', 'c.instituteID')
        ->select('a.categoryID','a.category',
            'a.programID', 'b.programCode', 'b.programDesc', 'b.instituteID',
            'c.instituteCode', 'c.instituteDesc'
        )
        ->get();
        return $data;
    }

}
