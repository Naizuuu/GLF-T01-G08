<?php
    class Grafo {
        public $matriz_de_adyacencias = [];
        public $vertices = [];
        public function __construct($texto_de_vertices)
        {
            $posicion = 0;
            $texto_de_vertices_separado = explode(",", $texto_de_vertices);
            foreach($texto_de_vertices_separado as $vertice){
                $this->vertices[$posicion] = $vertice;
                $posicion++;
            }
            foreach($this->vertices as $vertice_i){
                $columnas = [];
                foreach($this->vertices as $vertice_j){
                    $columnas[$vertice_j] = 0;
                }
                $this->matriz_de_adyacencias[$vertice_i] = $columnas;
            }
        }
        public function llenar_la_matriz_de_adyacencias ($texto_de_adyacencias) //'a,b;c,d;a,d'
        {
            $adyacencias_separadas_por_punto_y_coma = explode(";", $texto_de_adyacencias);//'a,b','c,d','a,d'
            foreach($adyacencias_separadas_por_punto_y_coma as $adyacencia){
                $adyacencia_separada_por_coma = explode(",", $adyacencia);//'a','b'
                $vertice1=$adyacencia_separada_por_coma[0];//'a'
                $vertice2=$adyacencia_separada_por_coma[1];//'b'
                $posicion_i=array_search($vertice1, $this->matriz_de_adyacencias);//Posición de fila de 'a' en la matriz
                $posicion_j=array_search($vertice2, $this->matriz_de_adyacencias[$vertice1]);//Posición de columna de 'b' en la matriz
                $this->matriz_de_adyacencias[$posicion_i][$posicion_j] = 1;//Se reemplaza por 1 esa posición
            }
        }
    }
/*En construcción:
    - Listo el constructor
    - Lista la función llenar_la_matriz_de_adyacencias