<?php
require 'back/db.php';
$idcampeonato = 1;
$id = $_GET['camp'];
// $sql = "SELECT t1.* FROM partidos t1 WHERE campeonato='$id'";
$sql = "SELECT t1.id, t1.fecha, t1.hora, t2.nombre as equipo1, t2.logo as logo1, t3.nombre as equipo2, t3.logo as logo2  FROM partidos t1 inner join equipo t2 on t2.id = t1.equipo1 inner join equipo t3 ON t3.id = t1.equipo2 WHERE campeonato='$id'";
$result = $db->query($sql);
// output data of each row
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
    <!-- <div class="jumbotron text-center" style="background: url('<?php //echo $portada; 
                                                                    ?>');">
    <h1><?php //echo $nombre; 
        ?></h1>
  </div> -->
    <!-- Centered Tabs -->
    <div class="submenu">
        <div class="dropdown">
            <div class="container">
                <div class="row">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Equipos
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal1">Agregar equipo</a>
                        <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#equipos">Agregar Jugadores</a> -->
                        <a class="dropdown-item" href="partidos.php?camp=<?= $_GET['camp'] ?>">ver partidos</a>
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
        <!-- <div class="modal fade" id="equipos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="back/jugador.php" method="POST">
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
        </div> -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="back/equipo.php?camp=<?= $_GET['camp'] ?>" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar equipo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Default input -->
                            <label for="exampleForm2">Nombre</label>
                            <input type="text" name="nombre" class="form-control">
                            <label for="exampleForm2">logo</label>
                            <input type="text" name="logo" class="form-control">

                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary" style="width: 100%; margin-top:15px;">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- <div class="modal fade" id="encuesta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="cf-main__section">
                            <header class="cf-main__section-header">
                                <h4 class="cf-title">Rankings de los jugadores</h4>
                            </header>
                            <ulclass="list-group">
                                <li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#Rankigns">Goleadores</li>
                                <li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#Rankigns">Asistencias</li>
                                <li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#Rankigns">Sanciones</li>
                                <li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#Rankigns">

                                </li>
                                </ul>
                                <div style="display: block;text-align:right;padding: 8px; ">
                                    <button class="btn btn-outline-secondary small" data-toggle="modal" data-target="#Rankigns">Agregar</button>
                                </div>
                        </section>
                        <section class="cf-main__section">
                            <header class="cf-main__section-header">
                                <h4 class="cf-title">Encuestas</h4>
                            </header>
                            <ul class="list-group">
                                
                                <li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#editencueta"></li>
                                <li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#editencueta">

                                </li>
                            </ul>
                            <div _ngcontent-qow-c26="" style="display: block;text-align:right;padding: 8px;  ">
                                <button _ngcontent-qow-c26="" class="btn btn-outline-secondary small" data-toggle="modal" data-target="#editencueta">Agregar</button></div>
                        </section>
                    </div>
                    </app-edit-rankings-poll>
                </div>
            </div>
        </div> -->
        <!-- modal encuestas-->
        <!-- end modal-->
        <!-- <div class="row pt-3">
            <div class="col-sm-8">
                <img class="perfil" src="img/perfilEquipo.jpg" alt="">
            </div>
        </div> -->
        <div class="row pt-3">
            <div class="col-sm-12">
                <div id="main">
                    <div class="list list-equipment">
                        <div class="row">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row["id"];
                                    $equipo1 =  $row["equipo1"];
                                    $logo1 = $row["logo1"];
                                    $equipo2 =  $row["equipo2"];
                                    $logo2 = $row["logo2"];
                                    $fecha = date("d-m-Y", strtotime($row['fecha']));
                                    $hora = $row['hora'];
                            ?>
                                    <div class="col-md-5 col-lg-5 mx-2 my-2" style="border: 1px solid #eee;">
                                        <div class="row bg-info">
                                            <h5 class="col-12 p-3 text-center text-light">Fecha: <?= $fecha ?> - Hora: <?= $hora ?></h5>
                                        </div>
                                        <div class="row pt-4">
                                            <div class="col-5 text-center">
                                                <img src="<?= $logo1 ?>" style="width:70px; height: 70px;">
                                                <p><?= $equipo1 ?></p>
                                            </div>
                                            <div class="col-2">
                                                <h1>Vs</h1>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="<?= $logo2 ?>" style="width:70px; height: 70px;">
                                                <p><?= $equipo2 ?></p>
                                            </div>
                                        </div>
                                        <a class="text-info" href="estadistica.php?camp=<?= $_GET['camp'] ?>&id=<?= $id ?>">Ver estadisticas</a>
                                        <a class="text-info" href="cronologia.php?camp=<?= $_GET['camp'] ?>&id=<?= $id ?>">Ver cronologia</a>
                                    </div>
                            <?php }
                            } else {
                                echo "No se encontro ningun equipo";
                            }
                            ?>
                        </div>
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