(function () {
    var app = angular.module('reservas', []);

    
    app.directive('usuariosLogin', ['$http', function($http){
        return {
            restrict: 'E',
            templateUrl: 'plantillas/usuarios-login.html',
            controller: function(){
                var that=this;
                this.usuario={};
                this.tarea={};
                this.tareas=[];
                this.tareasUsu=[];
                this.usuarios=[];
                this.getSemana=function(){
                     $http.get('tarea/ajaxGetSemana.php').success(function(datos) {
                        that.tareas = datos.semana;
                         for(var tarea in that.tareas){
                                $('#'+that.tareas[tarea].id_tarea).addClass('rojo');
                                $('#'+that.tareas[tarea].id_tarea).text(that.tareas[tarea].email);
                     }
                    });
                }
                this.getUsuarios=function(){
                     $http.get('usuarios/ajaxUsuarios.php').success(function(datos) {
                        that.usuarios = datos.usuarios;
                        this.usuarios=that.usuarios;
                    });
                }
                this.usuariosListado=function(){
                    this.getUsuarios();
                    $('#listausuarios').removeClass("ocultar");
                }
                this.tareasUsuario=function(){
                    var listatareasusu=$('#listatareasusu');
                    $http.get('tarea/ajaxTareasUsu.php').success(function(datos) {
                        that.tareasUsu = datos.tareasusuario;
                        this.tareasUsu=that.tareasUsu;
                    });
                      listatareasusu.removeClass("ocultar");
                      $('#asigna').addClass("ocultar");
                    
                }
                this.usuarioLogin = function(){
                var errorLog=$("#errorLog");
                var s=$('#sesion');
                var borde=$("#borde");
                var botones=$("#botones");
                var form=$("#formLogin");
                var tabla=$("#tabla");
                var registro=$("#registro");
                var login=$("#login");
                var asigna=$('#asigna');
                var imagen=$('#imagen');
                var mistareas=$('#mistareas');
                $http.get('usuarios/ajaxLogin.php?email='+this.usuario.email+'&clave='+this.usuario.clave).success(function(datos){
                    
                    function mostrarSesion(){
                        that.usuario = datos.usuario;
                        errorLog.text("Sesión iniciada");
                        s.text(datos.usuario.email);
                        var b=$('<input type="submit" id="btsesion" class="btn btn-success" value="Cerrar sesion"/>');
                        //document.getElementById("imagen").classList.add("ocultar");
                        $('#imagen').addClass("ocultar");
                        $('#login').addClass("ocultar");
                        $('#tabla').addClass("mostrar");
                        $('#tabla').removeClass("ocultar");
                        borde.append(b);
                        borde.addClass("borde");
                        b.on("click",cerrarSesion);
                        
                         function cerrarSesion(){
                             $http.get('usuarios/ajaxSesion.php').success(function(datos){
                                     borde.addClass("ocultar");
                                     botones.addClass("ocultar");
                                     login.removeClass("ocultar");
                                     tabla.addClass("ocultar");
                                     tabla.removeClass("mostrar");
                                     imagen.removeClass("ocultar");
                                     registro.addClass("ocultar");
                                     asigna.addClass("ocultar");
                                     $('#listatareasusu').addClass("ocultar");
                            });
                        }
                     }
                        
                    
                    if(datos.resultado=='ok'){
        
                        mostrarSesion();
                        var br=$('<input type="submit" id="btasignar" class="btn btn-success" value="Reservar"/>');
                        br.on('click',desplegar);
                        function desplegar(){
                            asigna.removeClass("ocultar");
                            $('#listatareasusu').addClass("ocultar");
                        }
                        
                        botones.append(br);
                        botones.addClass("borde");
                        mistareas.removeClass("ocultar");
                       
                    }
                    else if(datos.resultado=='okAdmin'){
                        mostrarSesion();
                        registro.removeClass("ocultar");
                        
                        $('#tabla td').on('click',function(){
                            if(confirm("¿Estás seguro de borrar esta reserva?")){
                             $http.get('tarea/ajaxDeleteTareaAdmin.php?id_tarea='+$(this).attr("id")).success(function(datos){
                            if(datos.delete==1){
                            $('#'+datos.id).removeClass("rojo");
                            $('#'+datos.id).text("");
                            for(var i=0;i<that.tareas.length;i++){
                                if(that.tareas[i].id_tarea== $('#'+datos.id).attr("id")){
                                    that.tareas.splice(i,1);
                                    break;
                                }
                        }
                        that.getSemana();
                        }
                         });
                        }
                       });
                    }
                    else if(datos.resultado='no'){
                        errorLog.text("Error de acceso");
                        s.text("");
                        borde.removeClass("borde");
                    }
                });
            };
            this.usuarioRegistro=function(){
                var errorReg=$("#errorReg");
                var fr=$('#formRegistro');
                var em=$('#emailReg').val();
                var cl=$('#claveReg').val();
                var al=$('#aliasReg').val();
                $http.get('usuarios/ajaxInsert.php?email='+em+'&clave='+cl+'&alias='+al).success(function(datos){
                    if(datos.resultado=='ok'){
                        errorReg.text("Usuario dado de alta.");
                        fr.reset();
                        that.usuarios.push(that.usuario);
                        that.getUsuarios();
                    }
                    else if(datos.resultado=='repetido'){
                        errorReg.text("Email repetido");
                    }
                    else if(datos.resultado=='incorrecto'){
                        errorReg.text("Email incorrecto");
                    }
                });
            }
            this.usuarioTarea=function(){
                var resultado=this.radio.dia+this.radio.hora;
                 $http.get('tarea/ajaxInsert.php?res='+resultado).success(function(datos){
                     if(datos.resultado=='ok'){
                         that.tarea.id_tarea=datos.id;
                         that.tarea.email=datos.email;
                         that.tareas.push(that.tarea);
                         that.tarea={};
                          $("#errorTarea").text("");
                         that.getSemana();
                     }
                    else if(datos.resultado=='repetido'){
                       $("#errorTarea").text("Horario ocupado");
                    } 
                });
               
            }
            this.borrarTarea=function(tarea){
                $http.get('tarea/ajaxDeleteTarea.php?id_tarea='+tarea.id_tarea).success(function(datos){
                    if(datos.delete==1){
                        $('#'+tarea.id_tarea).removeClass("rojo");
                        $('#'+tarea.id_tarea).text("");
                        for(var i=0;i<that.tareasUsu.length;i++){
                                if(that.tareasUsu[i].id_tarea== tarea.id_tarea){
                                    that.tareasUsu.splice(i,1);
                                    break;
                                }
                        }
                        
                       /* for(var i=0;i<that.tareas.length;i++){
                                if(that.tareas[i].id_tarea== tarea.id_tarea){
                                    that.tareas.splice(i,1);
                                    break;
                                }
                            }*/
                    that.getSemana();
                    
                    }
                    
                });
            }
            this.borrarUsuario=function(usuario){
                $http.get('usuarios/ajaxDeleteUsuarios.php?email='+usuario.email).success(function(datos){
                    if(datos.delete==1){
                        for(var i=0;i<that.usuarios.length;i++){
                                if(that.usuarios[i]== usuario.email){
                                    that.usuarios.splice(i,1);
                                    break;
                                }
                        }
                      for(var i=0;i<that.tareas.length;i++){
                                if(that.tareas[i].email== usuario.email){
                                    that.tareas.splice(i,1);
                                    break;
                                }
                        }
                    that.getUsuarios();
                    that.getSemana();
                    
                    }
                    
                });
            }
                
            this.getSemana();
            this.getUsuarios();
            },
            controllerAs:'cUsuarios'
        };
    }]);
    
     app.directive('usuariosListado', function(){
        return {
            restrict: 'E',
            templateUrl: 'plantillas/usuarios-listado.html'
        };
    });
     app.directive('usuariosRegistro', function(){
        return {
            restrict: 'E',
            templateUrl: 'plantillas/usuarios-registro.html'
        };
    });
    app.directive('usuariosTarea', function(){
        return {
            restrict: 'E',
            templateUrl: 'plantillas/usuarios-tarea.html'
        };
    });
     app.directive('tareasUsuario', function(){
        return {
            restrict: 'E',
            templateUrl: 'plantillas/tareas-usuario.html'
        };
    });
     app.directive('listatareasUsuario', function(){
        return {
            restrict: 'E',
            templateUrl: 'plantillas/listatareas-usuario.html'
        };
    });

})();