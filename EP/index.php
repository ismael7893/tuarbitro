<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");



if(isset($_GET['type'])){

    include('CLASS/DBase.php');

    $CONN=\DBase::Conect();

    $type=$_GET['type'];

    switch ($type) {
        case 'login':

            require 'CLASS/Login.php';

            if (!isset($_GET['username'])) die;
            if (!isset($_GET['password'])) die;
            
            $username = $_GET['username'];
            $password = $_GET['password'];            

            $CLASS_PEOPLE=new Login($CONN);

            $CLASS_PEOPLE->setUsername($username);
            $CLASS_PEOPLE->setPassword($password);

            $CLASS_PEOPLE->login();

            echo json_encode($CLASS_PEOPLE->getMessage());

        break;

        case 'campeonatos':
            require 'CLASS/Campeonatos.php';

            $ok=true;

            if (!isset($_GET['id'])) die;
            
            $id = $_GET['id'];            

            if($ok){
                

                $CLASS_PEOPLE=new Campeonato($CONN);

                $CLASS_PEOPLE->setId($id);

                $data=$CLASS_PEOPLE->getCampeonatosForId();
                $data['contactos']=$CLASS_PEOPLE->getContact();
                $data['categorias']=$CLASS_PEOPLE->getCategorias();
                $data['comentarios']=$CLASS_PEOPLE->getComments_Campeonatos();
                $data['partidos']=$CLASS_PEOPLE->getPartidos();

                echo json_encode($data);

            }

        break;

        case 'insertcampeonato':
            require 'CLASS/Campeonatos.php';

                

            $CLASS_PEOPLE=new Campeonato($CONN);

            $nombre = 'nuevo campeonato';
            $estadio = 'estadio 1';
            $organization = 'organization 1';
            $seguidores = 0;
            $description = 'campeonato 1 descripcion';
            $f_inicio = '2019-05-10';
            $f_fin = '2019-05-15';
            $logo = 'logo.jpg';
            $foto_perfil = 'foto_perfil.png';

            $CLASS_PEOPLE->setNombre($nombre);
            $CLASS_PEOPLE->setEstadio($estadio);
            $CLASS_PEOPLE->setOrganization($organization);
            $CLASS_PEOPLE->setSeguidores($seguidores);
            $CLASS_PEOPLE->setDescription($description);
            $CLASS_PEOPLE->setF_inicio($f_inicio);
            $CLASS_PEOPLE->setF_fin($f_fin);
            $CLASS_PEOPLE->setLogo($logo);
            $CLASS_PEOPLE->setFoto_perfil($foto_perfil);

            $CLASS_PEOPLE->insertCampeonato();

            $data = $CLASS_PEOPLE->getCampeonatos();

            echo json_encode($data);


        break;
        case 'updatecampeonato':
            require 'CLASS/Campeonatos.php';

            if (!isset($_GET['id'])) die;
            
            $id = $_GET['id'];     

            $CLASS_PEOPLE=new Campeonato($CONN);

            $nombre = 'nuevo campeonato editado ';
            $estadio = 'estadio 1 editado ';
            $organization = 'organization 1 editado ';
            $seguidores = 0;
            $description = 'campeonato 1 descripcion';
            $f_inicio = '2019-05-10';
            $f_fin = '2019-05-15';
            $logo = 'logo.jpg';
            $foto_perfil = 'foto_perfil.png';

            $CLASS_PEOPLE->setId($id);
            $CLASS_PEOPLE->setNombre($nombre);
            $CLASS_PEOPLE->setEstadio($estadio);
            $CLASS_PEOPLE->setOrganization($organization);
            $CLASS_PEOPLE->setSeguidores($seguidores);
            $CLASS_PEOPLE->setDescription($description);
            $CLASS_PEOPLE->setF_inicio($f_inicio);
            $CLASS_PEOPLE->setF_fin($f_fin);
            $CLASS_PEOPLE->setLogo($logo);
            $CLASS_PEOPLE->setFoto_perfil($foto_perfil);

            $CLASS_PEOPLE->updateCampeonatosForId();

            $data = $CLASS_PEOPLE->getCampeonatos();

            echo json_encode($data);

        break;
        case 'deletecampeonato':
            require 'CLASS/Campeonatos.php';

            if (!isset($_GET['id'])) die;
            
            $id = $_GET['id'];     

            $CLASS_PEOPLE=new Campeonato($CONN);

            $CLASS_PEOPLE->setId($id);

            $CLASS_PEOPLE->deleteCampeonatosForId();

            $data = $CLASS_PEOPLE->getCampeonatos();

            echo json_encode($data);

        break;
        case 'seguircampeonato':
            require 'CLASS/Campeonatos.php';

            if (!isset($_GET['id'])) die;
            if (!isset($_GET['idUser'])) die;
            
            $id = $_GET['id'];     
            $idUser = $_GET['idUser'];     

            $CLASS_PEOPLE=new Campeonato($CONN);

            $CLASS_PEOPLE->setId($id);

            $ok = $CLASS_PEOPLE->seguirCampeonato($idUser);

            if($ok){
                $CLASS_PEOPLE->updateCampeonato_Seguimiento();
            }

            $data = $CLASS_PEOPLE->getCampeonatos();

            echo json_encode($data);

        break;
        
        case 'dejardeseguir':
            require 'CLASS/Campeonatos.php';

            if (!isset($_GET['id'])) die;
            if (!isset($_GET['idUser'])) die;
            
            $id = $_GET['id'];     
            $idUser = $_GET['idUser'];     

            $CLASS_PEOPLE=new Campeonato($CONN);

            $CLASS_PEOPLE->setId($id);
            $ok = $CLASS_PEOPLE->dejarDeSeguirCampeonato($idUser);
            if($ok){
                $CLASS_PEOPLE->updateCampeonato_SeguimientoDejarDeSeguir();
            }
            

            $data = $CLASS_PEOPLE->getCampeonatos();

            echo json_encode($data);

        break;

        case 'getcampeonatos':
            require 'CLASS/Campeonatos.php';

            $CLASS_PEOPLE=new Campeonato($CONN);
            
            $data = $CLASS_PEOPLE->getCampeonatos();

            echo json_encode($data);

        break;

        case 'autogeneratecampeonato':
            require 'CLASS/Campeonatos.php';

            $CLASS_PEOPLE=new Campeonato($CONN);

            $default_fecha=date('Y-m-d');

            $default_hora=date('h:i:s');

            
            $CLASS_PEOPLE->setCreate_by(1);
            $CLASS_PEOPLE->setNombre('Default nombre');
            $CLASS_PEOPLE->setEstadio('Default estadio');
            $CLASS_PEOPLE->setOrganization('Default organizacion');
            $CLASS_PEOPLE->setSeguidores('Default seguidores');
            $CLASS_PEOPLE->setDescription('Default descripcion');

            $CLASS_PEOPLE->setF_inicio($default_fecha);
            $CLASS_PEOPLE->setF_fin($default_fecha);
            $CLASS_PEOPLE->setLogo($default_fecha);
            $CLASS_PEOPLE->setFoto_perfil('default.png');
            $CLASS_PEOPLE->setUbicacion('Default ubicacion');
            
            
            $CLASS_PEOPLE->autoGenerateCampeonato();

            //echo json_encode($data);

        break;

        case 'equipos':
            require 'CLASS/Equipos.php';

            $CLASS_PEOPLE=new Equipos($CONN);

            $CLASS_PEOPLE->setCreate_by(1);
            
            $data = $CLASS_PEOPLE->getEquiposByCreator();

            echo json_encode($data);

        break;
        
        default:
            # code...
            break;
    }

    

}

