<?php
    class Grafo {
        public $matriz_de_adyacencias;
        public $vertices;
        public function __construct($texto_de_vertices)
        {
            $this->vertices = array();
            $posicion = 0;
            $texto_de_vertices_separado = explode(",", $texto_de_vertices);
            foreach($texto_de_vertices_separado as $vertice){
                $this->vertices[$posicion] = $vertice;
                $posicion++;
            }
            for($i=0; $i<strlen($this->$vertices); $i++)
            {
                for($j=0; $j<strlen($this->$vertices); $j++)
                {
                    $this->matriz_de_adyacencias[$i][$j]=0;
                }
            }
            
        }
        public function llenar_la_matriz_de_adyacencias ($texto_de_adyacencias)
        {
            $adyacencias_separadas_por_punto_y_coma = explode(";", $texto_de_adyacencias);
            foreach($adyacencias_separadas_por_punto_y_coma as $adyacencia){
                $adyacencia_separada_por_coma = explode(",", $adyacencia);
                $vertice1=$adyacencia_separada_por_coma[0];
                $vertice2=$adyacencia_separada_por_coma[1];
                $posicion_i=array_search($vertice1, $this->vertices);
                $posicion_j=array_search($vertice2, $this->vertices);
                $this->matriz_de_adyacencias[$posicion_i][$posicion_j]=1;
            }
        }
    }
/*En construcción*/