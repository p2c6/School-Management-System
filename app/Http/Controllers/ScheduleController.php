<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use App\Models\Schedule;
use App\Models\Professor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreScheduleRequest;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $schedules = Schedule::with(['course', 'subject', 'professor'])->paginate(10);
        
       return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $subjects = Subject::all();
        $professors = Professor::all();

       return view('schedules.create', compact('courses', 'subjects', 'professors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScheduleRequest $request)
    {
        Schedule::create([
            'course_id' => $request->input('course_id'),
            'subject_id' => $request->input('subject_id'),
            'professor_id' => $request->input('professor_id'),
            'schedule_time' => $request->input('schedule_time'),
            'schedule_day' => $request->input('schedule_day'),
        ]);

        return redirect()->route('schedules.index')->with('success', 'Successfully schedule created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $courses = Course::all();
        $subjects = Subject::all();
        $professors = Professor::all();

       return view('schedules.edit', compact('schedule','courses', 'subjects', 'professors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update([
            'course_id' => $request->input('course_id'),
            'subject_id' => $request->input('subject_id'),
            'professor_id' => $request->input('professor_id'),
            'schedule_time' => $request->input('schedule_time'),
            'schedule_day' => $request->input('schedule_day'),
        ]);

        return redirect()->route('schedules.index')->with('success', 'Successfully schedule updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Successfully schedule deleted.');
    }
}
