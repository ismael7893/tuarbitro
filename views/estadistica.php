<?php
require 'back/db.php';
$idcampeonato = 1;
$id = $_GET['id'];
// $sql = "SELECT t1.* FROM partidos t1 WHERE campeonato='$id'";
$sql = "SELECT t1.id, t1.fecha, t1.hora, t2.nombre as equipo1, t2.logo as logo1, t3.nombre as equipo2, t3.logo as logo2  FROM partidos t1 inner join equipo t2 on t2.id = t1.equipo1 inner join equipo t3 ON t3.id = t1.equipo2 WHERE t1.id='$id'";
$result = $db->query($sql);
// output data of each row
$sql2 = "SELECT t1.*, t2.nombre as equipo1, t3.nombre as equipo2 FROM estadistica t1 inner join equipo t2 on t2.id = t1.idEquipoA inner join equipo t3 ON t3.id = t1.idEquipoB WHERE idpartido='$id'";
$result2 = $db->query($sql2);
$sql3 = "SELECT t1.*, t2.* FROM cronologia t1 INNER JOIN jugador t2 ON t1.idJugador = t2.id WHERE idPartido='$id'";
$result3 = $db->query($sql3);
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
        <!-- modal encuestas-->
        <div class="row pt-3">
            <div class="col-sm-12">
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
                            </div>
                    <?php }
                    } else {
                        echo "No se encontro ningun equipo";
                    }
                    ?>
                </div>
                <div class="row">
                    <?php
                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
                            $id = $row["id"];

                    ?>
                            <table class="table">
                                <thead>
                                    <tr class="bg-warning text-light">
                                        <th></th>
                                        <th class="text-center"><?= $row["equipo1"] ?></th>
                                        <th class="text-center"><?= $row["equipo2"] ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Goles</td>
                                        <td class="text-center"><?= $row["gol_A"] ?></td>
                                        <td class="text-center"><?= $row["gol_B"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Faltas</td>
                                        <td class="text-center"><?= $row["faltas_A"] ?></td>
                                        <td class="text-center"><?= $row["faltas_B"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Expulciones</td>
                                        <td class="text-center"><?= $row["expulsionA"] ?></td>
                                        <td class="text-center"><?= $row["expulsionB"] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                    <?php
                        }
                    } else {
                        echo "<div class='alert alert-warning'>No se encontraron estadistics del partido.</div>";
                    }
                    ?>
                </div>
                <div class="row">
                    <?php
                    if ($result3->num_rows > 0) {
                        while ($row = $result3->fetch_assoc()) {
                            $id = $row["id"];
                    ?>
                            <h3>La cronologia del partido jugado es:</h3>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-right">

                                            <img width="70px" height="70px" src="<?= $row['foto'] ?>">
                                            <div class="float-right">
                                                <p><?= $row['nombre'] ?></p>
                                                <p><?= $row['tiempo'] ?></p>
                                            </div>
                                            
                                        </td>
                                        <td class="text-left"><?= $row["accion"] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                    <?php
                        }
                    } else {
                        echo "<div class='alert alert-warning'>No la cronolofia de este partido.</div>";
                    }
                    ?>
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