<div class="container">
    <h1 class="display-4">Crear un Grafo</h1>
    <h2 class="lead">Seleccione la opción que desee:</h2>

    {{-- <form style="margin-top: 5%" method="GET" action="{{url('grafos/grafo-dirigido')}}"> --}}
        {{-- <div class="form-group">
            <label for="crearTipoGrafo">Tipo de Grafo</label>
            <select name="opcionGrafo" class="form-control" required>
              <option value="0">Grafo Simple</option>
              <option value="1">Grafo Dirigido</option>
            </select>
        </div> --}}

        {{-- <div class="form-group">
            <label for="exampleInputEmail1">¿Cuántos ...?</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text text-muted">Sea cuidadoso.</small>
        </div> --}}
        <div class="d-flex justify-content-around" style="margin-top: 5%">
            <a href="{{route('grafo-simple')}}">
                <button type="submit" class="btn btn-info btn-lg">Grafo Simple</button>
            </a>
            <a href="{{route('grafo-dirigido')}}">
                <button type="submit" class="btn btn-info btn-lg">Grafo Dirigido</button>
            </a>
        </div>
    {{-- </form> --}}
</div>
