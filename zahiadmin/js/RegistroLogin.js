function loginUsuario(){
    $('#textoResultante2').text("");
    $('#cargandologin').show();
    $.ajax({
        dataType: "json",
        data:{"usernamelog": $('#usernamelog').val(),"passlog": $('#passlog').val()},
        type: 'GET',
//        url: "http://www.zahia.com.co/administrator/Controlador/Fachada.php?clase=Registro_login&metodo=login_usuario",
        url: "http://localhost/zahiaCentroEstetica/zahiadmin/Controlador/Fachada.php?clase=Registro_login&metodo=login_usuario",
        success: function(data) {
            if(data === 'si'){
//                window.location.href="http://www.zahia.com.co/administrator/Vista/home.php";
                window.location.href="http://localhost/zahiaCentroEstetica/zahiadmin/Vista/home.php";
            }
            else if(data === 'no')
            {
                $('#textoResultante2').text("datos invalidos");
                $('#textoResultante2').show();
                $('#cargandologin').hide('slow');
                limpiarFormulario();
            }
        },
        error: function(e,es,error) {
            window.alert(error.toString()+"-----" +e[0]+"-----" +es[0]);
        }
    }
); 
}
function registrar_paciente(){
    $('#textoResultante2').text("");
    $('#cargandoAgregarPaciente').show();
    
    if($('#cedula').val()!=="" && $('#nombre').val()!==""&& $('#sexo').val()!=="nada"){
        if(!isNaN($('#cedula').val())){
        var cumple;    
        var edad;
        if($('#cumple').val()!==""){
            cumple= $('#cumple').val();
            edad=calcular_edad($('#cumple').val());
        }
        else{
            cumple="0-0-0";
            edad=0;
        }
    $.ajax({
        dataType: "json",
        data:
            {
            "cedula": $('#cedula').val(),
            "email": $('#email').val(),
            "nombre": $('#nombre').val(),
            "cumple": cumple,
            "edad": edad,
            "sexo": $('#sexo').val(),
            "ocupacion": $('#ocupacion').val(),
            "direccion": $('#direccion').val(),
            "telefono": $('#telefono').val(),
            "patologicos": $('#antPatologicos').val(),
            "alergicos": $('#antAlergicos').val(),
            "quirurgicos": $('#antQuirurgicos').val()
            },
        type: 'GET',
        url: "http://localhost/zahiaCentroEstetica/zahiadmin/Controlador/Fachada.php?clase=Registro_login&metodo=registro_paciente",
//        url: "http://www.zahia.com.co/administrator/Controlador/Fachada.php?clase=Registro_login&metodo=registro_paciente",
        success: function(data) {
            if(data.respuesta==='si'){
                
                window.alert('Agregado correctamente');
                window.location.href="http://localhost/zahiaCentroEstetica/zahiadmin/Vista/home.php";

            }
            else if(data === 'no')
            {
                window.alert('Ocurrio un problema vuelve a intentarlo');
                window.location.href="http://localhost/zahiaCentroEstetica/zahiadmin/Vista/home.php";
            }
        },
        error: function(e,es,error) {
            window.alert("Ocurrio un error intentalo mas tarde");
            $('#cargandoAgregarPaciente').hide();
        }
    }
); 
     }
     else{
         $('#cargandoAgregarPaciente').hide();
        window.alert("Digite una cedula Numerica sin puntos ni comas");
     }
    }
    else{
        $('#cargandoAgregarPaciente').hide();
        window.alert("Hay campos incompletos revise el sexo del paciente !!!");
    }
    

}
function modificar_paciente(){
    
    $('#cargandoModificarPaciente').show();
    
    if($('#cedulaBusqueda2').val()!=="" && $('#nombre').val()!==""&& $('#sexo').val()!=="nada"){
        var cumple;    
        var edad;
        if($('#birthday').val()!=="" && $('#birthday').val()!=="0-0-0"){
            window.alert("Entra al if");
            cumple= $('#birthday').val();
            edad=calcular_edad($('#birthday').val());
        }
        else{
            window.alert("Entra al else");
            cumple="0-0-0";
            edad=0;
        }
    $.ajax({
        dataType: "json",
        data:
            {
            "cedulab": $('#cedulaBusqueda').val(),
            "email": $('#emailBusqueda').val(),
            "nombre": $('#nombreBusqueda').val(),
            "cumple": cumple,
            "edad": edad,
            "sexo": $('#sexoBusqueda').val(),
            "ocupacion": $('#ocupacionBusqueda').val(),
            "direccion": $('#direccionBusqueda').val(),
            "telefono": $('#telefonoBusqueda').val(),
            "patologicos": $('#antPatologicosBusqueda').val(),
            "alergicos": $('#antAlergicosBusqueda').val(),
            "quirurgicos": $('#antQuirurgicosBusqueda').val()
            },
        type: 'GET',
        url: "http://localhost/zahiaCentroEstetica/zahiadmin/Controlador/Fachada.php?clase=Registro_login&metodo=modificar_paciente",
//        url: "http://www.zahia.com.co/administrator/Controlador/Fachada.php?clase=Registro_login&metodo=registro_paciente",
        success: function(data) {
            if(data.respuesta==='si'){
                $('#cedulaBusqueda').val("");
                $('#formModificar').hide('slow');
                $('#cargandoModificarPaciente').hide('slow');
                $('#containerPrincipal').prepend("<div id='alertModificacion' class='alert alert-info' style='margin-top:30px;'><a class='close' data-dismiss='alert' href='javascript:ocultarAlert(alertModificacion)' aria-hidden='true'>&times;</a><h2>Modificado correctamente</h2></div>");
                $('#formModificar').each (function(){this.reset();});
            }
            else if(data === 'no')
            {
                $('#cedulaBusqueda').val("");
                $('#formModificar').hide('slow');
                $('#cargandoModificarPaciente').hide('slow');
                $('#containerPrincipal').prepend("<div id='alertModificacion' class='alert alert-danger'><a class='close' data-dismiss='alert' href='javascript:ocultarAlert(alertModificacion)' aria-hidden='true'>&times;</a><h2>No pudo modificar intentalo de nuevo</h2></div>");
                $('#formModificar').each (function(){this.reset();});
            }
        },
        error: function(e,es,error) {
            window.alert("Ocurrio un error comununicate con el creador de este software");
            window.location.reload();
        }
    }
);     
    }
    else{
        window.alert("Hay campos incompletos revise el sexo del paciente !!!");
    }
    

}

function ocultarAlert(id){
    $('#'+id).hide('slow');
}


function buscar_paciente(){
    
    $('#textoResultanteBusqueda').text("");
    $('#cargandoBuscarBPaciente').show();
    
    if($('#cedulaBusqueda').val()!=="" && !isNaN($('#cedulaBusqueda').val())){
     $('#formModificar').hide();
    $.ajax({
        dataType: "json",
        data:
            {
            "cedula": $('#cedulaBusqueda').val()
            },
        type: 'GET',
        url: "http://localhost/zahiaCentroEstetica/zahiadmin/Controlador/Fachada.php?clase=Registro_login&metodo=buscar_paciente",
//        url: "http://www.zahia.com.co/administrator/Controlador/Fachada.php?clase=Registro_login&metodo=registro_paciente",
        success: function(data) {
            if(data!== null){
                
                $('#cudulaBusqueda2').val(data[0]);
                $('#emailBusqueda').val(data[1]);
                $('#nombreBusqueda').val(data[2]);
                $('#birthday').val(data[3]);
                $('#edadPaciente').val(data[4]);
                if(data[5]==="M"){
                    $("#FemeninoBusqueda").prop("checked", false);
                    $("#MasculinoBusqueda").prop("checked", true);
                    $('#sexoBusqueda').val("Masculino");
                }
                else{
                    $("#FemeninoBusqueda").prop("checked", true);
                    $("#MasculinoBusqueda").prop("checked", false);
                    $('#sexoBusqueda').val("Femenino");
                }
                $('#ocupacionBusqueda').val(data[6]);
                $('#direccionBusqueda').val(data[7]);
                $('#telefonoBusqueda').val(data[8]);
                $('#antPatologicosBusqueda').val(data[9]);
                $('#antAlergicosBusqueda').val(data[10]);
                $('#antQuirurgicosBusqueda').val(data[11]);
                $('#formModificar').show('slow');
                $('#cargandoBuscarBPaciente').hide('slow');
                
            }
            else
            {
             $('#containerPrincipal').prepend("<div id='alertModificacion' class='alert alert-danger'><a class='close' data-dismiss='alert' href='javascript:ocultarAlert(alertModificacion)' aria-hidden='true'>&times;</a><h2>La cedula no esta registrada, intenta buscar otra</h2></div>");
             $('#cedulaBusqueda').val("");
             $('#cargandoBuscarBPaciente').hide('slow');
            }
        },
        error: function(e,es,error) {
            window.alert("Ocurrio un error intentalo mas tarde");
            
        }
    }
); 
        
    }
    else{
        
        $('#cargandoBuscarBPaciente').hide('slow');
        $('#formModificar').hide('slow');
        window.alert("Digite una cedula Numerica sin puntos ni comas");
    }
    

}

function changeCheckboxBusqueda(tipo){
    if (tipo === "H"){
        $("#FemeninoBusqueda").prop("checked", false);
        $('#sexoBusqueda').val('Masculino');
    }
    else if (tipo === "M"){
        $("#MasculinoBusqueda").prop("checked", false);
        $('#sexoBusqueda').val('Femenino');
    }
}

function changeCheckbox(tipo){
     if (tipo === "H"){
         if($("#Masculino").is(':checked')) { 
            $("#Femenino").prop("checked", false);
            $('#sexo').val('Masculino');
         }
         else{
             $('#sexo').val('nada');
         }
    }
    else if (tipo === "M"){
        if($("#Femenino").is(':checked')) {
         $("#Masculino").prop("checked", false);
         $('#sexo').val('Femenino');
        }
        else{
            $('#sexo').val('nada');
        }
    }
 }

function limpiarFormulario(){
    $('#usernamelog').val('');
    $('#passlog').val('');
}

function cerrar_session(){
    $.ajax({
        dataType: "json",
        url: "http://localhost/zahiaCentroEstetica/zahiadmin/Controlador/Fachada.php?clase=Registro_login&metodo=cerrar_sesion",
//        url: "http://www.zahia.com.co/administrator/Controlador/Fachada.php?clase=Registro_login&metodo=cerrar_sesion",
        success: function(data) {
            if(data === 'si'){
                window.location.href="http://localhost/zahiaCentroEstetica/zahiadmin/";
//                window.location.href="http://www.zahia.com.co/administrator/";
            }
            else if(data === 'no')
            {
                
            }
        },
        error: function(error) {
            window.alert(error[0]);
        }
    });
}

function calcular_edad(fecha) {
    var fechaActual = new Date()
    var diaActual = fechaActual.getDate();
    var mmActual = fechaActual.getMonth() + 1;
    var yyyyActual = fechaActual.getFullYear();
    FechaNac = fecha.split("-");
    var diaCumple = FechaNac[2];
    var mmCumple = FechaNac[1];
    var yyyyCumple = FechaNac[0];
//retiramos el primer cero de la izquierda
    if (mmCumple.substr(0, 1) == 0) {
        mmCumple = mmCumple.substring(1, 2);
    }
//retiramos el primer cero de la izquierda
    if (diaCumple.substr(0, 1) == 0) {
        diaCumple = diaCumple.substring(1, 2);
    }
    var edad = yyyyActual - yyyyCumple;

//validamos si el mes de cumpleaños es menor al actual
//o si el mes de cumpleaños es igual al actual
//y el dia actual es menor al del nacimiento
//De ser asi, se resta un año
    if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) {
        edad--;
    }
    return edad;
}
;