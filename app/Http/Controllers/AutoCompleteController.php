<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutoCompleteController extends Controller
{
    //

    // public function search($data){

    //     $theses = DB::table('thesisfiles')
    //     //->whereRaw('thesistitle like ?', [$data . '%'])
    //     ->get();
    // 	return $theses;
    // }


    public function search($data){


        $theses = DB::table('thesisfiles')
        ->whereRaw('thesistitle like ? or tagWords like ?', ['%' . $data . '%', '%' . $data . '%'])
        ->pluck('thesistitle')->toArray();

    	return $theses;
    }



}
