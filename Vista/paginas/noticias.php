<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// put your code here
include_once '../Modelo/CM_noticia.php';
$obj = new Noticia();
$noticias = $obj->obtenerNoticias();
if (count($noticias) > 0) {
    ?>

    <?php foreach ($noticias as $n) { ?>

        <div class="contenedor_noticias_comentarios_quejas">

            <header class="news"> 

                <h4> <?php echo $n["titulo"]; ?></h4>
                <div class="fecha_noticia">

                    <span><span>Autor :</span><?php echo $n["autor"]; ?></span>
                    <br>
                    <span>Publicado :</span>
                    <time><?php echo $n["fecha"]; ?></time>


                </div> 

            </header>
            <div class="container-fluid noticias" style="">
                <p>    
                    <?php echo $n["descripcion"]; ?>
                </p> 

                <figure>
                    <img src="img/<?php echo $n["imagen"]; ?>" style="" alt="No se puede mostrar"/>

                    <figcaption>
                        <?php echo $n["pie_foto"]; ?>
                    </figcaption> 
                </figure>

                <div class="botones_noticias">
                    <a href="?opcion=6&tipo_contenido=noticia_comentario&id_noticia=<?php echo $n["id_noticia"]; ?>" class="btn btn-primary">Comentarios</a>
                   
                  <?php
                    if(isset($_SESSION["usuario"])&& $_SESSION["usuario"]=="ADMINISTRADOR"){
                    ?>
                    <a href="?opcion=11&tipo_contenido=noticia&id_noticia=<?php echo $n["id_noticia"] ?>" class="btn btn-primary">Modificar</a>
                    <a href="../Controlador/CC_noticias.php?accion=eliminar&id_noticia=<?php echo $n["id_noticia"] ?>"class="btn btn-danger">Eliminar</a>
                     <?php
                    }
                    ?>
                    
                </div>


            </div>


        </div>

    <?php }
    
    if(isset($_SESSION["usuario"])){
    ?>




    

    <div class="adicionar">
<?php
    if($_SESSION["usuario"]=="ADMINISTRADOR"){
        
    
    ?>
        <a href="?opcion=12&tipo_contenido=noticia" id="adicionar">
            <i class=" fa fa-plus" aria-hidden="true"></i>

        </a>
        <label style="font-size: 1rem;">Adicionar</label>
        
        <?php
        
    } 
    if($_SESSION["usuario"]!="ADMINISTRADOR"){
    ?>

        <a href="?opcion=12&tipo_contenido=noticia_queja&anterior=Noticias" class="btn btn-primary" id="boton_quejas">
            Quejarse

        </a>

    </div>


   <?php
    }
    
    }
    ?>
    <?php
} else {
    ?>

    <h2>No existen noticias que mostrar</h2> 
<?php } ?>
