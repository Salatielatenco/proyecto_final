<!DOCTYPE html>
<html lang='es'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="librerias/Bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" href="css/registro.css">
  <link rel="stylesheet" href="librerias/jquery-ui/jquery-ui.theme.css">
  <link rel="stylesheet" href="librerias/jquery-ui/jquery-ui.css">

  <title>Registro</title>
</head>

<body class="fondo">
  <div class="container mt-3 ">
    <h1 class="text-center"> Registro de usuario </h1>
    <div class="row justify-content-center">
      <div class="col-sm-4">
        <form id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
          <label>Nombre de Personal</label>
          <input type="text" name="nombre" id="nombre" class="form-control" required="">
          <label>Fecha de Nacimiento</label>
          <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="" readonly="">
          <label>Email o correo</label>
          <input type="email" name="correo" id="correo" class="form-control" required="">
          <label>Nombre de usuario</label>
          <input type="text" name="usuario" id="usuario" class="form-control" required="">
          <label>Password o contraseña</label>
          <input type="password" name="passsword" id="passsword" class="form-control" required="">
          <br>
          <div class="row">
            <div class="col-sm-6 text-center">
              <button class="btn btn-danger">Registrar</button>
            </div>
            <div class="col-sm-6 text-center">
              <a href="index.php" class="btn btn-danger">Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="js/jquery.js"></script>

  <script src="librerias/jquery-ui/jquery-ui.js"></script>

  <script src="librerias/sweetalert/sweetalert.js"></script>
  <script>
    $(function() {

      var fechaA = new Date();

      var yyyy = fechaA.getFullYear();

      $('#fechaNacimiento').datepicker({

        changeMonth: true,
        changeYear: true,
        yearRange: '1900:' + yyyy,
        dateFormat: "dd-mm-yy"
      });
    });





    function agregarUsuarioNuevo() {
      $.ajax({
        method: "POST",
        data: $('#frmRegistro').serialize(),
        url: "procesos/usuario/registro/agregarUsuario.php",
        success: function(respuesta) {
          respuesta = respuesta.trim();

          if (respuesta == 1) {

            $("#frmRegistro")[0].reset();
            swal(":D", "Agregado con éxito!", "success");
          } else {
            alert(respuesta);
            swal(":(", "Fracaso!", "error")
          }
          if (respuesta == 2) {
            swal("Estes usuario ya existe!!!, por favor escribe otro", "", "warning");
          }
        }
      });

      return false;
    }
  </script>
</body>

</html>