{"filter":false,"title":"ManageTarea.php","tooltip":"/clases/ManageTarea.php","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":146,"column":30},"end":{"row":146,"column":31},"action":"insert","lines":["U"],"id":1050}],[{"start":{"row":146,"column":39},"end":{"row":146,"column":86},"action":"remove","lines":["$pagina, $orden, $nrpp, $condicion, $parametros"],"id":1051}],[{"start":{"row":146,"column":38},"end":{"row":146,"column":39},"action":"remove","lines":[","],"id":1052}],[{"start":{"row":127,"column":0},"end":{"row":144,"column":5},"action":"remove","lines":["    function getListTU($email){","        ","        $parametros=array();","        $parametros[\"apellidos\"]=$email;","        $sql=\"select * from tarea where email:email\";","        ","        $this->bd->send($sql, $parametros);","        $r=array();","        $contador=0;","        ","        while($row = $this->bd->getRow());","            $tarea = new Tarea();","            $tarea->set($row);","            $r[]=$tarea;","        }","        return $r;","        ","    }"],"id":1053}],[{"start":{"row":106,"column":4},"end":{"row":123,"column":5},"action":"insert","lines":["    function getListTU($email){","        ","        $parametros=array();","        $parametros[\"apellidos\"]=$email;","        $sql=\"select * from tarea where email:email\";","        ","        $this->bd->send($sql, $parametros);","        $r=array();","        $contador=0;","        ","        while($row = $this->bd->getRow());","            $tarea = new Tarea();","            $tarea->set($row);","            $r[]=$tarea;","        }","        return $r;","        ","    }"],"id":1054}],[{"start":{"row":114,"column":1},"end":{"row":114,"column":20},"action":"remove","lines":["       $contador=0;"],"id":1055}],[{"start":{"row":114,"column":0},"end":{"row":114,"column":1},"action":"remove","lines":[" "],"id":1056}],[{"start":{"row":113,"column":19},"end":{"row":114,"column":0},"action":"remove","lines":["",""],"id":1057}],[{"start":{"row":109,"column":29},"end":{"row":109,"column":30},"action":"remove","lines":["s"],"id":1058}],[{"start":{"row":109,"column":28},"end":{"row":109,"column":29},"action":"remove","lines":["o"],"id":1059}],[{"start":{"row":109,"column":27},"end":{"row":109,"column":28},"action":"remove","lines":["d"],"id":1060}],[{"start":{"row":109,"column":26},"end":{"row":109,"column":27},"action":"remove","lines":["i"],"id":1061}],[{"start":{"row":109,"column":25},"end":{"row":109,"column":26},"action":"remove","lines":["l"],"id":1062}],[{"start":{"row":109,"column":24},"end":{"row":109,"column":25},"action":"remove","lines":["l"],"id":1063}],[{"start":{"row":109,"column":23},"end":{"row":109,"column":24},"action":"remove","lines":["e"],"id":1064}],[{"start":{"row":109,"column":22},"end":{"row":109,"column":23},"action":"remove","lines":["p"],"id":1065}],[{"start":{"row":109,"column":21},"end":{"row":109,"column":22},"action":"remove","lines":["a"],"id":1066}],[{"start":{"row":109,"column":21},"end":{"row":109,"column":22},"action":"insert","lines":["e"],"id":1067}],[{"start":{"row":109,"column":22},"end":{"row":109,"column":23},"action":"insert","lines":["m"],"id":1068}],[{"start":{"row":109,"column":23},"end":{"row":109,"column":24},"action":"insert","lines":["a"],"id":1069}],[{"start":{"row":109,"column":24},"end":{"row":109,"column":25},"action":"insert","lines":["i"],"id":1070}],[{"start":{"row":109,"column":25},"end":{"row":109,"column":26},"action":"insert","lines":["l"],"id":1071}],[{"start":{"row":121,"column":5},"end":{"row":121,"column":6},"action":"remove","lines":[" "],"id":1072}],[{"start":{"row":121,"column":4},"end":{"row":121,"column":5},"action":"remove","lines":[" "],"id":1073}],[{"start":{"row":121,"column":0},"end":{"row":121,"column":4},"action":"remove","lines":["    "],"id":1074}],[{"start":{"row":120,"column":18},"end":{"row":121,"column":2},"action":"remove","lines":["","  "],"id":1075}],[{"start":{"row":115,"column":41},"end":{"row":115,"column":42},"action":"remove","lines":[";"],"id":1076}],[{"start":{"row":115,"column":41},"end":{"row":115,"column":42},"action":"insert","lines":["{"],"id":1077}],[{"start":{"row":106,"column":4},"end":{"row":106,"column":8},"action":"remove","lines":["    "],"id":1078}],[{"start":{"row":144,"column":29},"end":{"row":144,"column":30},"action":"insert","lines":["t"],"id":1079}],[{"start":{"row":106,"column":1},"end":{"row":121,"column":5},"action":"remove","lines":["   function getListTU($email){","        ","        $parametros=array();","        $parametros[\"email\"]=$email;","        $sql=\"select * from tarea where email:email\";","        ","        $this->bd->send($sql, $parametros);","        $r=array();","        ","        while($row = $this->bd->getRow()){","            $tarea = new Tarea();","            $tarea->set($row);","            $r[]=$tarea;","        }","        return $r;","    }"],"id":1080}],[{"start":{"row":106,"column":0},"end":{"row":106,"column":1},"action":"remove","lines":[" "],"id":1081}],[{"start":{"row":105,"column":5},"end":{"row":106,"column":0},"action":"remove","lines":["",""],"id":1082}],[{"start":{"row":127,"column":3},"end":{"row":135,"column":5},"action":"remove","lines":["  function getListJsonTU($email,$pagina = 1, $orden = \"\", $nrpp = Constants::NRPP, $condicion = \"1=1\", $parametros = array()) {","        $list = $this->getListTU($email);","        $r = \"[ \";","        foreach ($list as $objeto) {","            $r .= $objeto->getJSON() . \",\";","        }","        $r = substr($r, 0, -1) . \"]\";","        return $r;","    }"],"id":1083}],[{"start":{"row":127,"column":2},"end":{"row":127,"column":3},"action":"remove","lines":[" "],"id":1084}],[{"start":{"row":127,"column":1},"end":{"row":127,"column":2},"action":"remove","lines":[" "],"id":1085}],[{"start":{"row":127,"column":0},"end":{"row":127,"column":1},"action":"remove","lines":[" "],"id":1086}],[{"start":{"row":126,"column":0},"end":{"row":127,"column":0},"action":"remove","lines":["",""],"id":1087}],[{"start":{"row":105,"column":5},"end":{"row":106,"column":0},"action":"insert","lines":["",""],"id":1088},{"start":{"row":106,"column":0},"end":{"row":106,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":106,"column":4},"end":{"row":114,"column":5},"action":"insert","lines":["  function getListJsonTU($email,$pagina = 1, $orden = \"\", $nrpp = Constants::NRPP, $condicion = \"1=1\", $parametros = array()) {","        $list = $this->getListTU($email);","        $r = \"[ \";","        foreach ($list as $objeto) {","            $r .= $objeto->getJSON() . \",\";","        }","        $r = substr($r, 0, -1) . \"]\";","        return $r;","    }"],"id":1089}],[{"start":{"row":107,"column":31},"end":{"row":107,"column":32},"action":"remove","lines":["U"],"id":1090}],[{"start":{"row":107,"column":31},"end":{"row":107,"column":32},"action":"insert","lines":["a"],"id":1091}],[{"start":{"row":107,"column":32},"end":{"row":107,"column":33},"action":"insert","lines":["r"],"id":1092}],[{"start":{"row":107,"column":33},"end":{"row":107,"column":34},"action":"insert","lines":["e"],"id":1093}],[{"start":{"row":107,"column":34},"end":{"row":107,"column":35},"action":"insert","lines":["a"],"id":1094}],[{"start":{"row":107,"column":35},"end":{"row":107,"column":36},"action":"insert","lines":["s"],"id":1095}],[{"start":{"row":107,"column":23},"end":{"row":107,"column":36},"action":"remove","lines":["getListTareas"],"id":1096},{"start":{"row":107,"column":23},"end":{"row":107,"column":43},"action":"insert","lines":["getListTareasUsuario"]}],[{"start":{"row":95,"column":68},"end":{"row":95,"column":69},"action":"remove","lines":["m"],"id":1097}],[{"start":{"row":95,"column":67},"end":{"row":95,"column":68},"action":"remove","lines":["o"],"id":1098}],[{"start":{"row":95,"column":66},"end":{"row":95,"column":67},"action":"remove","lines":["c"],"id":1099}],[{"start":{"row":95,"column":65},"end":{"row":95,"column":66},"action":"remove","lines":["."],"id":1100}],[{"start":{"row":95,"column":64},"end":{"row":95,"column":65},"action":"remove","lines":["l"],"id":1101}],[{"start":{"row":95,"column":63},"end":{"row":95,"column":64},"action":"remove","lines":["i"],"id":1102}],[{"start":{"row":95,"column":62},"end":{"row":95,"column":63},"action":"remove","lines":["a"],"id":1103}],[{"start":{"row":95,"column":61},"end":{"row":95,"column":62},"action":"remove","lines":["m"],"id":1104}],[{"start":{"row":95,"column":60},"end":{"row":95,"column":61},"action":"remove","lines":["g"],"id":1105}],[{"start":{"row":95,"column":59},"end":{"row":95,"column":60},"action":"remove","lines":["@"],"id":1106}],[{"start":{"row":95,"column":58},"end":{"row":95,"column":59},"action":"remove","lines":["a"],"id":1107}],[{"start":{"row":95,"column":57},"end":{"row":95,"column":58},"action":"remove","lines":["i"],"id":1108}],[{"start":{"row":95,"column":56},"end":{"row":95,"column":57},"action":"remove","lines":["r"],"id":1109}],[{"start":{"row":95,"column":55},"end":{"row":95,"column":56},"action":"remove","lines":["u"],"id":1110}],[{"start":{"row":95,"column":54},"end":{"row":95,"column":55},"action":"remove","lines":["g"],"id":1111}],[{"start":{"row":95,"column":53},"end":{"row":95,"column":54},"action":"remove","lines":["a"],"id":1112}],[{"start":{"row":95,"column":52},"end":{"row":95,"column":53},"action":"remove","lines":["m"],"id":1113}],[{"start":{"row":95,"column":52},"end":{"row":95,"column":53},"action":"insert","lines":["e"],"id":1114}],[{"start":{"row":95,"column":53},"end":{"row":95,"column":54},"action":"insert","lines":["m"],"id":1115}],[{"start":{"row":95,"column":54},"end":{"row":95,"column":55},"action":"insert","lines":["a"],"id":1116}],[{"start":{"row":95,"column":55},"end":{"row":95,"column":56},"action":"insert","lines":["i"],"id":1117}],[{"start":{"row":95,"column":56},"end":{"row":95,"column":57},"action":"insert","lines":["l"],"id":1118}],[{"start":{"row":95,"column":52},"end":{"row":95,"column":53},"action":"insert","lines":[":"],"id":1192}],[{"start":{"row":95,"column":75},"end":{"row":95,"column":76},"action":"insert","lines":["i"],"id":1193}],[{"start":{"row":95,"column":76},"end":{"row":95,"column":77},"action":"insert","lines":["d"],"id":1194}],[{"start":{"row":95,"column":77},"end":{"row":95,"column":78},"action":"insert","lines":["_"],"id":1195}],[{"start":{"row":95,"column":78},"end":{"row":95,"column":79},"action":"insert","lines":["t"],"id":1196}],[{"start":{"row":95,"column":79},"end":{"row":95,"column":80},"action":"insert","lines":["a"],"id":1197}],[{"start":{"row":95,"column":80},"end":{"row":95,"column":81},"action":"insert","lines":["r"],"id":1198}],[{"start":{"row":95,"column":81},"end":{"row":95,"column":82},"action":"insert","lines":["e"],"id":1199}],[{"start":{"row":95,"column":82},"end":{"row":95,"column":83},"action":"insert","lines":["a"],"id":1200}],[{"start":{"row":107,"column":50},"end":{"row":107,"column":51},"action":"insert","lines":[","],"id":1201}],[{"start":{"row":107,"column":51},"end":{"row":107,"column":98},"action":"insert","lines":["$pagina, $orden, $nrpp, $condicion, $parametros"],"id":1202}],[{"start":{"row":95,"column":72},"end":{"row":95,"column":109},"action":"remove","lines":[", \"id_tarea\",\"$registroInicial,$nrpp\""],"id":1203}],[{"start":{"row":107,"column":50},"end":{"row":107,"column":98},"action":"remove","lines":[",$pagina, $orden, $nrpp, $condicion, $parametros"],"id":1217}],[{"start":{"row":106,"column":101},"end":{"row":106,"column":102},"action":"remove","lines":["1"],"id":1218}],[{"start":{"row":106,"column":101},"end":{"row":106,"column":102},"action":"insert","lines":["e"],"id":1219}],[{"start":{"row":106,"column":102},"end":{"row":106,"column":103},"action":"insert","lines":["m"],"id":1220}],[{"start":{"row":106,"column":103},"end":{"row":106,"column":104},"action":"insert","lines":["a"],"id":1221}],[{"start":{"row":106,"column":104},"end":{"row":106,"column":105},"action":"insert","lines":["i"],"id":1222}],[{"start":{"row":106,"column":105},"end":{"row":106,"column":106},"action":"insert","lines":["l"],"id":1223}],[{"start":{"row":106,"column":107},"end":{"row":106,"column":108},"action":"remove","lines":["1"],"id":1224}],[{"start":{"row":106,"column":107},"end":{"row":106,"column":108},"action":"insert","lines":[":"],"id":1225}],[{"start":{"row":106,"column":108},"end":{"row":106,"column":109},"action":"insert","lines":["e"],"id":1226}],[{"start":{"row":106,"column":109},"end":{"row":106,"column":110},"action":"insert","lines":["m"],"id":1227}],[{"start":{"row":106,"column":110},"end":{"row":106,"column":111},"action":"insert","lines":["a"],"id":1228}],[{"start":{"row":106,"column":111},"end":{"row":106,"column":112},"action":"insert","lines":["i"],"id":1229}],[{"start":{"row":106,"column":112},"end":{"row":106,"column":113},"action":"insert","lines":["l"],"id":1230}],[{"start":{"row":22,"column":21},"end":{"row":22,"column":22},"action":"insert","lines":["i"],"id":1231}],[{"start":{"row":22,"column":22},"end":{"row":22,"column":23},"action":"insert","lines":["d"],"id":1232}],[{"start":{"row":22,"column":23},"end":{"row":22,"column":24},"action":"insert","lines":["_"],"id":1233}],[{"start":{"row":22,"column":33},"end":{"row":22,"column":34},"action":"insert","lines":["i"],"id":1234}],[{"start":{"row":22,"column":34},"end":{"row":22,"column":35},"action":"insert","lines":["d"],"id":1235}],[{"start":{"row":22,"column":35},"end":{"row":22,"column":36},"action":"insert","lines":["_"],"id":1236}]]},"ace":{"folds":[],"scrolltop":193.33333845491777,"scrollleft":0,"selection":{"start":{"row":22,"column":36},"end":{"row":22,"column":36},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":10,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1455985234115,"hash":"d0f1341045e12421d2533ec503640d5a8a6bdef6"}