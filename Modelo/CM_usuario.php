<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "Conexion.php";

class Usuario {

    //put your code here
    protected $nombre;
    protected $usuario;
    protected $ci;
    protected $contrasenna;
    protected $direccion;
    protected $correo;
    protected $sexo;
    protected $centro;
    protected $telefono;

    function __construct() {
        $a = func_get_args();
        $i = func_num_args();
        if ($i > 0) {
            call_user_func_array(array($this, '__constructArg'), $a);
        } else {
            call_user_func_array(array($this, '__constructEmpty'), $a);
        }
    }

    function __constructArg($nombre, $usuario, $ci, $contrasenna, $direccion, $correo, $sexo, $centro, $telefono) {

        $this->nombre = addslashes($nombre);
        $this->usuario = addslashes($usuario);
        $this->ci = $ci;
        $this->contrasenna = addslashes($contrasenna);
        //$this->contrasenna = md5($contrasenna);
        $this->direccion = addslashes($direccion);
        $this->correo = addslashes($correo);
        $this->sexo = addslashes($sexo);
        $this->centro = addslashes($centro);
        $this->telefono = addslashes($telefono);
    }

    function __constructEmpty() {
        
    }

    function obtenerUsuarioDetalle($id_usuario) {
        $conexion = new Conexion();
        $sql = "SELECT * FROM usuarios where id_usuario=$id_usuario";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }

    function obtenerNombreUsuario($id_usuario) {
        $conexion = new Conexion();
        $sql = "SELECT usuario FROM usuarios where id_usuario=$id_usuario";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }

    function obtenerUsuarios() {
        $conexion = new Conexion();
        $sql = "SELECT id_usuario,usuario,nombre,ci FROM usuarios where usuario<>'ADMINISTRADOR'";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }

    function registrarUsuario() {
        $conexion = new Conexion();
        $sql = "INSERT INTO usuarios"
                . "(usuario, nombre,ci,contrasenna,direccion,correo,sexo,centro,telefono)"
                . " VALUES ('$this->usuario','$this->nombre','$this->ci','$this->contrasenna',"
                . "'$this->direccion','$this->correo','$this->sexo','$this->centro','$this->telefono')";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function idDadoCI($ci) {
        $conexion = new Conexion();
        $sql = "SELECT id_usuario FROM usuarios where ci='$ci'";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }

    function comprobarCredenciales($usuario, $contrasenna) {

        $conexion = new Conexion();
        $sql = "SELECT * "
                . "FROM usuarios "
                . "WHERE usuario='$usuario'";
        $registros = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        // $contrasenna= md5($contrasenna);
        if ($registros != false) {
            $i = 0;
            $valor = false;
            while ($i < count($registros) && $valor == false) {

                if (password_verify($contrasenna, $registros[$i]["contrasenna"])) {
                    //if($contrasenna=$registros[$i]["contrasenna"]){
                    $valor = true;
                }
                $i++;
            }
            //false contrasenna mal
            if ($valor) {
                return $registros[$i - 1];
            }
            //todo ok
            return $valor;
        } else {
            //usuario no registrado
            return 3;
        }
    }

    function borrarUsuario($id_usuario) {
        $conexion = new Conexion();
        $sql4 = "DELETE FROM comentarios where id_usuario='$id_usuario'";
        $sql3 = "DELETE FROM quejas where id_usuario='$id_usuario'";
        $sql2 = "DELETE FROM usuarios_eventos where id_usuario='$id_usuario'";
        $sql1 = "DELETE FROM usuarios_cursos where id_usuario='$id_usuario'";

        $sql = "DELETE FROM usuarios where id_usuario='$id_usuario'";
        $conexion->ejecutarConsulta($sql4);
        $conexion->ejecutarConsulta($sql3);
        $conexion->ejecutarConsulta($sql2);
        $conexion->ejecutarConsulta($sql1);
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function modificarUsuario($id_usuario, $usuario, $contrasenna, $direccion, $correo, $centro, $telefono) {
        $conexion = new Conexion();
        $sql = "UPDATE usuarios SET "
                . "usuario='$usuario',contrasenna='$contrasenna',direccion='$direccion',correo='$correo',"
                . "centro='$centro',telefono='$telefono' WHERE id_usuario='$id_usuario'";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function modificarAdministrador($id_usuario, $nombre, $contrasenna, $direccion) {
        $conexion = new Conexion();
        $sql = "UPDATE usuarios SET "
                . "nombre='$nombre',contrasenna='$contrasenna',direccion='$direccion'"
                . " WHERE id_usuario='$id_usuario'";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function comprobarUserContra($usuario) {     
 $conexion = new Conexion();
        $sql = "SELECT * "
                . "FROM usuarios "
                . "WHERE usuario='$usuario'";
        $registros = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        

        if($registros!=FALSE){
            return false;
            
        }else{
           
             return true;
        }
        
    }

}
