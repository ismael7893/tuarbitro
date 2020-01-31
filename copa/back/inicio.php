<!DOCTYPE html>

<?php
include 'db.php';
session_start();
$id = $_SESSION['id'];

  if($id == ''){
    header('Location: index.php');
  }
  else{
    $sql = "SELECT * FROM persona WHERE id = '$id'";
    $eje = mysqli_query($db, $sql);

    if(!$eje){
      echo "Error: ".mysqli_error($db);
    }else{
      $rw_datos = mysqli_fetch_array($eje);
 ?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Edicion de perfil</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="form-structor">
	<div class="signup">
    <form class="" action="actualiza.php" method="post">
		<h2 class="form-title" id="signup">Tus Datos</h2>
		<div class="form-holder">
      <input type="text" name="usuario" class="input" placeholder="Usuario" value="<?php echo $rw_datos['usuario']; ?>"/>
			<input type="text" name="nombre" class="input" placeholder="Name" value="<?php echo $rw_datos['nombre']; ?>"/>
			<input type="email" name="correo" class="input" placeholder="Email" value="<?php echo $rw_datos['correo']; ?>" />
			<input type="text" name="clave" class="input" placeholder="Password" value="<?php echo $rw_datos['clave']; ?>" />
		</div>
		<button type="submit" class="submit-btn">Actualizar</button>
    <a href="logout.php" class="submit-btn" style="width: 150px;">Cerrar Sesion</a>
    </form>
	</div>

</div>
<!-- partial -->
<script  src="./script.js"></script>
</body>
</html>
<?php } }?>
