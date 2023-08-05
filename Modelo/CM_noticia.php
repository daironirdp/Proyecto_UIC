<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'Conexion.php';

class Noticia {

    //put your code here
    private $descripcion;
    private $imagen;
    private $fecha;
    private $titulo;
    private $autor;
    private $pie_foto;

    function __construct() {
        $a = func_get_args();
        $i = func_num_args();
        if ($i > 0) {
            call_user_func_array(array($this, '__constructArg'), $a);
        } else {
            call_user_func_array(array($this, '__constructEmpty'), $a);
        }
    }

    function __constructArg($descripcion, $imagen, $titulo, $autor, $pie_foto) {
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->fecha = date('y-m-d');
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->pie_foto = $pie_foto;
    }

    function __constructEmpty() {
        
    }

    function obtenerNoticias() {
        $conexion = new Conexion();
        $sql = "SELECT * FROM noticias";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }

    function obtenerNoticia($id_noticia) {
        $conexion = new Conexion();
        $sql = "SELECT * FROM noticias "
                . "where id_noticia='$id_noticia'";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }

    function registrarNoticia() {

        $conexion = new Conexion();
        $sql = "INSERT INTO noticias"
                . "(descripcion, imagen, fecha, titulo, autor,pie_foto)"
                . " VALUES ('$this->descripcion','$this->imagen','$this->fecha','$this->titulo','$this->autor','$this->pie_foto')";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function borrarNoticias($id_noticia) {
        $conexion = new Conexion();
        $sql3="Select imagen from noticias where id_noticia='$id_noticia'";
        
        $foto=$conexion->devolverResultados($sql3);
        if($foto!=false)
        unlink("../Vista/img/".$foto[0][imagen]);  //eliminar imagen del servidor
             
                           
        $sql2 = "DELETE FROM comentarios where id_noticia=$id_noticia";
        $sql = "DELETE FROM noticias where id_noticia=$id_noticia";
        
        $conexion->ejecutarConsulta($sql2);
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function modificarNoticia($id_noticia, $descripcion, $imagen, $titulo, $autor, $pie_foto) {
        $conexion = new Conexion();
        $fecha = date("y-m-d");
        if($imagen==""){
            $sql = "UPDATE noticias SET "
                . "descripcion='$descripcion',titulo='$titulo',autor='$autor',pie_foto='$pie_foto',fecha='$fecha'"
                . "WHERE id_noticia='$id_noticia'";
        }else{
             $sql3="Select imagen from noticias where id_noticia='$id_noticia'";
             $foto=$conexion->devolverResultados($sql3);
             if($foto!=false){
            unlink("../Vista/img/".$foto[0][imagen]);  //eliminar imagen del servidor
        }        
            $sql = "UPDATE noticias SET "
                . "descripcion='$descripcion',imagen='$imagen',titulo='$titulo',autor='$autor',pie_foto='$pie_foto',fecha='$fecha'"
                . "WHERE id_noticia='$id_noticia'";
            
        }
        
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }

    function eslaImagen($imagen, $id_noticia) {
        $conexion = new Conexion();
        $sql = "SELECT imagen FROM noticias "
                . "where id_noticia='$id_noticia'";
        $resultados = $conexion->devolverResultados($sql);
        $conexion->CerrarConexion();

        return $resultados[0]['imagen'] == $imagen;
    }

}
