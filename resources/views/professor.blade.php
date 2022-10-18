@extends('layouts.main')
@section('title', 'Professores')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um professor</h1>
    <form action="/professores" method="GET">  
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{ $search }}</h2>
    @else
        <h2>Todos os professores</h2>
    @endif
    <div id="cards-container" class="row">
        @foreach($professores as $professor)
            <div class="card col-md-2">
                <img src="/img/professor.png" alt="{{ $professor->nome }}">
                <div class="card-body">
                    <h5 class="card-nome">{{ $professor->title }}</h5>
                </div>
                <div><a href="/professores/{{ $professor->id }}" class="btn btn-primary">Saber mais</a></div>
            </div>
        @endforeach
         @if(count($professores) == 0 && $search)
            <p>Não há professores cadastrados com {{ $search }} <a href="/professores">Ver todos os professores</a></p>
         @elseif(count($professores) == 0)
            <p>Não há professores cadastrados no momento</p>
        @endif
    </div>
</div>
@if(!$search)
<div class="d-flex justify-content-center">
    {{$professores->links()}}
</div>
@endif

@endsection
