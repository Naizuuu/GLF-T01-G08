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
                <input type="text" class="form-control" name="verticesGrafoSimple" id="verticesGrafoSimple" title="Debe ingresar los vértices como el ejemplo: a,b,c" pattern="^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$" placeholder="Ingrese los vértices separados por comas. (Ej: a,b,c,d)" autocomplete="off" value="<?php echo htmlspecialchars($_GET['verticesGrafoSimple'] ?? '', ENT_QUOTES); ?>" required>
            </div>
            @php
                if(isset($_GET['verticesGrafoSimple']) && is_string('verticesGrafoSimple'))
                {
                    $grafoSimple = new Grafo($_GET['verticesGrafoSimple']);
                }
            @endphp
            
            <div class="form-group" style="margin-top: 2%;"> 
                <label for="cantidadDeAristas">Cantidad de Aristas</label>
                <input type="number" class="form-control" name="cantidadDeAristas" title="Debe ingresar la cantidad de aristas en el grafo." placeholder="Ingrese la cantidad de aristas." min="0" autocomplete="off" value="<?php echo htmlspecialchars($_GET['cantidadDeAristas'] ?? '', ENT_QUOTES); ?>" required>
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
                    <label style="margin-bottom: -2%;">Seleccione las uniones</label>
                @endif
                <div class="row">
                    <div class="col-sm">
                        <div class="input-group" style="margin-top: 2%;">
                            <select class="custom-select" name="ladoA_{{ $i }}">
                            @foreach($grafoSimple->vertices as $vertice)
                                <option value={{ $vertice }}>{{ $vertice }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <h1> — </h1>
                    </div>
                    <div class="col-sm">
                        <div class="input-group" style="margin-top: 2%;">
                            <select class="custom-select" name="ladoB_{{ $i }}">
                            @foreach($grafoSimple->vertices as $vertice)
                                <option value={{ $vertice }}>{{ $vertice }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endfor
            <button style="margin-top: 2%;" type="submit" class="btn btn-primary btn-lg btn-block">Confirmar</button> 

            {{-- ESTO SE DEBE ARREGLAR XD --}}

            {{-- @php $lado = ""; @endphp
            @isset($_GET['ladoA_' . $i])
                @php
                    $lado = $_GET['ladoA_' . $i];
                @endphp
            @endisset --}}

            {{--  ESTO DE ACÁ SIGNIFICA QUE NO TIENE VALOR, HAY QUE DESCOMENTARLO PARA CACHAR --}}
            {{--  @empty($_GET['ladoA_' . $i])
                @php echo "<br>Este texto se imprimirá SOLAMENTE cuando ladoA_(num) no tenga asignación.<br>"; @endphp
            @endempty --}}

            @isset($_GET['ladoA_' . $i])
                @php $texto_de_adyacencias = ""; @endphp
                @for($i = 0; $i < $cantidad_de_aristas; $i++)
                @php
                    $valorA = $_GET['ladoA_' . $i];
                    /* var_dump($valorA); */
                    $valorB = $_GET['ladoB_' . $i];
                    /* var_dump($valorB); */
                    if($i == $cantidad_de_aristas - 1) {
                        $texto_de_adyacencias = $texto_de_adyacencias . $valorA . "," . $valorB; // a,b;c,d;
                        /* var_dump($texto_de_adyacencias); */
                    } else {
                        $texto_de_adyacencias = $texto_de_adyacencias . $valorA . "," . $valorB . ";"; // a,b;c,d;
                        /* var_dump($texto_de_adyacencias); */
                    }
                @endphp
                @endfor    
                @php var_dump($texto_de_adyacencias) @endphp
            @endisset
    
        </form>
    </div>

@endsection