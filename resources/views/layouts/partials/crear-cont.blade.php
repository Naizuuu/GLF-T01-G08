<div class="container">
    <h1 class="display-4">Crear un Grafo</h1>
    <h2 class="lead">Seleccione la opción que desee:</h2>
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
