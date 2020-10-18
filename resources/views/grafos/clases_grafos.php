<?php
    class Grafo {
        protected $matriz_de_adyacencias = [];
        protected $vertices = [];
        public function __construct($texto_de_vertices)
        {
            $posicion = 0;
            $texto_de_vertices_separado = explode(",", $texto_de_vertices);
            foreach($texto_de_vertices_separado as $vertice) {
                $this->vertices[$posicion] = $vertice;
                $posicion++;
            }
            foreach($this->vertices as $vertice_i) {
                $columnas = [];
                foreach($this->vertices as $vertice_j) {
                    $columnas[$vertice_j] = [0,0];
                }
                $this->matriz_de_adyacencias[$vertice_i] = $columnas;
            }
        }
        public function get_vertices(){
            return $this->vertices;
        }
        public function get_tamano(){
            return $this->tamano_de_la_matriz($this->matriz_de_adyacencias);;
        }
        public function llenar_la_matriz_de_adyacencias($texto_de_adyacencias) { //'a,0,b';'c,6,d';'a,5,d'
            $adyacencias_separadas_por_punto_y_coma = explode(";", $texto_de_adyacencias);//'a,b','c,d','a,d'
            foreach($adyacencias_separadas_por_punto_y_coma as $adyacencia) {
                $adyacencia_separada_por_coma = explode(",", $adyacencia);//'a','0','b'
                $vertice1 = $adyacencia_separada_por_coma[0]; //'a'
                $etiqueta = (int)$adyacencia_separada_por_coma[1]; //'0'
                $vertice2 = $adyacencia_separada_por_coma[2]; //'b'
                /* HASTA ARRIBA TODO BIEN */
                $posicion_i = "";
                foreach($this->matriz_de_adyacencias as $key => $posicion) {
                    if($key == $vertice1) {
                        $posicion_i = $vertice1;
                        break;
                    }
                }
                $posicion_j = ""; //Posición de fila de 'a' en la matriz
                foreach($this->matriz_de_adyacencias as $key => $posicion) {
                    if($key == $vertice2) {
                        $posicion_j = $vertice2;
                        break;
                    }
                } //Posición de columna de 'b' en la matriz
                $this->matriz_de_adyacencias[$posicion_i][$posicion_j] = [1, $etiqueta]; //Se reemplaza por 1 esa posición
                $this->matriz_de_adyacencias[$posicion_j][$posicion_i] = [1, $etiqueta]; //Esta linea de código es solo para el grafo simple. Para el dirigido no se necesita esta.
            }
        }

        public function matriz_identidad() {
            $matriz_identidad = $this->matriz_de_adyacencias;
            foreach($matriz_identidad as $posicion_i => $key) {
                foreach($key as $posicion_j => $key2) {
                    if($posicion_i == $posicion_j) {
                        $matriz_identidad[$posicion_i][$posicion_j] = [1,0];
                    } else {
                        $matriz_identidad[$posicion_i][$posicion_j] = [0,0];
                    }
                }
            }
            return $matriz_identidad;
        }
        protected function suma_de_matrices($matriz_1, $matriz_2) {
            $resultado = $matriz_1;
            foreach($matriz_1 as $posicion_i => $key) {
                foreach($key as $posicion_j => $key2) {
                    $resultado[$posicion_i][$posicion_j][0] = $resultado[$posicion_i][$posicion_j][0] + $matriz_2[$posicion_i][$posicion_j][0];
                }
            }
            return $resultado;
        }
        protected function multiplicacion_de_matrices($matriz_1, $matriz_2) {
            $resultado = $matriz_1;
            foreach($matriz_1 as $posicion_i => $key) {//
                foreach($key as $posicion_j => $key2) {
                    $resultado[$posicion_i][$posicion_j][0] = 0;
                    foreach($matriz_1 as $k => $key3) {
                        $resultado[$posicion_i][$posicion_j][0] += $matriz_1[$posicion_i][$k][0] * $matriz_2[$k][$posicion_j][0];
                    }
                }
            }
            return $resultado;
        }
        protected function tamano_de_la_matriz($matriz) {
            $contador = 0;
            foreach($matriz as $posiciones) {
                $contador += 1;
            }
            return $contador;
        }
        protected function potencia_de_matriz($matriz, $exponente) {
            $resultado = $this->matriz_identidad();
            for($i = 1; $i <= $exponente; $i++) {
                $resultado = $this->multiplicacion_de_matrices($resultado, $matriz);
            }
            return $resultado;
        }
    }
    class GrafoSimple extends Grafo {
        public function matriz_de_caminos() {

            $matriz_de_caminos = [];
            $n = $this->tamano_de_la_matriz($this->matriz_de_adyacencias);
            for($i = 1; $i < $n; $i++) {
                if($i == 1) {
                    $matriz_de_caminos = $this->suma_de_matrices($this->matriz_identidad(), $this->matriz_de_adyacencias);
                } else {
                    $matriz_de_caminos = $this->suma_de_matrices($matriz_de_caminos, $this->potencia_de_matriz($this->matriz_de_adyacencias,$i));
                }
            }
            return $matriz_de_caminos;
        }
        public function es_conexo() {
            $matriz_de_caminos = $this->matriz_de_caminos();
            foreach($matriz_de_caminos as $i) {
                foreach($i as $j) {
                    if($j[0] == 0) {
                        return false;
                    }
                }
            }
            return true;
        }
        /*public function dijkstra($nodo_inicial, $matriz_de_adjacencia){
            $matriz_de_dijkstra = [];
            $matriz_de_adjacencia_copia = $matriz_de_adjacencia;
            $n = get_vertices();
            for($i = 1; $j =< $n; $j++) {
                $matriz_de_dijkstra =+ $matriz_de_adjacencia_copia[$nodo_inicial][$j];
                $matriz_de_adjacencia_copia[$nodo_inicial][$j] = 0;
                valor_etiqueta = $matriz_de_dijkstra[$nodo_inicial][$j];
                dijkstra($j,$matriz_de_adjacencia_copia);
                }

        }*/


        /* public function grafo_para_Dijkstra ($nodo_inicial){
            $matriz_Dijkstra = [];
            $n = 
            for($i = 1; $i < $n; $i++)
                foreach($this->matriz_de_adyacencias[$nodo_inicial,i]{
                    $matriz_Dijkstra = $matriz_Dijkstra + matriz_de_adyacencias[$nodo_inicial][$i]
                }                    

            }
                foreach($posicion_i as $key_j => $posicion_j){
                    if($posicion_j[0]==1){
                        $matriz_Dijkstra = 
                    }
                }
                
            }
        }; */

    }