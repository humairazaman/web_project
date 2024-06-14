<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index');
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->telno = $request->input('telNo');
        $student->age = $request->input('age');
        $student->cnic = $request->input('cnic'); 

        $student->save();

        return redirect()->route('student.read', ['id' => $student->id])->with('status', 'Student created successfully');
    }

    public function read()
    {
        $students = Student::all();
        return view('student/read')->with(['students' => $students]);
    }

    public function update(Request $request, Student $student)
    {
        $student->cnic = $request->input('cnic');
        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->telno = $request->input('telNo');
        $student->age = $request->input('age');
        $student->save();

        return redirect()->route('student.read')->with('status', 'Student with CNIC ' . $student->cnic . ' updated successfully');
    }

    public function edit(Student $student)
    {
        return view('student.update', compact('student'));
    }

    public function destroy($cnic)
    {
        $student = Student::where('cnic', $cnic)->first();
        if (!$student) {
            return redirect()->route('student.read')->with('error', 'Student not found!');
        }
    
        $student->delete();
        return redirect()->route('student.read')->with('status', 'CNIC ' . $cnic . ' deleted successfully!');
    }
    
}