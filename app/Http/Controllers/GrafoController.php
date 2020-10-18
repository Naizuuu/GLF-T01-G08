<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrafoController extends Controller
{
    public function index(){
        return view('grafos.inicio');
    }
    public function create() {
        return view('grafos.crear');
    }
    public function proceso() {
        return view('grafos.proceso-grafo');
    }
}
