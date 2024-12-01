<?php
session_start();
include 'link.php';
include 'cabecera.php';
/*Buscar las existencias de los productos que tienen existencia
$sql ="select p.id_producto,p.nombre,p.precio from producto as p, carrito as c where c.id_usuario='$_SESSION[id_usuario]' and p.cantidad >0 and p.id_producto = c.id_producto";
$query = mysqli_query($link,$sql);*/
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>PHP3 - CARRITO DE COMPRA</title>
  
</head>
<body class="text-center">
  <div class="">
    <p align="right">
      <?php echo 'Bienvenid@ ' . $_SESSION['nombre']; ?> | <a href="index.php">Inicio</a> | <a href="cierre.php">Salir</a>&nbsp;&nbsp;</p>
  </div>

       
      <b class="text-red-700">Por favor revise el listado de artículos<br>antes de efectuar la compra</b><br><br>
    
        <?php
        $todo = 0;
        $sql = "select c.id_carrito,p.nombre,c.cantidad,p.precio,c.id_producto from carrito as c,producto as p 
                where c.id_usuario='$_SESSION[id_usuario]' and c.id_producto=p.id_producto";
        $result = mysqli_query($link, $sql);
        $a = 0;
        ?>

  <div class="bg-white rounded-lg shadow-lg px-8 py-10 max-w-xl mx-auto">
  <form action="hacerCompra.php" method="post">
  <input type="hidden" name="numprod" value="<?php echo $_POST['numprod']; ?>">
    <table class="w-full text-left mb-8">
        <thead>
            <tr class="text-center">
                <th class="text-gray-700 font-bold uppercase py-2">Cantidad</th>
                <th class="text-gray-700 font-bold uppercase py-2">Nombre</th>
                <th class="text-gray-700 font-bold uppercase py-2">Precio</th>
                <th class="text-gray-700 font-bold uppercase py-2">Totales</th>
            </tr>
        </thead>
        
        <tbody>
            <?php while($vec = mysqli_fetch_array($result)){?>
            <tr class="text-center">
                <td class="py-4 text-gray-700"><?php print $vec[2]?> </td>
                <td class="py-4 text-gray-700"><?php print $vec[1]?></td>
                <td class="py-4 text-gray-700"><?php print $vec[3]?></td>
                <td class="py-4 text-gray-700"><?php print $total = $vec[2] * $vec[3]; ?></td>

            </tr>
            <?php $todo = $todo + $total;
                $a++;
              }
                ?>
        </tbody>
        

     
       
    </table>
    <div class="flex justify-end mb-8">
        <div class="text-gray-700 mr-2">Total a pagar:</div>
        <div class="text-gray-700 font-bold text-xl">$<?php print $todo; ?></div>
    </div>

   <div class="full text-center">
   <input value="Comprar" type="submit" class="cursor-pointer text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">

<input value="Imprimir" type="button" class="cursor-pointer text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" onclick="print()" name="pago">
   </div>

    <input type="hidden" name="total1" value="<?php print $todo; ?>">
    <input type="hidden" name="cant" value="<?php print $cant; ?>">
    <input type="hidden" name="pro" value="<?php print $pro; ?>">
    <input type="hidden" name="a" value="<?php print $a; ?>">
    </form>

    
    
</div>
</body>



</html>