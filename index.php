<!DOCTYPE html>
<html lang='es'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="librerias/Bootstrap4/bootstrap.min.css">
  <title>login</title>
  <style>
    .login-container {
      margin-top: 5%;
      margin-bottom: 5%;
    }

    .login-logo {
      position: relative;
      margin-left: -41.5%;
    }

    .login-logo img {
      position: absolute;
      width: 20%;
      margin-top: 19%;
      background: #282726;
      border-radius: 4.5rem;
      padding: 5%;
    }

    .login-form-1 {
      padding: 9%;
      background: #282726;
      box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }

    .login-form-1 h3 {
      text-align: center;
      margin-bottom: 12%;
      color: #fff;
    }

    .login-form-2 {
      padding: 9%;
      background: #f05837;
      box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }

    .login-form-2 h3 {
      text-align: center;
      margin-bottom: 12%;
      color: #fff;
    }

    .btnSubmit {
      font-weight: 600;
      width: 50%;
      color: #282726;
      background-color: #fff;
      border: none;
      border-radius: 1.5rem;
      padding: 2%;
    }

    .btnForgetPwd {
      color: #fff;
      font-weight: 600;
      text-decoration: none;
    }

    .btnForgetPwd:hover {
      text-decoration: none;
      color: #fff;
    }
  </style>
</head>

<body class="backgrandcolor: red;">

  <div class="container  mt-2login-container">
    <div class="row justify-content-center">
      <div class="col-sm-6 login-form-2">
        <h3 class="display-4"><i class="fas fa-user-circle"></i> Login </h3>
        <hr style="background-color: white;">
        <form method="POST" id="frmLogin" onsubmit="return logear()">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Ingresa Tu usuario" id="login" name="login"/>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Ingresa tu Password " id="password" name="password"/>
          </div>
          <div class="form-group text-center">
            <input type="submit" class="btnSubmit" value="Entrar">
          </div>
        </form>
        
        <div class="form-group">

          <a href="registro.php" class="btnForgetPwd" value="Login">Registrarte</a>
        </div>
        </form>
      </div>
    </div>
  </div>

  <script src="js/jquery.js"></script>
  <script src="librerias/Bootstrap4/popper.min.js"></script>
  <script src="librerias/Bootstrap4//bootstrap.min.js"></script>
  <script src="librerias/sweetalert/sweetalert.js"></script>

  <script>
    function logear() {
      $.ajax({
        type: "POST",
        data: $('#frmLogin').serialize(),
        url: "procesos/usuario/login/login.php",
        success: function(respuesta) {

          respuesta = respuesta.trim();
          if (respuesta == 1) {
            window.location = "vistas/inicio.php";
          } else {
            swal(":(", "Fallo al entrar", "error");
          }
        }
      });
      return false;
    }
  </script>



</body>

</html>