<?php

session_start();

if (isset($_SESSION['usuario'])) {
  include "header.php";

?>

<div class="jumbotron jumbotron-fluid fondoJumbo">
  <div class="container">
    <h1 class="display-4 letra">Categorías de la biblioteca</h1>
    <div class="row">
      <div class="col-sm-4">
        <span class="btn btn-info" data-toggle="modal" data-target="#modalAgregaCategoria">
          <span class="fas fa-plus-circle" ></span>
          Agregar nueva categoria para la biblioteca
        </span>
      </div>
    </div>


    <div class="row mt-3">
      <div class="col-sm-12">
        <div id="tablaCategorias"></div>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalAgregaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-family: monospace;">Agregar nueva Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmCategorias">
          <label>Nombre de la Categoría</label>
          <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="btnGuardaCategoria">Guardar</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="modalActializarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmActualizaCategoria">
          <input type="text" id="idCategoria" name="idCategoria" hidden="">
          <label>Categoria</label>
          <input type="text" name="categoriaU" id="categoriaU" class="form-control">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCerrarActualizarCategoria">Cerrar</button>
        <button type="button" class="btn btn-info" id="btnActualizaCategoria">Actualizar</button>
      </div>
    </div>
  </div>
</div>



<?php
  include "footer.php";
?>
<!-- dependencias de categorias, todas las funciones js de categorias -->
<script src="../js/categorias.js"></script>

<script>
  $(document).ready(function(){
    $('#tablaCategorias').load("categorias/tablaCategoria.php");

    $('#btnGuardaCategoria').click(function(){
      agregaCategoria();
    });
    $('#btnActualizaCategoria').click(function(){
      actualizaCategoria();
    });
  });

</script>

<?php
} else {
  header("location:../index.php");
}

?>