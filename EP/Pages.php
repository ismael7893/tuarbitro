<?php
session_start();

if(isset($_SESSION['ROLE'])){

    $role = $_SESSION['ROLE'];

    switch ($role) {
        case 'USER':
            echo "usted es un usuario USER";
            break;
        case 'SUBADMIN':
            echo "usted es un usuario SUBADMIN";
            break;
        case 'ADMIN':
            echo "usted es un usuario ADMIN";
            break;
        case 'SUPERADMIN':
            echo "usted es un usuario SUPERADMIN";
            break;

        default:
            # code...
            break;
    }

}else{
    echo "usted no esta logeado o no tiene acceso a esta pagina";
}
