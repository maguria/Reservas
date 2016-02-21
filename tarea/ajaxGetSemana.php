<?php
require '../clases/AutoCarga.php';
header('Content-Type: application/json');
$bd = new DataBase();
$gestorTarea = new ManageTarea($bd);
$t=$gestorTarea->getListJson();
    echo '{"semana":' . $t . '}';

$bd->close();