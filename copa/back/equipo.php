<?php
include 'db.php';
$nombre = $_POST['nombre'];
$logo = $_POST['logo'];
$id = $_GET['camp'];
$sql = "INSERT INTO equipo (id,idcampeonato,nombre,logo) VALUES(null,'$id','$nombre','$logo')";

if(mysqli_query($db,$sql)){
    echo "se guardo correctamente";
    header('location:../equipos.php?camp='.$id);
} else{
    echo "error al guardar";
}
?>