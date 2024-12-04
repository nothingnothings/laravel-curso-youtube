@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($eventsAsOwner) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventsAsOwner as $event)
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td><a href="/eventos/{{ $event->id }}">{{ $event->title }}</a></td>
                <td>{{ count($event->users) }}</td>
                <td class="d-flex">
                    <a href="/eventos/{{ $event->id }}/editar" class="btn btn-info edit-btn pr-2">
                        <ion-icon name="create-outline"></ion-icon> Editar
                    </a>
                    <form action="/eventos/{{ $event->id }}" method="POST" class="pl-2">
                        @csrf
                        @method('DELETE') {{-- WE DO THIS TO TELL LARAVEL THAT THIS IS A DELETE REQUEST, AND NOT A POST --}} <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon> Deletar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h2>Você não possui eventos cadastrados. <a href="/eventos/criar">Criar um novo evento.</a></h2>
    @endif
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos em que estou participando</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($eventsAsParticipant) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventsAsParticipant as $event)
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td><a href="/eventos/{{ $event->id }}">{{ $event->title }}</a></td>
                <td>{{ count($event->users) }}</td>
                <td>
                    <form action="/eventos/sair/{{ $event->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon> Sair do Evento
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h2>Você não Está participando de nenhum evento.
        @endif
</div>

@endsection
