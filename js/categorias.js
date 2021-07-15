function agregaCategoria() {
  var categoria = $('#nombreCategoria').val();
  if (categoria == "") {
    swal("Debes agregar una categoria", "", "warning");
    return false;
  } else {
    $.ajax({
      type: "POST",
      data: "categoria=" + categoria,
      url: "../procesos/categorias/agregarcategoria.php",
      success: function (respuesta) {
        respuesta = respuesta.trim();

        if (respuesta == 1) {
          $('#tablaCategorias').load("categorias/tablaCategoria.php");
          $('#nombreCategoria').val("");
          swal(":D", "Agregado con éxito", "success");
        } else {
          swal(":(", "Fallos al agregar", "error")
        }
      }
    });
  }
}

function eliminarCategorias(idCategoria) {
  idCategoria = parseInt(idCategoria);
  if(idCategoria < 0) {
    swal("No tienes ID de categoria!!", "", "error");
  } else {
    /****************************************** */
    swal({
      title: "¿Estas segura de eliminar esta categoría?",
      text: "Una vez eliminada NO podra recuperarse!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: "POST", 
          data: "idCategoria=" + idCategoria, 
          url: "../procesos/categorias/eliminarCategoria.php", 
          success:function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
              $('#tablaCategorias').load("categorias/tablaCategoria.php");
              swal("Eliminado con éxto", {
                icon: "success"
              });
            } else {
              swal("Fallo al Eliminar", "", "error")
            }
          }
        })
      } 
    });
    /******************************************** */
    
  }
}

function obtenerDatosCategoria(idCategoria) {
  $.ajax({
    type: "POST",
    data: "idCategoria=" + idCategoria,
    url: "../procesos/categorias/obtenerCategoria.php",
    success:function(respuesta) {
      respuesta = jQuery.parseJSON(respuesta);
      $('#idCategoria').val(respuesta['idCategoria']);
      $('#categoriaU').val(respuesta['nombreCategoria'])
    }
  });
}

function actualizaCategoria() {
  if ($('#categoriaU').val() == "") {
    swal("No hay categoria!!", "", "warning");
    return false;
  } else {
    $.ajax({
      type:"POST",
      data:$('#frmActualizaCategoria').serialize(),
      url:"../procesos/categorias/actualizaCategoria.php",
      success:function(respuesta){
        respuesta = respuesta.trim();

        if(respuesta == 1) {
          $('#tablaCategorias').load("categorias/tablaCategoria.php");
          $('#btnCerrarActualizarCategoria').click();
          swal("Actualiza con éxito", "", "success");
        } else {
          swal("Fallo al Actualizar", "", "error");
        }

      }
    });
  }
}