<?php
  include('db.php');

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];

    $sqlcon = "SELECT * FROM pr_user WHERE usuario = '".$usuario."' OR correo = '".$correo."'";
    $ejecon = mysqli_query($db, $sqlcon);

        if(!$ejecon){
          echo "Error: ".mysqli_error($db);
        }
        else{
          $count = mysqli_num_rows($ejecon);

            if($count > 0){
              $error = '3';
            }
            else{
              $sqlinsert = "INSERT INTO pr_user (usuario, clave, nombre, correo)
              VALUES ('".$usuario."', '".$clave."','".$nombre."', '".$correo."')";
              $ejeinsert = mysqli_query($db, $sqlinsert);

                if(!$ejeinsert){
                  $error = '2';
                }
                else{
                $error = '1';
            }
        }
      }

      if($error == '1'){
 ?>
 <div style="width:30%; background-color:green; border: green 2px solid; padding:4px; height:auto;">
Registro exitoso
<a href="index.php">Volver</a>
 </div>
<?php }
elseif($error == '2'){?>
  <div style="width:30%; background-color:green; border: green 2px solid; padding:4px; height:auto;">
 No se ha podido insertar el registro comuniquese con administracion
 <a href="index.php">Volver</a>
  </div>
<?php } elseif ($error == '3') {?>
  Correo o Usuario Duplicado.
  <a href="index.php">Volver</a>
  <?php
} ?>
