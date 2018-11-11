<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    public function work_periods(){
		return $this->hasMany('App\WorkPeriod');
	}
}
