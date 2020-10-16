@extends('layouts.plantilla')

@section('title', 'Grafo UTEM - Grafo Dirigido')

@section('content')

@include('layouts.partials.crear-cont')

    <div class="container">
        <form style="margin-top: 5%" class="ingresarGrafo" action="grafo-simple" method="get">
        
        
            {{-- <h1 class="display-4">Grafo simple</h1>
            <input type="text" name="grafo" value="" placeholder="Ingrese el grafo asi: akjnkjcnsd">
            <input type="submit" name="" value="Ingresar">
            <output type = "grafo" name=""></output> --}}
            <hr class="my-4">
            <h1 class="display-5">Grafo Dirigido</h1>
            <div class="form-group">
                <label for="texto_de_ejemplo">Nodos</label>
                <input type="text" class="form-control" name="grafoSimple" aria-describedby="textoGrafoSimple" title="Debe ingresar los nodos como el ejemplo: a,b,c" pattern="^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$" placeholder="Ingrese los nodos separados por comas. (Ej: a,b,c,d)" required>
            </div>
        </form>
    </div>
    
@endsection
@php
    /* if(isset($_GET['grafo']) && is_string($_GET['grafo']))
    {
        $grafo = $_GET ['grafo'];
        echo $grafo;
    }
    else
    {
        echo "No es string";
    } */
@endphp