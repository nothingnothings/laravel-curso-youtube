@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)

    @else
    <h2>Você não possui eventos cadastrados. <a href="/eventos/criar">Criar um novo evento.</a></h2>
    @endif
</div>

@endsection
