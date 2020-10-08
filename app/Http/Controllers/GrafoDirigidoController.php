<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrafoDirigidoController extends Controller
{
    public function __invoke(){
        return view('grafo-dirigido');
    }
}