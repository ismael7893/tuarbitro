<?php 
$servername = "localhost";
$username = "tuarbitro_ss";
$password = "Gogostar#991$";
 $dbname=  "tuarbitro_ss";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
    
  $idcampeonato= 1;
  
  $sql = "SELECT * FROM usuario";
$result = $conn->query($sql);
      if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $nombre=  $row["nombre"];  $correo= $row["correo"]; $celular= $row["celular"]; $foto= $row["foto"]; 
    }
} else {
    echo "0 results";
}
  
?>
<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>USUARIO</title>
  </head>
  <body>
   

<div class="container" style="margin-top: 90px;">
  <div class="row">

    <div class="col-sm-4" >
   <div style='border: 1px solid #eee; padding-top: 20px; padding-bottom: 20px;'>
      <div style="display: flex;
    justify-content: center;">
        <img src="<?php echo $foto; ?>" style="width:170px; height: 170px;" /></div>
        <div style="display: flex;
    justify-content: center;">
      <h4 style="text-align: center; color: gray;"><?php echo $nombre; ?></h4></div>
      <div style="text-align: center;">
    <div style="display: flex;
    justify-content: center;">
      <h5><?php echo $correo; ?></h5>
    </div>
  
</div>
      <div style="display: flex;
    justify-content: center; margin-top:  20px;">
      <button type="button" class="btn btn-primary btn-lg" style="background: transparent; color: #0062cc; margin-bottom: 10px;">Mis equipos</button>
    </div>
    <div style="display: flex;
    justify-content: center;">
      <button type="button" class="btn btn-primary btn-lg" style="text-align: center;">Planes de Suscripcion</button>
    </div>
  </div>
  <div>
    <h3 style="text-align: center;">Chat</h3>
    <p style="text-align: center;">No hay mensajes</p>
  
  </div>
    </div>
    <div class="col-sm-4" style='border: 1px solid #eee; padding-top: 20px; padding-bottom: 20px;'>
      <h3 style="text-align: center; color: gray;">Campeonatos que sigo</h3>
      <div >
      <img src="https://firebasestorage.googleapis.com/v0/b/copafacil-web.appspot.com/o/users%2F9B2CbvqFMWh4tPoUhOcYQSBBMCY2%2F1549203206022.png?alt=media&token=178b06a7-a1b9-421b-a5e3-7624d040b388" style="width:70px; height: 70px; float: left;" />
      <h4>Liga Movistar 1 2020</h4>
      <p>Liga de Futbol Profesional</p>
  </div>
    </div>
     <div class="col-sm-4" style='border: 1px solid #eee; padding-top: 20px; padding-bottom: 20px;'>
      <h3 style="text-align: center; color: gray;">Mis Campeonatos</h3>
      <div>
      <img src="https://firebasestorage.googleapis.com/v0/b/copafacil-web.appspot.com/o/users%2F9B2CbvqFMWh4tPoUhOcYQSBBMCY2%2F1549203206022.png?alt=media&token=178b06a7-a1b9-421b-a5e3-7624d040b388" style="width:70px; height: 70px; float: left;" />
      <h4>Liga Movistar 1 2020</h4>
      <p>Liga de Futbol Profesional</p>
  </div>
  <div style="display: flex;
    justify-content: center;">
      <button type="button" class="btn btn-primary btn-lg" style="text-align: center;" data-toggle="modal" data-target="#exampleModal">Nuevo Campeonato</button>
    </div>
</div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Campeonato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Default input -->
<label for="exampleForm2">Nombre del Campeonato</label>
<input type="text" id="exampleForm2" class="form-control">
<div class="row">
  <div class="col-sm-6">
<label for="dropdown">Tipo de Campeonato</label>
 <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: transparent; color: black;">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
</div>
  <div class="col-sm-6">

<label for="dropdown">Elige el Deporte</label>
 <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: transparent; color: black;">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
</div>



      </div>

      <div class="modal-footer">
             <div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-11">
        <button type="button" class="btn btn-primary" style="margin-left: 130px;">Nuevo Campeonato</button>
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