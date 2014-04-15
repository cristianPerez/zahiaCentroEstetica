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
    
    if($('#cedula').val()!=="" && $('#email').val()!=="" && $('#nombre').val()!==""&& $('#sexo').val()!=="nada"){
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
        window.alert("Hay campos incompletos revise el sexo del paciente !!!");
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

