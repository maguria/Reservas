<?php

class Request {

    //filtrar y limpiar valores <script>...</script>
    private static function clean($valor, $filtrar) {
        //..limpiamos
        if($filtrar===true){
            $valor = htmlspecialchars($valor);
        }
        return trim($valor);
    }

    //$_GET[nombre], $_POST[nombre]
    private static function read($parametro, $filtrar=true, $indice = null) {
        if (is_array($parametro)) {
            if ($indice === null) {
                $array = array();
                foreach ($parametro as $value) {
                    $r = self::clean($value, $filtrar);
                    if($r===""){
                        $r = null;
                    }
                    $array[] = $r;
                }
                return $array;
            } else {
                if (isset($parametro[$indice])) {
                    $r = self::clean($parametro[$indice], $filtrar);
                    if($r===""){
                        $r = null;
                    }
                    return $r;
                }
            }
        } else {
            $r = self::clean($parametro, $filtrar);
            if($r===""){
                $r = null;
            }
            return $r;
        }
    }

    static function get($nombre, $filtrar=true, $indice = null) {
        if (isset($_GET[$nombre])) {
            return self::read($_GET[$nombre], $filtrar, $indice);
        }
        return null;
    }

    static function post($nombre, $filtrar=true, $indice = null) {
        if (isset($_POST[$nombre])) {
            return self::read($_POST[$nombre], $filtrar, $indice);
        }
        return null;
    }

    static function req($nombre, $filtrar=true, $indice=null) {
        $valor = self::post($nombre, $filtrar, $indice);
        if ($valor !== null) {
            return $valor;
        }
        return self::get($nombre, $filtrar, $indice);
    }

//    static function request2($nombre) {
//        if (Server::isPost()) {
//            if (self::post($nombre) != null) {
//                return self::post($nombre);
//            } else {
//                return self::get($nombre);
//            }
//        }
//        return self::get($nombre);
//    }
}
