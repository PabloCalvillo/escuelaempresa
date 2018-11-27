<?php

namespace escuelaempresa\Http\Controllers;

use escuelaempresa\grade;
use escuelaempresa\petition;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GradeController extends Controller
{
    public function listAll() {
        $grades = grade::latest()->paginate(5);
        return view('grades.listGrades', compact('grades'));    
    }

    public function addGrade() {
        return view('grades.addGrade');
    }

    public function store() {
		request()->validate([
			'name' => 'required',
			'level' => [
				'required',
				Rule::in(['FPB','CFGM','CFGS'])
			]
		]);
        grade::create(request()->all());
        return back()->with('message', ['success', __("Ciclo añadido correctamente")]);
    }

    public function update(Request $request) {
        grade::where('id', $request->id)
                ->update(['name'=>$request->name, 'level'=>$request->level]);
        return back()->with('message', ['success', __("Ciclo editado correctamente")]);
    }

    public function edit($id) {
        $grade = grade::find($id);
        return view('grades.editGrade', compact('grade'));
    }

    public function removeGrade($id) {
        $grades = grade::find($id);
        $grades->delete();
        return back()->with('message', ['success', __("Ciclo eliminado correctamente")]);
    }

    public function find($id) {
        $petitionsByDate = [];
        $grade = grade::find($id);
        return view('grades.findGrades', compact('id', 'petitionsByDate', 'grade'));
    }

    public function findByDate(Request $request) {
        $id = $request->id;
        $grade = grade::find($id);
        $inicio = date('d-m-Y', strtotime($request->inicio));
        $fin = date('d-m-Y', strtotime($request->fin));
        $petitionsByDate = petition::where('id_grade', $id)->whereBetween('created_at', array($request->inicio, $request->fin))->get();
        return view('grades.findGrades', compact('id', 'petitionsByDate', 'inicio', 'fin', 'grade'));
    }

    public function info($id) {
        $grade = grade::find($id);
        $petitionTypes = [];
		$petitionTypes['FCT'] = petition::where('id_grade', $id)->where('type', 'FCT')->get();
        $petitionTypes['Dual'] = petition::where('id_grade', $id)->where('type', 'Dual')->get();
        $petitionTypes['Trabajo'] = petition::where('id_grade', $id)->where('type', 'Trabajo')->get();
        return view('grades.infoGrade', compact('grade', 'petitionTypes'));
    }
    
}   
