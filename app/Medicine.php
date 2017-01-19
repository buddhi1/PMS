<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $guarded = array();
	public static $rules = array(
			'name'=> 'required',
			'approval' => 'required',
			'prescribed' => 'required'
		);
}