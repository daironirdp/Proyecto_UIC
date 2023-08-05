<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
// put your code here
include_once '../Modelo/CM_usuario.php';
$obj = new Usuario();
$usuario = $obj->obtenerUsuarioDetalle($id_usuario);
$destinatario = $usuario[0]["correo"];
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1\r\n";
$headers .= "From: ADMINISTRADOR < uic@informatica.cu >\r\n";

if ($tipo_contenido == "mensaje_queja") {
    $lugar = "CC_quejas.php?accion=responder&id_queja=" . $id_queja;
} else if ($tipo_contenido == "mensaje_comentario") {
    $lugar = "CC_comentarios.php?accion=responder&id_comentario=" . $id_comentario;
} else if ($tipo_contenido == "mensaje_usuario") {
    $lugar = "CC_usuarios.php?accion=responder&id_usuario=" . $id_usuario;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <div class="contenedor_noticias_comentarios_quejas">
            <header class="comentarios_quejas"> 
                <a href="" class="enlace">

                    <i class=" fa fa-user icono_user" aria-hidden="true"></i><br>
                    <label><?php echo $usuario[0]["usuario"]; ?></label> 
                </a>

                <div class="fecha_noticia">
                    <span>Fecha :</span>
                    <time><?php echo date("y-m-d") ?></time>

                </div> 

            </header>

            <div class="container-fluid  comentYquejas" style="">

                <div class="autenticar container anchopadre">

                    <form role="form" action="../Controlador/<?php echo $lugar; ?>" method="POST" id="obligatorio">

                        <input  hidden="true" value="<?php echo $destinatario; ?>"type="text" id="destinatario" name="destinatario" required>
                        <input  hidden="true" value="<?php echo $headers; ?>"type="text" id="headers" name="headers" required>


                        <div class="form-group">


                            <div id="login_usuario">
                                <label for="asunto">Asunto</label>
                                <input class="form-control"  type="text" id="asunto" name="asunto" required>
                            </div>
                        </div>
                        <div class="form-group">


                            <div id="login_contasenna">
                                <label for="mensaje">Mensaje</label>
                                <textarea class="form-control"  id="mensaje" name="mensaje" required></textarea>
                            </div>
                        </div>
                        <div class="text-center">    

                            <div id="botones">
                                <a href="?opcion=8" class="btn btn-primary">Atras</a>
                                <button class="btn btn-primary" type="submit">Enviar</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
