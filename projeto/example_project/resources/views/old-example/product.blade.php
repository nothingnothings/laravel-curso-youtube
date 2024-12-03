@extends('layouts.main')

@section('title', 'HDC Events - Produto')

@section('content')
<h1>Tela de Produto</h1>

@if(@id != null)

<p>Exibindo produto de id: {{ $id }}</p>

@endif
@endsection
