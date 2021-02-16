<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    //
    protected $table = 'academicyears';

    protected $primaryKey = 'ayear_id';


    protected $fillable = ['acode', 'acode_desc'];


}
