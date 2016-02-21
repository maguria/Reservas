<?php
require '../clases/AutoCarga.php';
header('Content-Type: application/json');
$sesion=new Session();
if($sesion->destroy()){
echo '{"resultado":"ok"}';
}
