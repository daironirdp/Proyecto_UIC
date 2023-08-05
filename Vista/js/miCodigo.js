/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {//Hace que el codigo javaScript no se ejecute hasta haber cargado toda la pagina
    //aki va el codigo javaScript


    //Le da dinamismo al footer y al menu
    $(function () {
        $(window).scroll(function () {
            var nav = $("#cabecera");
            var footer = $("footer");
            var scrolltop = $(this).scrollTop();

            if (scrolltop >= 30) {
                nav.hide();
                footer.fadeIn(800);


            } else {
                nav.fadeIn(800);
                footer.hide()
            }
        });

    });






    //Control de la carga de imagenes
    //funcion para visualizar la imagen antes de enviarla al servidor
    function vistaPrevia(entrada) {
        //si hay algo elegido en el objeto
        if (entrada.files && entrada.files[0]) {
            var lector = new FileReader();//creando objeto lector
            lector.onload = function (e) {
                $("#img").attr("src", e.target.result);//dandolo a la imagen la direccion que tiene en el cliente
            }
            lector.readAsDataURL(entrada.files[0]);
        }
    }


    $("#imagen_cargar").change(function () {
        var valor = $("#imagen_cargar").val();
        if (valor == "") {
            //si no se escogio nada
            valor = 'imagen/*';
            $("#img").attr("src", "");
        } else {
//se se escogio algo visualizalo pasandole el objeto que desencadeno todo
            vistaPrevia(this);
        }

//escribe en el label el valor
        $("#ruta").text(valor);


    });











});

function PeticionAjax_ModificarUsuario(elemento) {

    $.ajax({
        type: "POST",
        url: "paginas/subpaginas/S_modificar.php?tipo_contenido=usuario&elemento=" + elemento,
        success: function (response) {
            $("#contenedorModificar").html(response);


        }

    });



}




//validaciones 
function PeticionAjax_ComprobarUsuario(usuario) {



    $.ajax({
        data: {"usuario": usuario},
        type: "POST",
        url: "../Controlador/CC_usuarios.php?accion=comprobarUser",
        dataType: 'json',
        success: function (response) {
            console.log(response);
            // $("#ayuda2").append(response);
            // console.log(bandera_usuario);
            if (!response.dato) {
                console.log("no existe el usuario");
                $("#form_registrar").submit();
            } else {
                $("#user").focus();
                $("#ayuda2").append("<p class='incorrecto' style='color:red'>Existe este usuario</p>");
                console.log("Existe el usuario");
            }

        },
        error: function () {
            console.log("Error no se obtuvo resultado")

        }

    });

}



function  mail(valor) {
    //valida el correo con una expresion regular
    expresion_regular = /^[a-z0-9-]+(.[a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/
    if (expresion_regular.exec(valor)) {
        return false;
    } else {
        return true;
    }
}
function  fecha(valor) {
    //valida la fecha con una expresion regular
    expresion_regular = /^\d{4}\-\d{2}\-\d{2}$/
    if (expresion_regular.exec(valor)) {
        return false;
    } else {
        return true;
    }
}
function hora(valor) {
    //valida la hora con una expresion regular
   // expresion_regular = /^\d{2}\:\d{2}\ AM|PM$/
   // if (expresion_regular.exec(valor)) {
        return false;
    //} else {
      //  return true;
    //}
}

function dias(valor) {
    //valida los dias con una expresion regular
    // expresion_regular = /^[lunes|martes|miercoles]{1}\,\[martes|miercoles|jueves]{1}\,\[miercoles|jueves|viernes]{1}$/
    var index = valor.indexOf(",");//toma el inex de la primera coma
    var dia1 = valor.substring(0, index);//pica la cadena hasta ese index

    //automata finito generador del lenguaje 
    //<dias>-><dia1>,<dia2>,<dia3>
    //<dia1>->lunes|martes|miercoles
    //<dia2>-><dia1>,martes|miercoles|jueves
    //<dia3>-><dia2>,miercoles|jueves|viernes

    valor = valor.substring(index + 1, valor.length);//actualiza en valor obviando dia1

    index = valor.indexOf(",");//busca el index de la segunda coma
    var dia2 = valor.substring(0, index);//pica la cadena hasta ese index
    valor = valor.substring(index + 1, valor.length)//actualiza el valor obviando dia2
    var dia3 = valor;
    var bandera = false;
    if (dia1 == "lunes" || dia1 == "Lunes") {

        if (dia2 =="martes") {

            if (dia3 == "miercoles") {

            } else if (dia3 == "jueves") {


            } else if (dia3 == "viernes") {


            } else {

                bandera = true;
            }


        } else if ( dia2 == "miercoles") {
            if (dia3 == "jueves") {

            } else if (dia3 == "viernes") {

            } else {
                bandera = false;
            }




        } else if (dia2 == "jueves") {

            if (dia3 == "viernes") {


            } else {
                bandera = false;
            }


        } else {
            bandera = true;
        }


    } else if (dia1 == "martes") {

        if (dia2 == "miercoles") {
            if (dia3 == "jueves") {

            } else if (dia3 == "viernes") {


            } else {

                bandera = true;
            }

        } else if (dia2 == "jueves") {
            if (dia3 == "viernes") {

            } else {
                bandera = true;
            }

        } else {
            bandera = true;

        }

    } else if (dia1 == "Miercoles" || dia1 == "miercoles") {
        if (dia2 == "jueves") {
            if (dia3 == "viernes") {

            } else {
                bandera = true;
            }
        } else {

            bandera = true;
        }


    } else {

        bandera = true;

    }

    return bandera;


}


function validador_registro(e) {
    //capturando valores
    var usuario = $("#user").val();
    var contrasenna = $("#contrasenna").val();
    var nombre = $("#nombre").val();
    var ci = $("#ci").val();
    var correo = $("#correo").val();
    var telefono = $("#telefono").val();
    var centro = $("#centro").val();
    var direccion = $("#direccion").val();
    var sexo = $("#sexo").val();
    $(".incorrecto").remove();//quita los rastros de validaciones anteriores
    if (nombre == "") {
        $("#ayuda1").append("<p class=incorrecto style='color:red;'>El campo esta vacio</p>");
        $("#nombre").focus();
        e.preventDefault();
    } else {
        if (nombre.length > 30) {
            $("#ayuda1").append("<p class=incorrecto style='color:red;'>Tiene que tener menos de 30 caracteres</p>");
            $("#nombre").focus();
            e.preventDefault();

        } else {

            if (usuario == "") {
                $("#ayuda2").append("<p class=incorrecto style='color:red;'>El campo esta vacio</p>");
                $("#user").focus();
                e.preventDefault();

            } else {
                if (usuario == "Administrador" || usuario == "administrador" || usuario == "ADMINISTRADOR") {
                    $("#ayuda2").append("<p class=incorrecto style='color:red;'>No puede ser administrador</p>");
                    $("#user").focus();
                    e.preventDefault();

                } else {
                    if (usuario.length > 25) {
                        $("#ayuda2").append("<p class=incorrecto style='color:red;'>No puede tener mas de 25 caracteres</p>");
                        $("#user").focus();
                        e.preventDefault();

                    } else {

                        if (contrasenna == "") {
                            $("#ayuda3").append("<p class=incorrecto style='color:red;'>Campo vacio</p>");
                            $("#contrasenna").focus();
                            e.preventDefault();

                        } else {
                            if (contrasenna.length > 8) {
                                $("#ayuda3").append("<p class=incorrecto style='color:red;'>No puede tener mas de 8 caracteres</p>");
                                $("#contrasenna").focus();
                                e.preventDefault();

                            } else {

                                if (contrasenna.length < 2) {
                                    $("#ayuda3").append("<p class=incorrecto style='color:red;'>No puede tener menos de 2 caracteres</p>");
                                    $("#contrasenna").focus();
                                    e.preventDefault();

                                } else {
                                    if (centro == "") {
                                        $("#ayuda4").append("<p class=incorrecto style='color:red;'>Campo vacio</p>");
                                        $("#centro").focus();
                                        e.preventDefault();

                                    } else {

                                        if (centro.length > 11) {
                                            $("#ayuda4").append("<p class=incorrecto style='color:red;'>No puede ser mayor que 11 caracteres</p>");
                                            $("#centro").focus();
                                            e.preventDefault();

                                        } else {
                                            if (ci == "") {
                                                $("#ayuda5").append("<p class=incorrecto style='color:red;'>Campo vacio</p>");
                                                $("#ci").focus();
                                                e.preventDefault();

                                            } else {
                                                if (isNaN(ci)) {
                                                    $("#ayuda5").append("<p class=incorrecto style='color:red;'>Solo se aceptan numeros</p>");
                                                    $("#ci").focus();
                                                    e.preventDefault();

                                                } else {
                                                    if (ci.length != 11) {
                                                        $("#ayuda5").append("<p class=incorrecto style='color:red;'>Debe tener 11 numeros</p>");
                                                        $("#ci").focus();
                                                        e.preventDefault();

                                                    } else {
                                                        if (telefono == "") {
                                                            $("#ayuda6").append("<p class=incorrecto style='color:red;'>Campo vacio</p>");
                                                            $("#telefono").focus();
                                                            e.preventDefault();
                                                        } else {
                                                            if (telefono.length != 8) {
                                                                $("#ayuda6").append("<p class=incorrecto style='color:red;'>Debe tener 8 numeros</p>");
                                                                $("#telefono").focus();
                                                                e.preventDefault();
                                                            } else {
                                                                if (direccion == "") {
                                                                    $("#ayuda7").append("<p class=incorrecto style='color:red;'>Campo vacio</p>");
                                                                    $("#direccion").focus();
                                                                    e.preventDefault();
                                                                } else {
                                                                    if (sexo == 0) {
                                                                        $("#ayuda8").append("<p class=incorrecto style='color:red;'>Debes elegir una opcion</p>");
                                                                        $("#sexo").focus();
                                                                        e.preventDefault();
                                                                    } else {

                                                                        if (correo == "") {
                                                                            $("#ayuda9").append("<p class=incorrecto style='color:red;'>Campo vacio</p>");
                                                                            $("#correo").focus();
                                                                            e.preventDefault();
                                                                        } else {

                                                                            if (mail(correo)) {
                                                                                $("#ayuda9").append("<p class=incorrecto style='color:red;'>Debe tener la forma usuario@dominio.algo</p>");
                                                                                $("#correo").focus();
                                                                                e.preventDefault();

                                                                            } else {
                                                                                e.preventDefault();

                                                                                PeticionAjax_ComprobarUsuario(usuario);









                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }

                                                        }

                                                    }

                                                }

                                            }

                                        }
                                    }

                                }
                            }

                        }


                    }

                }

            }
        }


    }






}

function validadorLogin(e) {
    e.preventDefault();
    //capturando valores
    var usuario = $("#usr").val();
    var contrasenna = $("#pwd").val();
    $(".incorrecto").remove();

    if (usuario != "") {

        if (contrasenna != "") {

            $.ajax({

                data: {
                    "usuario": usuario,
                    "contrasenna": contrasenna
                },
                type: "POST",
                url: "../Controlador/CC_usuarios.php?accion=validarLogin",
                dataType: 'json',

                success: function (response) {
                    console.log(response);

                    if (response.usuario == "ok") {

                        if (response.contrasenna == "ok") {
                            $("#id_usuario").attr("value", response.id_usuario);

                            $("#form_login").submit();
                        } else {
                            $("#pwd").focus();
                            $("#ayuda_contra").append("<p class='incorrecto' style='color:red'>" + response.mensaje + "</p>");
                        }

                    } else {
                        $("#usr").focus();
                        $("#ayuda_usuario").append("<p class='incorrecto' style='color:red'>" + response.mensaje + "</p>");

                    }

                },
                error: function () {
                    console.log("Error no se obtuvo resultado")

                }

            });





        } else {

            $("#ayuda_contra").append("<p class='incorrecto' style='color:red'>Este campo esta vacio</p>");
            $("#pwd").focus();
        }

    } else {

        $("#ayuda_usuario").append("<p class='incorrecto' style='color:red'>Este campo esta vacio</p>");
        $("#usr").focus();
    }




}

function validarNoticias(e) {
    //capturando valores
    var titulo = $("#titulo").val();
    var autor = $("#autor").val();
    var pie_foto = $("#pie_foto").val();
    var descripcion = $("#descripcion").val();
    //var imagen = $("#imagen_cargar").val();
    $(".incorrecto").remove();
    if (titulo != "") {

        if (autor != "") {
            if (pie_foto != "") {
                if (descripcion != "") {

                } else {
                    e.preventDefault();
                    $("#descripcion").focus();
                    $("#ayuda5").append("<span class='incorrecto' style=color:red;>Este campo esta vacio</span>")

                }
            } else {
                e.preventDefault();
                $("#pie_foto").focus();
                $("#ayuda4").append("<span class='incorrecto' style=color:red;>Este campo esta vacio</span>")

            }
        } else {
            e.preventDefault();
            $("#autor").focus();
            $("#ayuda2").append("<span class='incorrecto' style=color:red;>Este campo esta vacio</span>")

        }
    } else {
        e.preventDefault();
        $("#titulo").focus();
        $("#ayuda1").append("<span class='incorrecto' style=color:red;>Este campo esta vacio</span>")
    }
}
function validadorQuejas(e) {
    var descripcion = $("#descripcion").val();
    $(".incorrecto").remove();
    if (descripcion == "") {
        e.preventDefault();
        $("#descripcion").focus();
        $("#ayuda1").append("<p class='incorrecto' style=color:red;margin-left:25px >Este campo esta vacio</p>")
    }

}

function validadorParticiparEvento(e) {
    //capturar valores
    var tematica = $("#tematica").val();
    var descripcion = $("#descripcion").val();
    $(".incorrecto").remove();
    if (tematica == "") {
        e.preventDefault();
        $("#ayuda1").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");

    } else {

        if (descripcion == "") {
            e.preventDefault();
            $("#ayuda2").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
        } else {


        }

    }

}

function validadorEvento(e) {
    //capturar valores
    var nombre = $("#nombre").val();
    var lugar = $("#lugar").val();
    var fecha_inicio = $("#fecha_inicio").val();
    fecha_inicio = fecha_inicio.trim();
    var fecha_culminacion = $("#fecha_final").val();
    fecha_culminacion = fecha_culminacion.trim();
    var correo = $("#correo").val();
    var descripcion = $("#descripcion").val();
    $(".incorrecto").remove();
    var bandera = true;
    if (nombre == "") {
        $("#ayuda1").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
        bandera = false;
        $("#nombre").focus();
    } else {

        if (lugar == "") {
            bandera = false;
            $("#ayuda2").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
            $("#lugar").focus();
        } else {
            if (fecha_inicio == "") {
                $("#ayuda3").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
                $("#fecha_inicio").focus();
                bandera = false;
            } else {
                if (fecha(fecha_inicio)) {
                    $("#ayuda3").append("<p class='incorrecto' style='color:red;'>Tiene que tener la forma 2016-03-22</p>");
                    bandera = false;
                    $("#fecha_inicio").focus();
                } else {
                    if (fecha_culminacion == "") {
                        $("#ayuda4").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
                        bandera = false;
                        $("#fecha_final").focus();
                    } else {
                        if (fecha(fecha_culminacion)) {
                            $("#ayuda4").append("<p class='incorrecto' style='color:red;'>Tiene que tener la forma 2016-03-22</p>");
                            bandera = false;
                            $("#fecha_final").focus();

                        } else {
                            if (correo == "") {
                                $("#ayuda5").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
                                bandera = false;
                                $("#correo").focus();
                            } else {
                                if (mail(correo)) {
                                    $("#ayuda5").append("<p class='incorrecto' style='color:red;'>Tiene que tener la forma user@algo.al</p>");
                                    bandera = false;
                                    $("#correo").focus();
                                } else {
                                    if (descripcion == "") {
                                        $("#ayuda6").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
                                        bandera = false;
                                        $("#descripcion").focus();
                                    }
                                }

                            }

                        }

                    }
                }

            }

        }

    }

    if (!bandera) {
        e.preventDefault();
    }

}

function validadorCurso(e) {
    //capturar valores
    var tema = $("#tema").val();
    var profesor = $("#profesor").val();
    var matricula = $("#matricula").val();
    var dia = $("#dias").val();
    var hora_entrada = $("#hora_entrada").val();
    var hora_entrada = hora_entrada.trim();
    var hora_salida = $("#hora_salida").val();
    var hora_salida = hora_salida.trim();
    var descripcion = $("#descripcion").val();
    $(".incorrecto").remove();
    var bandera = true;
    if (tema == "") {
        $("#ayuda1").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
        bandera = false;
        $("#tema").focus();
    } else {

        if (profesor == "") {
            bandera = false;
            $("#ayuda2").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
            $("#profesor").focus();
        } else {
            if (matricula <= 0) {
                $("#ayuda3").append("<p class='incorrecto' style='color:red;'>Debe ser mayor que 0</p>");
                $("#matricula").focus();
                bandera = false;
            } else {
                if (dia == "") {
                    $("#ayuda4").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
                    bandera = false;
                    $("#dias").focus();
                } else {
                    if (dias(dia)) {
                        $("#ayuda4").append("<p class='incorrecto' style='color:red;'>Debe tener la forma dia1,dia2,dia3</p>");
                        bandera = false;
                        $("#dias").focus();

                    } else {
                        if (hora_entrada == "") {
                            $("#ayuda5").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
                            bandera = false;
                            $("#hora_entrada").focus();
                        } else {

                            if (hora(hora_entrada)) {
                                $("#ayuda5").append("<p class='incorrecto' style='color:red;'>Debe tener el formato hh:mm:ss</p>");
                                bandera = false;
                                $("#hora_salida").focus();

                            } else {
                                if (hora_salida == "") {
                                    $("#ayuda6).append(<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
                                    bandera = false;
                                    $("#hora_salida").focus();

                                } else {
                                    if (hora(hora_salida)) {
                                        $("#ayuda6").append("<p class='incorrecto' style='color:red;'>Debe tener el formato hh:mm:ss</p>");
                                        bandera = false;
                                        $("#hora_salida").focus();

                                    } else {

                                        if (descripcion == "") {
                                            $("#ayuda7").append("<p class='incorrecto' style='color:red;'>Este campo esta vacio</p>");
                                            bandera = false;
                                            $("#descripcion").focus();
                                        }
                                    }



                                }

                            }


                        }

                    }


                }


            }

        }

    }

    if (!bandera) {
        e.preventDefault();
    }

}

    