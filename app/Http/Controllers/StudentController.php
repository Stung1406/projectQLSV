<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index',['students'=>Student::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = DB::table('classrooms')->get();
        return view('students.create', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'StudentName' => 'required',
            'StudentEmail' => 'required|email',
        ]);
        $StudentName = $request->input('StudentName');
        $StudentEmail = $request->input('StudentEmail');
        $StudentGender = $request->input('StudentGender');
        $ClassRoomID = $request->input('ClassRoomID');
        $validatedData = ([
            'StudentName' => 'required',
            'StudentEmail' => 'required',
        ]);
        DB::table('students')->insert([
            'StudentName' => $StudentName,
            'StudentEmail' => $StudentEmail,
            'StudentGender' => $StudentGender,
            'ClassRoomID' => $ClassRoomID,
        ]);
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //$classrooms = DB::table('classrooms')->get();
        $classrooms = Classroom::all();
        return view('students.edit',[
            'classrooms' => $classrooms,
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $StudentName = $request->input('StudentName');
        $StudentEmail = $request->input('StudentEmail');
        $StudentGender = $request->input('StudentGender');
        $ClassRoomID = $request->input('ClassRoomID');

        $validatedData = ([
            'StudentName' => 'required',
            'StudentEmail' => 'required',
        ]);

        $student->update([
            'StudentName' => $StudentName,
            'StudentEmail' => $StudentEmail,
            'StudentGender' => $StudentGender,
            'ClassRoomID' => $ClassRoomID,
        ]);
        
        return redirect()->route('students.index')->with('success', 'Student Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //Bo sung xac nhan xoa
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student Date deleted successfully.');
    }
}
