<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    //

    protected $table = 'institutes';

    protected $primaryKey = 'instituteID';

    public $timestamps = false;

    protected $fillable = ['instituteCode', 'instituteDesc'];


}
