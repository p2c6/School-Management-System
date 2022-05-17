<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
// use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Student::with('course')->get();
        $data['students'] = Student::with('course')->paginate(10);
        return view('students.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create([
            'full_name' => $request->input('full_name'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'course_id' => $request->input('course_id')
        ]);

        return redirect()->route('students.index')->with('success', 'Successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        $genders = [
                ['name' => 'Male',
                'val' => 'male'
                ],
                ['name' => 'Female',
                'val' => 'female'
                ]
            ];

        return view('students.edit', compact('student', 'courses', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update([
            'full_name' => $request->input('full_name'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'course_id' => $request->input('course_id')
        ]);

        return redirect()->route('students.index')->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Successfully deleted.');
    }

    public function export() 
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
}
