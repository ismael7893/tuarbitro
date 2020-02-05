<?php
session_start();
$status = isset($_SESSION['ROLE']) ? true: false;
if($status){
    $view = isset($_GET['view']) ? $_GET['view'] : 'index';
    switch($view){
        case 'index':
        case 'champions':
            require_once 'views/campeonatos.php';
            break;
        case 'user':
            require_once 'views/Perfil.php';
            break;
        case 'logout':
            echo var_dump($_SESSION);
            session_destroy();
            echo "<script>
                localStorage.removeItem('id');
                localStorage.removeItem('role');
                localStorage.removeItem('name');
                localStorage.removeItem('username');
                location.href = '?view=index';
            </script>";
            break;
        default:
            echo "<h2>Eror 404 no se encontro la pagina</h2>";
    }
} else{
    require_once 'views/index.php';
}
?>