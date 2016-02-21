<?php
require '../clases/AutoCarga.php';
header('Contet-Type: application/json');
$sesion = new Session();
$bd = new DataBase();
$gestorTarea = new ManageTarea($bd);
$id = Request::req("id_tarea");
$r = $gestorTarea->delete($id);
$bd->close();
echo '{"delete":' . $r .',"id":"'.$id.'"}';