@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>

<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Próximos Eventos</h2>
    <p>Veja os eventos dos próximos dias:</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="col-md-3">
            <div class="card col-md-3">
                <img src="/img/events/{{ $event->image }}" alt="Evento">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">{{ count($event->users)}} Participantes</p>
                    <a href="/eventos/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>
                </div>
            </div>
        </div>
        @endforeach
        @if(count($events) == 0 && $search)
        <div class="col-md-12">
            <h2>Não foi possível encontrar nenhum evento com {{ $search }}.</h2>
            <a href="/">Ver todos eventos.</a>
        </div>
        @else
        <div class="col-md-12">
            <h2>Não há eventos disponíveis.</h2>
        </div>
        @endif
    </div>

    @endsection
