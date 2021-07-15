<?php


session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
$idUsuario = $_SESSION['idUsuario'];
$sql = "SELECT 
	archivos.id_archivo as idArchivo,
	usuario.nombre as nombreUsuario,
    categorias.nombre as categoria,
    archivos.nombre as nombreArchivo,
    archivos.tipo as tipoArchivo,
    archivos.ruta as rutaArchivo,
    archivos.fecha as fecha
    
    FROM
    t_archivos AS archivos
        INNER JOIN
    t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
        INNER JOIN
    t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
    and archivos.id_usuario = '$idUsuario';";

$result = mysqli_query($conexion, $sql);




?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <table class="table table-hover table-striped table-dark table-responsive-sm" id="tablaGestorDataTable" style="text-align: center;">
        <thead>
          <tr>
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Extensión de archivo</th>
            <th>Descargar</th>
            <th>Visualizar</th>
            <th>Eliminar</th>

          </tr>
        </thead>
        <tbody style="text-align: center;">
          <?php
          /*
                Arreglo de exyensiones validas
              
              */

          $extencionesValidas = array('png', 'jpg', 'txt', 'pdf', 'mp3', 'mp4', 'sql', 'zip', 'rar', 'docx', 'pptx', 'jpeg');


          while ($mostrar = mysqli_fetch_array($result)) {
            $rutaDescarga = "../archivos/" . $idUsuario . "/" . $mostrar['nombreArchivo'];
            $nombreArchivo = $mostrar['nombreArchivo'];
            $idArchivo = $mostrar['idArchivo'];
          ?>
            <tr>
              <td><?php echo $mostrar['categoria']; ?></td>
              <td><?php echo $mostrar['nombreArchivo']; ?></td>
              <td><?php echo $mostrar['tipoArchivo']; ?></td>
              <td>
                <a href="<?php echo $rutaDescarga ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
                  <span class="fas fa-download"></span>
                  Descargar Archivo
                </a>
              </td>
              <td>

                <?php

                for ($i = 0; $i < count($extencionesValidas); $i++) {
                  if ($extencionesValidas[$i] == $mostrar['tipoArchivo']) {

                ?>

                    <span class="btn btn-info btn-sm" data-toggle="modal" data-target="#visualizarArchivo" onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')">
                      <span class="fas fa-eye"></span>
                    </span>

                <?php
                  }
                }

                ?>

              </td>
              <td>
                <span class="btn btn-danger btn-sm" onclick=" eliminarArchivo ('<?php echo $idArchivo ?>')"><span class="fas fa-trash"></span></span>
              </td>

            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



<script>
  $(document).ready(function() {
    $('#tablaGestorDataTable').DataTable();
  });
</script>