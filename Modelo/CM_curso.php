<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Conexion.php';
class Curso {
    //put your code here
    private $tema;
    private $profesor;
    private $matricula;
    private $descripcion;
    private $frecuencia;
    private $hora_entrada;
    private $hora_salida;
    function __construct() {
        $a = func_get_args();
        $i = func_num_args();
        if ($i > 0) {
            call_user_func_array(array($this, '__constructArg'), $a);
        } else {
            call_user_func_array(array($this, '__constructEmpty'), $a);
        }
    }
    function __constructArg($tema, $profesor, $matricula, $descripcion, $frecuencia, $hora_entrada, $hora_salida) {
        $this->tema = $tema;
        $this->profesor = $profesor;
        $this->matricula = $matricula;
        $this->descripcion = $descripcion;
        $this->frecuencia = $frecuencia;
        $this->hora_entrada = $hora_entrada;
        $this->hora_salida = $hora_salida;
    }
    function __constructEmpty() {      
    }
    function registrarCurso() {
        $conexion = new Conexion();
        $sql = "INSERT INTO cursos"
                . "(tema,profesor,matricula,descripcion,frecuencia,hora_entrada,hora_salida)"
                . " VALUES ('$this->tema','$this->profesor','$this->matricula','$this->descripcion','$this->frecuencia','$this->hora_entrada','$this->hora_salida')";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }
    function borrarCurso($id_curso) {
        $conexion = new Conexion();
        $sql = "DELETE FROM cursos where id_curso=$id_curso";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }
    function obtenerCursos() {
        $conexion = new Conexion();
        $sql = "SELECT id_curso,tema,profesor,matricula FROM cursos";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }
    function obtenerCursoDetalles($id_curso) {
        $conexion = new Conexion();
        $sql = "SELECT * FROM cursos where id_curso='$id_curso'";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }
    function modificarCurso($id_curso) {
        $conexion = new Conexion();
        $sql = "UPDATE cursos SET "
                . "tema='$this->tema',profesor='$this->profesor',matricula='$this->matricula',descripcion='$this->descripcion',"
                . "frecuencia='$this->frecuencia',hora_entrada='$this->hora_entrada',hora_salida='$this->hora_salida' WHERE id_curso='$id_curso'";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }
    function participarCurso($id_curso, $id_usuario) {
        $conexion = new Conexion();
        $sql2="UPDATE cursos set matricula=matricula-1 where id_curso='$id_curso'";
        $sql = "INSERT INTO usuarios_cursos(id_curso, id_usuario) "
                . "VALUES ($id_curso,$id_usuario)";    
        //decrementar campo matricula
        $conexion->ejecutarConsulta($sql2);
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }
    function desMatricularCurso($id_curso,$id_usuario){
           $conexion = new Conexion();
        $sql2="UPDATE cursos set matricula=matricula+1 where id_curso='$id_curso'";
        $sql = "DELETE FROM usuarios_cursos "
                . "where id_curso='$id_curso' and id_usuario='$id_usuario'";
        //decrementar campo matricula
        $conexion->ejecutarConsulta($sql);
        $conexion->ejecutarConsulta($sql2);
        $conexion->CerrarConexion();     
    }
    
    function HayCapacidad($id_curso){
        $conexion = new Conexion();
        $sql = "SELECT matricula FROM cursos where id_curso='$id_curso'";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        if ($resultados != false) {
            if($resultados[0]["matricula"]>0){
              return true;  
            }else{
                return false;
            }
            
        } else {
            return false;
        }             
    }        
    function comprobarMatricula($id_usuario,$id_curso){
         $conexion = new Conexion();
        $sql = "SELECT * FROM usuarios_cursos where id_usuario='$id_usuario' and id_curso=$id_curso";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        if ($resultados != false) {
            return true;
        } else {
            return false;
        }           
    }
}
