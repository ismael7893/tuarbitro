<?php
  include('db.php');
  session_start();

  $id = $_SESSION['id'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];


    $sql = "UPDATE pr_user SET usuario = '".$usuario."', clave = '".$clave."', correo = '".$correo."', nombre = '".$nombre."' WHERE id = '".$id."'";
    $eje = mysqli_query($db, $sql);

      if(!$eje){
        echo "error: ".mysqli_error($db);
      }
      else{
        header('Location: inicio.php');
      }
    ?>
