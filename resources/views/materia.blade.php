@extends('layouts.main')
@section('title', 'Materias')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque uma materia</h1>
    <form action="/materias" method="GET">  
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{ $search }}</h2>
    @else
        <h2>Todos as materias</h2>
    @endif
    <div id="cards-container" class="row">
        @foreach($materias as $materia)
            <div class="card col-md-2">
                <img src="/img/materia.png" alt="{{ $materia->nome }}">
                <div class="card-body">
                    <h5 class="card-nome">{{ $materia->title }}</h5>
                </div>
                <div><a href="/materias/{{ $materia->id }}" class="btn btn-primary">Saber mais</a></div>
            </div>
        @endforeach
         @if(count($materias) == 0 && $search)
            <p>Não há materias cadastradas com {{ $search }} <a href="/materias">Ver todas as materias</a></p>
         @elseif(count($materias) == 0)
            <p>Não há materias cadastradas no momento</p>
        @endif
    </div>
</div>
@if(!$search)
<div class="d-flex justify-content-center">
    {{$materias->links()}}
</div>
@endif

@endsection
