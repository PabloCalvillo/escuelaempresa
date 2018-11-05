<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
use escuelaempresa\study;
use escuelaempresa\student;
use escuelaempresa\grade;

class StudyController extends Controller
{
    public function index(){
		$studies = study::latest()->paginate(5);
		return view('studies.index', compact('studies'));
	}

	public function remove(study $study){
		$study->delete();
		return back()->with('message', ['success', __("Estudio eliminado correctamente")]);
	}

	public function addForm(){
		$students = student::all();
		$grades = grade::all();
		return view('studies.addForm', compact('students', 'grades'));
	}

	public function store(){
		study::create(request()->all());
		return back()->with('message', ['success', __("Estudio creado correctamente")]);
	}

	public function editForm(study $study){
		$students = student::all();
		$grades = grade::all();
		return view('studies.editForm', compact('study', 'students', 'grades'));
	}

	public function update(study $study){
		$request = request()->all();
		$study->update(['id_student'=>$request['id_student'], 'id_grade'=>$request['id_grade']]);
		return back()->with('message', ['success', __("Estudio editado correctamente")]);
	}
}
