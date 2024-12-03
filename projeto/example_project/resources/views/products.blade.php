@extends('layouts.main')

@section('title', 'HDC Events - Produtos')

@section('content')

<h1>Tela de Produtos</h1>

@if($busca != '')

<p>O usuário está buscando por: {{ $busca }}</p>

@endif

<a href="/produtos/1">Produto 1</a>
<a href="/produtos/2">Produto 2</a>
<a href="/produtos/3">Produto 3</a>
<a href="/produtos/4">Produto 4</a>
<a href="/produtos/5">Produto 5</a>

@endsection
