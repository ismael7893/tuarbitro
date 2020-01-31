<?php
include 'db.php';

$nombre = $_POST['nombre'];
$numero = $_POST['numero'];
$foto = $_POST['foto'];
$id = $_GET['id'];
$sql = "INSERT INTO jugador (id,idequipo,nombre,numero,foto) VALUES(null,'$id','$nombre','$numero','$foto')";

if(mysqli_query($db,$sql)){
    echo "se guardo correctamente";
    header('location:../equipo.php?id='.$id);
} else{
    echo "error al guardar";
}
