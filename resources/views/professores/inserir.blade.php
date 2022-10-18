@extends('layouts.main')
@section('title', 'Inserir Professor')
@section('content')

<div id="alunos-create-container" class="col-md-6 offset-md-3">
    <h1>Insira seu professor</h1>
    <form action="/professores" method="POST">
     @csrf
        <div class="form-group">
            <label for="title">Nome: </label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do professor">
        </div>
        <input type="submit" class="btn btn-primary" value="Inserir professor">
    </form>
</div>

@endsection