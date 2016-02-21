<?php
require '../clases/AutoCarga.php';
header('Content-Type: application/json');
$bd = new DataBase();
$gestor = new ManageUsuario($bd);
$u=$gestor->getListJson();
    echo '{"usuarios":' . $u . '}';

$bd->close();