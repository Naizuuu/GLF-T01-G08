@extends('layouts.plantilla')

@section('title', 'Grafos UTEM - Tipos de Grafos')

@section('content')
    <div class="container">
        <h1 class="display-4">¿Qué tipos de grafos existen?</h1>
        <h2 class="lead">Acá encontrarás los tipos de grafos que existen</h2>
        
        <div class="d-flex justify-content-around">
            <div class="card shadow-sm" style="width: 18rem; margin-top: 5%;">
                <img src="https://www.ecured.cu/images/a/ae/Grafok3.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Grafo Simple</h5>
                    <p class="card-text">Grafo que no presenta lazos en sus vértices ni más que una arista entre cualquier par de vértices.</p>
                </div>
            </div>
            <div class="card shadow-sm" style="width: 18rem; margin-top: 5%;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Directed.svg/1024px-Directed.svg.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Grafo Dirigido</h5>
                  <p class="card-text">Un grafo dirigido o digrafo es un tipo de grafo en el cual las aristas tienen un sentido definido, ​ a diferencia del grafo no dirigido, en el cual las aristas son relaciones simétricas y no apuntan en ningún sentido.</p>
                </div>
            </div>
        </div>
    </div>
@endsection