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
			'city' => 'required',
			'location' => 'required',
			'availability' => 'required',
			'minimum_qty' => 'required',
			'opening_time' => 'required',
			'closing_time' => 'required',
			'status' => 'required'
		);
}
