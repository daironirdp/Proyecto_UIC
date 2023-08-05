<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
// put your code here
include_once '../Modelo/CM_curso.php';
$obj = new Curso();
$cursos = $obj->obtenerCursos();
if ($cursos != false) {
    ?>

    <div class="contenedortabla">

        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Curso</th>
                    <th>Profesor</th>
                    <th>Matricula</th>
                    <th colspan="">Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($cursos as $c) {
                    ?>

                    <tr>
                        <td><?php echo $c["id_curso"]; ?></td>
                        <td><?php echo $c["tema"]; ?></td>
                        <td><?php echo $c["profesor"]; ?></td>   
                        <td><?php echo $c["matricula"]; ?></td>   
                        <td colspan="">
                            <?php
                            if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "ADMINISTRADOR") {
                                ?>

                                <a href="../Controlador/CC_cursos.php?id_curso=<?php echo $c["id_curso"]; ?>&accion=eliminar" class="btn btn-danger">Eliminar</a>
                                <a href="?opcion=11&tipo_contenido=curso&id_curso=<?php echo $c["id_curso"]; ?>" class="btn btn-primary">Modificar</a>

                                <?php
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['id_usuario']) && !$obj->comprobarMatricula($_SESSION['id_usuario'], $c["id_curso"]) && $_SESSION["usuario"] != "ADMINISTRADOR") {

                                if ($obj->HayCapacidad($c["id_curso"])) {
                                    ?>
                                    <a href="../Controlador/CC_cursos.php?&accion=matricular&id_curso=<?php echo $c["id_curso"]; ?>&id_usuario=<?php echo $_SESSION["id_usuario"]; ?>" class="btn btn-primary">Matricular</a>

                                    <?php
                                }
                            } else {
                                if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] != "ADMINISTRADOR") {
                                    ?>
                                    <a href="../Controlador/CC_cursos.php?&accion=desmatricular&id_curso=<?php echo $c["id_curso"]; ?>&id_usuario=<?php echo $_SESSION["id_usuario"]; ?>" class="btn btn-danger">Desmatricular</a>

                                    <?php
                                }
                            }
                            ?>

                            <a href="?opcion=6&tipo_contenido=curso&id_curso=<?php echo $c["id_curso"]; ?>" class="btn btn-primary">Detalles</a>



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
    <h2>Ningun curso se esta ofertando</h2>

<?php
}
if (isset($_SESSION["usuario"])) {
    ?>
    <div class="adicionar">

    <?php
    if ($_SESSION["usuario"] == "ADMINISTRADOR") {
        ?>
            <a href="?opcion=12&tipo_contenido=curso" id="adicionar">
                <i class=" fa fa-plus" aria-hidden="true"></i>

            </a>
            <label style="font-size: 1rem;">Adicionar</label>

            <?php
        }
        if ($_SESSION["usuario"] != "ADMINISTRADOR") {
            ?>
            <a href="?opcion=12&tipo_contenido=curso_queja&anterior=Cursos" class="btn btn-primary" id="boton_quejas">
                Quejarse

            </a>

        </div>
            <?php
        }
    }
    ?>