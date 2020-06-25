<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counterlog extends Model
{
    //


    protected $table = 'counterlogs';

	protected $primaryKey = 'counterlogid';
    protected $fillable = ['id', 'thesisfileID'];

    public $timestamps = false;
}
