<?php

class ManageTarea {
    private $bd = null;
    private $tabla = "tarea";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($id_tarea){
        $parametros = array();
        $parametros['id_tarea']=$id_tarea;
        $this->bd->select($this->tabla, "*", "id_tarea = :id_tarea",$parametros );
        $row = $this->bd->getRow();
        $tarea = new Tarea();
        $tarea->set($row);
        return $tarea;
    }
    
    function delete($id_tarea){
        $parametros=array();
        $parametros["id_tarea"]=$id_tarea;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function deleteTareas($parametros){
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function getUsuarioTrue($email,$clave){
        $parametros=array();
        $parametros["email"]=$email;
        $parametros["clave"]=$clave;
        $this->bd->select($this->tabla,"count(*)","email=:email and clave=:clave",$parametros,"email");
        $fila= $this->bd->getRow();
        return $fila[0];   
    }
    
    function erase(Tarea $tarea){
        return $this->delete($tarea->getId_tarea());
    }
    
    function setId(Tarea $tarea,$pktarea){
        $parametrosWhere=array();
        $parametrosWhere["tarea"]=$pktarea;
        return $this->bd->update($this->tabla, $tarea->getGenerico(), $parametrosWhere);
    }
    function set(Tarea $tarea){
        $parametrosWhere=array();
        $parametrosWhere["tarea"]=$tarea->getId_tarea();
        return $this->bd->update($this->tabla, $usuario->getGenerico(), $parametrosWhere);
    }
    
    function insert(Tarea $tarea){
        //inserta un objeto y devuelve el ID
        return $this->bd->insert($this->tabla, $tarea->getGenerico());
    }
    /*function insert(Usuario $usuario){
        //inserta un objeto y devuelve el ID
        $parametros=array();
        $parametros["email"]=$usuario->getEmail();
        $parametros["clave"]=$usuario->getClave();
        $parametros["alias"]=$usuario->getAlias();
        $parametros["fechaalta"]=$usuario->getFechaalta();
        $parametros["activo"]=$usuario->getActivo();
        $parametros["administrador"]=$usuario->getAdministrador();
        $parametros["personal"]=$usuario->getPersonal();
        return $this->bd->insert($this->tabla, $parametros);
    }*/
    
    
    function count($condicion="1=1", $parametros=array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    
    function getListTareas(){
        
        $this->bd->select($this->tabla, "*", "1=1", array());
        $r=array();
        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/
        
        while($row = $this->bd->getRow()){
            $tarea = new Tarea();
            $tarea->set($row);
            $r[]=$tarea;
        }
        return $r;
    }
 
     //Funcion para sacar todas las tareas de un usuario
       function getListTareasUsuario($email){
           
        $parametros=array();
        $parametros["email"]=$email;
        $this->bd->select($this->tabla, "*", "email=:email", $parametros);
        $r=array();
        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/
        
        while($row = $this->bd->getRow()){
            $tarea = new Tarea();
            $tarea->set($row);
            $r[]=$tarea;
        }
        return $r;
    }
      function getListJsonTU($email,$pagina = 1, $orden = "", $nrpp = Constants::NRPP, $condicion = "email=:email", $parametros = array()) {
        $list = $this->getListTareasUsuario($email);
        $r = "[ ";
        foreach ($list as $objeto) {
            $r .= $objeto->getJSON() . ",";
        }
        $r = substr($r, 0, -1) . "]";
        return $r;
    }
    
    function getValueSelect(){
        //$table, $proyeccion="*", $parametros=array(), $orden="1", $limite=""
        $this->bd->query($this->tabla, "email", array(), "email");
        $array =array();
        while ($row=  $this->bd->getRow()){
            $array[$row[0]]=$row[1];
        }
        return $array;
    }
    
    function getListJson($pagina = 1, $orden = "", $nrpp = Constants::NRPP, $condicion = "1=1", $parametros = array()) {
        $list = $this->getListTareas($pagina, $orden, $nrpp, $condicion, $parametros);
        $r = "[ ";
        foreach ($list as $objeto) {
            $r .= $objeto->getJSON() . ",";
        }
        $r = substr($r, 0, -1) . "]";
        return $r;
    }

    

}

?>