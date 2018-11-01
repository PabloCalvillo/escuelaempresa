<?php

namespace escuelaempresa\Http\Controllers;

use escuelaempresa\student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function listAll() {
        $students = student::latest()->paginate(5);
        return view('students.listStudents', compact('students'));    
    }

    public function addStudent() {
        return view('students.addStudent');
    }

    public function store() {
        student::create(request()->all());
        return back()->with('message', ['success', __("Alumno añadido correctamente")]);
    }
}
