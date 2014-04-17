$(document).ready(function() {
    $("#nombrePaciente").autocomplete({
        source: "../../Modelo/buscar_paciente.php",
        minLength: 1
    });

    $("#nombrePaciente").keypress(function(){
        $("#cargando").show();
        $('#tipo_consulta').attr('disabled', true);
        $.ajax({
            url: '../../Modelo/paciente.php',
            type: 'POST',
            dataType: 'json',
            data: {pacienteNombre: $('#nombrePaciente').val()}
        }).done(function(respuesta) {
            $("#cargando").hide();
            $("#cedula").val(respuesta.cedula);
            $("#email").val(respuesta.email);
            $("#cumple").val(respuesta.cumple);
            $('#tipo_consulta').attr('disabled', false);
        });
    });
});