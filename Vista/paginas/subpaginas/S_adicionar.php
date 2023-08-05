<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<script>
//validaciones simples




</script>
<?php
if ($tipo_contenido == "noticia") {
    ?>
    <div class="contenedor_noticias_comentarios_quejas">
        <div>
            <header class="comentarios_quejas"> 
                <h2>Adicionar  noticia:</h2>
                <div style="text-align: start" class="fecha_flex">Noticias >>Adicionar 


                    <div class="fecha_noticia">
                        <span>Fecha :</span>
                        <time><?php echo date("y-m-d") ?></time>

                    </div> 
                </div>


            </header>
            <div class="container-fluid  comentYquejas" style="">


                <form method="POST" action="../Controlador/CC_noticias.php?accion=adicionar" enctype="multipart/form-data">

                    <div id="contenedorFlexibleModifNews">

                        <table style="margin-left: 40px">

                            <tr>
                                <td><label for="titulo">Titulo:</label></td> 
                                <td id="ayuda1"><input class="form-control"type="text" value="" placeholder="Titulo de la noticia" name="titulo" id="titulo"/>

                                </td>
                            </tr>

                            <tr>
                                <td><label for="autor">Autor:</label></td> 
                                <td id="ayuda2"><input class="form-control"type="text" placeholder="Autor"name="autor"id="autor" /></td>
                            </tr>

                            <tr>
                                <td><label for="imagen_cargar">Imagen:</label></td> 
                                <td id="ayuda3">
                                    <div style="">
                                        <label class="cargo" for="imagen_cargar">Examinar</label>
                                        <label class="" for="imagen_cargar" id="ruta">imagen/*</label>
                                        <input class="" type="file" placeholder="Imagen" name="imagen"  id="imagen_cargar"   accept=""/>
                                    </div>
                                </td>


                            </tr>
                            <tr>
                                <td><label for="pie_foto">Pie de foto:</label></td> 
                                <td id="ayuda4">
                                    <input class="form-control" type="text" placeholder="Pie de foto" name="pie_foto" id="pie_foto"/>
                                </td>
                            </tr>        
                        </table>
                        <figure>
                            <img id="img"style="width: 95%;margin-left: 10px;"src=""/>


                        </figure> 
                    </div>
                    <div>  
                        <label style="margin-left: 15px" for="descripcion">Descripcion:</label></td> 
                        <textarea class="form-control " name="descripcion" id="descripcion"cols="50" rows="3" style="resize: none;margin: auto;width: 95%;"placeholder="La noticia en si"></textarea>
                        <div id="ayuda5" style="margin-left: 25px"></div>
                    </div>

                    <div class="text-center">
                        <a href="?opcion=1" class="btn btn-primary"> Atras </a>
                        <button type="submit" class="btn btn-primary"onclick="validarNoticias(event)">Adicionar</button>
                    </div>

                </form>





            </div>

        </div>


    </div>


    <?php
} else if ($tipo_contenido == "evento_queja" || $tipo_contenido == "curso_queja" || $tipo_contenido == "noticia_queja") {
    $bandera = false;

//funcion para saber ir atras
    function EligeAnterior() {
        global $anterior;
        $opcion = 0;
        if ($anterior == "Noticias") {
            $opcion = 1;
        } else if ($anterior == "Cursos") {
            $opcion = 2;
        } else if ($anterior == "Eventos") {
            $opcion = 3;
        } else if ($anterior == "Noticias >>Comentarios") {

            $opcion = 6;
        }
        return $opcion;
    }

    if ($anterior == "Noticias >>Comentarios") {
        global $bandera;
        $bandera = true;
    }
    ?>
    <div class="contenedor_noticias_comentarios_quejas">
        <div>
            <header class="comentarios_quejas"> 
                <a href="" class="enlace">
                    <i class=" fa fa-user icono_user" aria-hidden="true"></i><br>
                    <label><?php echo $_SESSION["usuario"] ?></label> 

                </a>

                <div class="fecha_flex"><?php echo $anterior; ?> >>Adicionar queja 

                    <div class="fecha_noticia">
                        <span>Fecha :</span>
                        <time><?php echo date("y-m-d") ?></time>

                    </div> 
                </div>


            </header>
            <div class="container-fluid  comentYquejas" style="">

                <form method="POST" class="" action="../Controlador/CC_quejas.php?accion=adicionar&id_usuario=<?php echo $_SESSION["id_usuario"]; ?>">
                    <textarea class="form-control " name="descripcion" cols="100" rows="5" style="resize: none;margin: auto;width: 95%;" id="descripcion"></textarea>
                    <div id="ayuda1"></div>
                    <div class="text-center" >

                        <?php
                        if ($bandera) {
                            ?>  
                            <a href="?opcion=<?php echo EligeAnterior() ?>&tipo_contenido=noticia_comentario&id_noticia=<?php echo $id_noticia; ?>" class="btn btn-primary"> Atras </a>
                            <?php
                        } else {
                            ?>  

                            <a href="?opcion=<?php echo EligeAnterior() ?>" class="btn btn-primary"> Atras </a>
                            <?php
                        }
                        ?>  


                        <button type="submit" class="btn btn-primary" onclick="validadorQuejas(event)">Adicionar</button>

                    </div>
                </form> 


            </div>

        </div>


    </div>

<?php } else if ($tipo_contenido == "curso") {
    ?>
    <div class="contenedor_noticias_comentarios_quejas">
        <div>
            <header class="comentarios_quejas"> 
                <h2>Adicionar curso <span style="color: darkgray"></span>:</h2>
                <div style="text-align: start">Cursos >>Adicionar </div>

            </header>
            <div class="container-fluid  comentYquejas" style="">
                <form method="POST" action="../Controlador/CC_cursos.php?accion=adicionar">

                    <table style="margin-left: 40px">

                        <tr>
                            <td><label>Tema:</label></td> 
                            <td id="ayuda1"><input id="tema"class="form-control"type="text" placeholder="Escriba un tema" name="tema"/></td>
                        </tr>

                        <tr>
                            <td><label>Profesor:</label></td> 
                            <td id="ayuda2"><input id="profesor"class="form-control"type="text"placeholder="Profesor que impartira"name="profesor"/></td>
                        </tr>

                        <tr>
                            <td><label>Matricula:</label></td> 
                            <td id="ayuda3">
                                <input class="form-control"  id="matricula"type="number"  placeholder="Matricula disponible"name="matricula"/>
                            </td>

                        </tr>
                        <tr>
                            <td><label>Dias:</label></td> 
                            <td id="ayuda4">
                                <input class="form-control" id="dias"type="text" placeholder="Dias de la semana"name="frecuencia"/>
                            </td>
                        </tr>


                        <tr>
                            <td><label>Hora de entrada:</label></td> 
                            <td id="ayuda5">
                                <input class="form-control" id="hora_entrada" type="time" placeholder="00:00:00"name="hora_entrada"/>
                            </td>

                        </tr>
                        <tr>
                            <td><label>Hora de salida:</label></td> 
                            <td id="ayuda6">
                                <input class="form-control" id="hora_salida"type="time" placeholder="00:00:00"name="hora_salida"/>
                            </td>

                        </tr>



                    </table>
                    <div>  
                        <label style="margin-left: 15px">Descripcion:</label></td> 
                        <textarea class="form-control " id="descripcion"name="descripcion" cols="50" rows="3" style="resize: none;margin: auto;width: 95%;"placeholder="Breve descripcion del curso"></textarea></div>
                    <div style="margin-left: 25px;" id="ayuda7"></div>

                    <div class="text-center">
                        <a href="?opcion=2" class="btn btn-primary"> Atras </a>
                        <button type="submit" onclick="validadorCurso(event)" class="btn btn-primary">Adicionar</button>
                    </div>

                </form>





            </div>

        </div>


    </div>




<?php } else if ($tipo_contenido == "evento") {
    ?>

    <div class="contenedor_noticias_comentarios_quejas">
        <div>
            <header class="comentarios_quejas"> 
                <h2>Adicionar evento <span style="color: darkgray"></span>:</h2>
                <div style="text-align: start">Eventos >>Adicionar </div>

            </header>
            <div class="container-fluid  comentYquejas" style="">
                <form method="POST" action="../Controlador/CC_eventos.php?accion=adicionar">

                    <table style="margin-left: 40px">
                        <tr>
                            <td><label>Nombre:</label></td> 
                            <td id="ayuda1"><input class="form-control"type="text" placeholder="Nombre del evento" id="nombre"name="nombre"/></td>
                        </tr>
                        <tr>
                            <td ><label>Lugar:</label></td> 
                            <td id="ayuda2"><input class="form-control"type="text" id="lugar" placeholder="Lugar de desarrollo"name="lugar"/></td>
                        </tr>

                        <tr>
                            <td><label>Fecha de inicio:</label></td> 
                            <td id="ayuda3"><input class="form-control"type="date" id="fecha_inicio"placeholder="Comienzo"name="fecha_inicio"/></td>
                        </tr>

                        <tr>
                            <td><label>Fecha de culminacion:</label></td> 
                            <td id="ayuda4">
                                <input class="form-control" type="date" id="fecha_final"placeholder="Final" name="fecha_culminacion"/>
                            </td>

                        </tr><tr>
                            <td><label>Correo:</label></td> 
                            <td id="ayuda5">
                                <input class="form-control" type="text" id="correo" placeholder="Correo para contactar"name="contacto"/>
                            </td>
                        </tr>





                    </table>
                    <div>  
                        <label style="margin-left: 15px">Descripcion:</label></td> 
                        <textarea class="form-control " id="descripcion"name="descripcion" cols="50" rows="3" style="resize: none;margin: auto;width: 95%;"placeholder="Breve descripcion"></textarea></div>
                    <div id="ayuda6"></div>
                    <div class="text-center">
                        <a href="?opcion=3" class="btn btn-primary"> Atras </a>
                        <button type="submit" class="btn btn-primary" onclick="validadorEvento(event)">Adicionar</button>
                    </div>
                </form>





            </div>

        </div>


    </div> 



<?php } else if ($tipo_contenido == "noticia_comentario_adicionar") {
    ?>
    <div class="contenedor_noticias_comentarios_quejas ">
        <div>
            <header class="comentarios_quejas"> 
                <a href="" class="enlace">
                    <i class=" fa fa-user icono_user" aria-hidden="true"></i><br>
                    <label><?php echo $_SESSION["usuario"] ?></label> 

                </a>

                <div class="fecha_flex"> Noticias >>Comentarios >>Adicionar 

                    <div class="fecha_noticia">
                        <span>Fecha :</span>
                        <time><?php echo date("y-m-d") ?></time>

                    </div> 
                </div>


            </header>
            <div class="container-fluid  comentYquejas" style="">

                <form method="POST"  class="" action="../Controlador/CC_comentarios.php?accion=adicionar">
                    <input name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>" hidden="true"/>
                    <input name="id_noticia" value="<?php echo $id_noticia; ?>" hidden="true"/>
                    <textarea class="form-control " name="descripcion" cols="100" rows="5" style="resize: none;margin: auto;width: 95%;" id="descripcion"></textarea>
                    <div id="ayuda1"></div>
                    <div class="text-center" >

                        <a href="?opcion=6&tipo_contenido=noticia_comentario&id_noticia=<?php echo $id_noticia; ?>" class="btn btn-primary"> Atras </a>


                        <button type="submit" class="btn btn-primary" onclick="validadorQuejas(event)">Adicionar</button>

                    </div>
                </form> 


            </div>

        </div>


    </div>




<?php } else if ($tipo_contenido == "usuario_evento") {
    ?>


    <div class="contenedor_noticias_comentarios_quejas ">


        <header class="comentarios_quejas"> 
            <a href="" class="enlace">
                <i class=" fa fa-user icono_user" aria-hidden="true"></i><br>
                <label><?php echo $_SESSION["usuario"] ?></label> 

            </a>

            <div class="fecha_flex"> Eventos >>Participar


            </div>


        </header>



        <div class="container-fluid  comentYquejas" style="">

            <form role="form" action="../Controlador/CC_eventos.php?accion=participar&id_usuario=<?php echo $_SESSION["id_usuario"] ?>&id_evento=<?php echo $id_evento ?>" method="POST" id="">
                <div style="padding: 5px 30px 50px 30px;">   

                    <div class="form-group">


                        <div id="">
                            <label for="tematica">Tematica</label>
                            <input class="form-control"  type="text" id="tematica" name="tematica" required>
                            <div id="ayuda1"></div>
                        </div>
                    </div>
                    <div class="form-group">


                        <div id="">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control"  type="" id="descripcion" name="descripcion" required></textarea>
                            <div id="ayuda2"></div>
                        </div>
                    </div>

                </div>  

                <div class="text-center">    

                    <div id="botones">
                        <a href="?opcion=3" class="btn btn-primary">Cancelar</a>
                        <button class="btn btn-primary" type="submit" onclick="validadoreventos(event)">Registrarse</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>





