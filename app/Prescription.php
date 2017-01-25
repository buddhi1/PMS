<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $guarded = array();
	public static $rules = array(
			'patient_id'=> 'required',
			'medication'=>'required'
		);
}
