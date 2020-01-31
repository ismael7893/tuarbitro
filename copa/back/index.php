<!DOCTYPE html>
<?php
if (isset($_GET['error'])) {
  $error = "";
}
else{
  $error = $_GET['error'];
}

?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Prueba</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <?php if($error == 3){?>
    <div style="background-color: green; width: 30%;">
      <h1>Registro Exitoso</h1>
    </div>
  <?php } ?>
<div class="form-structor">
	<div class="signup">
    <form class="" action="registro.php" method="post">
		<h2 class="form-title" id="signup"><span>or</span>Registro</h2>
		<div class="form-holder">
      <input type="text" name="usuario" class="input" placeholder="Usuario" required/>
			<input type="text" name="nombre" class="input" placeholder="Name" required/>
			<input type="email" name="correo" class="input" placeholder="Email" required/>
			<input type="password" name="clave" class="input" placeholder="Password" required/>
		</div>
		<button type="submit" class="submit-btn">Registro</button>
    </form>
	</div>
	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login"><span>or</span>Log in</h2>
      <form class="" action="login.php" method="post">


			<div class="form-holder">
				<input type="text" name="usuario" class="input" placeholder="Usuario" required/>
				<input type="password" name="clave" class="input" placeholder="Password" required />
			</div>
			<button type="submit" class="submit-btn">Log in</button>
      </form>
		</div>
	</div>
</div>
<!-- partial -->
  <script  src="./script.js"></script>


</body>
</html>
