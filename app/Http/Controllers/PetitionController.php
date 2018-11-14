<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
use escuelaempresa\petition;
use escuelaempresa\company;
use escuelaempresa\grade;

class PetitionController extends Controller
{
    public function index(){
		$petitions = petition::latest()->paginate(5);
		return view('petitions.index', compact('petitions'));
	}
	
	public function listPetitionsGrades() {
		$petitions = petition::orderBy('id_grade', 'asc')->get();
		return view('petitions.petitionsTypes', compact('petitions'));	
	}

	public function listPetitionsTypes() {
		$petitions = petition::orderBy('type', 'asc')->get();
		return view('petitions.petitionsTypes', compact('petitions'));	
	}

	public function remove(petition $petition){
		$petition->delete();
		return back()->with('message', ['success', __("Solicitud eliminada correctamente")]);
	}

	public function addForm(){
		$companies = company::all();
		$grades = grade::all();
		return view('petitions.addForm', compact('companies', 'grades'));
	}

	public function store(){
		petition::create(request()->all());
		return back()->with('message', ['success', __("Solicitud creada correctamente")]);
	}

	public function editForm(petition $petition){
		$companies = company::all();
		$grades = grade::all();
		return view('petitions.editForm', compact('petition', 'companies', 'grades'));
	}

	public function update(petition $petition){
		$request = request()->all();
		$petition->update(['id_company'=>$request['id_company'], 
			'id_grade'=>$request['id_grade'], 
			'type'=>$request['type'],
			'n_students'=>$request['n_students']
		]);
		return back()->with('message', ['success', __("Solicitud editada correctamente")]);
	}
}
