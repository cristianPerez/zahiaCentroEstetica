function EnviarValoracion() {
    if($('#nombreValoracion').val()!=="" && $('#emailValoracion').val()!==""&&$('#telefonoValoracion').val()!=="")
    {
        var l = $('#cargandoValoracion');
        l.show();
        $.ajax({
            dataType: "json",
            data: {nombreValoracion: $('#nombreValoracion').val(), emailValoracion:$('#emailValoracion').val(),
                    telefonoValoracion:$('#telefonoValoracion').val()}    
            ,
            type: 'GET',
            url: "http://localhost/ZahiaUltimate/Email/reserva.php",
            success: function(data) {
                if (data.respuesta==='si')
                {
                    l.hide('slow');
                    $('#feedback').show('slow');
                    $('#complement').hide('slow')();                  
                }
                else{
                    window.alert("no se pudo realizar la reseba intentalo mas tarde");
                    window.location.reload();
                }
            },
            error: function(error) {
                window.alert("ocurrio un problema");
            }
        });    
        }
        else{
            window.alert("Complete los campos requeridos");
        }
}
function contactanos() {
    if($('#nombreContacto').val()!=="" && $('#emailContacto').val()!==""&&$('#dudas').val()!=="")
    {     
        var l = $('#cargandoContacto');
        var btn = $('#btnEnviarContacto');
        l.show();
        btn.attr("disabled", "true");
        $.ajax({
            dataType: "json",
            data: {nombreContacto: $('#nombreContacto').val(), emailContacto:$('#emailContacto').val(),
                    telefonoContacto:$('#telefonoContacto').val(),dudas:$('#dudas').val()}    
            ,
            type: 'GET',
            url: "http://localhost/ZahiaUltimate/Email/contacto.php",
            success: function(data){
              
                if (data.respuesta==='si' && data.respuesta1==='si')
                {
                    $('#nombreContacto').val("");
                    $('#emailContacto').val("");
                    $('#dudas').val("");
                    $('#telefonoContacto').val("");
                    btn.attr("disabled", "false");
                    l.hide('slow');
                    $('#textoResultante2').text('CONTACTO EXITOSO')();  
                }
                else{
                    window.alert("no se pudo realizar la reseba intentalo mas tarde");
                    window.location.reload();
                }
            },
            error: function(error) {
                window.alert("ocurrio un problema");
            }
        });    
        }
        else{
            window.alert("Complete los campos requeridos");
        }
}