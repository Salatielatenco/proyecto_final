function agregarArchivosGestor() {
  // enviar archivos
  var formData = new FormData(document.getElementById('frmArchivos'));
  $.ajax({
    url: "../procesos/gestor/guardaArchivos.php",
    type: "POST",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      
      respuesta = respuesta.trim();

      if (respuesta == 1) {
        $('#frmArchivos')[0].reset();
        $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
        swal("Agregado con éxito", "", "success");
      } else {
        console.log(respuesta)
        swal("Fallo al agregar!","", "error");
      }

    }

  });
}

function eliminarArchivo (idArchivo) {
  swal({
    title: "¿Estas seguro de eliminar este archivo?",
    text: "Una vez eliminado, No podra recuperarse!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type: "POST", 
        data: "idArchivo=" + idArchivo,
        url: "../procesos/gestor/eliminarArchivo.php",
        success:function(respuesta) {
          respuesta = respuesta.trim(); 
          if(respuesta == 1 ) {
            
            $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
            swal("Eiminado con éxito", {
              icon: "success",
            });
          } else {
            
            swal("Error al eliminar!", {
              icon: "error",
            })
          }
        }
      });
    }
  });
}


function obtenerArchivoPorId(idArchivo) {
  $.ajax({
    type: "POST",
    data: "idArchivo=" + idArchivo,
    url: "../procesos/gestor/obtenerArchivo.php",
    success:function(respuesta){
      $('#archivoObtenido').html(respuesta);
    }
  });
}