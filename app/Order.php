<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public static $rules = array(
    		
    		'pha_id' => 'required'
			
		);
}
