<?php
    class Grafo {
        protected $matriz_de_adyacencias = [];
        protected $vertices = [];
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
                    $columnas[$vertice_j] = [0,0];
                }
                $this->matriz_de_adyacencias[$vertice_i] = $columnas;
            }
        }
        public function get_vertices(){
            return $this->vertices;
        }
        public function llenar_la_matriz_de_adyacencias ($texto_de_adyacencias) //'a,0,b';'c,6,d';'a,5,d'
        {
            $adyacencias_separadas_por_punto_y_coma = explode(";", $texto_de_adyacencias);//'a,b','c,d','a,d'
            foreach($adyacencias_separadas_por_punto_y_coma as $adyacencia){
                $adyacencia_separada_por_coma = explode(",", $adyacencia);//'a','0','b'
                $vertice1=$adyacencia_separada_por_coma[0];//'a'
                $etiqueta=(int)$adyacencia_separada_por_coma[1];//'0'
                $vertice2=$adyacencia_separada_por_coma[2];//'b'
                $posicion_i=array_search($vertice1, $this->matriz_de_adyacencias);//Posición de fila de 'a' en la matriz
                $posicion_j=array_search($vertice2, $this->matriz_de_adyacencias[$vertice1]);//Posición de columna de 'b' en la matriz
                $this->matriz_de_adyacencias[$posicion_i][$posicion_j] = [1,$etiqueta];//Se reemplaza por 1 esa posición
            }
        }
        public function matriz_identidad(){
            $matriz_identidad=$this->matriz_de_adyacencias;
            foreach($matriz_identidad as $posicion_i){
                foreach($posicion_i as $posicion_j){
                    if($posicion_i==$posicion_j){
                        $matriz_identidad[$posicion_i][$posicion_j]=[1,0];
                    }else{
                        $matriz_identidad[$posicion_i][$posicion_j]=[0,0];
                    }
                }
            }
            return $matriz_identidad;
        }
        protected function suma_de_matrices($matriz_1, $matriz_2){
            $resultado = $matriz_1;
            foreach($matriz_1 as $posicion_i){
                foreach($posicion_i as $posicion_j){
                    $resultado[$posicion_i][$posicion_j][0] = $resultado[$posicion_i][$posicion_j][0] + $matriz_2[$posicion_i][$posicion_j][0];
                }
            }
            return $resultado;
        }
        protected function multiplicacion_de_matrices($matriz_1, $matriz_2){
            $resultado = $matriz_1;
            foreach ($matriz_1 as $posicion_i){//
                foreach($posicion_i as $posicion_j){
                    $resultado[$posicion_i][$posicion_j][0] = 0;
                    foreach($matriz_1 as $k){
                        $resultado[$posicion_i][$posicion_j][0] += $matriz_1[$posicion_i][$k][0] * $matriz_2[$k][$posicion_j][0];
                    }
                }
            }
            return $resultado;
        }
        protected function tamano_de_la_matriz($matriz){
            $contador = 0;
            foreach($matriz as $posiciones){
                $contador+=1;
            }
            return $contador;
        }
        protected function potencia_de_matriz($matriz, $exponente){
            $resultado = $this->matriz_identidad();
            for($i = 1; $i<=$exponente; $i++){
                $resultado = $this->multiplicacion_de_matrices($resultado, $matriz);
            }
            return $resultado;
        }
    }
    class GrafoSimple extends Grafo{
        public function matriz_de_caminos(){ /* ESTA */
            $matriz_de_caminos = [];
            $n = $this->tamano_de_la_matriz($this->matriz_de_adyacencias);
            for($i = 1; $i < $n; $i++){
                if($i == 1){
                    $matriz_de_caminos=$this->suma_de_matrices($this->matriz_identidad(), $this->matriz_de_adyacencias);
                }else{
                    $matriz_de_caminos=$this->suma_de_matrices($matriz_de_caminos, $this->potencia_de_matriz($this->matriz_de_adyacencias,$i));
                }
            }
            return $matriz_de_caminos;
        }
        public function es_conexo(){
            $matriz_de_caminos = $this->matriz_de_caminos();
            foreach($matriz_de_caminos as $i){
                foreach($i as $j){
                    if($j[0]==0){
                        return false;
                    }
                }
            }
            return true;
        }
        /*public function dijkstra($nodo_inicial, $nodo_final){
    
        }*/


        /* public function grafo_para_Dijkstra (){
            $matriz = [];
            $contador = 
            foreach($this->matriz_de_adyacencias as $key_i => $posicion_i){
                foreach($posicion_i as $key_j => $posicion_j){
                    if($posicion_j[0]==1){
                        $matriz = 
                    }
                }
                
            }
        }; */

    } 
/*En construcción:
    - Listo el constructor
    - Lista la función llenar_la_matriz_de_adyacencias
    - Lista matriz_identidad
    - Lista suma_de_matrices
    - Lista multiplicacion_de_matrices
    - Listo tamano_de_la_matriz
    - Listo potencia_de_matriz
    - Listo matriz_de_caminos
    - Listo es_conexo



function dijkstra($graphs, $source, $target) {
    $vertices = array();
    $neighbours = array();
    $path = array();

    foreach($graphs as $edge) {
        array_push($vertices, $edge[0], $edge[1]);
        $neighbours[$edge[0]][] = array('endEdge' => $edge[1], 'cost' => $edge[2]);
    }

    $vertices = array_unique($vertices);

    foreach($vertices as $vertex) {
        $dist[$vertex] = INF;
        $previous[$vertex] = NULL;
    }

    $dist[$source] = 0;
    $g = $vertices;
    while(count($g) > 0) {
        $min = INF;
        foreach($g as $vertex) {
            if($dist[$vertex] < $min) {
                $min = $dist[$vertex];
                $u = $vertex;
            }
        }

        $g = array_diff($g, array($u));
        if($dist[$u] == INF or $u == $target) {
            break;
        }

        if(isset($neighbours[$u])) {
            foreach($neighbours[$u] as $arr) {
                $alt = $dist[$u] + $arr["cost"];
                if($alt < $dist[$arr["endEdge"]]) {
                    $dist[$arr["endEdge"]] = $alt;
                    $previous[$arr["endEdge"]] = $u;
                }
            }
        }
    }

    $u = $target;
    while(isset($previous[$u])) {
        array_unshift($path, $u);
        $u = $previous[$u];
    }
    array_unshift($path, $u);
    return $path;
}

    $graphs = array(
        array("a", "b", 6),
        array("a", "c", 9),
        array("a", "f", 13),
        array("b", "c", 10),
        array("b", "d", 6),
    );

    $path = dijkstra($graphs, "a, "e");

    echo "The path is [" . implode(", ", $path . "]\n");