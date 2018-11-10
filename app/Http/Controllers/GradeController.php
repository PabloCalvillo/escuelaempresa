<?php

namespace escuelaempresa\Http\Controllers;

use escuelaempresa\grade;
use escuelaempresa\petition;

use Illuminate\Http\Request;

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
        $petitionsFCT = petition::where('id_grade', $id)->where('type', 'fct')->get();
        $petitionsPracticas = petition::where('id_grade', $id)->where('type', 'prácticas')->get();
        return view('grades.editGrade', compact('grade', 'petitionsFCT', 'petitionsPracticas'));
    }

    public function removeGrade($id) {
        $grades = grade::find($id);
        $grades->delete();
        return back()->with('message', ['success', __("Ciclo eliminado correctamente")]);
    }
}
