@extends('layouts.main')

@section('title', 'HDC Events - Criar Evento')

@section('content')

<div id="create-event-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/eventos" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título do evento">
        </div>
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do evento">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" id="description" name="description" placeholder="Descrição do evento"></textarea>
        </div>
        <div class="form-group">
            <label for="is_private">É privado?</label>
            <select class="form-control" id="is_private" name="is_private">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Criar Evento</button>
        </div>
    </form>

</div>

@endsection
