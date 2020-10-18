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
                <button type="button" name="option" class="list-group-item list-group-item-action" onclick="getElementById('XD1').style.display = 'block'">Mostrar matriz de caminos e indicar si el grafo es o no conexo.</button>
                <button type="button" name="option" class="list-group-item list-group-item-action" onclick="getElementById('XD2').style.display = 'block'">Mostrar el camino más corto para dos nodos a elección del usuario, mostrando la duración y la ruta de dicho camino (nodos por los que pasa).</button>
                <button type="button" name="option" class="list-group-item list-group-item-action" onclick="getElementById('XD3').style.display = 'block'">Indicar si es hamiltoniano y/o euleriano, indicando el camino hamiltoniano y/o euleriano que lo define como tal.</button>
                <button type="button" name="option" class="list-group-item list-group-item-action" onclick="getElementById('XD4').style.display = 'block'">Indicar el flujo máximo para un nodo de origen/entrada y otro de destino/salida a elección del usuario.</button>
                <button type="button" name="option" class="list-group-item list-group-item-action" onclick="getElementById('XD5').style.display = 'block'">Obtener el árbol generador mínimo mediante prim o kruskal.</button>
            </div>
        </div>
    </div>

    <div class="container" id="XD1" style="display: none; margin-top: 5%;">
        <hr class="my-4">
        <h1 class="display-5">Mostrar matriz de caminos e indicar si el grafo es o no conexo.</h1>

        @php
            /* $matrizCaminos = $GrafoSimple->matriz_de_caminos(); */
            $GrafoSimple->matriz_identidad();
            /* var_dump($GrafoSimple->matriz_identidad()); */
        @endphp


    </div>

    <div class="container" id="XD2" style="display: none; margin-top: 5%;">
        <hr class="my-4">
        <h1 class="display-5">Grafo Simple</h1>
    </div>
@endsection