@extends('layouts.plantilla')

@section('titulo', 'Menu')

@section('contenido')
    <h1>Menú</h1>
    <p>
        a. Mostrar matriz de caminos e indicar si el grafo es o no conexo.<br>
        b. Mostrar el camino más corto para dos nodos a elección del usuario, mostrando la duración y la ruta de dicho camino (nodos por los que pasa).<br>
        c. Indicar si es hamiltoniano y/o euleriano, indicando el camino hamiltoniano y/o euleriano que lo define como tal.<br>
        d. Indicar el flujo máximo para un nodo de origen/entrada y otro de destino/salida a elección del usuario.<br>
        e. Obtener el árbol generador mínimo mediante prim o kruskal.<br>
    </p>
@endsection