<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Materia;

use App\Models\Professor;

use App\Models\Aluno;

class MateriaController extends Controller
{
    public function materia() {
        $search = request('search');

            if($search) {
                $materias = Materia::where([
                    ['title', 'like', '%'.$search.'%']
                ])->get();
            } else {
                $materias = Materia::paginate(10);
            }

         return view('materia',['materias' => $materias, 'search' => $search]);
    }

    public function inserir() {
        $professors = Professor::all();
        $alunos = Aluno::all();
        return view('materias.inserir', ['professors' => $professors, 'alunos' => $alunos]);
    }

    public function store(Request $request) {
        $materia = new Materia;
        $materia->title = $request->title;
        $materia->professor_id = $request->optradio;
        $materia->save();
        $materia->alunos()->attach($request->option);
        return redirect('/materias')->with('msg', 'Materia inserida com sucesso!');
    }

    public function show($id) {
        $materia = Materia::findOrFail($id);

        if (Professor::where('id', $materia->professor_id)->exists()) {
            $materiaProfessor = Professor::where('id', $materia->professor_id)->first();
            return view('materias.show', ['materia' => $materia, 'materiaProfessor' => $materiaProfessor]);
        }else{
            $materia->professor_id = 999999999999999;
            $materiaProfessor = Professor::where('id', $materia->professor_id)->first();
            return view('materias.show', ['materia' => $materia, 'materiaProfessor' => $materiaProfessor]);
        }
    }

    public function destroy($id) {
       
        $materia = Materia::findOrFail($id)->delete();

        return redirect('/materias')->with('msg', 'Materia excluida com sucesso!');
    }

    public function edit($id) {

        $materia = Materia::findOrFail($id);
        $professors = Professor::all();
        $alunos = Aluno::all();
        return view('materias.edit', ['materia' => $materia, 'professors' => $professors, 'alunos' => $alunos]);
    }

    public function update(Request $request) {

        $materia = Materia::findOrFail($request->id);
        $materia->update($request->only(['title', 'professor_id']));
        $materia->alunos()->detach();
        $materia->alunos()->attach($request->option);
        
        return redirect('/materias')->with('msg', 'Materia editada com sucesso!');
    }
}
