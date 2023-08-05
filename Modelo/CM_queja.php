<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once "Conexion.php";

class Queja {

    //put your code here
    private $id_usuario;
    private $fecha;
    private $estado;
    private $descripcion;

    function __construct() {
        $a = func_get_args();
        $i = func_num_args();
        if ($i > 0) {
            call_user_func_array(array($this, '__constructArg'), $a);
        } else {
            call_user_func_array(array($this, '__constructEmpty'), $a);
        }
    }

    function __constructArg($id_usuario, $descripcion) {

        $this->id_usuario = $id_usuario;
        $this->fecha = date("y-m-d");
        $this->estado = "false";
        $this->descripcion = $descripcion;
    }

    function __constructEmpty() {
        
    }

    function obtenerQuejas() {
        $conexion = new Conexion();
        $sql = "SELECT id_queja,estado,fecha,descripcion,q.id_usuario,usuario "
                . "FROM quejas q,usuarios u "
                . "WHERE q.id_usuario=u.id_usuario";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }

    function obtenerQueja($id_queja) {
        $conexion = new Conexion();
        $sql = "SELECT id_queja,estado,fecha,descripcion,q.id_usuario,usuario "
                . "FROM quejas q,usuarios u "
                . "WHERE q.id_usuario=u.id_usuario and id_queja='$id_queja'";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }

    function realizarQueja() {

        $conexion = new Conexion();
        $sql = "INSERT INTO quejas (id_usuario,descripcion,estado,fecha)"
                . " VALUES ('$this->id_usuario','$this->descripcion','$this->estado','$this->fecha')";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function eliminarQueja($id_queja) {

        $conexion = new Conexion();
        $sql = "DELETE FROM quejas where id_queja=$id_queja";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function atenderQueja($id_queja,$destinatario,$asunto,$mensaje,$headers) {

        mail($destinatario,$asunto,$mensaje,$headers);//enviando correo
        $conexion = new Conexion();
        $sql = "update quejas set estado='true' where id_queja='$id_queja'";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function modificarQueja($id_queja, $descripcion) {
        $conexion = new Conexion();
        $sql = "update quejas set descripcion='$descripcion' where id_queja='$id_queja'";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

}
