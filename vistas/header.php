<!DOCTYPE html>
<html lang='es'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../librerias/Bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" href="../librerias/fontawesome/css/all.css">
  <link rel="stylesheet" href="../librerias/datatable/dataTables.css">
  <link rel="stylesheet" href="../css/gestor.css">
  <link rel="stylesheet" href="../css/categorias.css">
  <link rel="stylesheet" href="../css/inicio.css">

  <title>header</title>
</head>

<body style="background: #7F7FD5;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container" >
      <a class="navbar-brand" href="inicio.php">
        <img src="../img/archivos.png" alt="" width="70px">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="inicio.php"> <span class="fas fa-home"></span> 
              Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="categorias.php"> <span class="fas fa-icons"></span>
              Categorias</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../vistas/gestor.php"><span class="fas fa-folder-open"></span>
            Libros</a>
          </li>
          
          <li class="nav-item active">
            <a class="nav-link" href="../procesos/usuario/salir.php" style="color: red;"> 
              <span class="fas fa-sign-out-alt"></span>
              
              Salir
              
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

