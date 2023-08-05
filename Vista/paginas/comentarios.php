<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

 
        <?php
        // put your code here
         // put your code here
        include_once '../Modelo/CM_comentario.php';
        $obj=new Comentario();
        $comentarios=$obj->obtenerComentarios();
        if($_SESSION["usuario"]=="ADMINISTRADOR"){
        if($comentarios!=false){
        ?>
        
       <?php
               foreach ($comentarios as $c){
       ?>
        
  <div class="contenedor_noticias_comentarios_quejas">
      <div>
      <header class="comentarios_quejas"> 
          <a href="" class="enlace">
        
         <i class=" fa fa-user icono_user" aria-hidden="true"></i><br>
           <label><?php echo $c["usuario"]?></label> 
           </a>
         
        <div class="fecha_noticia">
            <span>Publicado :</span>
            <time><?php echo $c["fecha"]?></time>
        
        </div> 
    
    </header>
    <div class="container-fluid  comentYquejas" style="">
        <p>    
    <?php echo $c["descripcion"]?>
       </p> 
       
     
       
       <div class="botones_comentarios_quejas">
           
           
           <?php 
           
           if($c["estado"]=="false" && $c["mensaje"]!="true"){
               
               ?>
           <a href="?opcion=13&tipo_contenido=mensaje_comentario&id_comentario=<?php echo $c['id_comentario']; ?>&id_usuario=<?php echo $c['id_usuario']; ?>" class="btn btn-primary">Responder</a>
           <?php
           }
           if($c["estado"]=="false"){
           ?>
           
           <a href="../Controlador/CC_comentarios.php?accion=publicar&id_comentario=<?php echo $c["id_comentario"];?>" class="btn btn-primary">Publicar</a>
              
 <?php 
               
           }else{?>
           <a href="../Controlador/CC_comentarios.php?accion=retirar&id_comentario=<?php echo $c["id_comentario"];?>" class="btn btn-primary">Retirar</a>
           <?php
               }if($c["mensaje"]=="true" && $c["estado"]=="false" ){
           ?>
           <a href="../Controlador/CC_comentarios.php?accion=eliminar&id_comentario=<?php echo $c["id_comentario"];?>"class="btn btn-danger">Eliminar</a>
           <?php
               }
           ?>
       </div>
        
        
    </div>

    </div>
      
      
</div>

  
       <?php
        }
       ?>
        
        <?php
        
        }else{
        ?>
<h2>No hay  comentarios que mostrar</h2>
        
        <?php } 
        
        }
        ?>
