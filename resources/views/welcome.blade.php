@extends('layouts.main')
@section('title', 'Zanchetta Academy')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um aluno</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{ $search }}</h2>
    @else
        <h2>Todos os alunos</h2>
    @endif
    <div id="cards-container" class="row">
        @foreach($alunos as $aluno)
            <div class="card col-md-2">
                <img src="/img/alunos.png" alt="{{ $aluno->nome }}">
                <div class="card-body">
                    <h5 class="card-nome">{{ $aluno->title }}</h5>
                </div>
                <div><a href="/alunos/{{ $aluno->id }}" class="btn btn-primary">Saber mais</a></div>
            </div>
        @endforeach
         @if(count($alunos) == 0 && $search)
            <p>Não há alunos cadastrados com {{ $search }} <a href="/">Ver todos os alunos</a></p>
         @elseif(count($alunos) == 0)
            <p>Não há alunos cadastrados no momento</p>
        @endif
    </div>
</div>
@if(!$search)
<div class="d-flex justify-content-center">
    {{$alunos->links()}}
</div>
@endif

@endsection
