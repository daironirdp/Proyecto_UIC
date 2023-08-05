<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../modelo/CM_usuario.php';

extract($_REQUEST);
session_start();

switch ($accion) {

    case "registrar": {
            //Encriptar contrasenna
            $contrasenna = password_hash($contrasenna, PASSWORD_DEFAULT, array("cost" => 12));
       

        
            $obj = new Usuario($nombre, $usuario, $ci, $contrasenna, $direccion, $correo, $sexo, $centro, $telefono);
            $obj->registrarUsuario();
            $_SESSION['estado'] = "autenticado";
            $_SESSION["usuario"] = $usuario;
            $_SESSION["id_usuario"] = $obj->idDadoCI($ci)[0]["id_usuario"];

            header("location:../vista/plantilla.php?opcion=0");
        }

        break;

    case "autenticar": {

            $usuario = htmlentities(addslashes($usuario));
            $contrasenna = htmlentities(addslashes($contrasenna)); //captura el valor depeurado para evitar inyecciones sql

            $obj = new Usuario();
            $_SESSION['estado'] = "autenticado";
            $_SESSION["usuario"] = $usuario;
            $_SESSION["id_usuario"] = $id_usuario;

            if (isset($recuerdame)) {

                setcookie("mi_usuario", $usuario, time() + 90000,"/PHP_escuela/Proyecto_UIC/");
                setcookie("mi_id_usuario", $id_usuario, time() + 90000,"/PHP_escuela/Proyecto_UIC/");
               // var_dump($_COOKIE);
            }
            header("location:../vista/plantilla.php?opcion=0");
        }


        break;

    case "eliminar": {
            if (isset($id_usuario)) {
                $usuario = new Usuario();
                $usuario->borrarUsuario($id_usuario);
                session_destroy();
            }
            header("location:../vista/plantilla.php?opcion=0");
        }
        
        case "eliminar_Xadmin": {
            if (isset($id_usuario)) {
                $usuario = new Usuario();
                $usuario->borrarUsuario($id_usuario);
                
            }
            $_SESSION['estado'] = "autenticado";
            $_SESSION["usuario"] = $usuario_admin;
            $_SESSION["id_usuario"] = $id_usuario_admin;
            header("location:../vista/plantilla.php?opcion=0");
        }
 break;
    case "modificar": {
            $contrasenna = password_hash($contrasenna, PASSWORD_DEFAULT, array("cost" => 12));

            $obj = new Usuario();
            if ($elemento == "usuario") {
                $obj->modificarUsuario($id_usuario, $usuario, $contrasenna, $direccion, $correo, $centro, $telefono);
                $_SESSION['estado'] = "autenticado";
                $_SESSION["usuario"] = $usuario;
                $_SESSION["id_usuario"] = $obj->idDadoCI($ci)[0]["id_usuario"];
            } else {
                $obj->modificarAdministrador($id_usuario, $nombre, $contrasenna, $direccion);
                $_SESSION['estado'] = "autenticado";
                $_SESSION["usuario"] = $usuario;
                $_SESSION["id_usuario"] = $obj->idDadoCI($ci)[0]["id_usuario"];
            }

            header("location:../vista/plantilla.php?opcion=0");
        }break;


    case "comprobarUser": {
            $array = array();
            $obj = new Usuario();
            $valor = $obj->comprobarUserContra($usuario);
            if ($valor) {
                //echo "<script class='incorrecto'>var bandera_usuario='false';</script>";
                $array["dato"] = false;
            } else {
                //echo "<p class='incorrecto'style='color:red'>Ese usuario ya existe</p>";
                //echo "<script class='incorrecto'>var bandera_usuario='true';</script>";
                $array["dato"] = true;
            }
            echo json_encode($array); // envia los datos en formato json
        }break;

    case "validarLogin": {
            if (isset($usuario) && isset($contrasenna)) {
                $usuario = htmlentities(addslashes($usuario));
                $contrasenna = htmlentities(addslashes($contrasenna)); //captura el valor depeurado para evitar inyecciones sql

                $obj = new Usuario();

                $valor = $obj->comprobarCredenciales($usuario, $contrasenna);
                $array = array();

                if ($valor == false) {

                    $array["usuario"] = "ok";
                    $array["contrasenna"] = "mal";
                    $array["mensaje"] = "Contraseña incorrecta";
                } else {
                    if (is_array($valor) && count($valor) > 0) {
                        $array["usuario"] = "ok";
                        $array["contrasenna"] = "ok";
                        $array["id_usuario"] = $valor["id_usuario"];
                    } else {
                        $array["usuario"] = "mal";
                        $array["mensaje"] = "Usuario no registrado";
                    }
                }
                echo json_encode($array);
            }
        }
}