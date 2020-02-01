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

        case 'champbyid':
            require 'CLASS/Campeonatos.php';
            require 'CLASS/Persona.php';


            $ok=true;

            if (!isset($_GET['id'])) die;
            
            $id = $_GET['id'];            

            if($ok){
                

                $CLASS_CAMPEONATO=new Campeonato($CONN);
                $CLASS_PERSONA=new Persona($CONN);

                $CLASS_CAMPEONATO->setId($id);
                $data = $CLASS_CAMPEONATO->getCampeonatosForId();
                if(isset($data)){
                    $user = $data['create_by'];
                    $CLASS_PERSONA->setId($user);
        
                    $persona = $CLASS_PERSONA->getPersonaForId();
                    $data['create_by'] = $persona;
    
                    $data['contacto'] = $CLASS_CAMPEONATO->getContact();
    
                    $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
                    $new_f_inicio =  $dias[date('N', strtotime($data['f_inicio']))];
                    $new_f_fin =  $dias[date('N', strtotime($data['f_fin']))];
    
    
                    $data['f_inicio'] = $new_f_inicio." ".date("d-m-Y", strtotime($data['f_inicio']));
                    $data['f_fin'] = $new_f_inicio." ".date("d-m-Y", strtotime($data['f_fin']));
    
                    echo json_encode($data);
                }else{
                    
                    $menssage = $CLASS_CAMPEONATO->getMessage();

                    echo json_encode($menssage);
                }

                

            }

        break;

        case 'matchbychamp':
            require 'CLASS/Campeonatos.php';

            $ok=true;

            if (!isset($_GET['id'])) die;
            
            $id = $_GET['id'];            

            if($ok){
                

                $CLASS_LOGIN=new Campeonato($CONN);

                $CLASS_LOGIN->setId($id);

                $data=$CLASS_LOGIN->getCampeonatosForId();
                $data['partidos']=$CLASS_LOGIN->getPartidos();

                echo json_encode($data);

            }

        break;

        case 'insertcampeonato':
            require 'CLASS/Campeonatos.php';

                

            $CLASS_LOGIN=new Campeonato($CONN);

            $nombre = 'nuevo campeonato';
            $estadio = 'estadio 1';
            $organization = 'organization 1';
            $seguidores = 0;
            $description = 'campeonato 1 descripcion';
            $f_inicio = '2019-05-10';
            $f_fin = '2019-05-15';
            $logo = 'logo.jpg';
            $foto_perfil = 'foto_perfil.png';

            $CLASS_LOGIN->setNombre($nombre);
            $CLASS_LOGIN->setEstadio($estadio);
            $CLASS_LOGIN->setOrganization($organization);
            $CLASS_LOGIN->setSeguidores($seguidores);
            $CLASS_LOGIN->setDescription($description);
            $CLASS_LOGIN->setF_inicio($f_inicio);
            $CLASS_LOGIN->setF_fin($f_fin);
            $CLASS_LOGIN->setLogo($logo);
            $CLASS_LOGIN->setFoto_perfil($foto_perfil);

            $CLASS_LOGIN->insertCampeonato();

            $data = $CLASS_LOGIN->getCampeonatos();

            echo json_encode($data);


        break;

        case 'addcontacto':
            require 'CLASS/Contactos.php';

            if (!isset($_GET['campeonato'])) die;
            if (!isset($_GET['numero'])) die;


            $CLASS_CONTACTO=new Contacto($CONN);

            $campeonato = $_GET['campeonato'];
            $numero = $_GET['numero'];

            $CLASS_CONTACTO->setCampeonato($campeonato);
            $CLASS_CONTACTO->setNumero($numero);

            $CLASS_CONTACTO->insertContacto();

            $menssage = $CLASS_CONTACTO->getMessage();

            echo json_encode($menssage);


        break;

        case 'addequipo':

            require 'CLASS/Equipos.php';

            $CLASS_EQUIPO=new Equipos($CONN);

            $name = 'nuevo campeonato1';
            $tecnico = 'new tecnico';
            $imagen = 'newimagen.png';
            $create_by = 'new create_by';
            $campeonato = 'new campeonato';

            $CLASS_EQUIPO->setName($name);
            $CLASS_EQUIPO->setTecnico($tecnico);
            $CLASS_EQUIPO->setImagen($imagen);
            $CLASS_EQUIPO->setCreate_by($create_by);
            $CLASS_EQUIPO->setCampeonato($campeonato);

            $CLASS_EQUIPO->insertEquipo();

            $menssage = $CLASS_EQUIPO->getMessage();
            
            echo json_encode($menssage);

        break;

        case 'addjugador':

            require 'CLASS/Jugadores.php';

            $CLASS_JUGADOR=new Jugadores($CONN);

            $name = 'new jugador';
            $equipo = 1;
            $numero = 10;
            $posicion = 'delantero';
            $documento = '123456789';
            $telefono = 'new telefono';
            $f_nacimiento = '1995-05-05';
            $imagen = 'newjugador.png';
            
            $CLASS_JUGADOR->setName($name);
            $CLASS_JUGADOR->setEquipo($equipo);
            $CLASS_JUGADOR->setNumero($numero);
            $CLASS_JUGADOR->setPosicion($posicion);
            $CLASS_JUGADOR->setDocumento($documento);
            $CLASS_JUGADOR->setTelefono($telefono);
            $CLASS_JUGADOR->setF_nacimiento($f_nacimiento);
            $CLASS_JUGADOR->setImagen($imagen);

            $CLASS_JUGADOR->insertJugador();

            $menssage = $CLASS_JUGADOR->getMessage();
            
            echo json_encode($menssage);

        break;

        case 'updatecampeonato':
            require 'CLASS/Campeonatos.php';

            if (!isset($_GET['id'])) die;
            
            $id = $_GET['id'];     

            $CLASS_CAMPEONATO=new Campeonato($CONN);

            $nombre = 'nuevo campeonato editado ';
            $estadio = 'estadio 1 editado ';
            $organization = 'organization 1 editado ';
            $seguidores = 0;
            $description = 'campeonato 1 descripcion';
            $tipe = 'default tipe editado';
            $sport = 'default sport editado';
            $f_inicio = '2019-05-10';
            $f_fin = '2019-05-15';
            $logo = 'logo.jpg';
            $foto_perfil = 'foto_perfil.png';
            $estado = '3';

            $CLASS_CAMPEONATO->setId($id);
            $CLASS_CAMPEONATO->setNombre($nombre);
            $CLASS_CAMPEONATO->setEstadio($estadio);
            $CLASS_CAMPEONATO->setOrganization($organization);
            $CLASS_CAMPEONATO->setSeguidores($seguidores);
            $CLASS_CAMPEONATO->setDescription($description);
            $CLASS_CAMPEONATO->setTipe($tipe);
            $CLASS_CAMPEONATO->setSport($sport);
            $CLASS_CAMPEONATO->setF_inicio($f_inicio);
            $CLASS_CAMPEONATO->setF_fin($f_fin);
            $CLASS_CAMPEONATO->setLogo($logo);
            $CLASS_CAMPEONATO->setFoto_perfil($foto_perfil);
            $CLASS_CAMPEONATO->setEstado($estado);

            $CLASS_CAMPEONATO->updateCampeonatosForId();
           
            $menssage = $CLASS_CAMPEONATO->getMessage();
            

            echo json_encode($menssage);


        break;
        
        case 'updateequipo':

            if (!isset($_GET['id'])) die;
            
            
            require 'CLASS/Equipos.php';

            $CLASS_EQUIPO=new Equipos($CONN);

            $id = $_GET['id'];     
            $name = 'nuevo campeonato1 editado';
            $tecnico = 'new tecnico editado';
            $imagen = 'newimageneditado.png';
            $create_by = 'new create_by editado';
            $campeonato = 1;

            $CLASS_EQUIPO->setId($id);
            $CLASS_EQUIPO->setName($name);
            $CLASS_EQUIPO->setTecnico($tecnico);
            $CLASS_EQUIPO->setImagen($imagen);
            $CLASS_EQUIPO->setCreate_by($create_by);
            $CLASS_EQUIPO->setCampeonato($campeonato);

            $CLASS_EQUIPO->updateEquipo();

            $menssage = $CLASS_EQUIPO->getMessage();
            
            echo json_encode($menssage);


        break;
        case 'deletecampeonato':
            require 'CLASS/Campeonatos.php';

            if (!isset($_GET['id'])) die;
            
            $id = $_GET['id'];     

            $CLASS_CAMPEONATO=new Campeonato($CONN);

            $CLASS_CAMPEONATO->setId($id);

            $CLASS_CAMPEONATO->deleteCampeonatosForId();

            $menssage = $CLASS_CAMPEONATO->getMessage();

            echo json_encode($menssage);


        break;
        case 'deleteequipo':
            if (!isset($_GET['id'])) die;
            
            
            require 'CLASS/Equipos.php';

            $CLASS_EQUIPO=new Equipos($CONN);

            $id = $_GET['id'];     

            $CLASS_EQUIPO->setId($id);

            $CLASS_EQUIPO->deleteEquipo();

            $menssage = $CLASS_EQUIPO->getMessage();
            
            echo json_encode($menssage);


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

            $ok=true;

            if (!isset($_GET['id'])) die;
            
            $id = $_GET['id'];            

            if($ok){
                

                $CLASS_CAMPEONATO=new Campeonato($CONN);

                $CLASS_CAMPEONATO->setId($id);

                $data=$CLASS_CAMPEONATO->getCampeonatosForId();
                $data['partidos']=$CLASS_CAMPEONATO->getPartidos();
                
                echo json_encode($data);

            }
        break;

        case 'autogeneratecampeonato':
            
            require 'CLASS/Campeonatos.php';

            $CLASS_CAMPEONATO=new Campeonato($CONN);

            $default_fecha=date('Y-m-d');

            $default_hora=date('h:i:s');

            
            $CLASS_CAMPEONATO->setCreate_by('user2');
            $CLASS_CAMPEONATO->setNombre('Default nombre');
            $CLASS_CAMPEONATO->setEstadio('Default estadio');
            $CLASS_CAMPEONATO->setOrganization('Default organizacion');
            $CLASS_CAMPEONATO->setSeguidores('Default seguidores');
            $CLASS_CAMPEONATO->setDescription('Default descripcion');
            $CLASS_CAMPEONATO->setTipe('Default tipe');
            $CLASS_CAMPEONATO->setSport('Default sport');
            $CLASS_CAMPEONATO->setF_inicio($default_fecha);
            $CLASS_CAMPEONATO->setF_fin($default_fecha);
            $CLASS_CAMPEONATO->setLogo("DefaultLogo.png");
            $CLASS_CAMPEONATO->setFoto_perfil('default.png');
            $CLASS_CAMPEONATO->setUbicacion('Default ubicacion');
            $CLASS_CAMPEONATO->setEstado('4');
            
            
            $CLASS_CAMPEONATO->autoGenerateCampeonato();

            $menssage = $CLASS_CAMPEONATO->getMessage();
        

            echo json_encode($menssage);

        break;

        case 'equipos':
            require 'CLASS/Equipos.php';

            $CLASS_LOGIN=new Equipos($CONN);

            $CLASS_LOGIN->setCreate_by(1);
            
            $data = $CLASS_LOGIN->getEquiposByCreator();

            echo json_encode($data);

        break;

        case 'teambychamp':
            require 'CLASS/Equipos.php';

            $CLASS_LOGIN=new Equipos($CONN);

            $CLASS_LOGIN->setCampeonato(1);
            
            $data = $CLASS_LOGIN->getEquipoByCampeonato();

            echo json_encode($data);

        break;

        case 'playerbyteam':
            require 'CLASS/Jugadores.php';

            $CLASS_LOGIN=new Jugadores($CONN);

            $CLASS_LOGIN->setEquipo(1);
            
            $data = $CLASS_LOGIN->getJugadoresByTeam();

            echo json_encode($data);

        break;

        case 'uploadimage':

            $target_dir = "IMG/";
            $target_file = $target_dir . "otronombre.".basename($_FILES["fileToUpload"]["type"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "El archivo no es una imagen.";
                    $uploadOk = 0;
                }
            }
            
            echo $target_file;
            echo "<br/>";


            
            if (file_exists($target_file)) {
                echo "Lo sentimos, este archivo ya existe.";
                $uploadOk = 0;
            }
            
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                
                echo "Lo sentimos, el archivo exede el limite de tamaño.";
                $uploadOk = 0;
            }
            
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                
                echo "Lo sentimos, solo imagenes JPG, JPEG, PNG .";
                $uploadOk = 0;
            }
            
            if ($uploadOk == 0) {
                
                echo "Error al subir el archivo.";
            
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    
                    echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " ha sido subido.";
                } else {
                    echo "Lo sentimos, hubo un error al subir tu archivo.";
                }
            }

        break;
        
        default:
            # code...
            break;
    }

    

}

