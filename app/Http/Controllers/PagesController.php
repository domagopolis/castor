<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkPeriodSlot;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
	public function getIndex(){
		$work_period_slots = WorkPeriodSlot::join('work_periods', function ($join) { 
			$join->on('work_periods.id', '=', 'work_period_slots.work_period_id');
			$join->whereDate('work_periods.date_time', '>=', Carbon::today());
			$join->whereDate('work_periods.date_time', '<', Carbon::tomorrow());
		})
		->where('user_id', '=', Auth::id())
		->get();

		return view('pages.index')->with('work_period_slots', $work_period_slots)->withToday(Carbon::today());
	}

	public function getReport(){
		return view('pages.report');
	}

	public function getMemberWorkSlotsMonthly($month=false, $year=false){
		$days = array( 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat' );

		$today = Carbon::today();

		if($month === false && $year === false){
			$monthYear = Carbon::today();
			$fromDate = Carbon::today()->startOfMonth();
			$toDate = Carbon::today()->endOfMonth();
		}else{
			$dateString = $month.'/1/'.$year;
			$monthYear = Carbon::parse($dateString);
			$fromDate = Carbon::parse($dateString);
			$toDate = Carbon::parse($dateString)->endOfMonth();
		}

		while( $fromDate->format('D') !== $days[0]){
			$fromDate->subDays(1);
		}

		while( $toDate->format('D') !== $days[sizeof( $days )-1]){
			$toDate->addDays(1);
		}

		$work_period_slots = DB::table('work_period_slots')
		->select(DB::raw('COUNT(*) as count'), DB::raw('date(work_periods.date_time) as date'))
		->join('work_periods', function ($join) use ($fromDate, $toDate) { 
			$join->on('work_periods.id', '=', 'work_period_slots.work_period_id');
			$join->whereDate('work_periods.date_time', '>=', $fromDate);
			$join->whereDate('work_periods.date_time', '<=', $toDate); 
		})
		->where('user_id', '=', Auth::id())
		->groupBy('date')
		->pluck('count', 'date');

		return view('pages.calendar')
		->withDays($days)
		->withToday($today)
		->with('monthYear', $monthYear)
		->with('fromDate', $fromDate)
		->with('toDate', $toDate)
		->with('workPeriodSlots', $work_period_slots);
	}
}
