<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //


    protected $table = 'categories';

    protected $primaryKey = 'categoryID';

    public $timestamps = false;


    protected $fillable = ['category', 'programID'];

}
