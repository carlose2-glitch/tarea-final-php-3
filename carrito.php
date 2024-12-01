<?php
session_start();
include 'link.php';
include 'cabecera.php';
$sql = "select p.id_producto, p.nombre, p.precio, p.imagen, c.cantidad, descripcion from producto as p,carrito as c where c.id_usuario=" . $_SESSION['id_usuario'] . " and c.id_producto=p.id_producto";
$query = mysqli_query($link, $sql);
$num = mysqli_num_rows($query);
if ($num == 0) { ?>
  <script lang="js">

    alert(" Su carrito esta vacío ");
    window.location.href = './index.php';
  </script> <?php
} else {
?>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>PHP3 - CARRITO DE COMPRA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
  </head>
  <body>
    <div class="dcont">
      <p align="right">
        <?php echo 'Bienvenid@ ' . $_SESSION['nombre']; ?> <a href="index.php">Inicio</a> | <a href="cierre.php">Salir</a>&nbsp;&nbsp;</p>
    </div>
    <br />
<form action="preCompra.php" method="post">
<section class="py-24 relative">
        <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">

            <h2 class="title font-manrope font-bold text-4xl leading-10 mb-8 text-center text-black">Carrito de compra
            </h2>
            <div class="hidden lg:grid grid-cols-2 py-6">
                <div class="font-normal text-xl leading-8 text-gray-500">Producto</div>
                <p class="font-normal text-xl leading-8 text-gray-500 flex items-center justify-between">
                    <span class="w-full max-w-[200px] text-center">Precio</span>
                    <span class="w-full max-w-[260px] text-center">Cantidad</span>
                    <span class="w-full max-w-[200px] text-center">Precio total</span>
                    <input type="hidden" name="numprod" value="<?php echo $num; ?>">
        
                </p>
            </div>
     
          
          <?php
            $todo = 0;
            while ($row = mysqli_fetch_array($query)) { ?>
           
            <div class="grid grid-cols-2 lg:grid-cols-2 min-[550px]:gap-6 border-t border-gray-200 py-6">

            <a class="absolute right-0" onclick="eliminar('<?php echo $row[1]; ?>','<?php echo $row[0]; ?>','<?php echo $row[4]; ?>')" href="#">
                <img src="./images/boton-x.png" class="w-8 m-4" alt="img">
            </a>
                <div
                    class="flex items-center flex-col min-[550px]:flex-row gap-3 min-[550px]:gap-6 w-full max-xl:justify-center max-xl:max-w-xl max-xl:mx-auto">
                    <div class="img-box"><img src="./images/<?php echo $row[3];?>" alt="img" class="xl:w-[140px] rounded-xl object-cover"></div>
                    <div class="pro-data w-full max-w-sm ">
                        <h5 class="font-semibold text-xl leading-8 text-black max-[550px]:text-center"> <?php echo $row[1];?>
                        </h5>
                        <p
                            class="font-normal text-lg leading-8 text-gray-500 my-2 min-[550px]:my-3 max-[550px]:text-center">
                            <?php echo $row[5];?></p>
                    </div>
                </div>

                <div
                    class="flex items-center flex-col min-[550px]:flex-row w-full max-xl:max-w-xl max-xl:mx-auto gap-2">
                    <h6 class="font-manrope font-bold text-2xl leading-9 text-black w-full max-w-[176px] text-center">
                        $<?php echo $row[2];?></h6>
                    <div class="flex items-center w-full mx-auto justify-center">
                       
                    <input type="number" readonly
                            class="border-y border-gray-200 outline-none text-gray-900 font-semibold text-lg w-full max-w-[118px] min-w-[80px] placeholder:text-gray-900 py-[15px] text-center bg-transparent"
                            value="<?php echo $row[4];?>">
                        
                    </div>
                    <h6
                        class="text-indigo-600 font-manrope font-bold text-2xl leading-9 w-full max-w-[176px] text-center">$<?php print $total = $row[2] * $row[4];?></h6>

                       
                </div>
            </div>

            <?php $todo = $todo + $total;
            } ?>
            
            <div class="bg-gray-50 rounded-xl p-6 w-full mb-8 max-lg:max-w-xl max-lg:mx-auto">
                
                <div class="flex items-center justify-between w-full py-6">
                    <p class="font-manrope font-medium text-2xl leading-9 text-gray-900">Total</p>
                    <h6 class="font-manrope font-medium text-2xl leading-9 text-indigo-500">$<?php echo $todo;?></h6>
                </div>
            </div>
            <div class="flex items-center flex-col sm:flex-row justify-center gap-3 mt-8">
                <input type="submit" value="Pre-pago"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 cursor-pointer">
                   
                    
                </input>
            </div>
        </div>
    </section>
</form>
   
        
      

      <form name="formae" method="post" action="eliminar.php">
        <input type="hidden" name="idp" value="">
        <input type="hidden" name="cant" value="">
      </form>
    </div>

    <script lang=="javascript1.5" type="text/javascript">
       function eliminar(nom, idp, cant) {
        if (confirm("Esta seguro de eliminar el producto " + nom)) {
          document.formae.idp.value = idp;
          console.log(idp);
          document.formae.cant.value = cant;
          document.formae.submit();
        }
      }
    </script>

  </body>
  </html>
<?php
} //endif
?>