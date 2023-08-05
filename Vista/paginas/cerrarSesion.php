<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
       session_start();
        session_destroy();
   setcookie("mi_usuario", $_COOKIE["mi_usuario"], time()-1,"/PHP_escuela/Proyecto_UIC/");//destruye la cookie llamada MyCookie
   setcookie("mi_id_usuario", $_COOKIE["mi_id_usuario"], time()-1,"/PHP_escuela/Proyecto_UIC/");//destruye la cookie llamada MyCookie
        header("location:../plantilla.php?opcion=0");
        
     