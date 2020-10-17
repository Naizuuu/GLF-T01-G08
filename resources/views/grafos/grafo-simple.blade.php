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
                    $grafoSimple = new grafoSimple($_GET['verticesGrafoSimple']);
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

            <div class="pretty p-switch">
                <input type="radio" name="Etiquetado" value="0" <?php if(isset($_GET['Etiquetado']) && $_GET['Etiquetado'] == 0) { echo 'checked="checked"'; } ?> required>
                <div class="state p-success">
                    <label>No Etiquetado</label>
                </div>
            </div>
        
            <div class="pretty p-switch p-fill">
                <input type="radio" name="Etiquetado" value="1" <?php if(isset($_GET['Etiquetado']) && $_GET['Etiquetado'] == 1) { echo 'checked="checked"'; } ?> required>
                <div class="state p-success">
                    <label>Etiquetado</label>
                </div>
            </div>

            @isset($_GET['Etiquetado'])
                @php
                    $_GET['Etiquetado'] = $_GET['Etiquetado'] == '1' ? true : false;
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
                            @foreach($grafoSimple->get_vertices() as $vertice)
                                <option value={{ $vertice }} <?php if(isset($_GET['ladoA_' . $i]) && $_GET['ladoA_' . $i] == $vertice) { echo 'selected="selected"'; } ?> >{{ $vertice }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <h1> — </h1>
                    </div>
                    @if($_GET['Etiquetado'])
                        <div class="col-sm-1">
                            <div class="input-group" style="margin-top: 2%;">
                            <input type="number" class="form-control" name="numEtiquetado_{{ $i }}" title="Debe ingresar el valor del etiquetado." placeholder="1" min="1" autocomplete="off" value="<?php echo htmlspecialchars($_GET['numEtiquetado_' . $i] ?? '', ENT_QUOTES); ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <h1> — </h1>
                        </div>
                    @endif
                    <div class="col-sm">
                        <div class="input-group" style="margin-top: 2%;">
                            <select class="custom-select" name="ladoB_{{ $i }}">
                            @foreach($grafoSimple->get_vertices() as $vertice)
                                <option value={{ $vertice }} <?php if(isset($_GET['ladoB_' . $i]) && $_GET['ladoB_' . $i] == $vertice) { echo 'selected="selected"'; } ?> >{{ $vertice }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endfor

            <button style="margin-top: 2%;" type="submit" class="btn btn-primary btn-lg btn-block">Confirmar</button> 

            @php $i = 0; @endphp
            @isset($_GET['ladoA_' . $i])
                @php $texto_de_adyacencias = ""; @endphp
                @for($i = 0; $i < $cantidad_de_aristas; $i++)
                @php
                    $valorA = $_GET['ladoA_' . $i];
                    if($_GET['Etiquetado']) {
                        $etiqueta = $_GET['numEtiquetado_' . $i];
                    }
                    $valorB = $_GET['ladoB_' . $i];
                    if($i == $cantidad_de_aristas - 1) {
                        if($_GET['Etiquetado']) {
                            $texto_de_adyacencias = $texto_de_adyacencias . $valorA . "," . $etiqueta . "," . $valorB; // a,1,b;c,2,d
                        } else {
                            $texto_de_adyacencias = $texto_de_adyacencias . $valorA . ",0," . $valorB; // a,0,b;c,0,d
                        }
                    } else {
                        if($_GET['Etiquetado']) {                            
                            $texto_de_adyacencias = $texto_de_adyacencias . $valorA . "," . $etiqueta . "," . $valorB . ";"; // a,1,b;c,2,d;
                        } else {
                            $texto_de_adyacencias = $texto_de_adyacencias . $valorA . ",0," . $valorB . ";"; // a,0,b;c,0,d;
                        }
                    }
                @endphp
                @endfor
                @php var_dump($texto_de_adyacencias); @endphp
            @endisset
        </form>
    </div>

@endsection