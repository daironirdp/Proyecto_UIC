<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
// put your code here
?>

<div class="container anchopadre" id="registrar">

    <form role="form" action="../Controlador/CC_usuarios.php?accion=registrar" method="POST" id="form_registrar">
        <div class=" h2" id="encabezado_form"> Registrate:</div>


        <div class="form-group">


            <div id="">
                <label for="pwd">Nombre y apellidos</label>
                <input class="form-control"  type="text" id="nombre" name="nombre" required>
            </div>
            <div id="ayuda1">

            </div>


        </div>



        <div class="form-group">


            <div id="usuario">
                <label for="user">Usuario</label>
                <input class="form-control" id="user" type="text" name="usuario" required>
            </div>
            <div id="ayuda2">

            </div>
        </div>
        <div class="form-group">


            <div id="login_contasenna">
                <label for="pwd">Password</label>
                <input class="form-control"  type="password" id="contrasenna" name="contrasenna" required>
            </div>
            <div id="ayuda3">

            </div>



        </div>

        <div class="form-group">


            <div id="">
                <label for="centro">Centro</label>
                <input class="form-control"  type="text" id="centro" name="centro" required>
            </div>
            <div id="ayuda4">

            </div>



        </div>

        <div class="form-group">


            <div id="">
                <label for="ci">Carnet de Identidad</label>
                <input class="form-control"  maxlength="11" minlength="11" type="text" id="ci" name="ci" required>
            </div>
            <div id="ayuda5">

            </div>



        </div>

        <div class="form-group">


            <div id="">
                <label for="telefono">Telefono</label>
                <input class="form-control" maxlength="8" minlength="8" type="text" id="telefono" name="telefono" required>
            </div>

            <div id="ayuda6">

            </div>



        </div>

        <div class="form-group">


            <div id="">
                <label for="direccion">Direccion</label>
                <textarea style="resize:none "class="form-control"  type="text" id="direccion" name="direccion" required></textarea>
            </div>

            <div id="ayuda7">

            </div>
        </div>

            <div class="form-group">


                <div id="">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" class="form-control" id="sexo">
                        <option value="0">-- Seleccione --</option>

                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>

                    </select>
                </div>
                <div id="ayuda8">

                </div>



            </div>

            <div class="form-group">


                <div id="">
                    <label for="correo">Correo electronico</label>
                    <input class="form-control"  type="text" id="correo" name="correo" required>
                </div>
                <div id="ayuda9">

                </div>


            </div>

        </div>





        <div class="text-center">    

            <div id="boton">

                <button type="submit"class="btn btn-primary" id="enviar" onclick="validador_registro(event)">Registrarse</button>
            </div>
        </div>
    </form>
</div>


