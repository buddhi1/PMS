<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = array();
	public static $rules = array(
			'name'=> 'required'
		);
}
