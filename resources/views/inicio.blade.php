@extends('layouts/plantilla')

@section('titulo', 'Inicio')

@section('contenido')
    <h1>Bienvenido</h1>
    <a href="{{route('Grafo-dirigido')}}">Grafo Dirigido</a>
@endsection