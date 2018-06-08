<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;
use DB;
use Event;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start_s = \Request::get('start_s');
        $start_f = strlen($start_s)<= 0 ? date('Y-m-d') : date('Y-m-d',strtotime($start_s));
        $schedules=\App\Schedule::all();
        $schedules-> where('start_at','>',$start_f.' 00:00:00')->where('start_at','<', $start_f.' 23:59:00');

        //exit;
        //where('date(start_at)', '=', "\"$start_s\"");//->orderBy('start_at', 'desc');

        //where('start_at','>=',''.$start_f.'')
            
        return view('schedules.index',compact('schedules', 'start_s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $patients = \App\Patient::pluck('name', 'id');
        $doctors  = \App\Doctor::pluck('name', 'id');
        return view('schedules.create', compact('patients', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);
        
        Schedule::create($request->all());

        return redirect()->route('schedules.index')
                        ->with('success','Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        return view('schedules.show',compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        return view('schedules.edit',compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        request()->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);


        $schedule->update($request->all());


        return redirect()->route('schedules.index')
                        ->with('success','Schedule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();


        return redirect()->route('schedules.index')
                        ->with('success','Schedule deleted successfully');
    }
}
