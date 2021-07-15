<?php
  
  class Conectar {

    public function conexion() {
      // $servidor = "localhost";
      // $usuario = "root";
      // $base = "gestor";
      // $puerto = "33061";

      $conexion = mysqli_connect("localhost","root", "", "gestor",);
      $conexion->set_charset('utf8');
      return $conexion;

    }
  }
  
?>