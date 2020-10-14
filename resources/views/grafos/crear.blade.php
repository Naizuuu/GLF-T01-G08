@extends('layouts.plantilla')

@section('title', 'Grafos UTEM - Crear un Grafo')

@section('content')
    {{-- <div class="container">
        <h1 class="display-4">Crear un Grafo</h1>
        <h2 class="lead">Seleccione la opción que desee:</h2>

        <form style="margin-top: 5%">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Tipo de Grafo</label>
                <select class="form-control" id="exampleFormControlSelect1" required>
                  <option>Grafo Simple</option>
                  <option>Grafo Dirigido</option>
                </select>
            </div>
            
            {{-- <div class="form-group">
                <label for="exampleInputEmail1">¿Cuántos ...?</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <small id="emailHelp" class="form-text text-muted">Sea cuidadoso.</small>
            </div> --}

            <button type="submit" class="btn btn-primary">Confirmar</button>
        </form>
    </div> --}}
    @include('layouts.partials.crear-cont')
@endsection