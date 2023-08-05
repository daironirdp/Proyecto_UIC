<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../modelo/CM_evento.php';
extract($_REQUEST);

switch ($accion) {


    case "adicionar": {
      $obj = new Evento($nombre, $lugar,$fecha_inicio, $fecha_culminacion,$descripcion,$contacto);
      $obj->registrarEvento();
   header("location:../vista/plantilla.php?opcion=3");
            
        }break;


    case"eliminar": {
        $obj = new Evento();
      $obj->borrarEvento($id_evento);
   header("location:../vista/plantilla.php?opcion=3");
            
        }break;

    case "modificar": {
         $obj = new Evento($nombre, $lugar,$fecha_inicio, $fecha_culminacion,$contacto,$descripcion);
         var_dump($obj);
         $obj->modificarEvento($id_evento);
   header("location:../vista/plantilla.php?opcion=3");
            
        }break;

    case "participar": {
   $obj = new Evento();
   $obj->participarEvento($id_evento,$id_usuario,$tematica,$descripcion);
   header("location:../vista/plantilla.php?opcion=3");
        }break;
     case "cancelar_participacion": {
   $obj = new Evento();
   session_start();
   $obj->cancelarParticipacion($id_evento, $_SESSION["id_usuario"]);
            header("location:../vista/plantilla.php?opcion=3");
        }   
        
}