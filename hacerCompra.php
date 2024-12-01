<?php

session_start();
include 'link.php';

date_default_timezone_set('America/Caracas');
 $fecha = date('Y-m-d h:i:s');
 $sql = "insert into compra (id_usuario, fecha, total) values($_SESSION[id_usuario],'$fecha','$_POST[total1]')"; 
 mysqli_query($link,$sql);
 if (mysqli_error($link))
 {
 ?>
 <script> alert("Error en la compra. Intente nuevamente. "); </script> <?php
 }
 else 
 {
 $sql = "select max(id_compra) from compra where id_usuario=$_SESSION[id_usuario]"; 
 $query = mysqli_query($link,$sql);
 $idc = mysqli_fetch_array($query);
 // se elimina el producto del carrito
 $sql = "delete from carrito where id_usuario= '$_SESSION[id_usuario]' "; 
 mysqli_query($link,$sql);
 ?>
 <script> alert("Su compra se ha efectuado. Gracias "); </script>
 <meta http-equiv="refresh" content="0.5;URL=index.php" />
  <?php
 } 