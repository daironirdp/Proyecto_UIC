<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// put your code here
// put your code here
?>


<?php
// put your code here
if ($tipo_contenido == "usuario") {
    include_once '../modelo/CM_usuario.php';
    $obj = new Usuario();
    $usuario = $obj->obtenerUsuarioDetalle($id_usuario);
    ?>

    <div class="contenedor_noticias_comentarios_quejas">
        <div>
            <header class="comentarios_quejas"> 
                <h2>Detalles de <span style="color: darkgray"><?php echo $usuario[0]["usuario"] ?></span>:</h2>
                <div style="text-align: start">Usuarios >>Detalles </div>
            </header>
            <div class="container-fluid  comentYquejas" style="">

                <table style="margin-left: 40px">

                    <tr>
                        <td><label>Nombre:</label></td> 
                        <td><p><?php echo $usuario[0]["nombre"]; ?></p></td>
                    </tr>

                    <tr>
                        <td><label>CI:</label></td> 
                        <td><p><?php echo $usuario[0]["ci"]; ?></p></td>
                    </tr>

                    <tr>
                        <td><label>Direccion:</label></td> 
                        <td><p><?php echo $usuario[0]["direccion"]; ?></p></td>

                    </tr><tr>
                        <td><label>Correo:</label></td> 
                        <td><p><?php echo $usuario[0]["correo"]; ?></p></td>
                    </tr>


                    <tr>
                        <td><label>Centro:</label></td> 
                        <td><p><?php echo $usuario[0]["centro"]; ?></p></td>
                    </tr>

                    <tr>
                        <td><label>Telefono:</label></td> 
                        <td><p><?php echo $usuario[0]["telefono"]; ?></p></td>
                    </tr>

                </table>



                <div class="text-left" style="margin-left: 20px;">
                    <a href="?opcion=7" class="btn btn-primary"> Atras </a>

                </div>


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
                <h2>Detalles del evento <span style="color: darkgray"><?php echo $evento[0]["nombre"] ?></span>:</h2>
                <div style="text-align: start">Eventos >>Detalles </div>

            </header>
            <div class="container-fluid  comentYquejas" style="">

                <table style="margin-left: 40px">

                    <tr>
                        <td><label>Lugar:</label></td> 
                        <td><p><?php echo $evento[0]["lugar"]; ?></p></td>
                    </tr>

                    <tr>
                        <td><label>Fecha de inicio:</label></td> 
                        <td><p><?php echo $evento[0]["fecha_inicio"]; ?></p></td>
                    </tr>

                    <tr>
                        <td><label>Fecha de culminacion:</label></td> 
                        <td><p><?php echo $evento[0]["fecha_culminacion"]; ?></p></td>

                    </tr><tr>
                        <td><label>Correo:</label></td> 
                        <td><p><?php echo $evento[0]["contacto"]; ?></p></td>
                    </tr>


                    <tr>
                        <td><label>Descripcion:</label></td> 
                        <td><p><?php echo $evento[0]["descripcion"]; ?></p></td>
                    </tr>



                </table>



                <div class="text-left" style="margin-left: 20px;">
                    <a href="?opcion=3" class="btn btn-primary"> Atras </a>

                </div>


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
                <h2>Detalles del curso <span style="color: darkgray"><?php echo $curso[0]["tema"] ?></span>:</h2>
                <div style="text-align: start">Cursos >>Detalles </div>

            </header>
            <div class="container-fluid  comentYquejas" style="">

                <table style="margin-left: 40px">

                    <tr>
                        <td><label>Profesor:</label></td> 
                        <td><p><?php echo $curso[0]["profesor"]; ?></p></td>
                    </tr>

                    <tr>
                        <td><label>Matricula:</label></td> 
                        <td><p><?php echo $curso[0]["matricula"]; ?></p></td>
                    </tr>

                    <tr>
                        <td><label>Descripcion:</label></td> 
                        <td><p><?php echo $curso[0]["descripcion"]; ?></p></td>

                    </tr><tr>
                        <td><label>Dias:</label></td> 
                        <td><p><?php echo $curso[0]["frecuencia"]; ?></p></td>
                    </tr>


                    <tr>
                        <td><label>Hora de entrada:</label></td> 
                        <td><p><?php echo date("g:i a", strtotime($curso[0]["hora_entrada"])); ?></p></td>
                    </tr>
                    <tr>
                        <td><label>Hora de salida:</label></td> 
                        <td><p><?php echo date("g:i a", strtotime($curso[0]["hora_salida"]));//cambia de hora militar a hora convencional ?></p></td>
                    </tr>


                </table>



                <div class="text-left" style="margin-left: 20px;">
                    <a href="?opcion=2" class="btn btn-primary"> Atras </a>

                </div>


            </div>

        </div>


    </div>



    <?php
} else if ($tipo_contenido == "noticia_comentario") {

    include_once '../Modelo/CM_comentario.php';
    $obj = new Comentario();
    $comentarios = $obj->obtenerComentariosDeUnaNoticia($id_noticia);
   
    if ($comentarios!=false) {
        
        ?>
  
        <?php
        foreach ($comentarios as $c) {
            ?>

            <div class="contenedor_noticias_comentarios_quejas">
                <div>
                    <header class="comentarios_quejas"> 
                        <a href="" class="enlace">

                            <i class=" fa fa-user icono_user" aria-hidden="true"></i><br>
                            <label><?php echo $c["usuario"] ?></label> 
                        </a>
                        <div class="fecha_flex">
                            Noticias >>Comentarios
                        <div class="fecha_noticia">
                            <span>Publicado :</span>
                            <time><?php echo $c["fecha"] ?></time>

                        </div> 
</div>
                    </header>
                    <div class="container-fluid  comentYquejas" style="">
                        <p>    
            <?php echo $c["descripcion"] ?>
                        </p> 


<?php
   if(isset($_SESSION["usuario"])){
?>
                        <div class="botones_comentarios_quejas">
                            <?php
                            if($_SESSION["id_usuario"]==$c["id_usuario"]){
                            ?>
                            <a href="?opcion=11&tipo_contenido=noticia_comentario_modificar&id_comentario=<?php echo $c["id_comentario"] ?>" class="btn btn-primary">Modificar</a>
                           <?php
                            }
                            if($_SESSION["id_usuario"]==$c["id_usuario"] ){
                           ?>
                            
                             
                            <a href="../Controlador/CC_comentarios.php?id_comentario=<?php echo $c["id_comentario"] ?>&opcion=6&tipo_contenido=comentario&id_noticia=<?php echo $id_noticia ?>&accion=eliminar"class="btn btn-danger">Eliminar</a>
                        <?php } ?>
                        </div>
<?php
   }
?>

                    </div>

                </div>


            </div>
            <?php
        }
        ?>



    <?php } else { ?>
<div class="contenedor_noticias_comentarios_quejas ">
    <div><h2>Comentarios</h2></div>
    <div class="fecha_flex">
        <div>Noticias >>Comentarios</div>
    
        <div class="fecha_noticia">
            <span>Fecha :</span>
             <time><?php echo date("y-m-d") ?></time></div>
            
    </div>
    
    
</div>
        <h2>Esta noticia no tiene comentarios</h2>  

    <?php } ?>

<?php if(isset($_SESSION["usuario"])){ ?>
    <div class="adicionar">

        <a href="?opcion=12&tipo_contenido=noticia_comentario_adicionar&id_noticia=<?php echo $id_noticia?>" id="adicionar">
            <i class=" fa fa-plus" aria-hidden="true"></i>

        </a>
        <label style="font-size: 1rem;">Adicionar</label>
<?php
if($_SESSION["usuario"]!="ADMINISTRADOR"){
?>
        <a href="?opcion=12&tipo_contenido=noticia_queja&anterior=Noticias >>Comentarios&id_noticia=<?php echo $id_noticia?>" class="btn btn-primary" id="boton_quejas">
            Quejarse

        </a>

        <?php
}
        ?>
    </div>
        <?php } ?>
         <div class="salir">

         <a href="?opcion=1" class="btn btn-primary"> Atras </a>

    </div>

<?php } ?>
        
