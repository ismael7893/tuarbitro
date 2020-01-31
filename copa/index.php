<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname=  "tuarbitro";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
    
  $idcampeonato= 1;
  
  $sql = "SELECT * FROM campeonatos";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    $i=0;
        $id=array(); $titulo=  array();   $subtitulo= array();  $logo= array(); $portada= array(); $reglas= array(); 
?>
<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>INICIO</title>
  </head>
  <body>
       	<header>
          <nav class="navbar navbar-expand-lg " style="background-color:#14913E ;">
  <a class="navbar-brand" href="#">Tuarbitro</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav" >
      <li class="nav-item active">
        <a class="nav-link" style="color:white; font-size:20px;  margin-left: 200px;" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:white; font-size:20px;"href="#">Tuarbitro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"style="color:white; font-size:20px;" href="#">Campeonatos</a>
      </li>
       <li class="nav-item">
        <a class="nav-link"style="color:white; font-size:20px;" href="#">Tutoriales</a>
      </li>
       <li class="nav-item">
        <a class="nav-link"style="color:white; font-size:20px;" href="#">Sobre</a>
      </li>
       <li class="nav-item">
        <a class="nav-link"style="color:white; font-size:20px;" href="#">Descarga</a>
      </li>
       <li class="nav-item">
        <a class="nav-link"style="color:white; font-size:20px;" href="#">Planes</a>
      </li>
       <li class="nav-item">
        <a class="nav-link"style="color:white; font-size:20px;" href="#">Contacto</a>
      </li>
      <li class="nav-item dropdown">
           <select class="form-control" style="margin-top: 10px; ">
           <option>Español</option>
            <option>Ingles</option>
             <option>Frances</option>
            <option>Portugues</option>
             <option>Italiano</option>
     </select>
        </div>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Ingresar</button>
    </ul>
  </div>
</nav>
  	</header>
   <div class="jumbotron text-center" style="background: #ffd400;">
  <h1>CAMPEONATOS</h1>
  <p>Aqui você encontra os mais variados tipos de campeonatos</p>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h3 style="text-align: center; color: gray;">CAMPEONATOS</h3>
      
      <?php
        while($row = $result->fetch_assoc()) {
        $id[$i]=$row["id"];
        $titulo[$i]= $row["nombre"];
        $subtitulo[$i]= $row["description"];
        $logo[$i]= $row["logo"]; 
        echo '<div style="border: 1px solid #eee;">';
        echo '<img src="'.$logo[$i].'" style="width:70px; height: 70px; float: left;" />';
        echo '<h4>'.$titulo[$i].'</h4>';
        echo '<p>'.$subtitulo[$i].'</p>';
        echo '</div>';
        $i++;
    }
} else {
    echo "0 results";
}

?>
    </div>
    <div class="col-sm-6">
      <h3 style="text-align: center; color: gray;">CAMPEONATOS SEGUIDOS</h3>
      <div style='border: 1px solid #eee;'>
      <img src="https://firebasestorage.googleapis.com/v0/b/copafacil-web.appspot.com/o/users%2F9B2CbvqFMWh4tPoUhOcYQSBBMCY2%2F1549203206022.png?alt=media&token=178b06a7-a1b9-421b-a5e3-7624d040b388" style="width:70px; height: 70px; float: left;"/>
      <h4>Liga Movistar 1 2020</h4>
      <p>Liga de Futbol Profesional</p>
  </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="back/login.php" method="POST">
        <!-- Default input -->
          <label for="exampleForm2">Usuario</label>
          <input type="text" name="usuario" class="form-control">
          <label for="exampleForm2">Contrasena</label>
          <input type="password" name="clave" class="form-control">

          <div class="row">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top:15px;">Ingresar</button>
          </div>
          </form>
          <div class="col-sm-12">
        <button type="button" class="btn btn-primary" style="width: 100%; margin-top:15px;  margin-bottom:15px;">Registrar</button>
        </div>
         <div class="col-sm-12">
        <button type="button" class="btn btn-info" style="width: 100%; margin-top:15px;  margin-bottom:15px;">Facebook</button>
        </div>
         <div class="col-sm-12">
        <button type="button" class="btn btn-danger" style="width: 100%; margin-top:15px;  margin-bottom:15px;">Google</button>
        </div>
      </div>
      </div>
  </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>