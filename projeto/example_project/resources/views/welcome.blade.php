@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>

<div id="events-container" class="col-md-12">
    <h2>Próximos Eventos</h2>
    <p>Veja os eventos dos próximos dias:</p>
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="col-md-3">
            <div class="card col-md-3">
                <img src="" alt="Imagem do evento-{{ $event->title }}">
                <div class="card-body">
                    <p class="card-date">{{ $event->date }}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">X Participantes</p>
                    <a href="/eventos/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @endsection
