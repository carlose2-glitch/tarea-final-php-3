<?php

session_start();
include 'link.php';

     //autentificacion de usuario login
      if(isset($_POST['usuario']) && trim($_POST['usuario'])!='' && isset($_POST['password']) && trim($_POST['password'])!='')      {
        #llegaron los datos
        $sql = "select * from usuario where usuario='$_POST[usuario]'";
        $query = mysqli_query($link,$sql);
        $num = mysqli_num_rows($query);
        if ($num==0)
        {?>
          <script> alert("No existe el usuario. "); </script>
          <meta http-equiv="refresh" content="0.5;URL=login.php" />
          <?php

        }
        else
        {
          # se encontro registro
          $row = mysqli_fetch_array($query); # descargo en el arreglo $row la primera fila
          
          if ($row['password'] != md5($_POST['password']))
           {# No coincide contraseña?>
              <script> alert("Contraseña Incorrecta. "); </script>
              <meta http-equiv="refresh" content="0.5;URL=login.php" /><?PHP
           }
          else
          {
            # Autentificacion (Creamos variables de sesión con los datos del usuario)   
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['cedula'] = $row['cedula'];
            $_SESSION['tipo'] = $row['tipo'];
            ?>
            <meta http-equiv="refresh" content="0.5;URL=index.php" />
    <?php       }       
        } 
      }
      else
       { 
      ?>
          <script> alert("Debe rellenar todos los datos. "); </script> 
          <meta http-equiv="refresh" content="0.5;URL=login.php" /><?php 
       }
?>
