<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>

<?php
    session_start();
    include("cabecera.php");
    ?>

<div class="w-full flex gap-4 justify-end p-4">
        <a href="index.php">Inicio</a> | <a href="login.php">Login</a>
    </div>

<div class="font-sans">
            <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
                <div class="relative sm:max-w-sm w-full">
                    <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                    <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                    <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                        <label for="" class="block mt-3 text-sm text-gray-700 text-center font-semibold">
                            Registrarse
                        </label>
                        <form method="post" action="registro.php" class="mt-10">
                                           
                            <div>
                                <input type="text" name="user" placeholder="Usuario" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                            </div>
                
                            <div class="mt-7">                
                                <input type="password" name="password" placeholder="Contraseña" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">                           
                            </div>

                            <div class="mt-7">                
                                <input type="text" name="name" placeholder="Nombre" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">                           
                            </div>

                            <div class="mt-7">                
                                <input type="text" name="lastname" placeholder="apellido" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">                           
                            </div>

                            <div class="mt-7">                
                                <input type="number" name="ci" placeholder="Cedula" class="pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">                           
                            </div>
                
                            <div class="mt-7 flex gap-4">

                            <input type="hidden" name="val" value="1">
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