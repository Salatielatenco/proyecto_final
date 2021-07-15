<?php
  
  session_start();
  require_once "../../clases/Conexion.php";

  $c = new Conectar();
  $conexion = $c->conexion();

  $idUsuario = $_SESSION['idUsuario'];
  $sql = "SELECT id_categoria, nombre FROM  t_categorias WHERE id_usuario = '$idUsuario' ";
  $result = mysqli_query($conexion, $sql);


  
?>

<select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
  <?php
    while ($mostrar = mysqli_fetch_array($result)) {
      $idcategoria = $mostrar['id_categoria'];
    
  ?>

    <option value="<?php echo $idcategoria ?>"><?php echo $mostrar['nombre']; ?></option>

  <?php
    }
  ?>
</select>