@extends('layouts.main')
@section('title', 'Editando: ' . $materia->title)
@section('content')

<div id="alunos-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $materia->title }}</h1>
    <form action="/materias/update/{{ $materia->id }}" method="POST">
     @csrf
     @method('PUT')
        <div class="form-group">
            <label for="title">Nome: </label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome da materia" value="{{ $materia->title }}">
        </div>
        <div>
            <label for="title">Professores: </label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="radio1" name="professor_id" value="999999999999999" checked>None
            <label class="form-check-label" for="radio1"></label>
        </div>
        @foreach ($professors as $professor)
        <div class="form-check">
            <input type="radio" class="form-check-input" id="radio" name="professor_id" value="{{ $professor->id }}"> {{ $professor->title }}
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
        <input type="submit" class="btn btn-primary" value="Editar materia">
    </form>
</div>

@endsection