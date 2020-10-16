@extends('layouts.plantilla')

@section('title', 'Grafo UTEM - Grafo Dirigido')

@section('content')

@include('layouts.partials.crear-cont')

<div class="container">
    <form style="margin-top: 5%" class="ingresarGrafo" method="get">
        <hr class="my-4">
        <h1 class="display-5">Grafo Dirigido</h1>
        <div class="form-group" style="margin-top: 2%">
            <label for="verticesGrafoDirigido">Vértices</label>
            <input type="text" class="form-control" name="verticesGrafoDirigido" id="verticesGrafoDirigido" title="Debe ingresar los vértices como el ejemplo: a,b,c" pattern="^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$" placeholder="Ingrese los vértices separados por comas. (Ej: a,b,c,d)" autocomplete="off" required>
        </div>
        @php
            if(isset($_GET['verticesGrafoDirigido']) && is_string('verticesGrafoDirigido'))
            {
                $grafoDirigido = new Grafo($_GET['verticesGrafoDirigido']);
                var_dump($grafoDirigo);
            }
        @endphp
        
        <div class="form-group" style="margin-top: 2%"> 
            <label for="cantidadDeAristas">Cantidad de Aristas</label>
            <input type="number" class="form-control" name="cantidadDeAristas" title="Debe ingresar la cantidad de aristas en el grafo." placeholder="Ingrese la cantidad de aristas." min="0" autocomplete="off" required>         
        </div>
        @php
            if(isset($_GET['cantidadDeAristas']))
            {
                $cantidad_de_aristas = (int)$_GET['cantidadDeAristas'];
                var_dump($cantidad_de_aristas);
            }
        @endphp
        <button type="submit" class="btn btn-primary btn-lg btn-block">Confirmar</button>
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