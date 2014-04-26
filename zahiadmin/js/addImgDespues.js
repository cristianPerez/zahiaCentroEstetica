$(document).ready(function() {
    var b = $('#btnGuardarImgAntes'); // upload button
    b.click(AgregarImgAntes());
});

function AgregarImgAntes() {

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
            var texto="";
            $.ajax({
                dataType: "json",
                data:
                        {
                            "tipo":2,
                            "id_history": id_history,
                            "imagen_antes": imagen_antes,
                            "descripcion_antes": descripcion_antes
                        },
                type: 'GET',
                url: "http://localhost/zahiaCentroEstetica/zahiadmin/Controlador/Fachada.php?clase=Consultas&metodo=registrar_Imagen",
                success: function(data) {
                    if (data.respuesta === 'si') {
                          window.location.reload();
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
      var texto="";
    $.ajax({
        dataType: "json",
        data:{"id_history": idHistory,
              "tipe": tipe
             },
        type: 'GET',
                url: "http://localhost/zahiaCentroEstetica/zahiadmin/Controlador/Fachada.php?clase=Consultas&metodo=lista_imagenes",
        success: function(data){
            if(data.respuesta!== 'no'){
               for(var i=0;i<data.length;i++){
                   var x='"'+data[i].url+'"';
                    texto += "<div class='span4' style='margin-left:0px;margin-right: 1.7%;'><p style='position:absolute;'><a href='javascript:eliminarImagen("+data[i].id+","+x+","+data[i].tipo+")' class='btn btn-inverse' style='text-align:rigth;'>X</a></p><img src='../../uploads/despues/" + data[i].url + "' class='img-responsive'/><p>" +data[i].descripcion+ "</p></div>";
               } 
               $('#muestras_antes').html(texto);
               $('#carga_fotos').hide('slow');
               $('#tienes_fotos').show('slow');
               $('#cargando2').hide('slow');
            }
            else{
                $('#carga_fotos').show('slow');
                $('#tienes_fotos').hide('slow');
                $('#cargando2').hide('slow');
            }
        },
        error: function(e,es,error) {
            window.alert("ocurrio un error vuelve a intentarlo");
        }
    }
);       
}

function eliminarImagen(idImg,img,tipo){
var resp=confirm("Seguro que desea eliminar esa imagen");
 if(resp){
    $('#cargando2').show();
    var texto = "";
    $.ajax({
        dataType: "json",
        data: {"idelim": idImg,
               "img":img,
               "tipo":tipo
        },
        type: 'GET',
        url: "http://localhost/zahiaCentroEstetica/zahiadmin/Controlador/Fachada.php?clase=Consultas&metodo=borrar_imagenes",
        success: function(data) {
            if (data.respuesta === 'si') {
                window.location.reload();
            }
            else {
                window.alert("ocurrio un problema vuelve a intentarlo!")
                window.reload();
            }
        },
        error: function(e, es, error) {
            window.alert("ocurrio un error vuelve a intentarlo");
        }
    }
    );}

}
