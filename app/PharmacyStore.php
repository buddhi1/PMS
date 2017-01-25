<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyStore extends Model
{
    //
    public static $rules = array(
    		'pha_id' => 'required',
    		'med_id' => 'required'
			
		);
    public static $erules = array(
    		
    		'med_id' => 'required'
			
		);
}
