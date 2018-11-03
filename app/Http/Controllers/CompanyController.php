<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
use escuelaempresa\company;

class CompanyController extends Controller
{
	
	public function index(){
		$companies = company::latest()->paginate(5);
		return view('companies.index', compact('companies'));
	}

	public function remove(company $company){
		$company->delete();
		return back()->with('message', ['success', __("Empresa eliminada correctamente")]);
	}

	public function addForm(){
		return view('companies.addForm');
	}

	public function store(){
		company::create(request()->all());
		return back()->with('message', ['success', __("Empresa creada correctamente")]);
	}

	public function editForm(company $company){
		return view('companies.editForm', compact('company'));
	}

	public function update(company $company){
		$request = request()->all();
		$company->update(['name'=>$request['name'], 'city'=>$request['city'], 'cp'=>$request['cp']]);
		return back()->with('message', ['success', __("Empresa editada correctamente")]);
	}

}
