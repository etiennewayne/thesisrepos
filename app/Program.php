<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //

    protected $table = 'programs';

    protected $primaryKey = 'programID';

    public $timestamps = false;


    protected $fillable = ['programCode', 'programDesc', 'instituteID'];
}
