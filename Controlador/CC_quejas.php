<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../modelo/CM_queja.php';

extract($_REQUEST);
session_start();

switch ($accion) {

   case "adicionar": {
            if (isset($id_usuario) && isset($descripcion)) {

                $usuario = new Queja($id_usuario, $descripcion);
                $valor = $usuario->realizarQueja();
            }
            header("location:../Vista/plantilla.php?opcion=8");
        }

        break;

    case "eliminarQueja": {
            if (isset($id_queja)) {

                $usuario = new Queja();
                $valor = $usuario->eliminarQueja($id_queja);
                header("location:../Vista/plantilla.php?opcion=8");
            }
        }
        break;

    case"responder": {
            if (isset($id_queja)) {

                $usuario = new Queja();
                $valor = $usuario->atenderQueja($id_queja,$destinatario,$asunto,$mensaje,$headers);
            }
             header("location:../Vista/plantilla.php?opcion=8");
            
        }break;
    case"modificar": {
            if (isset($id_queja)&&isset($descripcion)) {

                $usuario = new Queja();
                
                $valor = $usuario->modificarQueja($id_queja, $descripcion);
               //var_dump($valor,$id_queja,$descripcion);
            }
            header("location:../Vista/plantilla.php?opcion=8");
        }
        
}