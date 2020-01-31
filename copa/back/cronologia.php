<?php
include 'db.php';

function save($db)
{
    // $id = $_POST['id'];
    $idPartido = $_POST['idPartido'];
    $idJugador = $_POST['idJugador'];
    $tiempo = $_POST['min'].' min '.$_POST['seg'].' seg';
    $accion = $_POST['accion'];

    $sql = "INSERT INTO cronologia (id, idPartido, idJugador, tiempo, accion) VALUES (null, '$idPartido', '$idJugador', '$tiempo', '$accion'";

    if (mysqli_query($db, $sql)) {
        echo "se guardo correctamente";
    } else {
        echo "error al guardar";
        echo $sql;
    }
}

function buscar($db)
{
    // $idpartido = $_POST['idpartido'];
    $idpartido = 1;
    $sql = "SELECT * FROM cronologia WHERE idpartido='$idpartido'";
    $result = mysqli_query($db, $sql);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data;
    } else {
        return "No se encontro estadisticas de este partido " . $sql;
    }
}
$_POST['idPartido'] = "1";
$_POST['idJugador'] = "1";
$_POST['tiempo'] = "1";
$_POST['accion'] = "01 min 20 seg";
// save($db);
echo json_encode(buscar($db));
