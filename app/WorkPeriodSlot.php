<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkPeriodSlot extends Model
{
    public function work_period(){
		return $this->belongsTo('App\WorkPeriod');
	}
	
	public function user(){
		return $this->belongsTo('App\User');
	}
}
