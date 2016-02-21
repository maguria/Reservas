<?php
require '../clases/AutoCarga.php';
header('Content-Type: application/json');
$sesion=new Session();
$bd = new DataBase();
$gestor = new ManageUsuario($bd);
$gestorTarea=new ManageTarea($bd);
$res=Request::req("res");
$em = $sesion->get("usu");
$usu=$gestor->get($em);
$t=$gestorTarea->get($res);
$alias=$usu->getAlias();

        if($t->getId_tarea()!=null){
               echo '{"resultado":"repetido"}';
        }
        else{
            $tarea=new Tarea($res,$em);
            $r = $gestorTarea->insert($tarea);
            echo '{"id":"' . $res . '","email":"' .$em .'","resultado":"ok"}';
        }
 
$bd->close();