<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");



if(isset($_GET['type'])){

    include('CLASS/DBase.php');

    $CONN=\DBase::Conect();

    $type=$_GET['type'];
    

    switch ($type) {
        case 'login':

            

            if (!isset($_GET['username'])) die;
            if (!isset($_GET['password'])) die;

            session_start();

            require 'CLASS/Login.php';
            require 'CLASS/Roles.php';
            require 'CLASS/Persona.php';
            
            $username = $_GET['username'];
            $password = $_GET['password'];            

            $CLASS_LOGIN=new Login($CONN);
            $CLASS_ROLE=new Role($CONN);
            $CLASS_PERSONA=new Persona($CONN);

            $CLASS_LOGIN->setUsername($username);
            $CLASS_LOGIN->setPassword($password);
            

            $CLASS_LOGIN->login();

            $data_login = $CLASS_LOGIN->getData();

            if(isset($data_login)){

                $role = $data_login['role'];

                $user = $data_login['username'];
            
                $CLASS_ROLE->setId($role);

                $CLASS_PERSONA->setId($user);
    
                $data_role = $CLASS_ROLE->getRole();
    
                $_SESSION['ROLE'] = $data_role['title'];                

                $menssage = $CLASS_LOGIN->getMessage();

                $persona = $CLASS_PERSONA->getPersonaForId();

                $menssage['data']['name'] = $persona['NAME'];

            }else{

                session_destroy();

                $menssage = $CLASS_LOGIN->getMessage();
            }

            echo json_encode($menssage);

        break;

        case 'campeonatos':
            require 'CLASS/Campeonatos.php';

            $ok=true;

            if (!isset($_GET['id'])) die;
            
            $id = $_GET['id'];            

            if($ok){
                

                $CLASS_LOGIN=new Campeonato($CONN);

                $CLASS_LOGIN->setId($id);

                $data=$CLASS_LOGIN->getCampeonatosForId();
                $data['contactos']=$CLASS_LOGIN->getContact();
                $data['categorias']=$CLASS_LOGIN->getCategorias();
                $data['comentarios']=$CLASS_LOGIN->getComments_Campeonatos();
                $data['partidos']=$CLASS_LOGIN->getPartidos();

                echo json_encode($data);

            }

        break;

        case 'insertcampeonato':
            require 'CLASS/Campeonatos.php';

                

            $CLASS_LOGIN=new Campeonato($CONN);

            $idUser = $_GET['idUser'];
            $nombre = $_GET['name'];
            $estadio = $_GET['stadius'];
            $organization = $_GET['organizer'];
            $seguidores = 0;
            $description = $_GET['description'];
            $tipe = $_GET['tipe'];
            $sport = $_GET['sport'];
            $f_inicio = $_GET['date_ini'];
            $f_fin = $_GET['date_fin'];
            $logo = 'logoDefault.jpg';
            $foto_perfil = 'perfilDefault.jpg';
            $estado = 'Inscripcion';

            $CLASS_LOGIN->setCreate_by($idUser);
            $CLASS_LOGIN->setNombre($nombre);
            $CLASS_LOGIN->setEstadio($estadio);
            $CLASS_LOGIN->setOrganization($organization);
            $CLASS_LOGIN->setSeguidores($seguidores);
            $CLASS_LOGIN->setDescription($description);
            $CLASS_LOGIN->setTipe($tipe);
            $CLASS_LOGIN->setSport($sport);
            $CLASS_LOGIN->setF_inicio($f_inicio);
            $CLASS_LOGIN->setF_fin($f_fin);
            $CLASS_LOGIN->setLogo($logo);
            $CLASS_LOGIN->setEstado($estado);


            $CLASS_LOGIN->insertCampeonato();

            $data = $CLASS_LOGIN->getCampeonatos();

            echo json_encode($data);
        break;
        case 'updatecampeonato':
            require 'CLASS/Campeonatos.php';

            if (!isset($_GET['id'])) die;
            
            $id = $_GET['id'];     

            $CLASS_LOGIN=new Campeonato($CONN);

            $nombre = 'nuevo campeonato editado ';
            $estadio = 'estadio 1 editado ';
            $organization = 'organization 1 editado ';
            $seguidores = 0;
            $description = 'campeonato 1 descripcion';
            $f_inicio = '2019-05-10';
            $f_fin = '2019-05-15';
            $logo = 'logo.jpg';
            $foto_perfil = 'foto_perfil.png';

            $CLASS_LOGIN->setId($id);
            $CLASS_LOGIN->setNombre($nombre);
            $CLASS_LOGIN->setEstadio($estadio);
            $CLASS_LOGIN->setOrganization($organization);
            $CLASS_LOGIN->setSeguidores($seguidores);
            $CLASS_LOGIN->setDescription($description);
            $CLASS_LOGIN->setF_inicio($f_inicio);
            $CLASS_LOGIN->setF_fin($f_fin);
            $CLASS_LOGIN->setLogo($logo);
            $CLASS_LOGIN->setFoto_perfil($foto_perfil);

            $CLASS_LOGIN->updateCampeonatosForId();

            $data = $CLASS_LOGIN->getCampeonatos();

            echo json_encode($data);

        break;
        case 'deletecampeonato':
            require 'CLASS/Campeonatos.php';

            if (!isset($_GET['id'])) die;
            
            $id = $_GET['id'];     

            $CLASS_LOGIN=new Campeonato($CONN);

            $CLASS_LOGIN->setId($id);

            $CLASS_LOGIN->deleteCampeonatosForId();

            $data = $CLASS_LOGIN->getCampeonatos();

            echo json_encode($data);

        break;
        case 'seguircampeonato':
            require 'CLASS/Campeonatos.php';

            if (!isset($_GET['id'])) die;
            if (!isset($_GET['idUser'])) die;
            
            $id = $_GET['id'];     
            $idUser = $_GET['idUser'];     

            $CLASS_LOGIN=new Campeonato($CONN);

            $CLASS_LOGIN->setId($id);

            $ok = $CLASS_LOGIN->seguirCampeonato($idUser);

            if($ok){
                $CLASS_LOGIN->updateCampeonato_Seguimiento();
            }

            $data = $CLASS_LOGIN->getCampeonatos();

            echo json_encode($data);

        break;
        
        case 'dejardeseguir':
            require 'CLASS/Campeonatos.php';

            if (!isset($_GET['id'])) die;
            if (!isset($_GET['idUser'])) die;
            
            $id = $_GET['id'];     
            $idUser = $_GET['idUser'];     

            $CLASS_LOGIN=new Campeonato($CONN);

            $CLASS_LOGIN->setId($id);
            $ok = $CLASS_LOGIN->dejarDeSeguirCampeonato($idUser);
            if($ok){
                $CLASS_LOGIN->updateCampeonato_SeguimientoDejarDeSeguir();
            }
            

            $data = $CLASS_LOGIN->getCampeonatos();

            echo json_encode($data);

        break;

        case 'listcampeonatos':
            require 'CLASS/Campeonatos.php';

            $CLASS_LOGIN=new Campeonato($CONN);
            
            $data = $CLASS_LOGIN->getCampeonatos();

            echo json_encode($data);

        break;

        case 'campeonatosporcreador':
            require 'CLASS/Campeonatos.php';

            $CLASS_CAMPEONATO=new Campeonato($CONN);

            if(isset($_GET['user'])){
                
                $user = $_GET['user'];

                $CLASS_CAMPEONATO->setCreate_by($user);
            
                $data = $CLASS_CAMPEONATO->getCampeonatosCreadosPorUsuario();

                echo json_encode($data);
            }
            

            

        break;

        case 'getteamsbychamp':
            require 'CLASS/Campeonatos.php';

            $CLASS_CAMPEONATO=new Campeonato($CONN);

            if(isset($_GET['champ'])){
                
                $campeonato = $_GET['champ'];

                $CLASS_CAMPEONATO->setCreate_by($user);
            
                $data = $CLASS_CAMPEONATO->getCampeonatosCreadosPorUsuario();

                echo json_encode($data);
            }
            

            

        break;

        case 'autogeneratecampeonato':
            require 'CLASS/Campeonatos.php';

            $CLASS_LOGIN=new Campeonato($CONN);

            $default_fecha=date('Y-m-d');

            $default_hora=date('h:i:s');

            
            $CLASS_LOGIN->setCreate_by(1);
            $CLASS_LOGIN->setNombre('Default nombre');
            $CLASS_LOGIN->setEstadio('Default estadio');
            $CLASS_LOGIN->setOrganization('Default organizacion');
            $CLASS_LOGIN->setSeguidores('Default seguidores');
            $CLASS_LOGIN->setDescription('Default descripcion');

            $CLASS_LOGIN->setF_inicio($default_fecha);
            $CLASS_LOGIN->setF_fin($default_fecha);
            $CLASS_LOGIN->setLogo($default_fecha);
            $CLASS_LOGIN->setFoto_perfil('default.png');
            $CLASS_LOGIN->setUbicacion('Default ubicacion');
            $CLASS_LOGIN->setEstado('4');
            
            
            $CLASS_LOGIN->autoGenerateCampeonato();

        break;

        case 'equipos':
            require 'CLASS/Equipos.php';

            $CLASS_LOGIN=new Equipos($CONN);

            $CLASS_LOGIN->setCreate_by(1);
            
            $data = $CLASS_LOGIN->getEquiposByCreator();

            echo json_encode($data);

        break;
        
        default:
            echo '$_GET["type"] not exist';
            break;
    }
}