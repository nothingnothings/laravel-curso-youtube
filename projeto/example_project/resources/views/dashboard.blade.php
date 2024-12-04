@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
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
            @foreach($events as $event)
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->participants }}</td>
                <td>
                    <a href="/eventos/{{ $event->id }}/editar" class="btn btn-info edit-btn">
                        <ion-icon name="create-outline"></ion-icon> Editar
                    </a>
                    <form action="/eventos/{{ $event->id }}" method="POST">
                        @csrf
                        @method('DELETE') {{-- WE DO THIS TO TELL LARAVEL THAT THIS IS A DELETE REQUEST, AND NOT A POST --}}
                        <input type="hidden" name="_method">
                        <button type="submit" class="btn btn-danger delete-btn">
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

@endsection
