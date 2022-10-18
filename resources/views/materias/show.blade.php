@extends('layouts.main')
@section('title', $materia->title)
@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/materia.png" class="img-fluid" alt="{{ $materia->title }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1><ion-icon name="document-text-outline"></ion-icon>Materia:</h1>
            <p>{{ $materia->title }}</p>
            @if($materia->professor_id == 999999999999999)
            <h1><ion-icon name="flask-outline"></ion-icon>Professor:</h1>
            <p>Sem professor</p>
            @elseif($materia->professor_id == NULL)
            <p>Sem professor</p>
            @else
            <h1><ion-icon name="flask-outline"></ion-icon>Professor:</h1>
            <p>{{ $materiaProfessor->title }}</p>
            @endif
            <h1><ion-icon name="school-outline"></ion-icon>Alunos:</h1>
            @foreach($materia->alunos as $aluno)
            <p>{{ $aluno->title }}</p>
            @endforeach
            <a href="/materias/edit/{{ $materia->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar:</a>
            <form action="/materias/{{ $materia->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
            </form>
        </div>
    </div>
</div>

@endsection



