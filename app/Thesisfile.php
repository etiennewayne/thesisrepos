<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thesisfile extends Model
{
    //


    protected $table = 'thesisfiles';
    protected $primaryKey = 'thesisfileID';
    //protected $timestamp = false;


    protected $fillable = ['thesistitle', 'thesisdesc', 'author', 'bookyear', 'abstractfile', 'datesubmitted',
    'thesisfile',
    'tagWords', 'categoryID', 'programID'];

}
