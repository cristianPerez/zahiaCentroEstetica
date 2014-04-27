var numTratamientos = 1;
var sumaTotal = 0;

$(document).ready(function(){
    $('#tipo_consulta').change(function()
    {
        if ($('#tipo_consulta').val() === "1") {
            $('#examen_fisico').hide("slow");
        }
        else {
            $('#examen_fisico').show("slow");
        }
    });
});

function IMC() {
    var peso = parseFloat($('#peso').val());
    var altura = parseFloat(($('#altura').val() * 0.1));
    var altura2 = Math.pow(altura, 2);
    var resultado = peso / altura2;
    $('#icm').val(resultado.toFixed(2));
}



function publicar(des1)
{
    $('#descripcion_examen_fisico').val(des1);
}

function Totalmas()
{
    if ($('#producto1').val() !== "" && $('#precio1').val() !== "") {
        if (!isNaN($('#precio1').val())) {
            sumaTotal = parseInt(sumaTotal) + parseInt($('#precio1').val());
            $('#total').val("$" + sumaTotal);
            $('#factura').append(numTratamientos + ") " + $('#producto1').val() + " ------  $" + $('#precio1').val() + " suma \n");
            $('#producto1').val("");
            $('#precio1').val("");
            numTratamientos = parseInt(numTratamientos) + 1;
        }
        else {
            window.alert("el precio debe ser un valor numerico ");
            $('#precio1').val("");
        }
    }
    else {
        window.alert("complete los campos de producto y precio");
    }
}

function Totalmenos() {
    if (parseInt(sumaTotal) - parseInt($('#precio1').val()) > 0) {
        sumaTotal = parseInt(sumaTotal) - parseInt($('#precio1').val());
        $('#total').val("$" + sumaTotal);
        $('#factura').append(numTratamientos + ") " + $('#producto1').val() + " ------ " + $('#precio1').val() + " descuento \n");
        $('#producto1').val("");
        $('#precio1').val("");
        numTratamientos = parseInt(numTratamientos) + 1;
    }
    else {
        window.alert("El total debe ser mayor que cero");
    }
}

function changeCheckbox(tipo) {
    if (tipo === "H") {
        $("#Femenino").prop("checked", false);
        $('#sexo').val('Masculino');
    }
    else if (tipo === "M") {
        $("#Masculino").prop("checked", false);
        $('#sexo').val('Femenino');
    }
}

function InsertarConsulta() {
    
 var respo=confirm("Seguro que quieres almacenar la historia clinica, una vez almacenada solo podra cambiar las imagenes de antes y despues ");
 if(respo){
    if ($('#cedula').val() !== "" && $('#cumple').val() !== "" && $('#nombrePaciente').val() !== "") {
        if ($('#factura').val() !== "" && $('#total').val() !== "") {
            var l = $('#cargandoConsulta');
            l.show();
            $.ajax({
                dataType: "json",
                data:
                        {
                            "cedula": $('#cedula').val(),
                            "peso": this.validate($('#peso').val()),
                            "altura": this.validate($('#altura').val()),
                            "icm": this.validate($('#icm').val()),
                            "cintura_alta": this.validate($('#cintura_alta').val()),
                            "cintura_media": this.validate($('#cintura_media').val()),
                            "cintura_baja": this.validate($('#cintura_baja').val()),
                            "brazo_derecho": this.validate($('#brazo_derecho').val()),
                            "brazo_izquierdo": this.validate($('#brazo_izquierdo').val()),
                            "muslo_derecho": this.validate($('#muslo_derecho').val()),
                            "muslo_izquierdo": this.validate($('#muslo_izquierdo').val()),
                            "tipo_consulta": $('#tipo_consulta').val(),
                            "dudas": $('#dudasConsulta').val(),
                            "factura": $('#factura').val(),
                            "total": $('#total').val().substring(1)
                        },
                type: 'GET',
                url: "http://localhost/zahiaCentroEstetica/zahiadmin/Controlador/Fachada.php?clase=Consultas&metodo=registrar_consulta",
                //        url: "http://www.zahia.com.co/administrator/Controlador/Fachada.php?clase=Consultas&metodo=registrar_consulta",d
                success: function(data) {
                    if (data.respuesta === 'si') {
                        //window.alert("Historia clinica almacenada con exito");
                        window.location.href = "http://localhost/zahiaCentroEstetica/zahiadmin/Vista/Consulta/show-pre.php?cedula=" + $('#cedula').val() + "&nombre=" + $('#nombrePaciente').val() + "&email=" + $('#email').val() + "&tipo_consulta=" + $('#tipo_consulta').val() + "&desc_c=" + $('#dudasConsulta').val() + "&edad=" + $('#edadBusqueda').val() + "&id_historia=" + data.respuesta2 + "&fecha_historia_clinica=1&peso=" + $('#peso').val() + "&altura=" + $('#altura').val() + "&icm=" + $('#icm').val() + "&cintura_alta=" + $('#cintura_alta').val() + "&cintura_media=" + $('#cintura_media').val() + "&cintura_baja=" + $('#cintura_baja').val() + "&brazo_derecho=" + $('#brazo_derecho').val() + "&brazo_izquierdo=" + $('#brazo_izquierdo').val() + "&muslo_derecho=" + $('#muslo_derecho').val() + "&muslo_izquierdo=" + $('#muslo_izquierdo').val()+ "&resumen_factura=" + $('#factura').val()+ "&total_factura=" + $('#total').val();
                        //                window.location.href="http://www.zahia.com.co/administrator/Vista/home.php";
                    }
                    else if (data.respuesta === 'no')
                    {
                        window.alert("Lo sentimos la historia clinica ya habia sido guardada antes");
                        $('#cargando2').hide('slow');
                    }
                },
                error: function(e, es, error) {
                    window.alert("ocurrio un error intentalo mas tarde");
                }
            }
            );

        }
        else {
            window.alert("Agregue los tratamientos o productos a la factura");
            $('#producto1').focus();
            $('#cargando2').hide();
        }
    }
    else {
        window.alert("Busque un paciente por nombre para poder continuar");
        $('#nombrePaciente').focus();
        $('#cargando2').hide();
    }
}

}

function validate(key) {

    if (key !== "") {
        return key;

    }
    else {
        return "";
    }

}

//function parcear(numero) {
//
//    var number = new String(numero);
//
//    var result = '';
//
//    while (number.length > 3)
//
//    {
//        result = '.' + number.substr(number.length - 3) + result;
//        number = number.substring(0, number.length - 3);
//    }
//
//    result = number + result;
//
//    return result;
//
//}
function clear(){
    $('#total').val("");
    $('#factura').text("");
    numTratamientos = 1;
    sumaTotal=0;
}