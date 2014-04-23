//function registroHistorico(){
//    
//    $('#cargando2').show();
//    $.ajax({
//        dataType: "json",
//        data:
//            {
//            "cedula": $('#cedula').val(),
//            "peso": $('#peso').val(),
//            "altura": $('#altura').val(),
//            "icm": $('#icm').val(),
//            "cintura_alta": $('#cintura_alta').val(),
//            "cintura_media": $('#cintura_media').val(),
//            "cintura_baja": $('#cintura_baja').val(),
//            "brazo_derecho": $('#brazo_derecho').val(),
//            "brazo_izquierdo": $('#brazo_izquierdo').val(),
//            "muslo_derecho": $('#muslo_derecho').val(),
//            "muslo_izquierdo": $('#muslo_izquierdo').val(),
//            "tipo_consulta": $('#tipo_consulta').val(),
//            "dudas": $('#dudas').val(),
//            "factura": $('#factura').val(),
//            "total": $('#total').val().substring(1)
//            },
//        type: 'GET',
//        url: "http://localhost/zahiadmin/Controlador/Fachada.php?clase=Consultas&metodo=registrar_consulta",
////        url: "http://www.zahia.com.co/administrator/Controlador/Fachada.php?clase=Consultas&metodo=registrar_consulta",
//        success: function(data) {
//            if(data.respuesta === 'si'){
//                window.alert("Historia clinica almacenada con exito");
//                window.location.href="http://localhost/zahiadmin/Vista/home.php";
////                window.location.href="http://www.zahia.com.co/administrator/Vista/home.php";
//            }
//            else if(data.respuesta === 'no')
//            {
//                window.alert("Lo sentimos la historia clinica ya habia sido guardada antes");
//                $('#cargando2').hide('slow');
//            }
//        },
//        error: function(e,es,error) {
//           window.alert("ocurrio un error intentalo mas tarde");
//        }
//    }
//); 
//}


//metodos de la vista de la historia clinica y posteriormente  la modificacion de ella

function cambas2(){
    
    if($('#imgono').val()=== "1"){
         $('#imgono').val('0');
         $("#imageProduct").attr("disabled", "true");
         $("#desc_antes").attr("disabled", "true");
    }
    else if($('#imgono').val()=== "0"){
        $('#imgono').val('1');
        $("#imageProduct").removeAttr("disabled");
        $("#desc_antes").removeAttr("disabled");
    }
    
}

function cambas4(){
    if($('#imgono4').val()=== "1"){
         $('#imgono4').val('0');
         $("#imageDespuesUpd").attr("disabled", "true");
         $("#btnEditarImgDespues").attr("disabled", "true");
         $("#descripcion_despues").attr("disabled", "true");
    }
    else if($('#imgono4').val()=== "0"){
        $('#imgono4').val('1');
        $("#imageDespuesUpd").removeAttr("disabled");
        $("#btnEditarImgDespues").removeAttr("disabled");   
        $("#descripcion_despues").removeAttr("disabled");   
    }
    
}


function cambas3(){
    
    if($('#imgono3').val()=== "1"){
         $('#imgono3').val('0');
         $("#imageProductUpd").attr("disabled", "true");
         $("#btnEditarImg").attr("disabled", "true");
         $("#descripcion_antes").attr("disabled", "true");
    }
    else if($('#imgono3').val()=== "0"){
        $('#imgono3').val('1');
        $("#imageProductUpd").removeAttr("disabled");
        $("#btnEditarImg").removeAttr("disabled");   
        $("#descripcion_antes").removeAttr("disabled");   
    }
}

function editarHistoria(){
    window.alert($('#id_history').val());
}
