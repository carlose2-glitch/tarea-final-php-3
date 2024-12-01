<?php
include "link.php";

if (isset($_FILES['img']['name']) && $_FILES['img']['name']!='' && isset($_POST['nombre']) && $_POST['nombre']!='' &&
          isset($_POST['precio']) && $_POST['precio']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='' &&
          isset($_POST['descripcion']) && $_POST['descripcion']!='')
      {
        // se reciben los datos
        $temporal = $_FILES['img']['tmp_name'];
        $arch = $_FILES['img']['name'];
        $tipo = getimagesize($temporal); 
        #El índice 2 del arreglo que genera  getimagesize es una bandera que indica el tipo de imagen: 1 = GIF, 2 = JPG, 3 = PNG,
        if($tipo[2]!=1 && $tipo[2]!=2 && $tipo[2]!=3)
        { //1(gif) - 2(jpg) -3(png)  ?>
          <script> alert("Tipo de imagen no permitido. "); </script>
          <meta http-equiv="refresh" content="0.5;URL=producto.php" /><?php 
        }
        else
        { # el tipo de archivo es correcto se efectua la carga del producto
          if (copy($temporal,'images/'.$arch))
          {  # Foto copiada en la carpeta del servidor
            $sql = "insert into producto(nombre, precio, cantidad, descripcion, imagen) values('$_POST[nombre]','$_POST[precio]','$_POST[cantidad]','$_POST[descripcion]','$arch')";          
            mysqli_query($link,$sql);
            if(mysqli_error($link))
            { #error en la insercion ?>
              <script> alert("Error en la carga de los datos "); </script> 
              <meta http-equiv="refresh" content="0.5;URL=producto.php" /><?php 
            }
            else
            {# se cargaron los datos sin error?>
              <script> alert("El producto ha sido ingresdo al sistema "); </script> 
              <meta http-equiv="refresh" content="0.5;URL=producto.php" /><?php
            }
          }
          else
          {?>
              <script> alert("Error en la carga de la foto. Intente de nuevo "); </script> 
              <meta http-equiv="refresh" content="0.5;URL=producto.php" /><?php
          }
        }
      }
      else
      { // no se reciben los datos ?>
        <script> alert("Debe rellenar todos los datos "); </script>
        <meta http-equiv="refresh" content="0.5;URL=producto.php" /> <?php
      }