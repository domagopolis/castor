<?php

namespace App\Http\Controllers;

use App\WorkPeriod;
use App\WorkPeriodSlot;
use App\WorkType;
use Carbon\Carbon;

use Illuminate\Http\Request;

class WorkPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $work_types = WorkType::orderBy('title')->pluck('title', 'id');

        $work_periods = WorkPeriod::
            when($request->work_type_id, function($query) use ($request){
                return $query->where('work_type_id', $request->work_type_id);
            })
            ->when($request->date, function($query) use ($request){
                return $query->whereDate('date_time', Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'));
            })
            ->whereIn('id', function($query){
                return $query->select('work_period_id')->from(with(new WorkPeriodSlot)->getTable())->whereNull('user_id');
            })
            ->paginate(10);

        return view('work_periods.index')
            ->with('work_types', $work_types)
            ->with('work_periods', $work_periods);
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
}
