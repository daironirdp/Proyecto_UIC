<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */include_once '../modelo/CM_comentario.php';
extract($_REQUEST);
session_start();

switch ($accion) {


    case "adicionar": {
      $obj = new Comentario($id_noticia,$id_usuario,$descripcion,"false","false");
      $obj->realizarComentario();
   header("location:../vista/plantilla.php?opcion=6&tipo_contenido=noticia_comentario&id_noticia=$id_noticia");
            
        }break;


    case"eliminar": {
        $obj = new Comentario();
      $obj->eliminarComentario($id_comentario);
      if(isset($tipo_contenido)){
          
       header("location:../vista/plantilla.php?opcion=6&tipo_contenido=comentario&id_noticia='$id_noticia'");
      }else{
         header("location:../vista/plantilla.php?opcion=9"); 
      }
   
            
        }break;

    case "modificar": {
         $obj = new Comentario();
     $obj->modificarComentario($id_comentario,$descripcion);
    // var_dump($id_comentario,$descripcion);
   header("location:../vista/plantilla.php?opcion=6&tipo_contenido=noticia_comentario&id_noticia=$id_noticia");
            
        }break;

    case "publicar": {
         $obj = new Comentario();
      $obj->publicar($id_comentario);
   header("location:../vista/plantilla.php?opcion=9");
            
        }break;
    case "retirar": {
         $obj = new Comentario();
      $obj->retirar($id_comentario);
   header("location:../vista/plantilla.php?opcion=9");
            
        }break;
        
    case "responder": {
            var_dump($headers);
         $obj = new Comentario();
      $obj->responderComentario($id_comentario,$destinatario,$asunto,$mensaje,$headers);
   header("location:../vista/plantilla.php?opcion=9");
            
        }    
        
}

