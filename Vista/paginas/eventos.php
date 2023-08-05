<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
// put your code here
include_once '../Modelo/CM_evento.php';
$obj = new Evento();
$eventos = $obj->obtenerEventos();
if ($eventos != false) {
    ?>

    <div class="contenedortabla">

        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Lugar</th>
                    <th>Fecha</th>
                    <th colspan="">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($eventos); $i++) {
                    ?>
                    <tr>
                        <td><?php echo $eventos[$i]["id_evento"]; ?></td>
                        <td><?php echo $eventos[$i]["nombre"]; ?></td>
                        <td><?php echo $eventos[$i]["lugar"]; ?></td>   
                        <td><?php echo $eventos[$i]["fecha_inicio"]; ?></td>   
                        <td colspan="">
                            <?php
                            if (isset($_SESSION['id_usuario'])) {
                                if ($_SESSION["usuario"] == "ADMINISTRADOR") {
                                    ?>
                                    <a href="../Controlador/CC_eventos.php?id_evento=<?php echo $eventos[$i]["id_evento"]; ?>&accion=eliminar" class="btn btn-danger">Eliminar</a>
                                    <a href="?opcion=11&tipo_contenido=evento&id_evento=<?php echo $eventos[$i]["id_evento"]; ?>" class="btn btn-primary">Modificar</a>
                                    <?php
                                }
                                ?>
                                <?php
                                if (!$obj->comprobarParticipacion($_SESSION['id_usuario'], $eventos[$i]["id_evento"]) && $_SESSION["usuario"] != "ADMINISTRADOR") {
                                    ?>

                                    <a href="?opcion=12&tipo_contenido=usuario_evento&id_evento=<?php echo $eventos[$i]["id_evento"]; ?>" class="btn btn-primary" >Participar</a>
                                    <?php
                                } else {
                                    if ($obj->comprobarParticipacion($_SESSION['id_usuario'], $eventos[$i]["id_evento"])) {
                                        ?>
                                        <a href="../Controlador/CC_eventos.php?accion=cancelar_participacion&id_evento=<?php echo $eventos[$i]["id_evento"]; ?>" class="btn btn-danger" >Cancelar Participacion</a>


                                        <?php
                                    }
                                }
                            }
                            ?>

                            <a href="?opcion=6&tipo_contenido=evento&id_evento=<?php echo $eventos[$i]["id_evento"]; ?>" class="btn btn-primary">Detalles</a>



                        </td>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>


    </div>




    <?php
} else {
    ?>

    <h2>No existe ningun evento que mostrar</h2>   

<?php } ?>


<div class="adicionar">
    <?php
    if (isset($_SESSION["usuario"])) {
        if ($_SESSION["usuario"] == "ADMINISTRADOR") {
            ?>

            <a href="?opcion=12&tipo_contenido=evento" id="adicionar">
                <i class=" fa fa-plus" aria-hidden="true"></i>

            </a>
            <label style="font-size: 1rem;">Adicionar</label>
            <?php
        }

        if ($_SESSION["usuario"] != "ADMINISTRADOR") {
            ?>


            <a href="?opcion=12&tipo_contenido=evento_queja&anterior=Eventos" class="btn btn-primary" id="boton_quejas">
                Quejarse

            </a>
            <?php
        }
    }
    ?>
</div>

