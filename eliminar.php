

<?php
session_start();
include "link.php";

$sql = "delete from carrito where id_usuario='$_SESSION[id_usuario]' and id_producto='$_POST[idp]'";
  mysqli_query($link,$sql);
  echo "<script> console.log('$_POST[idp]'); </script>";
  if (mysqli_error($link)) 
  {?>
    <script> alert("Error en la eliminación del producto. "); </script>
    <meta http-equiv="refresh" content="0.5;URL=index.php" /> <?php
  }
  else 
  { 
    $sql1 = "update producto set cantidad = cantidad +'$_POST[cant]' where id_producto='$_POST[idp]' ";
    mysqli_query($link,$sql1);?>
    <script> alert("El producto ha sido eliminado exitosamente "); </script> 
    <meta http-equiv="refresh" content="0.5;URL=index.php" />
    <?php
  } ?>