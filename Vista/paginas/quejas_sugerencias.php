<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include_once '../Modelo/CM_queja.php';
// put your code here
$obj = new Queja();
$quejasYsugerencias = $obj->obtenerQuejas();


if ($quejasYsugerencias != false) {
    foreach ($quejasYsugerencias as $q) {
        ?>


        <div class="contenedor_noticias_comentarios_quejas">
            <div>
                <header class="comentarios_quejas"> 
                    <a href="" class="enlace">

                        <i class=" fa fa-user icono_user" aria-hidden="true"></i><br>
                        <label><?php echo $q["usuario"]; ?></label> 
                    </a>

                    <div class="fecha_noticia">
                        <span>Publicado :</span>
                        <time><?php echo $q['fecha']; ?></time>

                    </div> 

                </header>
                <div class="container-fluid  comentYquejas" style="">
                    <p>    
                        <?php echo $q['descripcion']; ?>
                    </p> 



                    <div class="botones_comentarios_quejas">

                        <?php
                        if (isset($_SESSION["usuario"])) {
                            if ($_SESSION["usuario"] == "ADMINISTRADOR") {

                                if ($q["estado"] == "false") {
                                    ?>
                                    <a href="?opcion=13&tipo_contenido=mensaje_queja&id_queja=<?php echo $q['id_queja']; ?>&id_usuario=<?php echo $q['id_usuario']; ?>" class="btn btn-primary">Responder</a>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            if ($_SESSION["usuario"] != "ADMINISTRADOR" && $_SESSION["id_usuario"] == $q["id_usuario"]) {
                                ?>  
                                <a href="?opcion=11&tipo_contenido=queja&id_queja=<?php echo $q['id_queja'] ?>" class="btn btn-primary">Modificar</a>


                                <?php
                            }

                            if ($_SESSION["id_usuario"] == $q["id_usuario"] || ($q["estado"] == "true" && $_SESSION["usuario"] == "ADMINISTRADOR")) {
                                ?>   
                                <a href="../Controlador/CC_quejas.php?accion=eliminarQueja&id_queja=<?php echo $q["id_queja"] ?>"class="btn btn-danger">Eliminar</a>
                                <?php
                            }
                            ?>
                                
                             <?PHP
                             }
                             ?>   
                                
                        </div>


                    </div>

                </div>


            </div>
            <?php
        
    }
} else {
    ?>

    <h2>No existe ninguna queja que mostrar</h2>    


<?php }
?>
