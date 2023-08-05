

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../modelo/CM_curso.php';
extract($_REQUEST);
session_start();

switch ($accion) {


    case "adicionar": {
      $obj = new Curso($tema,$profesor,$matricula ,$descripcion,$frecuencia,$hora_entrada,$hora_salida);
      $obj->registrarCurso();
   header("location:../vista/plantilla.php?opcion=2");
            
        }break;


    case"eliminar": {
        $obj = new Curso();
      $obj->borrarCurso($id_curso);
   header("location:../vista/plantilla.php?opcion=2");
            
        }break;

    case "modificar": {
         $obj = new Curso($tema, $profesor, $matricula, $descripcion, $frecuencia, $hora_entrada, $hora_salida);
        // var_dump($obj);
     $obj->modificarCurso($id_curso);
   header("location:../vista/plantilla.php?opcion=2");
            
        }break;

    case "matricular": {
   $obj = new Curso();
   echo 'entro matricular';
   $obj->participarCurso($id_curso,$id_usuario);
   header("location:../vista/plantilla.php?opcion=2");
        }break;
     case "desmatricular": {
   $obj = new Curso();
   
   $obj->desMatricularCurso($id_curso,$id_usuario);
   header("location:../vista/plantilla.php?opcion=2");
        }   
        
        
}