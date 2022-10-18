@extends('layouts.main')
@section('title', $professor->title)
@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/professor.png" class="img-fluid" alt="{{ $professor->title }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1><ion-icon name="flask-outline"></ion-icon>{{ $professor->title }}</h1>
            <a href="/professores/edit/{{ $professor->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar:</a>
            <form action="/professores/{{ $professor->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
            </form>
        </div>
    </div>
</div>

@endsection



