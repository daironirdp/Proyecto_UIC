<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'Conexion.php';

class Evento {

    //put your code here
    private $nombre;
    private $lugar;
    private $fecha_inicio;
    private $fecha_culminacion;
    private $contacto;
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

    function __constructArg($nombre, $lugar, $fecha_inicio, $fecha_culminacion, $contacto, $descripcion) {
        $this->descripcion = $descripcion;
        $this->lugar = $lugar;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_culminacion = $fecha_culminacion;
        $this->nombre = $nombre;
        $this->contacto = $contacto;
        $this->descripcion = $descripcion;
    }

    function __constructEmpty() {
        
    }

    function registrarEvento() {

        $conexion = new Conexion();
        $sql = "INSERT INTO eventos"
                . "(nombre,lugar, fecha_inicio,fecha_culminacion,contacto,descripcion)"
                . " VALUES ('$this->nombre','$this->lugar','$this->fecha_inicio','$this->fecha_culminacion','$this->descripcion','$this->contacto')";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function borrarEvento($id_evento) {
        $conexion = new Conexion();
        $sql = "delete from usuarios_eventos  where id_evento='$id_evento'";
        $sql2 = "DELETE FROM eventos where  id_evento=$id_evento";
        $conexion->ejecutarConsulta($sql);
        $conexion->ejecutarConsulta($sql2);
        $conexion->CerrarConexion();
    }

    function obtenerEventos() {
        $conexion = new Conexion();
        $sql = "SELECT id_evento,nombre,lugar,fecha_inicio FROM eventos";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }

    function obtenerEvento($id_evento) {
        $conexion = new Conexion();
        $sql = "SELECT id_evento,nombre,lugar,fecha_inicio FROM eventos "
                . "where id_evento='$id_evento'";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }

    function obtenerEventoDetalles($id_evento) {
        $conexion = new Conexion();
        $sql = "SELECT * FROM eventos where id_evento='$id_evento'";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }

    function modificarEvento($id_evento) {
        $conexion = new Conexion();
        $sql = "UPDATE eventos SET "
                . "nombre='$this->nombre',lugar='$this->lugar',fecha_inicio='$this->fecha_inicio',fecha_culminacion='$this->fecha_culminacion',"
                . "contacto='$this->contacto',descripcion='$this->descripcion' WHERE id_evento='$id_evento'";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function participarEvento($id_evento, $id_usuario, $tema, $descripcion) {
        $conexion = new Conexion();
        var_dump($id_evento, $id_usuario, $tema, $descripcion);

        $sql = "INSERT INTO usuarios_eventos(id_evento, id_usuario, tema_trabajo,descripcion) "
                . "VALUES ($id_evento,$id_usuario,'$tema','$descripcion')";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function comprobarParticipacion($id_usuario, $id_evento) {
        $conexion = new Conexion();
        $sql = "SELECT * FROM usuarios_eventos where id_usuario='$id_usuario' and id_evento=$id_evento";
        $resultados = $conexion->devolverResultados($sql);
        if ($resultados != false) {
            return true;
        } else {
            return false;
        }
        $conexion->CerrarConexion();
    }

    function cancelarParticipacion($id_evento, $id_usuario) {
        $conexion = new Conexion();
        $sql = "DELETE FROM usuarios_eventos where id_evento='$id_evento' and id_usuario='$id_usuario'";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

}
