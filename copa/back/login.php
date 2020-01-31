<?php
  include ('db.php');

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM cuenta WHERE username = '".$usuario."' AND PASSWORD = '".$clave."'";
    $eje = mysqli_query($db, $sql);

    if(!$eje){
      echo "Error".mysqli_error($db);
    }
    else{
      $count = mysqli_num_rows($eje);
      $rw_usuario = mysqli_fetch_array($eje);

          if($count > 0){
            session_start();
              $_SESSION['id'] = $rw_usuario['id'];
              header('Location: ../campeonatos.php');
          }
          else{?>
            <h1 style="color:red;">Error: usuario o clave errorneas</h1>
            <?php
          }
    }
 ?>
