@extends('layouts.plantilla')

@include('grafos\clases_grafos')

@section('title', 'Grafo UTEM - Grafo Simple')

@section('content')

    @include('layouts.partials.crear-cont')

    <div class="container">
        <form style="margin-top: 5%;" class="ingresarGrafo" method="get">
            <hr class="my-4">
            <h1 class="display-5">Grafo Simple</h1>
            <div class="form-group" style="margin-top: 2%;">
                <label for="verticesGrafoSimple">Vértices</label>
                <input type="text" class="form-control" name="verticesGrafoSimple" id="verticesGrafoSimple" title="Debe ingresar los vértices como el ejemplo: a,b,c" pattern="^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$" placeholder="Ingrese los vértices separados por comas. (Ej: a,b,c,d)" autocomplete="off" required>
            </div>
            @php
                if(isset($_GET['verticesGrafoSimple']) && is_string('verticesGrafoSimple'))
                {
                    $grafoSimple = new Grafo($_GET['verticesGrafoSimple']);
                }
            @endphp
            
            <div class="form-group" style="margin-top: 2%;"> 
                <label for="cantidadDeAristas">Cantidad de Aristas</label>
                <input type="number" class="form-control" name="cantidadDeAristas" title="Debe ingresar la cantidad de aristas en el grafo." placeholder="Ingrese la cantidad de aristas." min="0" autocomplete="off" required>         
            </div>            

            @php $cantidad_de_aristas = 0; @endphp
            @isset($_GET['cantidadDeAristas'])
                @php
                    $cantidad_de_aristas = (int)$_GET['cantidadDeAristas'];
                @endphp
            @endisset      
            @for($i = 0; $i < $cantidad_de_aristas; $i++)
                @if($i == 0)
                    <div class="form-group" style="margin-top: 2%;">
                    <label for="texto_de_ejemplo">Seleccione las uniones</label>
                @endif
                <div class="row">
                    <div class="col-sm">
                        <div class="input-group" style="margin-top: 2%;">
                            <select class="custom-select" id="columna1">
                            @php $contador = 0; @endphp
                            @foreach($grafoSimple->vertices as $vertice)
                                <option value={{ (string)$contador }}>{{ $vertice }}</option>
                                @php $contador++; @endphp
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group" style="margin-top: 2%;">
                            <select class="custom-select" id="columna2">
                            @php $contador = 0; @endphp
                            @foreach($grafoSimple->vertices as $vertice)
                                <option value={{ (string)$contador }}>{{ $vertice }}</option>
                                @php $contador++; @endphp
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endfor
            <button style="margin-top: 2%;" type="submit" class="btn btn-primary btn-lg btn-block" onclick="ocultar()">Confirmar</button>
        </form>
    </div>

@endsection