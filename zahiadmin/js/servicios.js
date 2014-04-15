$(document).ready(function() {
    var b = $('#Guardar'); // upload button
    var b2 = $('#btnEditarImg'); // upload button
    var b3 = $('#btnEditarImgDespues'); // upload button
    b.click(AgregarProducto());
    b2.click(ModificarProducto());
    b3.click(ModificarProductoDespues());
    //correccion de bug de recarga
    resetImgAntes();
    resetImgDespues();
});

function AgregarProducto() {
    var f = $('#formIngresarProducto');
    var l = $('#cargando2'); // loder.gif image

   
        // implement with ajaxForm Plugin
        f.ajaxForm({
            beforeSend: function() {
                l.show();
            },
            success: function(e) {

                //window.alert(e);

                switch (e)
                {
                    case '':
                        $('#imageProduct').val('');
                        window.alert("El peso de la imagen supera la capacidad del server, el tamaño maximo es 1.5 Megas");
                        l.hide('slow');
                        break;
                    case '1':
                        $('#imageProduct').val('');
                        window.alert("El peso de la imagen supera la capacidad del server, el tamaño maximo es 1.5 Megas");
                        break;
                    case '2':
                        InsertarProducto("dp.jpg");
                        break;
                    case '3':
                        window.location.reload();
                        break;
                    default :
                        //window.alert(boton + " " + e);
                        InsertarProducto(e);
                        //b.removeAttr('disabled');
                        break;
                }
            },
            error: function(e) {
                window.alert("error: " + e);
            }
        });
}
function ModificarProducto() {
    //window.alert("entro al Modificar informacion");
    
    var f = $('#formModificarAntes');
    var l = $('#cargando3'); // loder.gif image

        // implement with ajaxForm Plugin
        f.ajaxForm({
            beforeSend: function(){
                l.show();
            },
            success: function(e) {
                //var myarr = e.split(",");
                switch (e)
                {
                    case '':
                        $('#imageProductUpd').val('');
                        window.alert("El peso de la imagen supera la capacidad del server, el tamaño maximo es 1.5 Megas");
                        l.hide('slow');
                        resetImgAntes()
                        break;
                    case '1':
                        $('#imageProductUpd').val('');
                        window.alert("El peso de la imagen supera la capacidad del server, el tamaño maximo es 1.5 Megas");
                        break;
                    case '2':
//                        updateProducto(myarr[0],myarr[1]);
                        updateProducto(e);
                        break;
                    case '3':
                        window.location.reload();
                        break;
                    default :
                       // window.alert(boton + " " + e);
                        updateProducto(e);
                        //b.removeAttr('disabled');
                        break;
                }
            },
            error: function(e) {
                window.alert("error: " + e);
            }
        });
    
}
function ModificarProductoDespues() {
    //window.alert("entro al Modificar informacion");
    
    var f = $('#formModificarDespues');
    var l = $('#cargando4'); // loder.gif image

        // implement with ajaxForm Plugin
        f.ajaxForm({
            beforeSend: function(){
                l.show();
            },
            success: function(e) {
                //var myarr = e.split(",");
                switch (e)
                {
                    case '':
                        $('#imageDespuesUpd').val('');
                        window.alert("El peso de la imagen supera la capacidad del server, el tamaño maximo es 1.5 Megas");
                        l.hide('slow');
                        resetImgDespues();
                        break;
                    case '1':
                        $('#imageDespuesUpd').val('');
                        window.alert("El peso de la imagen supera la capacidad del server, el tamaño maximo es 1.5 Megas");
                        break;
                    case '2':
//                        updateProducto(myarr[0],myarr[1]);
                        updateProductoDespues(e);
                        break;
                    case '3':
                        window.location.reload();
                        break;
                    default :
                       // window.alert(boton + " " + e);
                        updateProductoDespues(e);
                        //b.removeAttr('disabled');
                        break;
                }
            },
            error: function(e) {
                window.alert("error: " + e);
            }
        });
    
}

function InsertarProducto(imagen) {
    
    if($('#cedula').val()!== "" && $('#email').val()!== "" && $('#cumple').val()!== ""&& $('#nombrePaciente').val()!== ""){
        if($('#factura').val()!== "" && $('#total').val()!== ""){
        var l= $('#cargando2');
                $.ajax({
                    dataType: "json",
                    data:
                        {
                        "cedula": $('#cedula').val(),
                        "peso": $('#peso').val(),
                        "altura": $('#altura').val(),
                        "icm": $('#icm').val(),
                        "cintura_alta": $('#cintura_alta').val(),
                        "cintura_media": $('#cintura_media').val(),
                        "cintura_baja": $('#cintura_baja').val(),
                        "brazo_derecho": $('#brazo_derecho').val(),
                        "brazo_izquierdo": $('#brazo_izquierdo').val(),
                        "muslo_derecho": $('#muslo_derecho').val(),
                        "muslo_izquierdo": $('#muslo_izquierdo').val(),
                        "tipo_consulta": $('#tipo_consulta').val(),
                        "dudas": $('#dudas').val(),
                        "factura": $('#factura').val(),
                        "total": $('#total').val().substring(1),
                        "imagen_antes": imagen,
                        "descripcion_antes":$('#desc_antes').val()
                        },
                    type: 'GET',
                    url: "http://localhost/zahiadmin/Controlador/Fachada.php?clase=Consultas&metodo=registrar_consulta",
            //        url: "http://www.zahia.com.co/administrator/Controlador/Fachada.php?clase=Consultas&metodo=registrar_consulta",
                    success: function(data) {
                        if(data.respuesta === 'si'){
                            window.alert("Historia clinica almacenada con exito");
                            window.location.href="http://localhost/zahiadmin/Vista/show-pre.php?img_antes=../uploads/antes/"+imagen+"&img_despues=../uploads/antes/dp.jpg&cedula="+$('#cedula').val()+"&nombre="+$('#nombrePaciente').val()+"&email="+$('#email').val()+"&tipo_consulta="+$('#tipo_consulta').val()+"&desc_c="+$('#dudas').val()+"&desc_antes="+$('#desc_antes').val()+"&desc_despues=&nacimiento="+$('#cumple').val()+"&id_historia="+data.respuesta2+"&fecha_historia_clinica=1&peso="+$('#peso').val()+"&altura="+$('#altura').val()+"&icm="+$('#icm').val()+"&cintura_alta="+$('#cintura_alta').val()+"&cintura_media="+$('#cintura_media').val()+"&cintura_baja="+$('#cintura_baja').val()+"&brazo_derecho="+$('#brazo_derecho').val()+"&brazo_izquierdo="+$('#brazo_izquierdo').val()+"&muslo_derecho="+$('#muslo_derecho').val()+"&muslo_izquierdo="+$('#muslo_izquierdo').val()+"&only_img_antes="+imagen+"&only_img_despues=dp.jpg";

            //                window.location.href="http://www.zahia.com.co/administrator/Vista/home.php";
                        }
                        else if(data.respuesta === 'no')
                        {
                            window.alert("Lo sentimos la historia clinica ya habia sido guardada antes");
                            $('#cargando2').hide('slow');
                        }
                    },
                    error: function(e,es,error) {
                       window.alert("ocurrio un error intentalo mas tarde");
                    }
                }
            ); 
        
        }
        else{
         window.alert("Agregue los tratamientos o productos a la factura");
         $('#producto1').focus();
         $('#cargando2').hide();
        }
    }
    else{
        window.alert("Busque un paciente por nombre para poder continuar");
        $('#nombrePaciente').focus();
         $('#cargando2').hide();
    }

}


function updateProducto(imagen) {
//    window.alert("Entro al metodo modoficar: "+ imagen +" a este id: "+ $('#id_history').val());
     var l = $('#cargando3'); // loder.gif image
     
     l.show();
    //window.alert(imagen+"   "+idprodupd);
   $.ajax({
        dataType: "json",
        data: {"id_history": $('#id_history').val(), "img_antes": imagen,"desc_antes":$('#descripcion_antes').val()},
        type: 'GET',
        url: "http://localhost/zahiadmin/Controlador/Fachada.php?clase=Consultas&metodo=actualizar_img_antes",
//      url: "http://www.zahia.com.co/administrator/Controlador/Fachada.php?clase=Consultas&metodo=actualizar_img_antes",
        success: function(data) {
            if (data.respuesta === 'si')
            {
                resetImgAntes();
                $('#imagenAntigua').val(imagen);
                $("#imagenAntigua").attr("value", imagen);
                $("#img_upd_show").attr("src","../uploads/antes/"+imagen);
                l.hide('slow');
            }
            else {

                window.alert("no se pudo agregar");
            }

        },
        error: function(error) {

            window.alert("ocurrio un problema");
        }

    });
}
function updateProductoDespues(imagen) {
//    window.alert("zises: "+ imagen +" a este id: "+ $('#id_history').val());
     var l = $('#cargando4'); // loder.gif image
     
     l.show();
    //window.alert(imagen+"   "+idprodupd);
   $.ajax({
        dataType: "json",
        data: {"id_history": $('#id_history').val(), "img_despues": imagen,"desc_despues":$('#descripcion_despues').val()},
        type: 'GET',
        url: "http://localhost/zahiadmin/Controlador/Fachada.php?clase=Consultas&metodo=actualizar_img_despues",
//      url: "http://www.zahia.com.co/administrator/Controlador/Fachada.php?clase=Consultas&metodo=actualizar_img_antes",
        success: function(data) {
            if (data.respuesta === 'si')
            {
                resetImgDespues();
                $('#imagenAntiguaDespues').val(imagen);
                $("#imagenAntiguaDespues").attr("value", imagen);
                $("#img_upd_show_after").attr("src","../uploads/despues/"+imagen);
                l.hide('slow');
            }
            else {

                window.alert("no se pudo agregar");
            }

        },
        error: function(error) {

            window.alert("ocurrio un problema");
        }

    });
}

function resetImgAntes(){
    $("#imgono3").prop("checked", false);
    $('#imgono3').val('0');
    $("#imageProductUpd").attr("disabled", "true");
    $("#btnEditarImg").attr("disabled", "true");
    $("#descripcion_antes").attr("disabled", "true");
    $('#imageProductUpd').val('');
}

function resetImgDespues(){
    $("#imgono4").prop("checked", false);
    $('#imgono4').val('0');
    $("#imageDespuesUpd").attr("disabled", "true");
    $("#btnEditarImgDespues").attr("disabled", "true");
    $("#descripcion_despues").attr("disabled", "true");
    $('#imageDespuesUpd').val('');
}