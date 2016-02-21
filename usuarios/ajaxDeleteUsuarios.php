<?php
require '../clases/AutoCarga.php';
header('Contet-Type: application/json');
$sesion = new Session();
$bd = new DataBase();
$gestor = new ManageUsuario($bd);
$em = Request::req("email");
$r = $gestor->forzarDelete($em);
$bd->close();
echo '{"delete":' . $r .'}';