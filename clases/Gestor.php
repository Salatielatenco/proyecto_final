<?php
  
  require_once "Conexion.php";
   
  class Gestor extends Conectar
  {
    public function agregarRegistroArchivo($datos) {
      $conexion = Conectar::conexion();
      $sql = "INSERT INTO t_archivos (id_usuario,
                                      id_categoria,
                                      nombre,
                                      tipo,
                                      ruta)
                            VALUES (?,?,?,?,?)";
      $query = $conexion->prepare($sql);
      $query->bind_param("iisss", $datos['idUsuario'],
                                  $datos['idCategoria'],
                                  $datos['nombreArchivo'],
                                  $datos['tipo'],
                                  $datos['ruta']);
      $respuesta = $query->execute();
      $query->close();
      return $respuesta;
    }

    public function obtenenNombreArchivo ($idArchivo) {
      $conexion = Conectar::conexion();
      $sql ="SELECT nombre FROM t_archivos WHERE id_archivo = '$idArchivo'";
     
      $result = mysqli_query($conexion, $sql);
     
      return  mysqli_fetch_array($result)['nombre'];
      
    }

    public function eliminarRegistroArchivo($idArchivo){
      $conexion = Conectar::conexion();
      $sql = "DELETE FROM t_archivos WHERE id_archivo = ?";
      $query = $conexion->prepare($sql);
      $query->bind_param('i', $idArchivo);
      $respuesta = $query->execute();
      $query->close();
      return $respuesta;
    }

    public function obtenerRutaArchivo($idArchivo) {
      $conexion = Conectar::conexion();

      $sql = "SELECT nombre, tipo FROM t_archivos WHERE id_archivo = '$idArchivo'";
      $result = mysqli_query($conexion, $sql);
      $datos = mysqli_fetch_array($result);
      $nombreArchivo = $datos['nombre'];
      $extension = $datos['tipo'];


      return self::tipoArchivo($nombreArchivo, $extension);

    }

    public function tipoArchivo($nombre, $extension) {
      $idUsuario = $_SESSION['idUsuario'];

      $ruta = "../archivos/".$idUsuario."/".$nombre;
      switch ($extension) {
        case 'png':
          return '<img src="'.$ruta.'" width = "50%";>';
          break;
        case 'jpg':
          return '<img src="'.$ruta.'" width = "50%";>';
          break;
        case 'txt':
          # code...
          break;
        case 'pdf':
          return '<embed src="'.$ruta.'#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" heigth="100%"/>';
          break;
        case 'mp3':
          return '<video src="'.$ruta.'"></video>';
          break;
        case 'mp4':
          return '<video src="'.$ruta.'" controls width="100%" heigth="800px"></video>';
          break;
        case 'jpeg':
            return '<img src="'.$ruta.'" width = "50%";>';
          break;
        case 'rar':
          # code...
          break; 
        case 'docx':
          # code...
          break;
        case 'pptx':
          # code...
          break;
        default:
          # code...
          break;
      }
    }
  }
  
?>
