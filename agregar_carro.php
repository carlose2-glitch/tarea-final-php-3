<?php session_start(); ?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Agregar al carro</title>
</head>
<body>
<?php
include "link.php";
include "cabecera.php";
$sql = "select * from producto where id_producto ='$_GET[pro]'"; 
$query = mysqli_query($link,$sql); 
$vector=mysqli_fetch_array($query);
?>
<div class="w-full flex justify-center">

<form action="logicAgregarCarro.php" method="post">
<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="./images/<?php echo $vector['imagen'];?>" alt="img">

    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $vector[1]?></h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">$ <?php echo $vector[2];?></p>
        <input type="hidden" name="id_producto" value="<?php echo $vector[0];?>">

        <p class="mb-3 font-bold text-gray-700 dark:text-gray-400 w-full flex items-center">
        Cantidad: <input type="number" name="cantidad" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ml-4"  required /> </p>
        <input type="submit" class="cursor-pointer text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" value="Agregar al carrito">
    </div>
</div>

</form>

</div>
            
</body>
</html>

