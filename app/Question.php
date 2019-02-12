<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
    		'question',
    		'opt_A',
    		'opt_B',
    		'opt_C',
    		'opt_D',
    		'correct_opt',
    		'catagory_id',
    		'user_id',
    		
    ];
}
