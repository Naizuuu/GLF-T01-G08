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
        public function matriz_identidad(){
            $matriz_identidad=$this->matriz_de_adyacencias;
            foreach($matriz_identidad as $posicion_i){
                foreach($posicion_i as $posicion_j){
                    if($posicion_i==$posicion_j){
                        $matriz_identidad[$posicion_i][$posicion_j]=1;
                    }else{
                        $matriz_identidad[$posicion_i][$posicion_j]=0;
                    }
                }
            }
            return $matriz_identidad;
        }
        public function suma_de_matrices($matriz_1, $matriz_2){
            $resultado = [];
            foreach($matriz_1 as $posicion_i){
                foreach($posicion_i as $posicion_j){
                    $resultado[$posicion_i][$posicion_j] = $matriz_1[$posicion_i][$posicion_j] + $matriz_2[$posicion_i][$posicion_j];
                }
            }
            return $resultado;
        }
        public function multiplicacion_de_matrices($matriz_1, $matriz_2){
            $resultado = [];
            foreach ($matriz_1 as $posicion_i){
                foreach($posicion_i as $posicion_j){
                    $resultado[$posicion_i][$posicion_j] = 0;
                    foreach($matriz_1 as $k){
                        $resultado += $matriz_1[$posicion_i][$k] * $matriz_2[$k][$posicion_j];
                    }
                }
            }
            return $resultado;
        }
        public function tamano_de_la_matriz($matriz){
            $contador = 0;
            foreach($matriz as $posiciones){
                $contador+=1;
            }
            return $contador;
        }
        public function potencia_de_matriz($matriz, $exponente){
            $resultado = $this->matriz_identidad();
            for($i = 1; $i<=$exponente; $i++){
                $resultado = $this->multiplicacion_de_matrices($resultado, $matriz);
            }
            return $resultado;
        }
    }
    class GrafoSimple extends Grafo{
        public function matriz_de_caminos(){
            $matriz_de_caminos = [];
            $n = $this->tamano_de_la_matriz($this->matriz_de_adyacencias);
            for($i = 1;$i < $n;$i++){
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
            $es_conexo = true;
            foreach($matriz_de_caminos as $i){
                if(in_array(0,$i)){
                    $es_conexo=false;
                    break;
                }
            }
            return $es_conexo; 
        }
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