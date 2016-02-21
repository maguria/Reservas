<?php
require '../clases/AutoCarga.php';
header('Content-Type: application/json');
$sesion=new Session();
$bd = new DataBase();
$gestorTarea = new ManageTarea($bd);
$t=$gestorTarea->getListJsonTU($sesion->get("usu"));
    echo '{"tareasusuario":' . $t . '}';

$bd->close();