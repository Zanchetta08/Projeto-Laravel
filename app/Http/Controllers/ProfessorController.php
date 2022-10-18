<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Professor;

class ProfessorController extends Controller
{
    
    public function professor() {
        $search = request('search');

            if($search) {
                $professores = Professor::where([
                    ['title', 'like', '%'.$search.'%']
                ])->get();
            } else {
                $professores = Professor::paginate(10);
            }

         return view('professor',['professores' => $professores, 'search' => $search]);
    }

    public function inserir() {
        return view('professores.inserir');
    }

    public function store(Request $request) {
        $professor = new Professor;
        $professor->title = $request->title;
        $professor->save();
        return redirect('/professores')->with('msg', 'Professor inserido com sucesso!');
    }

    public function show($id) {
        $professor = Professor::findOrFail($id);

        return view('professores.show', ['professor' => $professor]);
    }

    public function destroy($id) {
       
        Professor::findOrFail($id)->delete();

        return redirect('/professores')->with('msg', 'Professor excluido com sucesso!');
    }

    public function edit($id) {

        $professor = Professor::findOrFail($id);

        return view('professores.edit', ['professor' => $professor]);
    }

    public function update(Request $request) {

        Professor::findOrFail($request->id)->update($request->all());

        return redirect('/professores')->with('msg', 'Professor editado com sucesso!');
    }

}
