@extends('layouts.plantilla')

@include('grafos\clases_grafos')

@section('title', 'Grafo UTEM - Procesando Grafo')

@section('content')

    @php
        $texto_de_adyacencias = base64_decode($_GET['t']);
        $verticesGrafoSimple = base64_decode($_GET['v']);
        $GrafoSimple = new GrafoSimple($verticesGrafoSimple);
        $GrafoSimple->llenar_la_matriz_de_adyacencias($texto_de_adyacencias);
    @endphp

    <div class="container">
        <h1 class="display-4">Menú Grafo</h1>
        <h2 class="lead">¿Qué desea hacer con el grafo ingresado?</h2>
        <div class="d-flex justify-content-around" style="margin-top: 5%">
            <div class="list-group">
                <button type="button" name="option" class="list-group-item list-group-item-action" onclick="getElementById('Uno').style.display = 'block'">Mostrar matriz de caminos e indicar si el grafo es o no conexo.</button>
                <button type="button" name="option" class="list-group-item list-group-item-action" onclick="getElementById('Dos').style.display = 'block'">Mostrar el camino más corto para dos nodos a elección del usuario, mostrando la duración y la ruta de dicho camino (nodos por los que pasa).</button>
                <button type="button" name="option" class="list-group-item list-group-item-action" onclick="getElementById('Tres').style.display = 'block'">Indicar si es hamiltoniano y/o euleriano, indicando el camino hamiltoniano y/o euleriano que lo define como tal.</button>
                <button type="button" name="option" class="list-group-item list-group-item-action" onclick="getElementById('Cuatro').style.display = 'block'">Indicar el flujo máximo para un nodo de origen/entrada y otro de destino/salida a elección del usuario.</button>
                <button type="button" name="option" class="list-group-item list-group-item-action" onclick="getElementById('Cinco').style.display = 'block'">Obtener el árbol generador mínimo mediante prim o kruskal.</button>
            </div>
        </div>
    </div>

    <div class="container" id="Uno" style="display: none; margin-top: 5%;">
        <hr class="my-4">
        <h1 class="display-5">Mostrar matriz de caminos e indicar si el grafo es o no conexo.</h1>

        @php 
            $matrizCaminos = $GrafoSimple->matriz_de_caminos();
            $n = $GrafoSimple->get_tamano();
        @endphp

        <table class="table table-borderless table-dark">
            <thead>
                <tr>
                    <th scope="col"></th>
                    @foreach($GrafoSimple->get_vertices() as $vertice)
                        <th scope="col">{{ $vertice }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($GrafoSimple->get_vertices() as $vertice)
                    <tr>
                        <th scope="row">{{ $vertice }}</th>
                            @foreach($GrafoSimple->get_vertices() as $vertice2)
                                <td>{{$matrizCaminos[$vertice][$vertice2][0]}}</td>
                            @endforeach
                    </tr>
                @endforeach
            </tbody>
          </table>

    </div>

    <div class="container" id="Dos" style="display: none; margin-top: 5%;">
        <hr class="my-4">
        <h1 class="display-5">Mostrar el camino más corto para dos nodos a elección del usuario, mostrando la duración y la ruta de dicho camino (nodos por los que pasa).</h1>
    </div>

    <div class="container" id="Tres" style="display: none; margin-top: 5%;">
        <hr class="my-4">
        <h1 class="display-5">Indicar si es hamiltoniano y/o euleriano, indicando el camino hamiltoniano y/o euleriano que lo define como tal.</h1>
    </div>

    <div class="container" id="Cuatro" style="display: none; margin-top: 5%;">
        <hr class="my-4">
        <h1 class="display-5">Indicar el flujo máximo para un nodo de origen/entrada y otro de destino/salida a elección del usuario.</h1>
    </div>

    <div class="container" id="Cinco" style="display: none; margin-top: 5%;">
        <hr class="my-4">
        <h1 class="display-5">Obtener el árbol generador mínimo mediante prim o kruskal.</h1>
    </div>    
@endsection