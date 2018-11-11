<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkPeriod extends Model
{
    public function work_period_slots(){
		return $this->hasMany('App\WorkPeriodSlot');
	}

	public function work_type(){
		return $this->belongsTo('App\WorkType');
	}

	public function user_entered(){
		return $this->belongsTo('App\User', 'entered_by_user_id');
	}

	public function user_modified(){
		return $this->belongsTo('App\User', 'modified_by_user_id');
	}

	public function getEnteredDateAttribute(){
		return date('d/m/Y', strtotime("{$this->created_at}"));
	}

	public function getModifiedDateAttribute(){
		return date('d/m/Y', strtotime("{$this->updated_at}"));
	}

	public function getDateAttribute(){
		return date('d/m/Y', strtotime("{$this->date_time}"));
	}

	public function getStartTimeAttribute(){
		return date('H:i', strtotime("{$this->date_time}"));
	}

	public function getEndTimeAttribute(){
		return date('H:i', strtotime("{$this->date_time}") + $this->slot_time_minutes*60);
	}
}
