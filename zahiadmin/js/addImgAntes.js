$(document).ready(function() {
    var b = $('#btnGuardarImgAntes'); // upload button
    b.click(AgregarProducto());
    resetImgAntes();
    resetImgDespues();
});

function AgregarProducto() {

    var f = $('#formAddImgAntes');
    var l = $('#cargando3'); // loder.gif image
    f.ajaxForm({
        beforeSend: function() {
            l.show();
            $('#btnGuardarImgAntes').attr('disabled', 'true');
        },
        success: function(e) {

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
                    window.alert("Debes seleccionar una imagen");
                    break;
                case '3':
                    window.location.reload();
                    break;
                default :
                    InsertarFotoAntes(e);
                    break;
            }
        },
        error: function(e) {
            window.alert("error: " + e);
        }
    });
}


function InsertarFotoAntes(imagen) {
    if ($('#descripcion_img_antes').val() !== "") {
            var l = $('#cargando3');
            var id_history = $('#id_history').val();
            var imagen_antes = imagen;
            var descripcion_antes = $('#descripcion_img_antes').val();
            $.ajax({
                dataType: "json",
                data:
                        {
                            "id_history": id_history,
                            "imagen_antes": imagen_antes,
                            "descripcion_antes": descripcion_antes
                        },
                type: 'GET',
                url: "http://localhost/zahiaCentroEstetica/zahiadmin/Controlador/Fachada.php?clase=Consultas&metodo=registrar_Imagen_antes",
                success: function(data) {
                    if (data.respuesta === 'si') {
                        window.alert("Imagen almacenada con exito");
                        var texto = "<div class='span4'><img src='../../uploads/antes/" + imagen + "' class='img-responsive'/><p>" + descripcion_antes + "</p></div>";
                        $('#muestras_antes').prepend(texto);
                        $('#descripcion_img_antes').val("");
                        $('#imageProduct').val("");
                        $('#carga_fotos').hide('slow');
                        $('#tienes_fotos').show('slow');
                        l.hide('slow');
                        $('#btnGuardarImgAntes').attr('disabled', 'false');

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
        window.alert("Agregue una descripcion");
    }
}

function mostrarImagenes(idHistory,tipe){
 
     $('#cargando2').show();
    $.ajax({
        dataType: "json",
        data:{"id_history": idHistory,
              "tipe": tipe
             },
        type: 'GET',
                url: "http://localhost/zahiaCentroEstetica/zahiadmin/Controlador/Fachada.php?clase=Consultas&metodo=lista_imagenes",
        success: function(data){
            if(data.respuesta!== 'no'){
                var texto;
               for(var i=0;i<data.length;i++){
                    texto += "<div class='span4'><img src='../../uploads/antes/" + data[i].url + "' class='img-responsive'/><p>" +data[i].descripcion+ "</p></div>";
               } 
               $('#muestras_antes').html(texto);
               $('#cargando2').hide('slow');
            }
            else{
                
            }
            
            
//            if(data.length==null){
//                
//                window.alert("erespa")
//                
//            }
//            else{
//                window.alert("no hay nada")
//            }
            
        },
        error: function(e,es,error) {
            window.alert("ocurrio un error vuelve a intentarlo");
        }
    }
); 
    
}
