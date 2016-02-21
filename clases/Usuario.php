<?php

class Usuario{
    private $email, $clave, $alias, $admin;
    
    
    function __construct($email=null, $clave=null, $alias=null, $admin=0) {
        $this->email = $email;
        $this->clave = $clave;
        $this->alias = $alias;
        $this->admin = $admin;

    }

    function getEmail() {
        return $this->email;
    }

    function getClave() {
        return $this->clave;
    }

    function getAlias() {
        return $this->alias;
    }

    function getAdmin() {
        return $this->admin;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
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
     function getJson(){
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


