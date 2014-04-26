function buscar_historias() {

    $('#cargandoBuscarHistoria').show();
    var texto = "";
    $.ajax({
        dataType: "json",
        data: {"cedula": $('#cedulaBusquedaHistoria').val()
        },
        type: 'GET',
        url: "http://localhost/zahiaCentroEstetica/zahiadmin/Controlador/Fachada.php?clase=Consultas&metodo=buscarHistorias",
        success: function(data) {
            if (data.respuesta !== 'no') {
                for (var i = 0; i < data.length; i++) {
                    var url= "http://localhost/zahiaCentroEstetica/zahiadmin/Vista/Consulta/show-pre.php?cedula=" + $('#cedulaBusquedaHistoria').val() + "&nombre=" + data[i].nombre_paciente + "&email=" + data[i].email_paciente + "&tipo_consulta=" + data[i].tipo_consulta_id + "&desc_c=" + data[i].descripcion_consulta + "&nacimiento=" + data[i].cumple + "&id_historia=" + data[i].id + "&fecha_historia_clinica=" + data[i].fecha + "&peso=" + data[i].peso + "&altura=" + data[i].altura + "&icm=1" + "&cintura_alta=" + data[i].cintura_alta + "&cintura_media=" + data[i].cintura_media + "&cintura_baja=" + data[i].cintura_baja + "&brazo_derecho=" + data[i].brazo_derecho + "&brazo_izquierdo=" + data[i].brazo_izquierdo + "&muslo_derecho=" + data[i].muslo_derecho + "&muslo_izquierdo=" + data[i].muslo_izquierdo+ "&resumen_factura=" + data[i].factura+ "&total_factura=$" + data[i].costo_total;
                    texto += "<div class='span2' style='margin-left:0px;margin-right: 1.7%;'>\n\
                                    <a href='"+url+"' style='text-align:center;text-decoration:none'>\n\
                                        <p class='btn btn-inverse'>"+data[i].nombre_paciente+"<br/>"+data[i].fecha+"</p>\n\
                                        <p style='background:white;color:black;font-size:20px;min-height:100px;max-height:100px;'>"+data[i].factura+"</p>\n\
                                        <p style='background:gray;color:white;font-size:22px;'>$ "+data[i].costo_total+"</p>\n\
                                    </a>\n\
                             </div>";
                }
                $('#busquedasHistorias').html(texto);
                $('#cargandoBuscarHistoria').hide('slow');
            }
            else {
                window.alert("devolvio no");
                $('#cargandoBuscarHistoria').hide('slow');
            }
        },
        error: function(e, es, error) {
            window.alert("ocurrio un error vuelve a intentarlo");
        }
    }
    );

}
