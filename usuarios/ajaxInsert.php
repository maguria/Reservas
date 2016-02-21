<?php
require '../clases/AutoCarga.php';
header('Content-Type: application/json');
$bd = new DataBase();
$gestor = new ManageUsuario($bd);
$em = Request::req("email");
$clave = Request::req("clave");
$alias=Request::req("alias");
$usu=$gestor->get($em);
  if(Filter::isEmail($em)){
        if($usu->getEmail()==$em){
               echo '{"resultado":"repetido"}';
        }
        else{
            $usuario=new Usuario($em,$clave,$alias,0);
            $r = $gestor->insert($usuario);
            echo '{"resultado":"ok"}';
            
        }
  }
  else{
      echo '{"resultado":"incorrecto"}';
  }

$bd->close();