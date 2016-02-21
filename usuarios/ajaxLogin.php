<?php
require '../clases/AutoCarga.php';
header('Content-Type: application/json');
$bd = new DataBase();
$gestor = new ManageUsuario($bd);
$em = Request::req("email");
$clave = Request::req("clave");
$usuario=$gestor->get($em);
$r=$gestor->getUsuarioTrue($em,$clave);
$a=$gestor->esAdmin($em,$clave);
if($r==1 && $a==0){
    $sesion=new Session();
    $sesion->set("usu",$em);
    echo '{"usuario":' . $usuario->getJson() . ', "resultado":"ok"}';
    }
else if($r==1 && $a==1){
    $sesion=new Session();
    $sesion->set("usu",$em);
    echo '{"usuario":' . $usuario->getJson() . ', "resultado":"okAdmin"}';
}
else{
    echo '{"resultado":"no"}';
}


$bd->close();