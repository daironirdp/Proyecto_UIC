<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<?php
// put your code here
// put your code here
if (isset($_GET["tipo_contenido"]) && $_GET["tipo_contenido"] == "usuario") {
    extract($_REQUEST);
    session_start();
}
?>
<script>

    function validador_modificar(e, usuario) {

        $(".incorrecto").remove();//quita los rastros de validaciones anteriores;
        //comunes
        var contrasenna = $("#contrasenna").val();
        var direccion = $("#direccion").val()
        //usuario
        if (usuario != "ADMINISTRADOR") {
            var usuario = $("#user").val();
            var correo = $("#correo").val();
            var telefono = $("#telefono").val();
            var centro = $("#centro").val();
            if (usuario == "") {
                $("#ayuda2").append("<p class=incorrecto style='color:red;'>El campo esta vacio</p>");
                $("#user").focus();
                e.preventDefault();
            } else {
                if (usuario == "Administrador" || usuario == "administrador" || usuario == "ADMINISTRADOR") {
                    $("#ayuda2").append("<p class=incorrecto style='color:red;'>No puede ser administrador</p>");
                    $("#user").focus();
                    e.preventDefault();
                } else {
                    if (usuario.length > 25) {
                        $("#ayuda2").append("<p class=incorrecto style='color:red;'>No puede tener mas de 25 caracteres</p>");
                        $("#user").focus();
                        e.preventDefault();
                    } else {

//password    
                        contra(e, contrasenna);


                        if (centro == "") {
                            $("#ayuda4").append("<p class=incorrecto style='color:red;'>Campo vacio</p>");
                            $("#centro").focus();
                            e.preventDefault();
                        } else {

                            if (centro.length > 11) {
                                $("#ayuda4").append("<p class=incorrecto style='color:red;'>No puede ser mayor que 11 caracteres</p>");
                                $("#centro").focus();
                                e.preventDefault();
                            } else {

                                if (telefono == "") {
                                    $("#ayuda6").append("<p class=incorrecto style='color:red;'>Campo vacio</p>");
                                    $("#telefono").focus();
                                    e.preventDefault();
                                } else {
                                    if (telefono.length != 8) {
                                        $("#ayuda6").append("<p class=incorrecto style='color:red;'>Debe tener 8 numeros</p>");
                                        $("#telefono").focus();
                                        e.preventDefault();
                                    } else {

                                        //direccion
                                        if (!dir(e, direccion)) {

                                            if (correo == "") {
                                                $("#ayuda9").append("<p class=incorrecto style='color:red;'>Campo vacio</p>");
                                                $("#correo").focus();
                                                e.preventDefault();
                                            } else {
                                        // expresion_regular = /^[a-z0-9-]+(.[a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/
                                                if (mail(correo)) {
                                                    $("#ayuda9").append("<p class=incorrecto style='color:red;'>Debe tener la forma usuario@dominio.algo</p>");
                                                    $("#correo").focus();
                                                    e.preventDefault();
                                                }


                                            }
                                        }





                                    }
                                }


                            }
                        }
                    }

                }

            }
        } else {

            //administrador

            var nombre = $("#nombre").val();
            var ci = $("#ci").val();
            var sexo = $("#sexo").val();
            if (nombre == "") {
                $("#ayuda1").append("<p class=incorrecto style='color:red;'>El campo esta vacio</p>");
                $("#nombre").focus();
                e.preventDefault();
            } else {
                if (nombre.length > 30) {
                    $("#ayuda1").append("<p class=incorrecto style='color:red;'>Tiene que tener menos de 30 caracteres</p>");
                    $("#nombre").focus();
                    e.preventDefault();
                } else {

                    //contrasenna
                    contra(e, contrasenna);
                }



            }
            if (ci == "") {
                $("#ayuda5").append("<p class=incorrecto style='color:red;'>Campo vacio</p>");
                $("#ci").focus();
                e.preventDefault();
            } else {
                if (isNaN(ci)) {
                    $("#ayuda5").append("<p class=incorrecto style='color:red;'>Solo se aceptan numeros</p>");
                    $("#ci").focus();
                    e.preventDefault();
                } else {

                    if (ci.length != 11) {
                        $("#ayuda5").append("<p class=incorrecto style='color:red;'>Debe tener 11 numeros</p>");
                        $("#ci").focus();
                        e.preventDefault();
                    } else {

                        if (sexo == 0) {
                            $("#ayuda8").append("<p class=incorrecto style='color:red;'>Debes elegir una opcion</p>");
                            $("#sexo").focus();
                            e.preventDefault();
                        } else {

                            //direccion
                            dir(e, direccion);

                        }
                    }

                }
            }
        }

    }
    function dir(e, direccion) {
        if (direccion == "") {
            $("#ayuda7").append("<p class=incorrecto style='color:red;'>Campo vacio</p>");
            $("#direccion").focus();
            e.preventDefault();
            return true;
        }else{
            return false;
        }
        
    }
    function  contra(e, contrasenna) {
        if (contrasenna == "") {
            $("#ayuda3").append("<p class=incorrecto style='color:red;'>Campo vacio</p>");
            $("#contrasenna").focus();
            e.preventDefault();
        } else {
            if (contrasenna.length > 8) {
                $("#ayuda3").append("<p class=incorrecto style='color:red;'>No puede tener mas de 8 caracteres</p>");
                $("#contrasenna").focus();
                e.preventDefault();
            } else {

                if (contrasenna.length < 2) {
                    $("#ayuda3").append("<p class=incorrecto style='color:red;'>No puede tener menos de 2 caracteres</p>");
                    $("#contrasenna").focus();
                    e.preventDefault();
                } else {


                }

            }
        }
    }

</script>

<?php
// put your code here
if ($tipo_contenido == "noticia_comentario_modificar") {
    include_once '../modelo/CM_comentario.php';
    $obj = new Comentario();
    $comentario = $obj->mostrarComentario($id_comentario);
    ?>

    <div class="contenedor_noticias_comentarios_quejas">
        <div>
            <header class="comentarios_quejas"> 
                <a href="" class="enlace">
                    <i class=" fa fa-user icono_user" aria-hidden="true"></i><br>
                    <label><?php echo $comentario[0]["usuario"] ?></label> 

                </a>

                <div class="fecha_flex">Comentarios >>Modificar

                    <div class="fecha_noticia">
                        <span>Publicado :</span>
                        <time><?php echo $comentario[0]["fecha"] ?></time>

                    </div> 
                </div>


            </header>
            <div class="container-fluid  comentYquejas" style="">

                <form method="POST" class="" action="../Controlador/CC_comentarios.php?accion=modificar">
                    <input type="text"value="<?php echo $comentario[0]["id_comentario"]; ?>"hidden="true" name="id_comentario">
                    <input type="text"value="<?php echo $comentario[0]["id_noticia"]; ?>"hidden="true" name="id_noticia">

                    <textarea class="form-control " id="descripcion" name="descripcion" cols="100" rows="5" style="resize: none;margin: auto;width: 95%;">"<?php echo $comentario[0]["descripcion"] ?>"</textarea>
                    <div id="ayuda1"></div>
                    
                    <div class="text-center" >

                        <a href="?opcion=6&tipo_contenido=noticia_comentario&id_noticia=<?php echo $comentario[0]["id_noticia"] ?>" class="btn btn-primary"> Atras </a>


                        <button type="submit" class="btn btn-primary" onclick="validadorQuejas(event)">Modificar</button>

                    </div>
                </form> 


            </div>

        </div>


    </div>


    <?php
} else if ($tipo_contenido == "evento") {
    include_once '../modelo/CM_evento.php';
    $obj = new Evento();
    $evento = $obj->obtenerEventoDetalles($id_evento);
    ?>
    <div class="contenedor_noticias_comentarios_quejas">
        <div>
            <header class="comentarios_quejas"> 
                <h2>Modificando el evento <span style="color: darkgray"><?php echo $evento[0]["nombre"] ?></span>:</h2>
                <div style="text-align: start">Eventos >>Modificar </div>

            </header>
            <div class="container-fluid  comentYquejas" style="">
                <form method="POST" action="../Controlador/CC_eventos.php?accion=modificar">
                    <input name="id_evento" hidden="true"value="<?php echo $id_evento ?>"/>
                    <table style="margin-left: 40px">
                        <tr>
                            <td><label>Nombre:</label></td> 
                            <td id="ayuda1"><input class="form-control" id="nombre"type="text" name="nombre"value="<?php echo $evento[0]["nombre"]; ?>"/></td>
                        </tr>
                        <tr>
                            <td><label>Lugar:</label></td> 
                            <td id="ayuda2"><input id="lugar"class="form-control"type="text" name="lugar"value="<?php echo $evento[0]["lugar"]; ?>"/></td>
                        </tr>

                        <tr>
                            <td><label>Fecha de inicio:</label></td> 
                            <td id="ayuda3"><input id="fecha_inicio"class="form-control"type="date" fomat="y-m-d" name="fecha_inicio"value="<?php echo $evento[0]["fecha_inicio"]; ?>"/></td>
                        </tr>

                        <tr>
                            <td><label>Fecha de culminacion:</label></td> 
                            <td id="ayuda4">
                                <input id="fecha_final"class="form-control" type="date" fomat="y-m-d" name="fecha_culminacion"value="<?php echo $evento[0]["fecha_culminacion"]; ?>"/>
                           <!-- <input id="fecha_final"class="form-control" type="date" fomat="y-m-d" name="fecha_culminacion"value="<?php echo $evento[0]["fecha_culminacion"]; ?>"/>-->
                            </td>

                        </tr><tr>
                            <td><label>Correo:</label></td> 
                            <td id="ayuda5">
                                <input id="correo"class="form-control" type="text" name="contacto"value="<?php echo $evento[0]["contacto"]; ?>"/>
                            </td>
                        </tr>


                      


                    </table>
                    <div>  
                        <label style="margin-left: 15px">Descripcion:</label></td> 
                        <textarea class="form-control " id="descripcion" name="descripcion" cols="50" rows="3" style="resize: none;margin: auto;width: 95%;"><?php echo $evento[0]["descripcion"]; ?></textarea></div>
                        <di id="ayuda6"></di>  
                    <div class="text-center">
                        <a href="?opcion=3" class="btn btn-primary"> Atras </a>
                        <button type="submit" class="btn btn-primary" onclick="validadorEvento(event)">Modificar</button>
                    </div>          

                </form>





            </div>

        </div>


    </div>           
    <?php
} else if ($tipo_contenido == "curso") {
    include_once '../modelo/CM_curso.php';
    $obj = new Curso();
    $curso = $obj->obtenerCursoDetalles($id_curso);
    ?>
    <div class="contenedor_noticias_comentarios_quejas">
        <div>
            <header class="comentarios_quejas"> 
                <h2>Modificando el curso <span style="color: darkgray"><?php echo $curso[0]["tema"] ?></span>:</h2>
                <div style="text-align: start">Cursos >>Modificar </div>

            </header>
            <div class="container-fluid  comentYquejas" style="">
                <form method="POST" action="../Controlador/CC_cursos.php?accion=modificar">
                    <input hidden="" value="<?php echo $id_curso; ?>" name="id_curso"/>
                    <table style="margin-left: 40px">

                        <tr>
                            <td><label>Tema:</label></td> 
                            <td  id="ayuda1"><input id="tema" class="form-control"type="text" name="tema"value="<?php echo $curso[0]["tema"]; ?>"/></td>
                        </tr>

                        <tr>
                            <td><label>Profesor:</label></td> 
                            <td id="ayuda2"><input id="profesor"class="form-control"type="text" name="profesor"value="<?php echo $curso[0]["profesor"]; ?>"/></td>
                        </tr>

                        <tr>
                            <td><label>Matricula:</label></td> 
                            <td id="ayuda3">
                                <input id="matricula" class="form-control" type="text" name="matricula"value="<?php echo $curso[0]["matricula"]; ?>"/>
                            </td>

                        </tr>
                        <tr>
                            <td><label>Dias:</label></td> 
                            <td id="ayuda4">
                                <input id="dias"class="form-control" type="text" name="frecuencia"value="<?php echo $curso[0]["frecuencia"]; ?>"/>
                            </td>
                        </tr>


                        <tr>
                            <td><label>Hora de entrada:</label></td> 
                            <td id="ayuda5">
                                <input id="hora_entrada"class="form-control" type="time" name="hora_entrada"value="<?php echo $curso[0]["hora_entrada"]; ?>"/>
                            </td>

                        </tr>
                        <tr>
                            <td><label>Hora de salida:</label></td> 
                            <td id="ayuda6">
                                <input  id="hora_salida" class="form-control" type="time" name="hora_salida"value="<?php echo $curso[0]["hora_salida"]; ?>"/>
                            </td>

                        </tr>



                    </table>
                    <div>  
                        <label style="margin-left: 15px">Descripcion:</label></td> 
                        <textarea class="form-control " id="descripcion" name="descripcion" cols="50" rows="3" style="resize: none;margin: auto;width: 95%;"><?php echo $curso[0]["descripcion"]; ?></textarea></div>
                      <div style="margin-left: 25px;" id="ayuda7"></div>
                    <div class="text-center">
                        <a href="?opcion=2" class="btn btn-primary"> Atras </a>
                        <button type="submit" class="btn btn-primary" onclick="validadorCurso(event)">Modificar</button>
                    </div>
                </form>





            </div>

        </div>


    </div>
    <?php
} else if ($tipo_contenido == "queja") {
    include_once '../modelo/CM_queja.php';
    $obj = new Queja();
    $queja = $obj->obtenerQueja($id_queja);
    ?>
    <div class="contenedor_noticias_comentarios_quejas">
        <div>
            <header class="comentarios_quejas"> 
                <a href="" class="enlace">
                    <i class=" fa fa-user icono_user" aria-hidden="true"></i><br>
                    <label><?php echo $queja[0]["usuario"] ?></label> 

                </a>

                <div class="fecha_flex">Quejas >>Modificar 

                    <div class="fecha_noticia">
                        <span>Publicado :</span>
                        <time><?php echo $queja[0]["fecha"] ?></time>

                    </div> 
                </div>


            </header>
            <div class="container-fluid  comentYquejas" style="">

                <form method="POST" class="" action="../Controlador/CC_quejas.php?accion=modificar">
                    <input type="text" name="id_queja"value="<?php echo $id_queja; ?>"hidden=""/>
                    <textarea class="form-control " id="descripcion"name="descripcion" cols="100" rows="5" style="resize: none;margin: auto;width: 95%;">"<?php echo $queja[0]["descripcion"] ?>"</textarea>
                     <div id="ayuda1"></div>
                    <div class="text-center" >

                        <a href="?opcion=8" class="btn btn-primary"> Atras </a>


                        <button type="submit" class="btn btn-primary" onclick="validadorQuejas(event)">Modificar</button>

                    </div>
                </form> 


            </div>

        </div>


    </div>




    <?php
} else if ($tipo_contenido == "noticia") {
    include_once '../modelo/CM_noticia.php';
    $obj = new Noticia();
    $noticia = $obj->obtenerNoticia($id_noticia);
    ?>
    <div class="contenedor_noticias_comentarios_quejas">
        <div>
            <header class="comentarios_quejas"> 
                <h2>Modificando la noticia <span style="color: darkgray"><?php echo $noticia[0]["titulo"] ?></span>:</h2>
                <div style="text-align: start" class="fecha_flex">Noticias >>Modificar 


                    <div class="fecha_noticia">
                        <span>Publicado :</span>
                        <time><?php echo $noticia[0]["fecha"] ?></time>

                    </div> 
                </div>


            </header>
            <div class="container-fluid  comentYquejas" style="">
                <form method="POST" action="../Controlador/CC_noticias.php?accion=modificar&id_noticia=<?php echo $id_noticia ?>" enctype="multipart/form-data">
                    <div id="contenedorFlexibleModifNews">
                        <table style="margin-left: 40px">

                            <tr>
                                <td><label>Titulo:</label></td> 
                                <td id="ayuda1"><input class="form-control"type="text" id="titulo"name="titulo"value="<?php echo $noticia[0]["titulo"]; ?>"/></td>
                            </tr>

                            <tr>
                                <td><label>Autor:</label></td> 
                                <td id="ayuda2"><input class="form-control"type="text" id="autor"name="autor"value="<?php echo $noticia[0]["autor"]; ?>"/></td>
                            </tr>

                            <tr>
                                <td><label>Imagen:</label></td> 
                                <td id="ayuda3" >
                                    <div style="">
                                        <label class="cargo" for="imagen_cargar">Examinar</label>
                                        <label class="" for="imagen_cargar" id="ruta">imagen/*</label>
                                        <input class="" type="file" placeholder="Imagen" name="imagen"  id="imagen_cargar"   accept=""/>
                                    </div>
                                </td>


                            </tr>
                            <tr>
                                <td><label>Pie de foto:</label></td> 
                                <td id="ayuda4">
                                    <input class="form-control" id="pie_foto"type="text" name="pie_foto"value="<?php echo $noticia[0]["pie_foto"]; ?>"/>
                                </td>
                            </tr>        
                        </table>
                        <figure>
                            <img id="img"style="width: 95%;margin-left: 10px;"src="img/<?php echo $noticia[0]["imagen"]; ?>" alt="No hay imagen que mostrar"/>


                        </figure> 
                    </div>
                    <div>  
                        <label style="margin-left: 15px">Descripcion:</label></td> 
                    <textarea class="form-control " name="descripcion" id="descripcion"cols="50" rows="3" style="resize: none;margin: auto;width: 95%;"><?php echo $noticia[0]["descripcion"]; ?></textarea>
                        <div id="ayuda5" style="margin-left: 25px"></div>
                    </div>
                    <div class="text-center">
                        <a href="?opcion=1" class="btn btn-primary"> Atras </a>
                        <button type="submit" class="btn btn-primary" onclick="validarNoticias(event)">Modificar</button>
                    </div>


                </form>





            </div>

        </div>


    </div>


    <?php
} else if ($tipo_contenido == "usuario") {
    include_once '../../../Modelo/CM_usuario.php';
    $obj = new Usuario();
    $usuario = $obj->obtenerUsuarioDetalle($_SESSION["id_usuario"]);
    ?>

    <div class="container anchopadre" id="modificar">

        <form role="form" action="../Controlador/CC_usuarios.php?accion=modificar&elemento=<?php echo $elemento; ?>" method="POST" id="">
            <div class=" h2" id="encabezado_form"></div>

            <?PHP
            if ($_SESSION["usuario"] == "ADMINISTRADOR") {
                ?>
                <div class="form-group">


                    <div id="">
                        <label for="pwd">Nombre y apellidos</label>
                        <input class="form-control"  type="text" id="nombre" name="nombre" value="<?php echo $usuario[0]["nombre"]; ?>" required>
                    </div>
                    <div id="ayuda1">

                    </div>


                </div>
                <?PHP
            }
            ?>
            <?php
            if ($_SESSION["usuario"] != "ADMINISTRADOR") {
                ?>
                <input hidden="" value="<?php echo $usuario[0]["ci"]; ?>" name="ci">
                <?php
            }
            ?>
            <input hidden="" value="<?php echo $usuario[0]["id_usuario"]; ?>" name="id_usuario">

            <?PHP
            if ($_SESSION["usuario"] != "ADMINISTRADOR") {
                ?>
                <div class="form-group">


                    <div id="usuario">
                        <label for="usr">Usuario</label>
                        <input class="form-control"  type="text" id="user"name="usuario" value="<?php echo $usuario[0]["usuario"]; ?>"required>
                    </div>
                    <div id="ayuda2">

                    </div>
                </div>
                <?PHP
            }
            ?>

            <div class="form-group">


                <div id="login_contasenna">
                    <label for="pwd">Password</label>

                    <input class="form-control"  type="password" id="contrasenna" name="contrasenna" value="<?php //echo $usuario[0]["contrasenna"];          ?>" required>

                </div>
                <div id="ayuda3">

                </div>



            </div>

            <?PHP
            if ($_SESSION["usuario"] == "ADMINISTRADOR") {
                ?>

                <div class="form-group">


                    <div id="">
                        <label for="ci">Carnet de Identidad</label>
                        <input class="form-control" maxlength="11" type="text" id="ci" value="<?php echo $usuario[0]["ci"]; ?>" name="ci" required>
                    </div>
                    <div id="ayuda5">

                    </div>



                </div>

                <div class="form-group">
                    <div id="">
                        <label for="sexo">Sexo</label>
                        <select name="sexo" class="form-control"  id="sexo">

                            <option value="0">-- Seleccione --</option>

                            <option  value="1" id="masculino">Masculino</option>
                            <option value="2" id="femenino">Femenino</option>

                        </select>
                    </div>
                    <div id="ayuda8">

                    </div>
                </div> 
                <script>
                    var seleccion =<?php echo $usuario[0]["sexo"]; ?>;
                    if (seleccion == 1) {
                        $("#masculino").attr("selected", "true");
                    } else {
                        $("#femenino").attr("selected", "true");
                    }
                </script>
                <?PHP
            }
            ?>


            <?PHP
            if ($_SESSION["usuario"] != "ADMINISTRADOR") {
                ?>
                <div class="form-group">


                    <div id="">
                        <label for="centro">Centro</label>
                        <input class="form-control"  type="text" id="centro" name="centro" value="<?php echo $usuario[0]["centro"]; ?>"required>
                    </div>
                    <div id="ayuda4">

                    </div>



                </div>
                <?PHP
            }
            ?>
            <?PHP
            if ($_SESSION["usuario"] != "ADMINISTRADOR") {
                ?>
                <div class="form-group">


                    <div id="">
                        <label for="telefono">Telefono</label>
                        <input class="form-control" maxlength="8" type="text" id="telefono" name="telefono"value="<?php echo $usuario[0]["telefono"]; ?>" required>
                    </div>

                    <div id="ayuda6">

                    </div>



                </div>
                <?PHP
            }
            ?>

            <div class="form-group">


                <div id="">
                    <label for="direccion">Direccion</label>
                    <textarea style="resize:none" class="form-control"  type="text" id="direccion" name="direccion" required><?php echo $usuario[0]["direccion"]; ?></textarea>
                </div>

                <div id="ayuda7">

                </div>

            </div>

            <?PHP
            if ($_SESSION["usuario"] != "ADMINISTRADOR") {
                ?>
                <div class="form-group">


                    <div id="">
                        <label for="correo">Correo electronico</label>
                        <input class="form-control"  type="text" id="correo" name="correo"value="<?php echo $usuario[0]["correo"]; ?>" required>
                    </div>
                    <div id="ayuda9">

                    </div>


                </div>

                <?PHP
            }
            ?>





            <div class="text-center">    

                <div id="boton">

                    <button type="submit"class="btn btn-primary" id="enviar_modificar" onclick="validador_modificar(event, '<?php echo $_SESSION['usuario']; ?>')">Modificar</button>
                    <?php if ($_SESSION["usuario"] != "ADMINISTRADOR") { ?>
                        <a href="../Controlador/CC_usuarios.php?accion=eliminar&id_usuario=<?php echo $_SESSION["id_usuario"]; ?>" class="btn btn-danger">Eliminar Cuenta</a>
                        <?PHP
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>



<?php } ?>


