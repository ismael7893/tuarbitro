<?php
require 'back/db.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  header('location:equipos.php');
}
$idcampeonato = 1;
$sql = "SELECT * FROM equipo WHERE id='$id'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $nombre =  $row["nombre"];
    $logo = $row["logo"];
  }
} else {
  echo "0 results";
}
$sql = "SELECT * FROM jugador WHERE idequipo='$id'";
$result = $db->query($sql);
?>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- Required meta tags -->

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- js creado por alex-->
  <script type="text/javascript" src="funcions.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

  <title>CAMPEONATOS</title>
  <style type="text/css">
    html,
    body,
    #basicMap {
      width: 100%;
      height: 100%;
      margin: 0;
    }
  </style>
  <script src="OpenLayers.js"></script>
  <script>
    function init() {
      map = new OpenLayers.Map("basicMap");
      var mapnik = new OpenLayers.Layer.OSM();
      var fromProjection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
      var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
      var position = new OpenLayers.LonLat(13.41, 52.52).transform(fromProjection, toProjection);
      var zoom = 15;

      map.addLayer(mapnik);
      map.setCenter(position, zoom);
    }
  </script>
</head>

<body onload="init();">
  <?php
  ?>
  <div class="jumbotron text-center" style="background: url('<?php echo $portada; ?>');">
    <h1><?php echo $nombre; ?></h1>
  </div>
  <!-- Centered Tabs -->
  <div style="margin-top: -35px; height: 44px;">
    <div class="dropdown">
      <div class="container">
        <div class="row submenu">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Jugador
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">Agregar Equipo</a> -->
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#equipos">Agregar Jugadores</a>
          </div>
          <div class="col-sm-10">
            <ul class="nav nav-tabs nav-justified" style="padding: 10px; border: none;">
              <li class="active"><a href="#" style="padding: 10px; color: white t; margin-left: 200px;">INICIO</a></li>
              <li><a href="#" style="padding: 10px; color: white;">CLASIFICACIÓN</a></li>
              <li><a href="#" style="padding: 10px; color: white;">FOTOS VÍDEOS Y NOTICIAS</a></li>
              <li><a href="#" style="padding: 10px; color: white;">RANKINGS Y ENCUESTAS</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container" style="padding-top: 50px;">
    <div class="row" style="background: black;">

      <div class="col-sm-4">
        <ul class="nav nav-tabs nav-justified" style="padding: 2px; border: none;">

        </ul>
      </div>
    </div>
    <!-- modal editar campeonato-->
    <div class="modal fade" id="equipos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="back/jugador.php?id=<?=$_GET['id']?>" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Jugadores</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nombre</label>
                <input name="nombre" class="form-control" type="text">
              </div>
              <div class="form-group">
                <label for="">Numero de camiseta</label>
                <input name="numero" class="form-control" type="text">
              </div>
              <div class="form-group">
                <label for="">Foto</label>
                <input name="foto" class="form-control" type="input">
              </div>
            </div>
            <div class="modal-footer">
              <button type="subutmit" class="btn btn-info">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- modal encuestas-->
    <!-- end modal-->
    <div class="row pt-3">
      <div class="col-sm-8">
        <img class="perfil" src="img/perfilEquipo.jpg" alt="">
      </div>
    </div>
    <div class="row pt-3">
      <div class="col-sm-8">
        <div id="main">
          <div class="list list-equipment">
            <ul>
              <?php
              if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                  $id = $row["id"];
                  $idequipo =  $row["idequipo"];
                  $nombre = $row["nombre"];
                  $numero = $row["numero"];
                  $foto = $row["foto"];
              ?>
                  <li class="ng-star-inserted line-bottom">
                    <img src="<?= $foto ?>">
                    <h4><?= $nombre ?></h4>
                    <p>
                      <span class="ng-star-inserted">Camiseta</span>
                      <span class="ng-star-inserted"> - </span>
                      <span class="ng-star-inserted"><?= $numero ?></span>
                    </p>
                  </li>
              <?php }
              } else {
                echo "Este equipo no tiene jugadores";
              } ?>
              ?>
            </ul>
          </div>
        </div>
      </div>


      <!-- <div class="col-sm-4" ">
        <h3 style=" text-align: center; color: gray;">JUEGOS</h3>
        <div style='border: 1px solid #eee;'>
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <h5>CATEGORIAS</h5>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <h5>RONDAS</h5>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <div class="row" style="margin-top: 50px;">
              <div class="col-sm-5">
                <img src="https://firebasestorage.googleapis.com/v0/b/copafacil-web.appspot.com/o/imgs%2F-LuJ_RoQEjgijnts-D19.png?alt=media" style="width:70px; height: 70px; margin-left:25%" />
              </div>
              <div class="col-sm-2">
                <h1>X</h1>
              </div>
              <div class="col-sm-5">
                <img src="https://firebasestorage.googleapis.com/v0/b/copafacil-web.appspot.com/o/imgs%2F-LuJ_RoQEjgijnts-D19.png?alt=media" style="width:70px; height: 70px; margin-left:25%;" />
              </div>
            </div>
          </div>
        </div>

      </div> -->

    </div>
  </div>

  <!-- Modal -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
<?php $db->close(); ?>