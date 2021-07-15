<?php

session_start();

if (isset($_SESSION['usuario'])) {
  include "header.php";

?>

  <div class="container-fluid">
    <div class="row-4">
      <div class="col-sm">
        <div class="card">
          <div class="card-header fondoJumbo">
            <div id="demo" class="carousel slide" data-ride="carousel" style="text-align: center; height: 50%;">

          

            
            

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid mt-3">
    <div class="row-md">
      <div class="col-sm-12">
        <div class="jumbotron text-center jumbo">
          <h1 class="display-4"> <i class="fas fa-child"></i>  HOLA</h1>
          <p class="lead">En esta pagína podras guardar tus libros en pdf y crear tus propias categorias para almacenar los libros y siempre que quieras podras verlos eliminarlos o descargalos</p>
          <hr class="my-4">
          <p> </p>
        </div>
      </div>
    </div>
  </div>


<?php
  include "footer.php";
} else {
  header("location:../index.php");
}

?>