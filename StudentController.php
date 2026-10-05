<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
     //Display a list of all students(Read)
    public function index()
    {
       
        $students=Student::oldest()->get();
        return view('students.index',compact('students'));//resource/view/students/index.blade.php refered
    }
    // Create  a new student
      public function create()
    {
      
        return view('students.create');
    }
    // Store  newly created students in db(create)
        public function store(Request $request)
    {
      $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:students,email',
            'course'=>'required|string|max:255',
        ]);
          Student::create($request->all());
          return redirect()->route('students.index')->with('success','Student added successfully!');
    }
    //Display the specified student(Read)
    public function show(Student $student)
    {
        return view('students.show',compact('student'));    
    }

    //Edit the specified student in db(Edit)
    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    //Update the specified student in db(Update)
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:students,email,'.$student->id,  
            'course'=>'required|string|max:255',
        ]); 
        $student->update($request->all());
        return redirect()->route('students.index')->with('success','Student updated successfully!');
    }
    // Remove the specified student from db(Delete)
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success','Student deleted successfully!');
    }
}
