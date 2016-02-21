{"filter":false,"title":"ManageUsuario.php","tooltip":"/clases/ManageUsuario.php","undoManager":{"mark":69,"position":69,"stack":[[{"start":{"row":0,"column":0},"end":{"row":179,"column":2},"action":"insert","lines":["<?php","","class ManageUsuario {","    private $bd = null;","    private $tabla = \"usuario\";","    ","    function __construct(DataBase $bd) {","        $this->bd = $bd;","    }","    ","    function get($email){","        $parametros = array();","        $parametros['email']=$email;","        $this->bd->select($this->tabla, \"*\", \"email = :email\",$parametros );","        $row = $this->bd->getRow();","        $usuario = new Usuario();","        $usuario->set($row);","        return $usuario;","    }","    ","    function delete($email){","        $parametros=array();","        $parametros[\"email\"]=$email;","        return $this->bd->delete($this->tabla, $parametros);","    }","    ","     function forzarDelete($email){","        $parametros=array();","        $parametros[\"email\"]=$email;","        $gestor=new ManageObra($this->bd);","        $gestor->deleteObra($parametros);","        return $this->bd->delete($this->tabla, $parametros); ","    }","    ","    function getUsuarioTrue($email,$clave){","        $parametros=array();","        $parametros[\"email\"]=$email;","        $parametros[\"clave\"]=$clave;","        $this->bd->select($this->tabla,\"count(*)\",\"email=:email and clave=:clave and activo=1\",$parametros,\"email\");","        $fila= $this->bd->getRow();","        return $fila[0];   ","    }","    function esAdmin($email,$clave){","        $parametros=array();","        $parametros[\"email\"]=$email;","        $parametros[\"clave\"]=$clave;","        $this->bd->select($this->tabla,\"count(*)\",\"email=:email and clave=:clave and activo=1 and administrador=1\",$parametros,\"email\");","        $fila= $this->bd->getRow();","        return $fila[0];","    }","     function esPersonal($email,$clave){","        $parametros=array();","        $parametros[\"email\"]=$email;","        $parametros[\"clave\"]=$clave;","        $this->bd->select($this->tabla,\"count(*)\",\"email=:email and clave=:clave and activo=1 and administrador=0 and personal=1\",$parametros,\"email\");","        $fila= $this->bd->getRow();","        return $fila[0];","    }"," ","   ","    ","    function erase(Usuario $usuario){","        return $this->delete($usuario->getEmail());","    }","    ","    function setEm(Usuario $usuario,$pkemail){","        $parametrosWhere=array();","        $parametrosWhere[\"email\"]=$pkemail;","        return $this->bd->update($this->tabla, $usuario->getGenerico(), $parametrosWhere);","    }","    function set(Usuario $usuario){","        $parametrosWhere=array();","        $parametrosWhere[\"email\"]=$usuario->getEmail();","        return $this->bd->update($this->tabla, $usuario->getGenerico(), $parametrosWhere);","    }","    ","    function insert(Usuario $usuario){","        //inserta un objeto y devuelve el ID","        return $this->bd->insert($this->tabla, $usuario->getGenerico());","    }","    /*function insert(Usuario $usuario){","        //inserta un objeto y devuelve el ID","        $parametros=array();","        $parametros[\"email\"]=$usuario->getEmail();","        $parametros[\"clave\"]=$usuario->getClave();","        $parametros[\"alias\"]=$usuario->getAlias();","        $parametros[\"fechaalta\"]=$usuario->getFechaalta();","        $parametros[\"activo\"]=$usuario->getActivo();","        $parametros[\"administrador\"]=$usuario->getAdministrador();","        $parametros[\"personal\"]=$usuario->getPersonal();","        return $this->bd->insert($this->tabla, $parametros);","    }*/","    ","    ","    function count($condicion=\"1=1\", $parametros=array()){","        return $this->bd->count($this->tabla, $condicion, $parametros);","    }","    ","    function getListUsuarios(){","        ","        $this->bd->select($this->tabla, \"*\", \"administrador=0 and personal=0\", array());","        $r=array();","        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/","        ","        while($row = $this->bd->getRow()){","            $usuario = new Usuario();","            $usuario->set($row);","            $r[]=$usuario;","        }","        return $r;","    }","    ","    function getListUsuArtistas(){","        ","        $this->bd->select($this->tabla, \"*\", \" personal=0\", array());","        $r=array();","        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/","        ","        while($row = $this->bd->getRow()){","            $usuario = new Usuario();","            $usuario->set($row);","            $r[]=$usuario;","        }","        return $r;","    }","    ","     function getListPersonal($pagina=1,$orden=\"\",$nrpp=Contants::NRPP){","        ","        $ordenPredeterminado=\"$orden, email\";","        if($orden===\"\" || $orden===null){","             $ordenPredeterminado=\"email\";","        }","      ","        $registroInicial=($pagina-1)*$nrpp;","        $this->bd->select($this->tabla, \"*\", \"administrador=0 and personal=1\", array(), $ordenPredeterminado,\"$registroInicial,$nrpp\");","        $r=array();","        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/","        ","        while($row = $this->bd->getRow()){","            $usuario = new Usuario();","            $usuario->set($row);","            $r[]=$usuario;","        }","        return $r;","    }","    ","     function getListAdministrador($pagina=1,$orden=\"\",$nrpp=Contants::NRPP){","        ","        $ordenPredeterminado=\"$orden, email\";","        if($orden===\"\" || $orden===null){","             $ordenPredeterminado=\"email\";","        }","      ","        $registroInicial=($pagina-1)*$nrpp;","        $this->bd->select($this->tabla, \"*\", \"administrador=1\", array(), $ordenPredeterminado,\"$registroInicial,$nrpp\");","        $r=array();","        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/","        ","        while($row = $this->bd->getRow()){","            $usuario = new Usuario();","            $usuario->set($row);","            $r[]=$usuario;","        }","        return $r;","    }","    ","    ","    function getValueSelect(){","        //$table, $proyeccion=\"*\", $parametros=array(), $orden=\"1\", $limite=\"\"","        $this->bd->query($this->tabla, \"email\", array(), \"email\");","        $array =array();","        while ($row=  $this->bd->getRow()){","            $array[$row[0]]=$row[1];","        }","        return $array;","    }","","}","","?>"],"id":1}],[{"start":{"row":125,"column":2},"end":{"row":144,"column":5},"action":"remove","lines":["  ","     function getListPersonal($pagina=1,$orden=\"\",$nrpp=Contants::NRPP){","        ","        $ordenPredeterminado=\"$orden, email\";","        if($orden===\"\" || $orden===null){","             $ordenPredeterminado=\"email\";","        }","      ","        $registroInicial=($pagina-1)*$nrpp;","        $this->bd->select($this->tabla, \"*\", \"administrador=0 and personal=1\", array(), $ordenPredeterminado,\"$registroInicial,$nrpp\");","        $r=array();","        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/","        ","        while($row = $this->bd->getRow()){","            $usuario = new Usuario();","            $usuario->set($row);","            $r[]=$usuario;","        }","        return $r;","    }"],"id":2}],[{"start":{"row":111,"column":1},"end":{"row":125,"column":2},"action":"remove","lines":["   ","    function getListUsuArtistas(){","        ","        $this->bd->select($this->tabla, \"*\", \" personal=0\", array());","        $r=array();","        /*El 1,10 del ultimo parametro es el limite de registros por pagina*/","        ","        while($row = $this->bd->getRow()){","            $usuario = new Usuario();","            $usuario->set($row);","            $r[]=$usuario;","        }","        return $r;","    }","  "],"id":3}],[{"start":{"row":100,"column":51},"end":{"row":100,"column":76},"action":"remove","lines":["istrador=0 and personal=0"],"id":4},{"start":{"row":100,"column":51},"end":{"row":100,"column":52},"action":"insert","lines":["="]}],[{"start":{"row":100,"column":52},"end":{"row":100,"column":53},"action":"insert","lines":["0"],"id":5}],[{"start":{"row":50,"column":2},"end":{"row":59,"column":3},"action":"remove","lines":["   function esPersonal($email,$clave){","        $parametros=array();","        $parametros[\"email\"]=$email;","        $parametros[\"clave\"]=$clave;","        $this->bd->select($this->tabla,\"count(*)\",\"email=:email and clave=:clave and activo=1 and administrador=0 and personal=1\",$parametros,\"email\");","        $fila= $this->bd->getRow();","        return $fila[0];","    }"," ","   "],"id":6}],[{"start":{"row":50,"column":1},"end":{"row":50,"column":2},"action":"remove","lines":[" "],"id":7}],[{"start":{"row":50,"column":0},"end":{"row":50,"column":1},"action":"remove","lines":[" "],"id":8}],[{"start":{"row":49,"column":5},"end":{"row":50,"column":0},"action":"remove","lines":["",""],"id":9}],[{"start":{"row":46,"column":84},"end":{"row":46,"column":98},"action":"remove","lines":[" activo=1 and "],"id":10}],[{"start":{"row":46,"column":84},"end":{"row":46,"column":85},"action":"insert","lines":[" "],"id":11}],[{"start":{"row":46,"column":97},"end":{"row":46,"column":98},"action":"remove","lines":["r"],"id":12}],[{"start":{"row":46,"column":96},"end":{"row":46,"column":97},"action":"remove","lines":["o"],"id":13}],[{"start":{"row":46,"column":95},"end":{"row":46,"column":96},"action":"remove","lines":["d"],"id":14}],[{"start":{"row":46,"column":94},"end":{"row":46,"column":95},"action":"remove","lines":["a"],"id":15}],[{"start":{"row":46,"column":93},"end":{"row":46,"column":94},"action":"remove","lines":["r"],"id":16}],[{"start":{"row":46,"column":92},"end":{"row":46,"column":93},"action":"remove","lines":["t"],"id":17}],[{"start":{"row":46,"column":91},"end":{"row":46,"column":92},"action":"remove","lines":["s"],"id":18}],[{"start":{"row":46,"column":90},"end":{"row":46,"column":91},"action":"remove","lines":["i"],"id":19}],[{"start":{"row":38,"column":81},"end":{"row":38,"column":93},"action":"remove","lines":["and activo=1"],"id":20}],[{"start":{"row":38,"column":80},"end":{"row":38,"column":81},"action":"remove","lines":[" "],"id":21}],[{"start":{"row":132,"column":5},"end":{"row":133,"column":0},"action":"insert","lines":["",""],"id":22},{"start":{"row":133,"column":0},"end":{"row":133,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":133,"column":4},"end":{"row":142,"column":5},"action":"insert","lines":["","    function getListJson($pagina = 1, $orden = \"\", $nrpp = Constants::NRPP, $condicion = \"1=1\", $parametros = array()) {","        $list = $this->getList($pagina, $orden, $nrpp, $condicion, $parametros);","        $r = \"[ \";","        foreach ($list as $objeto) {","            $r .= $objeto->getJSON() . \",\";","        }","        $r = substr($r, 0, -1) . \"]\";","        return $r;","    }"],"id":23}],[{"start":{"row":29,"column":29},"end":{"row":29,"column":30},"action":"remove","lines":["a"],"id":24}],[{"start":{"row":29,"column":28},"end":{"row":29,"column":29},"action":"remove","lines":["r"],"id":25}],[{"start":{"row":29,"column":27},"end":{"row":29,"column":28},"action":"remove","lines":["b"],"id":26}],[{"start":{"row":29,"column":26},"end":{"row":29,"column":27},"action":"remove","lines":["O"],"id":27}],[{"start":{"row":29,"column":25},"end":{"row":29,"column":26},"action":"remove","lines":["e"],"id":28}],[{"start":{"row":29,"column":25},"end":{"row":29,"column":26},"action":"insert","lines":["e"],"id":29}],[{"start":{"row":29,"column":26},"end":{"row":29,"column":27},"action":"insert","lines":["T"],"id":30}],[{"start":{"row":29,"column":27},"end":{"row":29,"column":28},"action":"insert","lines":["a"],"id":31}],[{"start":{"row":29,"column":28},"end":{"row":29,"column":29},"action":"insert","lines":["r"],"id":32}],[{"start":{"row":29,"column":29},"end":{"row":29,"column":30},"action":"insert","lines":["e"],"id":33}],[{"start":{"row":29,"column":30},"end":{"row":29,"column":31},"action":"insert","lines":["a"],"id":34}],[{"start":{"row":30,"column":26},"end":{"row":30,"column":27},"action":"remove","lines":["a"],"id":35}],[{"start":{"row":30,"column":25},"end":{"row":30,"column":26},"action":"remove","lines":["r"],"id":36}],[{"start":{"row":30,"column":24},"end":{"row":30,"column":25},"action":"remove","lines":["b"],"id":37}],[{"start":{"row":30,"column":23},"end":{"row":30,"column":24},"action":"remove","lines":["O"],"id":38}],[{"start":{"row":30,"column":23},"end":{"row":30,"column":24},"action":"insert","lines":["T"],"id":39}],[{"start":{"row":30,"column":24},"end":{"row":30,"column":25},"action":"insert","lines":["a"],"id":40}],[{"start":{"row":30,"column":25},"end":{"row":30,"column":26},"action":"insert","lines":["r"],"id":41}],[{"start":{"row":30,"column":26},"end":{"row":30,"column":27},"action":"insert","lines":["e"],"id":42}],[{"start":{"row":30,"column":27},"end":{"row":30,"column":28},"action":"insert","lines":["a"],"id":43}],[{"start":{"row":30,"column":28},"end":{"row":30,"column":29},"action":"insert","lines":["s"],"id":44}],[{"start":{"row":135,"column":30},"end":{"row":135,"column":31},"action":"insert","lines":["U"],"id":45}],[{"start":{"row":135,"column":31},"end":{"row":135,"column":32},"action":"insert","lines":["s"],"id":46}],[{"start":{"row":135,"column":32},"end":{"row":135,"column":33},"action":"insert","lines":["u"],"id":47}],[{"start":{"row":135,"column":33},"end":{"row":135,"column":34},"action":"insert","lines":["a"],"id":48}],[{"start":{"row":135,"column":34},"end":{"row":135,"column":35},"action":"insert","lines":["r"],"id":49}],[{"start":{"row":135,"column":35},"end":{"row":135,"column":36},"action":"insert","lines":["i"],"id":50}],[{"start":{"row":135,"column":36},"end":{"row":135,"column":37},"action":"insert","lines":["o"],"id":51}],[{"start":{"row":135,"column":37},"end":{"row":135,"column":38},"action":"insert","lines":["s"],"id":52}],[{"start":{"row":20,"column":19},"end":{"row":20,"column":20},"action":"insert","lines":["O"],"id":53}],[{"start":{"row":20,"column":19},"end":{"row":20,"column":20},"action":"remove","lines":["O"],"id":54}],[{"start":{"row":20,"column":18},"end":{"row":20,"column":19},"action":"remove","lines":["e"],"id":55}],[{"start":{"row":20,"column":17},"end":{"row":20,"column":18},"action":"remove","lines":["t"],"id":56}],[{"start":{"row":20,"column":16},"end":{"row":20,"column":17},"action":"remove","lines":["e"],"id":57}],[{"start":{"row":20,"column":15},"end":{"row":20,"column":16},"action":"remove","lines":["l"],"id":58}],[{"start":{"row":20,"column":14},"end":{"row":20,"column":15},"action":"remove","lines":["e"],"id":59}],[{"start":{"row":20,"column":13},"end":{"row":20,"column":14},"action":"remove","lines":["d"],"id":60}],[{"start":{"row":20,"column":12},"end":{"row":20,"column":13},"action":"remove","lines":[" "],"id":61}],[{"start":{"row":20,"column":11},"end":{"row":20,"column":12},"action":"remove","lines":["n"],"id":62}],[{"start":{"row":20,"column":11},"end":{"row":20,"column":12},"action":"insert","lines":["n"],"id":63}],[{"start":{"row":20,"column":12},"end":{"row":20,"column":13},"action":"insert","lines":[" "],"id":64}],[{"start":{"row":20,"column":13},"end":{"row":20,"column":14},"action":"insert","lines":["d"],"id":65}],[{"start":{"row":20,"column":14},"end":{"row":20,"column":15},"action":"insert","lines":["e"],"id":66}],[{"start":{"row":20,"column":15},"end":{"row":20,"column":16},"action":"insert","lines":["l"],"id":67}],[{"start":{"row":20,"column":16},"end":{"row":20,"column":17},"action":"insert","lines":["e"],"id":68}],[{"start":{"row":20,"column":17},"end":{"row":20,"column":18},"action":"insert","lines":["t"],"id":69}],[{"start":{"row":20,"column":18},"end":{"row":20,"column":19},"action":"insert","lines":["e"],"id":70}]]},"ace":{"folds":[],"scrolltop":114.44444747618695,"scrollleft":0,"selection":{"start":{"row":20,"column":28},"end":{"row":20,"column":28},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1456058231702,"hash":"b8dfc37f7da5a17545d51ec254605226a595106c"}