<?php
session_start();
include 'link.php'; 
include 'cabecera.php'; 
$sql = 'select * from producto where cantidad>0';
$query = mysqli_query($link,$sql);
$num = mysqli_num_rows($query);
?>
<html >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP3 - CARRITO DE COMPRA</title>
  <script src="https://cdn.tailwindcss.com"></script>

<script>
function carrito(idp) {
  document.formac.idp.value = idp;
  document.formac.submit(); 
}  
</script>
</head>
<body class="">

<div class="p-4">
    <p align="right">
<?php
  if (!isset($_SESSION['id_usuario'])) 
  { ?> 
    <a href="login.php">Login</a> | <a href="registrarse.php">Registrarse</a><?php 
  }
  else 
  {
    echo 'Bienvenid@ '.$_SESSION['nombre'].' | ';
    if ($_SESSION['tipo']=='admin') 
    {?> 
      <a href="producto.php">Productos</a> |  <?php 
    }
    else 
    { ?>
      <a href="carrito.php">Ver carrito </a> | <?php 
    }?>
     <a href="cierre.php">Salir</a>&nbsp;&nbsp;&nbsp;&nbsp;<?php  
  }
?>
</p>
</div>

<div class="">
  <div class="px-10 py-20 bg-gray-100 grid gap-10 lg:grid-cols-3 xl:grid-cols-4 sm:grid-cols-2"> 
 <?php
  if($num==0) 
  {
    echo 'No existen productos en este momento.';
  }
  else 
  {
    while($row = mysqli_fetch_array($query)) 
    { ?>

    <div class="max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer">
      <div>
        <img src="./images/<?php echo $row['imagen'];?>" class="w-full h-64" name="img<?php echo $row['id_producto'];?>" alt="img" />
      </div>
      <div class="py-4 px-4 bg-white">
        <p class="mt-4 text-lg font-bold"><?php echo $row['nombre'];?></p>
        <h3 class="text-md font-semibold text-gray-600"><?php echo $row['descripcion'];?></h3>
        <p class="mt-4 text-lg font-bold">$<?php echo $row['precio'];?></p>
        <p class="mt-4 text-lg font-bold">Cantidad: <?php echo $row['cantidad'];?></p>

        <?php 
          if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'usuario'){ ?>
        <span class="flex items-center justify-center mt-4 w-full bg-yellow-400 hover:bg-yellow-500 py-1 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>

          
            
            <a href="agregar_carro.php?pro=<?php print $row[0];?>" class="font-semibold text-gray-800">Agregar al carrito</a>
          
          
         
          
        </span>
        <?php }?>
      </div>
    </div>
<?php   
    }
  }
?>
  </div>
</div>
<form name="formac" method="post" action="validacion.php">
  <!--  formulario para agregar productos al carrito-->
  <input type="hidden" name="idp" value="" />
</form>

</body>
</html>