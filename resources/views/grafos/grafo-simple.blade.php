@extends('layouts.plantilla')

@include('grafos\clases_grafos')

@section('title', 'Grafo UTEM - Grafo Simple')

@section('content')

@include('layouts.partials.crear-cont')

    <div class="container">
        <form style="margin-top: 5%" class="ingresarGrafo" action="grafo-simple" method="get">
            <hr class="my-4">
            <h1 class="display-5">Grafo Simple</h1>
            <div class="form-group" style="margin-top: 2%">
                <label for="texto_de_ejemplo">Vértices</label>
                <input type="text" class="form-control" name="verticesGrafoSimple" aria-describedby="textoGrafoSimple" title="Debe ingresar los vértices como el ejemplo: a,b,c" pattern="^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$" placeholder="Ingrese los vértices separados por comas. (Ej: a,b,c,d)" required>

                @php
                    if(isset($_GET['verticesGrafosSimple']) && is_string('verticesGrafosSimple')){
                        $grafosimple = new Grafo($_GET['verticesGrafoSimple']);
                    }
                @endphp
      
@php
for($i = 0; $i < 5; $i++)
{
    echo <<< HTML
    <div class="row">
        <div class="col-sm">
            <div class="input-group" style="margin-top: 2%">
                <select class="custom-select" id="inputGroupSelect02">
                <option selected>a</option>
                <option value="1">b</option>
                <option value="2">c</option>
                <option value="3">d</option>
                </select>
            </div>
        </div>
        <div class="col-sm">
            <div class="input-group" style="margin-top: 2%">
                <select class="custom-select" id="inputGroupSelect02">
                <option selected>a</option>
                <option value="1">b</option>
                <option value="2">c</option>
                <option value="3">d</option>
                </select>
            </div>
        </div>
    </div>
HTML;
}
@endphp
            </div>
        </form>
    </div>
    
@endsection