<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Conexion.php';
class Comentario {

    //put your code here
    private $id_noticia;
    private $id_usuario;
    private $descripcion;
    private $estado;
    private $fecha;
    private $mensaje;
            

    function __construct() {
        $a = func_get_args();
        $i = func_num_args();
        if ($i > 0) {
            call_user_func_array(array($this, '__constructArg'), $a);
        } else {
            call_user_func_array(array($this, '__constructEmpty'), $a);
        }
    }

    function __constructArg($id_noticia,$id_usuario,$descripcion,$estado,$mensaje) {
        $this->id_noticia = $id_noticia;
        $this->id_usuario = $id_usuario;
        $this->descripcion=$descripcion;
        $this->estado=$estado;
         $this->mensaje=$mensaje;
        $this->fecha= date("y-m-d");
      
                
    }

    function __constructEmpty() {
        
    }
   
     function obtenerComentarios(){
        $conexion=new Conexion();
        $sql="SELECT c.*,u.usuario FROM comentarios c,usuarios u where c.id_usuario=u.id_usuario";
        $resultados=$conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }
    function obtenerComentariosDeUnaNoticia($id_noticia){
        $conexion=new Conexion();
        $sql="SELECT c.*,u.usuario FROM comentarios c,usuarios u "
                . "where c.id_noticia=$id_noticia and c.estado='true'and c.id_usuario=u.id_usuario";
        $resultados=$conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }
    
    function mostrarComentario($id_comentario){
         $conexion=new Conexion();
        $sql="SELECT c.*,u.usuario FROM comentarios c,usuarios u "
                . "where  c.id_usuario=u.id_usuario and c.id_comentario=$id_comentario";
        $resultados=$conexion->devolverResultados($sql);
        $conexion->CerrarConexion();
        return $resultados;
    }
            
     function  realizarComentario(){
       
        $conexion= new Conexion();
        $sql="INSERT INTO comentarios (id_usuario,id_noticia,descripcion,fecha,estado,mensaje)"
                . " VALUES ('$this->id_usuario','$this->id_noticia','$this->descripcion','$this->fecha','$this->estado','false')";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }
    
     function  eliminarComentario($id_comentario){
       
        $conexion= new Conexion();
        $sql="DELETE FROM comentarios where id_comentario=$id_comentario";
        
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }
    
    function  publicar($id_comentario){
        $conexion= new Conexion();
        $sql="Update comentarios set estado='true' where id_comentario=$id_comentario";
        
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
        
        
    }
    
    function retirar($id_comentario){
        $conexion= new Conexion();
        $sql="Update comentarios set estado='false' where id_comentario=$id_comentario";
        
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
        
    }
            
    function modificarComentario($id_comentario,$descripcion){
        $conexion=new Conexion();
        $fecha= date("y-m-d");
        $sql="UPDATE comentarios "
                . "SET descripcion='$descripcion',fecha='$fecha',estado='false',mensaje='false'"
               . "WHERE id_comentario='$id_comentario'";
        
       $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
    }
    
    
    function responderComentario($id_comentario,$destinatario,$asunto,$mensaje,$headers){
        mail($destinatario,$asunto,$mensaje,$headers);//enviando correo
        $conexion = new Conexion();
        $sql = "update comentarios set mensaje='true' where id_comentario='$id_comentario'";
        $conexion->ejecutarConsulta($sql);
        $conexion->CerrarConexion();
        
    }
    
    
}