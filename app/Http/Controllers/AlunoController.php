<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index() {
         $search = request('search');

            if($search) {
                $alunos = Aluno::where([
                    ['title', 'like', '%'.$search.'%']
                ])->get();
            } else {
                $alunos = Aluno::paginate(10);
            }

         return view('welcome',['alunos' => $alunos, 'search' => $search]);
    }

    public function inserir() {
        $movies = Http::get("https://jsonplaceholder.typicode.com/posts");
        return view("alunos.inserir", ["movies" => json_decode($movies)]);
    }

    public function store(Request $request) {
        $aluno = new Aluno;
        $aluno->title = $request->title;
        $aluno->movies = $request->movies;
        $aluno->save();
        return redirect('/')->with('msg', 'Aluno inserido com sucesso!');
    }
    
    public function show($id) {
        $aluno = Aluno::findOrFail($id);
        $movies = $aluno->movies;
        return view('alunos.show', ['aluno' => $aluno, 'movies' => $movies]);
        
    }

    public function destroy($id) {
       
        Aluno::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Aluno excluido com sucesso!');
    }

    public function edit($id) {
        $aluno = Aluno::findOrFail($id);
        $movies = Http::get("https://jsonplaceholder.typicode.com/posts");
        
        return view('alunos.edit', ['aluno' => $aluno, "movies" => json_decode($movies)]);
    }

    public function update(Request $request) {

        Aluno::findOrFail($request->id)->update($request->all());

        return redirect('/')->with('msg', 'Aluno editado com sucesso!');
    }

}
