<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>
<body>
<?php
   session_start();
    include("cabecera.php");

    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin'){
?>

    <div>
        <?php echo 'Bienvenid@ ' .$_SESSION['nombre']. ' | ' ;?>
        <a href="index.php">Inicio</a> | <a href="cierre.php">Salir</a> 
    </div>

<div class="font-sans">
            <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
                <div class="relative sm:max-w-sm w-full">
                    <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                    <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                    <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                        <label for="" class="block mt-3 text-sm text-gray-700 text-center font-semibold">
                           Agregar productos
                        </label>
                        <form method="post" action="logicProducto.php" class="mt-10" enctype="multipart/form-data">
                                           
                            <div class="flex gap-[0.5rem] items-center">
                                <p class="font-bold">Imagen</p>

                                <input name="img" class=" block w-full text-sm text-grey-500
            file:mr-5 file:py-2 file:px-6
            file:rounded-full file:border-0
            file:text-sm file:font-medium
            file:bg-gray-700 file:text-gray-50
            hover:file:cursor-pointer hover:file:bg-amber-50
            hover:file:text-gray-700" id="file" type="file">
                            </div>
                
                            <div class="mt-7 flex gap-[0.5rem] items-center">
                                <p class="font-bold">Nombre</p>            
                                <input type="text" name="nombre" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">                           
                            </div>

                            <div class="mt-7 flex gap-[0.5rem] items-center">
                                <p class="font-bold">Precio</p>               
                                <input type="number" name="precio" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">                           
                            </div>

                            <div class="mt-7 flex gap-[0.5rem] items-center"> 
                                <p class="font-bold">Cantidad</p>  
                                <input type="number" name="cantidad" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">                           
                            </div>

                            <div class="mt-7 flex gap-[0.5rem] items-center">
                            <p class="font-bold">Descripcion</p>
                            <textarea name="descripcion" id="chat" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
                                                          
                            </div>
                
                            <div class="mt-7 flex gap-4">

                            
                                <input type="submit" class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105 text-center cursor-pointer font-bold" value="Enviar">
                                    
                                
                                <input type="reset" class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105 text-center cursor-pointer font-bold" value="Borrar">
                                    
                                
                            </div>
                       
                        </form>
                    </div>
                </div>
            </div>
            
        </div>



    
</body>
</html>



<?php }else{ ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">404</h1>
            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Something's missing.</p>
            <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, we can't find that page. You'll find lots to explore on the home page. </p>
            <a href="#" class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Back to Homepage</a>
        </div>   
    </div>
</section>
    </body>
    </html>

    <?php }?>


