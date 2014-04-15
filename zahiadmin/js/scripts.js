var numTratamientos = 1;
var sumaTotal = 0;

$(document).ready(function() {
    $('#tipo_consulta').change(function()
    {
        if ($('#tipo_consulta').val() === "1") {
            $('#examen_fisico').hide("slow");
            $('#peso').attr('required', false);
            $('#altura').attr('required', false);
            $('#icm').attr('required', false);
            $('#cintura_alta').attr('required', false);
            $('#cintura_media').attr('required', false);
            $('#cintura_baja').attr('required', false);
            $('#brazo_derecho').attr('required', false);
            $('#brazo_izquierdo').attr('required', false);
            $('#muslo_derecho').attr('required', false);
            $('#muslo_izquierdo').attr('required', false);
        }
        else {
            $('#examen_fisico').show("slow");
            $('#peso').attr('required', true);
            $('#altura').attr('required', true);
            $('#icm').attr('required', true);
            $('#cintura_alta').attr('required', true);
            $('#cintura_media').attr('required', true);
            $('#cintura_baja').attr('required', true);
            $('#brazo_derecho').attr('required', true);
            $('#brazo_izquierdo').attr('required', true);
            $('#muslo_derecho').attr('required', true);
            $('#muslo_izquierdo').attr('required', true);
            $('#dudas').attr('required', true);
            $('#total').attr('required', true);
        }
    });
});


function IMC() {
    var peso = parseFloat($('#peso').val());
    var altura=parseFloat(($('#altura').val()*0.1));
    var altura2= Math.pow(altura,2);
    var resultado = peso/altura2;
    $('#icm').val(resultado.toFixed(2));
}

function Totalmas()
    {
    if($('#producto1').val()!=="" && $('#precio1').val()!==""){
        if(!isNaN($('#precio1').val())){
    sumaTotal = parseInt(sumaTotal) + parseInt($('#precio1').val());
    $('#total').val("$"+sumaTotal);
    $('#factura').append(numTratamientos+") "+$('#producto1').val()+" ------ "+$('#precio1').val() +" suma \n");
    $('#producto1').val(""); 
    $('#precio1').val(""); 
    numTratamientos = parseInt(numTratamientos) + 1;
    }
    else{
        window.alert("el precio debe ser un valor numerico ");
        $('#precio1').val("");
    }
    }
    else{
        window.alert("complete los campos de producto y precio");
    }
    }
function Totalmenos() {
      if(parseInt(sumaTotal) - parseInt($('#precio1').val())>0){
        sumaTotal = parseInt(sumaTotal) - parseInt($('#precio1').val());
        $('#total').val("$"+sumaTotal);
        $('#factura').append(numTratamientos+") "+$('#producto1').val()+" ------ "+$('#precio1').val() +" descuento \n");
        $('#producto1').val("");
        $('#precio1').val("");
        numTratamientos = parseInt(numTratamientos) + 1;
    }
    else{
        window.alert("El total debe ser mayor que cero");
        }
}

function changeCheckbox(tipo){
    if (tipo === "H"){
        $("#Femenino").prop("checked", false);
        $('#sexo').val('Masculino');
    }
    else if (tipo === "M"){
        $("#Masculino").prop("checked", false);
        $('#sexo').val('Femenino');
    }
}

function registroHistorico(){
    
    $('#cargando2').show();
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
            "total": $('#total').val().substring(1)
            },
        type: 'GET',
        url: "http://localhost/zahiadmin/Controlador/Fachada.php?clase=Consultas&metodo=registrar_consulta",
//        url: "http://www.zahia.com.co/administrator/Controlador/Fachada.php?clase=Consultas&metodo=registrar_consulta",
        success: function(data) {
            if(data.respuesta === 'si'){
                window.alert("Historia clinica almacenada con exito");
                window.location.href="http://localhost/zahiadmin/Vista/home.php";
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

function publicar(des1,des2,des3)
{
    $('#descripcion_examen_fisico').val(des1);
    $('#descripcion_antes').val(des2);
    $('#descripcion_despues').val(des3);   
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
