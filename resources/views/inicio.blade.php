@extends('layouts.plantilla')

@section('titulo', 'Inicio')

@section('contenido')
    <header>
        <h1>Tarea 1: Grafos y Lenguajes Formales</h1>
        <p>Elija el tipo de grafo</p>
    </header>
    <nav>
        <a href={{'grafo-simple'}}>Grafo simple</a>
        <a href={{'grafo-dirigido'}}>Grafo dirigido</a>
    </nav>
@endsection