<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = array();
	public static $rules = array(
			'reg_no'=> 'required'
		);
}
