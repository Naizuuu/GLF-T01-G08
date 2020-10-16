@extends('layouts.plantilla')

@include('grafos\clases_grafos')

@section('title', 'Grafo UTEM - Grafo Simple')

@section('content')

@include('layouts.partials.crear-cont')

    <div class="container">
        <form style="margin-top: 5%" class="ingresarGrafo" method="get">
            <hr class="my-4">
            <h1 class="display-5">Grafo Simple</h1>
            <div class="form-group" style="margin-top: 2%">
                <label for="verticesGrafoSimple">Vértices</label>
                <input type="text" class="form-control" name="verticesGrafoSimple" id="verticesGrafoSimple" title="Debe ingresar los vértices como el ejemplo: a,b,c" pattern="^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$" placeholder="Ingrese los vértices separados por comas. (Ej: a,b,c,d)" autocomplete="off" required>
            </div>
            @php
                if(isset($_GET['verticesGrafoSimple']) && is_string('verticesGrafoSimple'))
                {
                    $grafoSimple = new Grafo($_GET['verticesGrafoSimple']);
                    var_dump($grafoSimple);
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

        {{-- <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">First and last name</span>
            </div>
            <input type="text" aria-label="First name" class="form-control">
            <input type="text" aria-label="Last name" class="form-control">
        </div> --}}
    
            {{-- @php
                if(isset($_GET['cantidadDeAristas']) && is_numeric('cantidadDeAristas'))
                {
                    $cantidad_de_aristas = $_GET['cantidadDeAristas'];
                    var_dump($cantidad_de_aristas);
                    
                    echo 'div class="form-group" style="margin-top: 2%">';
                    echo '<label for="texto_de_ejemplo">Seleccione las uniones.</label>';
                    
                    for($i = 0; $i < $cantidad_de_aristas; $i++)
                    {
                        echo <<< 'HTML'
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
                }
            @endphp --}}
        {{-- </form> --}}
    
@endsection