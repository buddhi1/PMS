<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    //
    public static $rules = array(
    		'register_number' => 'required',
			'name'=> 'required',
			'address' => 'required',
			'city' => 'required'
			
		);
    public static $erules = array(
    		
			'name'=> 'required',
			'address' => 'required',
			'city' => 'required'			
		);
}
