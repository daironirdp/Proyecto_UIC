<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../modelo/CM_noticia.php';

extract($_REQUEST);
session_start();

function subirAlServidor($imagen,$destino) {  
    $bandera=true;
        if ($imagen["size"] < 1800000) {
            if ($imagen["type"] == "image/png" || $imagen["type"] == "image/jpeg" || $imagen["type"] == "image/gift") {

                if (move_uploaded_file($imagen["tmp_name"], $destino . $imagen["name"])) {
                    
                } else {
                   $bandera=FALSE;
                }
            } else {
               $bandera=FALSE;
            }
        } else {
            $bandera=FALSE;
        }
        return $bandera;
   
}

switch ($accion) {


    case "adicionar": {
        if($_FILES["imagen"]){
           $imagen = $_FILES["imagen"];
           $destino = "../Vista/img/";
           if(!subirAlServidor($imagen,$destino)){
            $imagen="";   
           }
           $imagen=$imagen["name"];
           }
           


            $obj = new Noticia($descripcion, $imagen, $titulo, $autor, $pie_foto);
            $obj->registrarNoticia();
            header("location:../vista/plantilla.php?opcion=1");
        }break;


    case"eliminar": {
            $obj = new Noticia();
              
            $obj->borrarNoticias($id_noticia);
           header("location:../vista/plantilla.php?opcion=1");
        }break;

    case "modificar": {
         $obj = new Noticia();
           if($_FILES["imagen"]){
           $imagen = $_FILES["imagen"];
           $destino = "../Vista/img/";
            if (!$obj->eslaImagen($imagen, $id_noticia)) {
                if(!subirAlServidor($imagen,$destino)){
                    $imagen="";
                }else{
                     $imagen=$imagen["name"];
                }
            }else{
                $imagen=$imagen["name"];
            }
            
           }   

            $obj->modificarNoticia($id_noticia, $descripcion, $imagen, $titulo, $autor, $pie_foto);
            header("location:../vista/plantilla.php?opcion=1");
        }
}