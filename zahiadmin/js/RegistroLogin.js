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
    $.ajax({
        dataType: "json",
        data:
            {
            "cedula": $('#cedula').val(),
            "email": $('#email').val(),
            "nombre": $('#nombre').val(),
            "cumple": $('#cumple').val(),
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
                window.alert("Registrado satisfactoriamente!");
                window.location.href="http://localhost/zahiaCentroEstetica/zahiadmin/Vista/home.php";
//                window.location.href="http://www.zahia.com.co/administrator/Vista/home.php";
            }
            else if(data === 'no')
            {
                window.alert("ocurrio un problema intentelo de nuevo");
                window.location.href="http://localhost/zahiaCentroEstetica/zahiadmin/Vista/registrarPaciente.php";
//                window.location.href="http://www.zahia.com.co/administrator/Vista/registrarPaciente.php";
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
        window.alert("Hay campos incompletos revise el sexo del paciente !!!");
    }
    

}
function modificar_paciente(){
    
    $('#cargandoModificarPaciente').show();
    
    if($('#cedulaBusqueda2').val()!=="" && $('#nombre').val()!==""&& $('#sexo').val()!=="nada"){
    $.ajax({
        dataType: "json",
        data:
            {
            "cedulab": $('#cedulaBusqueda').val(),
            "email": $('#emailBusqueda').val(),
            "nombre": $('#nombreBusqueda').val(),
            "cumple": $('#cumpleBusqueda').val(),
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
                window.alert("Modificado satisfactoriamente!");
                window.location.reload();
//                window.location.href="http://www.zahia.com.co/administrator/Vista/home.php";
            }
            else if(data === 'no')
            {
                window.alert("no pudimos modificar el paciente intentalo de nuevo");
                window.location.reload();
//                window.location.href="http://www.zahia.com.co/administrator/Vista/registrarPaciente.php";
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
        window.alert("Hay campos incompletos revise el sexo del paciente !!!");
    }
    

}

function buscar_paciente(){
    $('#textoResultanteBusqueda').text("");
    $('#cargandoBuscarBPaciente').show();
    
    if($('#cedulaBusqueda').val()!==""){
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
                $('#cumpleBusqueda').val(data[3]);
                if(data[4]==="M"){
                    $("#FemeninoBusqueda").prop("checked", false);
                    $("#MasculinoBusqueda").prop("checked", true);
                }
                else{
                    $("#FemeninoBusqueda").prop("checked", true);
                    $("#MasculinoBusqueda").prop("checked", false);
                }
                //$('#sexo').val(data[4]);
                $('#ocupacionBusqueda').val(data[5]);
                $('#direccionBusqueda').val(data[6]);
                $('#telefonoBusqueda').val(data[7]);
                $('#antPatologicosBusqueda').val(data[8]);
                $('#antAlergicosBusqueda').val(data[9]);
                $('#antQuirurgicosBusqueda').val(data[10]);
                $('#formModificar').show('slow');
                $('#cargandoBuscarBPaciente').hide('slow');
                
                
//                window.location.href="Busquedahttp://localhost/zahiaCentroEstetica/zahiadmin/Vista/home.php";
//                window.location.href="http://www.zahia.com.co/administrator/Vista/home.php";
            }
            else
            {
                window.alert("La cedula no esta registrada");
                window.location.reload();
//                window.location.href="http://www.zahia.com.co/administrator/Vista/registrarPaciente.php";
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
        window.alert("Hay campos incompletos revise el sexo del paciente !!!");
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

