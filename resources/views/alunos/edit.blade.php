@extends('layouts.main')
@section('title', 'Editando: ' . $aluno->title)
@section('content')

<div id="alunos-create-container" class="col-md-6 offset-md-3"> 
    <h1>Editando: {{ $aluno->title }}</h1> 
    <form action="/alunos/update/{{ $aluno->id }}" method="POST"> 
     @csrf
     @method('PUT')
        <div class="form-group"> 
            <label for="title">Nome: </label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do aluno" value="{{ $aluno->title }}">
        </div> 
         <div class="form-group"> 
            <label for="title">Filmes: </label> 
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check" name="movies" value="999999999999999" checked>None
                <label class="form-check-label"></label> 
            </div> 
            @foreach ($movies as $movie)
                <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="check" name="movies[]" value="{{ $movie->title }}"> {{ $movie->title }}
                   <label class="form-check-label"></label> 
                </div>
            @endforeach
        </div> 
        <input type="submit" class="btn btn-primary" value="Editar aluno">
    </form>
</div> 

@endsection



    

            
                
        
                   
                        
                        
        