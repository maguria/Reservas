<?php

class ManageUsuario {
    private $bd = null;
    private $tabla = "usuario";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($email){
        $parametros = array();
        $parametros['email']=$email;
        $this->bd->select($this->tabla, "*", "email = :email",$parametros );
        $row = $this->bd->getRow();
        $usuario = new Usuario();
        $usuario->set($row);
        return $usuario;
    }
    
    function delete($email){
        $parametros=array();
        $parametros["email"]=$email;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
     function forzarDelete($email){
        $parametros=array();
        $parametros["email"]=$email;
        $gestor=new ManageTarea($this->bd);
        $gestor->deleteTareas($parametros);
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
    function esAdmin($email,$clave){
        $parametros=array();
        $parametros["email"]=$email;
        $parametros["clave"]=$clave;
        $this->bd->select($this->tabla,"count(*)","email=:email and clave=:clave and admin=1",$parametros,"email");
        $fila= $this->bd->getRow();
        return $fila[0];
    }
    
    function erase(Usuario $usuario){
        return $this->delete($usuario->getEmail());
    }
    
    function setEm(Usuario $usuario,$pkemail){
        $parametrosWhere=array();
        $parametrosWhere["email"]=$pkemail;
        return $this->bd->update($this->tabla, $usuario->getGenerico(), $parametrosWhere);
    }
    function set(Usuario $usuario){
        $parametrosWhere=array();
        $parametrosWhere["email"]=$usuario->getEmail();
        return $this->bd->update($this->tabla, $usuario->getGenerico(), $parametrosWhere);
    }
    
    function insert(Usuario $usuario){
        //inserta un objeto y devuelve el ID
        return $this->bd->insert($this->tabla, $usuario->getGenerico());
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
    
    function getListUsuarios(){
        
        $this->bd->select($this->tabla, "*", "admin=0", array());
        $r=array();
        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/
        
        while($row = $this->bd->getRow()){
            $usuario = new Usuario();
            $usuario->set($row);
            $r[]=$usuario;
        }
        return $r;
    }
 
    
     function getListAdministrador($pagina=1,$orden="",$nrpp=Contants::NRPP){
        
        $ordenPredeterminado="$orden, email";
        if($orden==="" || $orden===null){
             $ordenPredeterminado="email";
        }
      
        $registroInicial=($pagina-1)*$nrpp;
        $this->bd->select($this->tabla, "*", "administrador=1", array(), $ordenPredeterminado,"$registroInicial,$nrpp");
        $r=array();
        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/
        
        while($row = $this->bd->getRow()){
            $usuario = new Usuario();
            $usuario->set($row);
            $r[]=$usuario;
        }
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
        $list = $this->getListUsuarios($pagina, $orden, $nrpp, $condicion, $parametros);
        $r = "[ ";
        foreach ($list as $objeto) {
            $r .= $objeto->getJSON() . ",";
        }
        $r = substr($r, 0, -1) . "]";
        return $r;
    }

}

?>