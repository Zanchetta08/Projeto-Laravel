@extends('layouts.main')
@section('title', 'Inserir Materia')
@section('content')

<div id="alunos-create-container" class="col-md-6 offset-md-3">
    <h1>Insira sua materia</h1>
    <form action="/materias" method="POST">
     @csrf
        <div class="form-group">
            <label for="title">Nome: </label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome da materia">
        </div>
        <div>
            <label for="title">Professores: </label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="999999999999999" checked>None
            <label class="form-check-label" for="radio1"></label>
        </div>
        @foreach ($professors as $professor)
        <div class="form-check">
            <input type="radio" class="form-check-input" id="radio" name="optradio" value="{{ $professor->id }}"> {{ $professor->title }}
            <label class="form-check-label" for="radio"></label>
        </div>
        @endforeach
        
        <div>
            <label for="title">Alunos: </label>
        </div>
        @foreach ($alunos as $aluno)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="check" name="option[]" value="{{ $aluno->id }}"> {{ $aluno->title }}
            <label class="form-check-label"></label> 
        </div>
        @endforeach

        <input type="submit" class="btn btn-primary" value="Inserir materia">
    </form>
</div>

@endsection

