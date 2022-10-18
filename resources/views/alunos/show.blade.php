@extends('layouts.main')
@section('title', $aluno->title)
@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/alunos.png" class="img-fluid" alt="{{ $aluno->title }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1><ion-icon name="school-outline"></ion-icon>Aluno: </h1>
            <p>{{ $aluno->title }}</p>
            <h1><ion-icon name="document-text-outline"></ion-icon>Materias:</h1>
            @foreach($aluno->materias as $materia)
            <p>{{ $materia->title }}</p>
            @endforeach
            <h1><ion-icon name="film-outline"></ion-icon>Filmes:</h1>
            @if($aluno->movies == 999999999999999)
            @else
            @foreach($aluno->movies as $movie)
            <p>{{ $movie }}</p>
            @endforeach
            @endif
            <a href="/alunos/edit/{{ $aluno->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar:</a>
            <form action="/alunos/{{ $aluno->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
            </form>
        </div>
    </div>
</div>

@endsection