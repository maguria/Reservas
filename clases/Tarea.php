<?php

class Tarea{
    private $id_tarea,$email;
    
    
   function __construct($id_tarea=null, $email=null) {
        $this->id_tarea= $id_tarea;
        $this->email = $email;
    }
    function getId_tarea() {
        return $this->id_tarea;
    }

    function getEmail() {
        return $this->email;
    }

    function setId_tarea($id_tarea) {
        $this->id_tarea = $id_tarea;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function set($valores, $inicio=0){
        $i=0;
        foreach ($this as $indice => $valor) {
            $this->$indice=$valores[$i+$inicio];
            $i++;
        }
    }
    
    function getGenerico(){
        $array = array();
        foreach ($this as $indice => $valor) {
            $array[$indice]=$valor;
        }
        return $array;
    }
    
    public function __toString() {
        $r ="";
        foreach ($this as $key => $valor) {
            $r .= "$valor ";
        }
        return $r;
    }
    
    //Con este método, del tirón, leo el objeto entero. Lee todos los parámetros, y ya los tiene preparados
    function read(){
        foreach ($this as $key=> $valor) {
            $this->$key= Request::req($key);
        }
    }
     function getJSON(){
        $r = '{';
        foreach ($this as $indice => $valor) {
            //$r .= '"' . $indice . '":"' . $valor . '",';
            //$r.='"' . $indice . '":' . json_encode(htmlspecialchars_decode($valor)) . ',';
            $r.='"' . $indice . '":' . json_encode($valor) . ',';
        }
        $r = substr($r, 0, -1);
        $r .= '}';
        return $r;
    }
}


