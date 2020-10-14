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
                <label for="exampleInputEmail1">Cantidad de nodos</label>
                <input type="number" class="form-control" name="grafoSimple" aria-describedby="textoGrafoSimple" placeholder="Ingresa la cantidad de nodos, por ejemplo: 3" required>
                <small id="textoGrafoSimple" class="form-text text-muted">Ponte vio.</small>
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