@extends('layouts.plantilla')

@section('title', 'Grafo dirigido')

@section('content')
    <form class="ingresarGrafo" action="grafo-dirigido" method="get">
        <h1>Grafo dirigido</h1>
        <input type="text" name="grafo" value="">
        <input type="submit" name="" value="Ingresar">
    </form>
    
@endsection
@php
    if(isset($_GET['grafo']) && is_string($_GET['grafo']))
    {
        $grafo = $_GET ['grafo'];
        echo $grafo;
    }
    else
    {
        echo "No es string";
    }
@endphp