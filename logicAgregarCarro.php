<?php
session_start();
include 'link.php';

 date_default_timezone_set('America/Caracas');

$sqlSelectUser = "select * from carrito where id_usuario ='$_SESSION[id_usuario]' and  id_producto='$_POST[id_producto]' ";

$response = mysqli_num_rows(mysqli_query($link, $sqlSelectUser));

if($response == 0){

  $fecha = date('Y-m-d h:i:s');
 $sql = "insert into carrito (id_usuario, id_producto, cantidad, fecha) values ('$_SESSION[id_usuario]','$_POST[id_producto]', '$_POST[cantidad]','$fecha')";
 mysqli_query($link,$sql);
 if (mysqli_error($link)) 
 {?>
   <script> alert("Error en la carga del producto al carrito. "); </script> <?php 
 }
 else 
 { 
   $sql1 = "update producto set cantidad = cantidad - '$_POST[cantidad]' where id_producto = '$_POST[id_producto]' ";
   mysqli_query($link,$sql1);
 ?>
   <script> alert("El producto ha sido agregado en su carrito. "); 
    
   </script>
   <meta http-equiv="refresh" content="0.5;URL=index.php" />
   
    <?php 
 }


}else{


  $sqlUpdate = "update carrito set cantidad= cantidad +  $_POST[cantidad] where id_producto='$_POST[id_producto]' and $_SESSION[id_usuario] ";

  $sql1 = "update producto set cantidad = cantidad - '$_POST[cantidad]' where id_producto = '$_POST[id_producto]' ";

  mysqli_query($link, $sqlUpdate);

  if (mysqli_error($link)){?>

<script> alert("Error en la carga del producto al carrito. "); </script>

  <?php }else{

  mysqli_query($link,$sql1);


  ?>
<script> alert("El producto ha sido agregado en su carrito. "); 
    
   </script>
   <meta http-equiv="refresh" content="0.5;URL=index.php" />

  <?php }

}?>

 