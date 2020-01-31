<?php
include 'db.php';

function save($db){
    // $id = $_POST['id'];
    $idpartido = $_POST['idpartido'];
    $idEquipoA = $_POST['idEquipoA'];
    $idEquipoB = $_POST['idEquipoB'];
    $gol_A = $_POST['gol_A'];
    $gol_B = $_POST['gol_B'];
    $gol_T = $_POST['gol_T'];
    $faltas_A = $_POST['faltas_A'];
    $faltas_B = $_POST['faltas_B'];
    $faltas_T = $_POST['faltas_T'];

    $sql = "INSERT INTO estadistica (id, idpartido, idEquipoA, idEquipoB, gol_A, gol_B, gol_T,faltas_A, faltas_B, faltas_T) VALUES (null, '$idpartido', '$idEquipoA', '$idEquipoB', '$gol_A', '$gol_B', '$gol_T','$faltas_A', '$faltas_B', '$faltas_T')";

    if (mysqli_query($db, $sql)) {
        echo "se guardo correctamente";
    } else {
        echo "error al guardar";
        echo $sql;
    }
}

function buscar($db){
    // $idpartido = $_POST['idpartido'];
    $idpartido = 1;
    $sql = "SELECT * FROM estadistica WHERE idpartido='$idpartido'";
    $result = mysqli_query($db, $sql);
    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        return $data;
    } else{
        return "No se encontro estadisticas de este partido ".$sql;
    }
}

$_POST['idpartido'] = '1';
$_POST['idEquipoA'] = '1';
$_POST['idEquipoB'] = '2';
$_POST['gol_A'] = '1';
$_POST['gol_B'] = '0';
$_POST['gol_T'] = '1';
$_POST['faltas_A'] = '5';
$_POST['faltas_B'] = '5';
$_POST['faltas_T'] = '10';

// save($db);
echo json_encode(buscar($db));
?>