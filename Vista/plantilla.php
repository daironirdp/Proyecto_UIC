<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION["id_usuario"])&& isset($_COOKIE["mi_usuario"])){
    $_SESSION["usuario"]=$_COOKIE["mi_usuario"];
    $_SESSION["id_usuario"]=$_COOKIE["mi_id_usuario"];
    
}

extract($_REQUEST);
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Union de Informaticos de Cuba</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum‐scale=1.0, user‐scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <!--Linkando hojas!--> 
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/miEstilo.css">

        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/miCodigo.js"></script>

    </head>
    <?php
    $opcion = $_GET['opcion'];
    $inicio = $listar_noticias = $listar_eventos = $listar_cursos = $contactenos = $listar_usuarios = $listar_quejasYs = $listar_comentarios = "";

    function Elegir($tipo_contenido) {
        if ($tipo_contenido == "comentario") {
            global $listar_comentarios;
            $listar_comentarios = "active";
        } else if ($tipo_contenido == "queja") {
            global $listar_quejasYs;
            $listar_quejasYs = "active";
        } else if ($tipo_contenido == "evento") {
            global $listar_eventos;
            $listar_eventos = "active";
        } else if ($tipo_contenido == "curso") {
            global $listar_cursos;
            $listar_cursos = "active";
        } else if ($tipo_contenido == "noticia") {
            global $listar_noticias;
            $listar_noticias = "active";
        } else if ($tipo_contenido == "usuario_evento") {
            global $listar_eventos;
            $listar_eventos = "active";
        } else if ($tipo_contenido == "usuario_curso") {
            global $listar_cursos;
            $listar_cursos = "active";
        } else if ($tipo_contenido == "mensaje_queja") {
            global $listar_quejasYs;
            $listar_quejasYs = "active";
        } else if ($tipo_contenido == "mensaje_comentario") {
            global $listar_comentarios;
            $listar_comentarios = "active";
        } else if ($tipo_contenido == "mensaje_usuario") {
            global $listar_usuarios;
            $listar_usuarios = "active";
        } else if ($tipo_contenido == "noticia_comentario") {
            global $listar_noticias;
            $listar_noticias = "active";
        } else if ($tipo_contenido == "noticia_comentario_adicionar") {
            global $listar_noticias;
            $listar_noticias = "active";
        } else if ($tipo_contenido == "noticia_comentario_modificar") {
            global $listar_noticias;
            $listar_noticias = "active";
        } else if ($tipo_contenido == "noticia_queja") {
            global $listar_noticias;
            $listar_noticias = "active";
        } else if ($tipo_contenido == "curso_queja") {
            global $listar_cursos;
            $listar_cursos = "active";
        } else if ($tipo_contenido == "evento_queja") {
            global $listar_eventos;
            $listar_eventos = "active";
        } else {
            global $listar_usuarios;
            $listar_usuarios = "active";
        }
    }

    if (ctype_digit($opcion)) {
        switch ($opcion) {
            case 0: $page = './paginas/inicio.php';
                $inicio = "active";
                break;
            case 1: $page = './paginas/noticias.php';
                $listar_noticias = "active";
                break;

            case 2: $page = './paginas/cursos.php';
                $listar_cursos = "active";
                break;

            case 3: $page = './paginas/eventos.php';
                $listar_eventos = "active";
                break;

            case 4: $page = './paginas/contactenos.php';
                $contactenos = "active";

                break;

            case 5: $page = './paginas/registrar_usuario.php';

                break;

            case 6: $page = './paginas/subpaginas/S_detalles.php';
                Elegir($tipo_contenido);


                break;

            case 7: $page = './paginas/usuarios.php';
                $listar_usuarios = "active";

                break;

            case 8: $page = './paginas/quejas_sugerencias.php';
                $listar_quejasYs = "active";
                break;

            case 9: $page = './paginas/comentarios.php';
                $listar_comentarios = "active";
                break;

            case 10: $page = './paginas/cerrarSesion.php';

                break;

            case 11: $page = './paginas/subpaginas/S_modificar.php';
                Elegir($tipo_contenido);
                break;
            case 12: $page = './paginas/subpaginas/S_adicionar.php';
                Elegir($tipo_contenido);
                break;
            case 13: $page = './paginas/subpaginas/S_mensajes.php';
                Elegir($tipo_contenido);
                break;

            default: $page = './paginas/error.php';
                break;
        }
    } else {
        $page = './paginas/error.php';
    }
    ?>
    <body>


        <header class="navbar-fixed-top">
            <div class="row"id="cabecera">

                <div id="logo" class="col-sm-2 col-xs-12">

                    <img class="img-fluid" src="img/UIC.png" alt="Logo UIC" width="120" id="imagenLogo">

                </div>

                <div class="col-sm-10 col-xs-12" id="eslogan">

                    <h1 >Union de Informaticos de Cuba</h1>

                </div>

            </div>

            <div class=" row" id="contenedorMenu">

                <a class="navbar-brand" href="#" id="labelMenu">MENÚ</a>  


                <button type="button" id="boton-menu" data-toggle="collapse" data-target="#menu"aria-expanded="false">

                    <i class=" fa fa-bars" aria-hidden="true"></i>

                </button>
                <div class="sesion">
                    <?php
                    if (!isset($_SESSION["usuario"])) {
                        ?>
                        <a href="" id="usuarioSA" class=""data-toggle="modal" data-target="#login" >
                            <i class=" fa fa-user-times" aria-hidden="true"></i>

                        </a>
                        <?php
                    } else {

                        if ($_SESSION["usuario"] == "ADMINISTRADOR") {
                            ?>

                            <a href="" id="usuarioA" class="usuarioMA"data-toggle="modal" data-target="#modificarUsuario"style="" onclick=" PeticionAjax_ModificarUsuario('administrador')">
                                <i class=" fa fa-user-secret" aria-hidden="true"></i>

                                <span style="font-size: .7rem; color: blueviolet">
                                    <?php echo $_SESSION['usuario']; ?>
                                </span>
                            </a>

                            <?php
                        } else {
                            ?>


                            <a href="" id="usuarioA" class="usuarioM" data-toggle="modal" data-target="#modificarUsuario"style="" onclick=" PeticionAjax_ModificarUsuario('usuario')">
                                <i class=" fa fa-user" aria-hidden="true"></i>

                                <span style="font-size: .7rem; color: blueviolet">
                                    <?php echo $_SESSION['usuario']; ?>
                                </span>
                            </a>
                        <?php } ?>

                        <a href="paginas/cerrarSesion.php" id="cerrarSesion" >
                            <i class=" fa fa-power-off" aria-hidden="true"></i>
                        </a>

                        <?php
                    }
                    ?>
                </div>


                <div class="opciones-menu collapse" id="menu">

                    <nav>

                        <ul>

                            <li class="<?php echo $inicio; ?>"> <a href="?opcion=0">Inicio</a> </li>
                            <li class="<?php echo $listar_noticias; ?>"><a href="?opcion=1">Noticias</a></li>
                            <li class="<?php echo $listar_cursos; ?>"><a href="?opcion=2">Cursos</a></li>
                            <li class="<?php echo $listar_eventos; ?>"><a href="?opcion=3">Eventos</a></li>
                       <!--     <li class="<?php echo $contactenos; ?>"><a href="?opcion=4">Contactenos</a></li> -->
                            <?php
                            if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "ADMINISTRADOR") {
                                ?>  
                                <li class="administrador <?php echo $listar_usuarios; ?> "><a href="?opcion=7" >Usuarios</a></li>

                                <li class="administrador <?php echo $listar_comentarios; ?>" ><a href="?opcion=9" >Comentarios</a></li>

                                <?php
                            }
                            ?>
                            <li class="administrador <?php echo $listar_quejasYs; ?>"><a href="?opcion=8" >Quejas</a></li>
                        </ul>

                    </nav>

                </div>


            </div>


        </header>

        <div class="container">

            <section id="contenido">
                <?php
                include $page;
                ?>



            </section>




        </div>    


    </body>

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Haz login o registrate aqui :</h4>
                </div>
                <div class="modal-body">

                    <div class="row">


                        <div class="autenticar container anchopadre">
<!--Formulario para autenticar un usuario existente en la base de datos!-->
                            <form role="form" action="../Controlador/CC_usuarios.php?accion=autenticar" method="POST" id="form_login">
                                <div class="form-group">


                                    <div id="login_usuario">
                                        <label for="usr">Usuario</label>
                                        <input class="form-control"  type="text" id="usr" name="usuario" required>
                                    </div>

                                    <div id="ayuda_usuario">



                                    </div>

                                </div>
                                <div class="form-group">


                                    <div id="login_contasenna">
                                        <label for="pwd">Password</label>
                                        <input class="form-control"  type="password" id="pwd" name="contrasenna" required>
                                    </div>

                                    <div id="ayuda_contra">


                                    </div>
                                </div>
                                <input id="id_usuario" name="id_usuario" value="" hidden="true">
                                <div class="text-center">    
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="recuerdame">Recuerdame
                                        </label>
                                    </div>
                                    <div id="botones">
                                        <button class="btn btn-primary" type="submit" onclick="validadorLogin(event)">Aceptar</button>
                                        <a href="?opcion=5" class="btn btn-primary">Registrarse</a>
                                    </div>
                                </div>

                            </form>
                        </div>



                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="modificarUsuario" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Modificar usuario :</h4>
                </div>
                <div class="modal-body">

                    <div class="row">


                        <div class="autenticar container anchopadre" id="contenedorModificar">


                        </div>



                    </div>

                </div>

            </div>
        </div>
    </div>

    <footer class="panel-footer navbar-fixed-bottom">
        <div class="container">

            <p>UNIVERSIDAD DE CIENCIAS INFORMÁTICAS  &COPY; todos los derechos reservados 2019-2020</p>
            <ul class="redesSociales">
                <li><a href="www.facebook.com"><i class="fa fa-facebook" title="facebook"></i></a></li>
                <li><a href="www.twitter.com"><i class="fa fa-twitter" title="twitter"></i></a></li>
                <li><a href="www.youtube.com"><i class="fa fa-youtube" title="youtube"></i></a></li>
            </ul>

        </div>

    </footer>

</html>