@extends('layouts.main')
@section('title', 'Editando: ' . $professor->title)
@section('content')

<div id="alunos-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $professor->title }}</h1>
    <form action="/professores/update/{{ $professor->id }}" method="POST">
     @csrf
     @method('PUT')
        <div class="form-group">
            <label for="title">Nome: </label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do professor" value="{{ $professor->title }}">
        </div>
        <input type="submit" class="btn btn-primary" value="Editar professor">
    </form>
</div>

@endsection