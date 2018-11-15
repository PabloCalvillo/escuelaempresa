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
		request()->validate([
			'name' => 'required',
			'lastname' => 'required',
			'age' => 'required'
		]);
        student::create(request()->all());
        return back()->with('message', ['success', __("Alumno añadido correctamente")]);
    }

    public function update(Request $request) {
        student::where('id', $request->id)
                ->update(['name'=>$request->name, 'lastname'=>$request->lastname, 'age'=>$request->age]);
        return back()->with('message', ['success', __("Alumno editado correctamente")]);
    }

    public function edit($id) {
        $student = student::find($id);
        return view('students.editStudent', compact('student'));
    }

    public function removeStudent($id) {
        $student = student::find($id);
        $student->delete();
        return back()->with('message', ['success', __("Alumno eliminado correctamente")]);
    }
}
