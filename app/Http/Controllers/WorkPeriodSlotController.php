<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkPeriodSlot;
use App\WorkType;
use App\Rules\DailyTimeLimit;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WorkPeriodSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work_period_slots = WorkPeriodSlot::join('work_periods', function ($join){
            $join->on('work_periods.id', '=', 'work_period_slots.work_period_id');
        })
        ->where('user_id', '=', Auth::id())
        ->paginate(10);

        return view('work_period_slots.index')->with('work_period_slots', $work_period_slots);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the resource by date.
     *
     * @return \Illuminate\Http\Response
     */
    public function date($date=false)
    {
        $work_period_slots = WorkPeriodSlot::join('work_periods', function ($join) use ($date){
            $join->on('work_periods.id', '=', 'work_period_slots.work_period_id');
            if($date){
                $join->whereDate('work_periods.date_time', '>=', Carbon::parse($date));
                $join->whereDate('work_periods.date_time', '<', Carbon::parse($date)->addDays(1));
            }else{
                $join->whereDate('work_periods.date_time', '>=', Carbon::today());
                $join->whereDate('work_periods.date_time', '<', Carbon::tomorrow());
            }
        })
        ->where('user_id', '=', Auth::id())
        ->get();

        return view('work_period_slots.date')->with('work_period_slots', $work_period_slots);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assign(Request $request)
    {
        $work_period_slots = WorkPeriodSlot::whereIn('work_period_id', $request->select)
        ->whereNull('user_id')
        ->get();

        foreach($work_period_slots as $work_period_slot){
            $date = Carbon::parse($work_period_slot->work_period->date_time)->format('Y-m-d');
            $user_work_period_time = WorkPeriodSlot::select(
                array( 
                    DB::raw('DATE(date_time) as date'), 
                    DB::raw('SUM(slot_time_minutes) as "total_minutes"' )
                    )
                )
            ->join('work_periods', function ($join) use ($date){
                $join->on('work_periods.id', '=', 'work_period_slots.work_period_id');
                $join->whereDate('work_periods.date_time', '>=', Carbon::parse($date));
                $join->whereDate('work_periods.date_time', '<', Carbon::parse($date)->addDays(1));
            })
            ->where('user_id', '=', Auth::id())
            ->groupBy('date')
            ->first();

            if($user_work_period_time && $user_work_period_time->total_minutes > 600){
                ;
            }

            $this->validate($request, array('slot_time_minutes' => new DailyTimeLimit));

            $work_period_slot->user()->associate(Auth::user());
            $work_period_slot->save();
        }

        Session::flash('success', 'Work was assigned');

        return redirect()->route('select-work.index');
    }
}
