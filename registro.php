<?php 
session_start();
include "link.php";

$data = array("$_POST[user]", "$_POST[password]", "$_POST[name]", "$_POST[lastname]", "$_POST[ci]");
$boolean = true;
//verifica que todas los inputs esten llenos 
for($i = 0; $i < 5;  $i++ ){

       if(trim($data[$i]) == '' ){
            $boolean = false;
       }
}

if($boolean){//verdaero

    $password = md5($data[1]);

    $sql1 = "select * from usuario where usuario='$_POST[user]'";
    

//codigo sql para insertar datos
    $sql = "insert into usuario (usuario, password, nombre, apellido, cedula, tipo) values('$data[0]', '$password', '$data[2]', '$data[3]', '$data[4]', 'usuario')";
//codigo para buscar si el usuario y la cedula esta repetido 
    $searchUser = "select * from usuario where usuario ='$data[0]' or cedula='$data[4]'";


   $response = mysqli_query($link, $searchUser);

   $r = mysqli_fetch_array($response);



   if(!$r){//si el usuario no existe

    $result = mysqli_query($link, $sql);



    echo "<script> alert('Usuario creado')</script>"; ?>

    <meta http-equiv="refresh" content="0.5;URL=index.php" />
   <?php

$query = mysqli_query($link,$sql1);

$row = mysqli_fetch_array($query);


$_SESSION['id_usuario'] = $row['id_usuario'];
$_SESSION['nombre'] = $row['nombre'];
$_SESSION['apellido'] = $row['apellido'];
$_SESSION['cedula'] = $row['cedula'];
$_SESSION['tipo'] = $row['tipo'];

}else{ ?>
   
  
    <script> alert('el usuario o la cedula ya existe')</script>
    <meta http-equiv="refresh" content="0.5;URL=registrarse.php" />
   <?php }



}else{ ?>
    <script> alert('Debe llenar todos los datos')</script>
    <meta http-equiv="refresh" content="0.5;URL=registrarse.php" />
<?php }?>











