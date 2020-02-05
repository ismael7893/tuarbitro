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
                    $new_f_inicio =  $dias[date('N', strtotime($data['f_inicio']))-1];
                    $new_f_fin =  $dias[date('N', strtotime($data['f_fin']))-1];


                    $data['f_inicio'] = $new_f_inicio." ".date("d-m-Y", strtotime($data['f_inicio']));
                    $data['f_fin'] = $new_f_inicio." ".date("d-m-Y", strtotime($data['f_fin']));

                    echo json_encode($data);
                }else{

                    $menssage = $CLASS_CAMPEONATO->getMessage();

                    echo json_encode($menssage);
                }



            }

        break;

        case 'teamsbychampid':
            require 'CLASS/Campeonatos.php';
            require 'CLASS/Persona.php';


            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_CAMPEONATO=new Campeonato($CONN);
            $CLASS_PERSONA=new Persona($CONN);

            $CLASS_CAMPEONATO->setId($id);
            $data = $CLASS_CAMPEONATO->getCampeonatosForId();
            if(isset($data)){
                $user = $data['create_by'];
                $CLASS_PERSONA->setId($user);

                $persona = $CLASS_PERSONA->getPersonaForId();
                $data['create_by'] = $persona;

                $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
                $new_f_inicio =  $dias[date('N', strtotime($data['f_inicio']))];
                $new_f_fin =  $dias[date('N', strtotime($data['f_fin']))];


                $data['f_inicio'] = $new_f_inicio." ".date("d-m-Y", strtotime($data['f_inicio']));
                $data['f_fin'] = $new_f_inicio." ".date("d-m-Y", strtotime($data['f_fin']));

                $data['equipo'] = $CLASS_CAMPEONATO->getEquipos();

                echo json_encode($data);
            }else{

                $menssage = $CLASS_CAMPEONATO->getMessage();

                echo json_encode($menssage);
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
        case 'getaccessmoderador':
            require 'CLASS/Moderadores.php';

            

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_MODERADOR=new Moderadores($CONN);

            $CLASS_MODERADOR->setCampeonato($id);

            if($CLASS_MODERADOR->esModerador()){
                echo "este usuario es moderador del campeonato $id";
            }
            
            $menssage = $CLASS_MODERADOR->getMessage();

            echo json_encode($menssage);

            

        break;
        case 'searchFase':
            require 'CLASS/Fases.php';
            $CLASS_GRUPOS = new Fases($CONN);
            $id = $_GET['id'];
            //$create_by = 'user2';
            $CLASS_GRUPOS->setId($id);
            //$CLASS_GRUPOS->setCreateBy($create_by);
            $CLASS_GRUPOS->searchOne();
            $menssage = $CLASS_GRUPOS->getMessage();
            echo json_encode($menssage);
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

        case 'addnoticia':
            require 'CLASS/Noticias.php';
            
            $CLASS_NOTICIA=new Noticias($CONN);

            $campeonato = 20;
            $fecha = date('Y-m-d');
            $title = 'new noticia';
            $directorio = 'default.mp4';

            $CLASS_NOTICIA->setCampeonato($campeonato);
            $CLASS_NOTICIA->setFecha($fecha);
            $CLASS_NOTICIA->setTitle($title);
            $CLASS_NOTICIA->setDirectorio($directorio);

            $CLASS_NOTICIA->insertNoticia();

            $menssage = $CLASS_NOTICIA->getMessage();

            echo json_encode($menssage);

        break;
       
        case 'addfase':
            require 'CLASS/Fases.php';

            $CLASS_FASES=new Fases($CONN);

            $campeonato = $_GET['champions'];
            $create_by = $_GET['user'];
            $title = $_GET['title'];
            $first = $_GET['first'];
            $last = $_GET['last'];
            $playoffs = $_GET['playoffs'];

            $CLASS_FASES->setCampeonato($campeonato);
            $CLASS_FASES->setCreateBy($create_by);
            $CLASS_FASES->setTitle($title);
            $CLASS_FASES->setFirst($first);
            $CLASS_FASES->setLast($last);
            $CLASS_FASES->setPlayoffs($playoffs);

            $CLASS_FASES->insertFases();

            $menssage = $CLASS_FASES->getMessage();
            echo json_encode($menssage);
        break;

        case 'addgrupo':
            require 'CLASS/Grupos.php';

            $CLASS_GRUPOS=new Grupos($CONN);

            $campeonato = 20;
            $create_by = 'user2';

            $CLASS_GRUPOS->setCampeonato($campeonato);
            $CLASS_GRUPOS->setCreateBy($create_by);

            $CLASS_GRUPOS->insert();

            $menssage = $CLASS_GRUPOS->getMessage();

            echo json_encode($menssage);

        break;
        case 'addrankingopctions':
            require 'CLASS/Ranking_Opciones.php';

            $CLASS_GRUPOS=new Ranking_Opciones($CONN);

            $campeonato = 20;
            $create_by = 'user2';
            $puntos = 1;
            $goles_contra = 2;
            $victorias = 3;
            $diferencia_goles = 4;
            $goles_a_favor = 5;
            $conflicto = 6;
            $aprovechamiento = 7;
            $tarjeta = 8;
            $wo = 9;
            $tarjeta_roja = 10;
            $tarjeta_amarilla = 11;
            $tarjeta_azul = 12;
            $sorteo = 13;

            $CLASS_GRUPOS->setCampeonato($campeonato);
            $CLASS_GRUPOS->setCreateBy($create_by);
            $CLASS_GRUPOS->setPuntos($puntos);
            $CLASS_GRUPOS->setGoles_contra($goles_contra);
            $CLASS_GRUPOS->setVictorias($victorias);
            $CLASS_GRUPOS->setDiferencia_goles($diferencia_goles);
            $CLASS_GRUPOS->setGoles_a_favor($goles_a_favor);
            $CLASS_GRUPOS->setConflicto($conflicto);
            $CLASS_GRUPOS->setAprovechamiento($aprovechamiento);
            $CLASS_GRUPOS->setTarjeta($tarjeta);
            $CLASS_GRUPOS->setWo($wo);
            $CLASS_GRUPOS->setTarjeta_roja($tarjeta_roja);
            $CLASS_GRUPOS->setTarjeta_amarilla($tarjeta_amarilla);
            $CLASS_GRUPOS->setTarjeta_azul($tarjeta_azul);
            $CLASS_GRUPOS->setSorteo($sorteo);

            $CLASS_GRUPOS->insert();

            $menssage = $CLASS_GRUPOS->getMessage();

            echo json_encode($menssage);

        break;
        case 'addcampeonatoopciones':
            require 'CLASS/Campeonato_Opciones.php';

            $CLASS_GRUPOS=new Campeonato_Opciones($CONN);

            $campeonato = 20;
            $create_by = 'user2';
            $points_victory = 1;
            $points_draw = 1;
            $suspension_auto = 1;
            $suspension_auto2 = 1;

            $CLASS_GRUPOS->setCampeonato($campeonato);
            $CLASS_GRUPOS->setCreateBy($create_by);
            $CLASS_GRUPOS->setPoints_victory($points_victory);
            $CLASS_GRUPOS->setPoints_draw($points_draw);
            $CLASS_GRUPOS->setSuspension_auto($suspension_auto);
            $CLASS_GRUPOS->setSuspension_auto2($suspension_auto2);


            $CLASS_GRUPOS->insert();

            $menssage = $CLASS_GRUPOS->getMessage();

            echo json_encode($menssage);

        break;
        case 'addalternativa':
            require 'CLASS/Alternativas.php';

            $CLASS_GRUPOS=new Alternativas($CONN);

            $campeonato = 20;
            $create_by = 'user2';
            $encuesta = 1;
            $texto = 'alternativa 1';

            $CLASS_GRUPOS->setCampeonato($campeonato);
            $CLASS_GRUPOS->setCreateBy($create_by);
            $CLASS_GRUPOS->setEncuesta($encuesta);
            $CLASS_GRUPOS->setTexto($texto);

            $CLASS_GRUPOS->insert();

            $menssage = $CLASS_GRUPOS->getMessage();

            echo json_encode($menssage);

        break;
        case 'addencuesta':
            require 'CLASS/Encuesta.php';

            $CLASS_GRUPOS=new Encuesta($CONN);

            $campeonato = 20;
            $create_by = 'user2';
            $pregunta = 'pregunta 1';
            $publico = true;
            $v_abierta = false;
            $showresult = true;
            $one_or_many = false;

            $CLASS_GRUPOS->setCampeonato($campeonato);
            $CLASS_GRUPOS->setCreateBy($create_by);
            $CLASS_GRUPOS->setPregunta($pregunta);
            $CLASS_GRUPOS->setPublico($publico);
            $CLASS_GRUPOS->setV_abierta($v_abierta);
            $CLASS_GRUPOS->setShowresult($showresult);
            $CLASS_GRUPOS->setOne_or_many($one_or_many);

            $CLASS_GRUPOS->insert();

            $menssage = $CLASS_GRUPOS->getMessage();

            echo json_encode($menssage);

        break;
        case 'addmoderador':
            require 'CLASS/Moderadores.php';

            $CLASS_MODERADOR=new Moderadores($CONN);

            $campeonato = 20;
            $create_by = 'user2';
            $user = 'user1';
            $estado = 'ACTIVO';

            $CLASS_MODERADOR->setCampeonato($campeonato);
            $CLASS_MODERADOR->setCreateBy($create_by);
            $CLASS_MODERADOR->setUser($user);
            $CLASS_MODERADOR->setEstado($estado);

            $CLASS_MODERADOR->insert();

            $menssage = $CLASS_MODERADOR->getMessage();

            echo json_encode($menssage);

        break;
        case 'addarbitro':
            require 'CLASS/Arbitros.php';

            $CLASS_ARBITROS=new Arbitros($CONN);

            $campeonato = 20;
            $create_by = 'user2';
            $partido = 1;
            $name = 'arbitro 1';
            $funcion = 'ser arbitro';
            $imagen = 'IMG/defaultArbitro.png';

            $CLASS_ARBITROS->setCampeonato($campeonato);
            $CLASS_ARBITROS->setCreateBy($create_by);
            $CLASS_ARBITROS->setPartido($partido);
            $CLASS_ARBITROS->setNombre($name);
            $CLASS_ARBITROS->setFuncion($funcion);
            $CLASS_ARBITROS->setImagen($imagen);

            $CLASS_ARBITROS->insert();

            $menssage = $CLASS_ARBITROS->getMessage();

            echo json_encode($menssage);

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

            $name = $_GET['name'];
            $tecnico = 'sin tecnico';
            $imagen = 'perfilEquipment.jpg';
            $create_by = $_GET['user'];
            $campeonato = $_GET['champions'];

            $CLASS_EQUIPO->setName($name);
            $CLASS_EQUIPO->setTecnico($tecnico);
            $CLASS_EQUIPO->setImagen($imagen);
            $CLASS_EQUIPO->setCreate_by($create_by);
            $CLASS_EQUIPO->setCampeonato($campeonato);

            $CLASS_EQUIPO->insertEquipo();

            $menssage = $CLASS_EQUIPO->getData();

            echo json_encode($menssage);

        break;

        case 'addjugador':

            require 'CLASS/Jugadores.php';

            $CLASS_JUGADOR = new Jugadores($CONN);

            $name = $_GET['name'];
            $equipo = $_GET['idequipo'];
            $numero = '0';
            $posicion = 'sin definir';
            $documento = '00000000';
            $telefono = '0000000';
            $f_nacimiento = '1990-01-01';
            $image = 'perfilPlayer.jpg';

            $CLASS_JUGADOR->setName($name);
            $CLASS_JUGADOR->setEquipo($equipo);
            $CLASS_JUGADOR->setNumero($numero);
            $CLASS_JUGADOR->setPosicion($posicion);
            $CLASS_JUGADOR->setDocumento($documento);
            $CLASS_JUGADOR->setTelefono($telefono);
            $CLASS_JUGADOR->setF_nacimiento($f_nacimiento);
            $CLASS_JUGADOR->setImage($image);

            $CLASS_JUGADOR->insertJugador();

            $menssage = $CLASS_JUGADOR->getData();

            echo json_encode($menssage);

        break;

        case 'updatecampeonato':
            require 'CLASS/Campeonatos.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_CAMPEONATO=new Campeonato($CONN);

            $nombre = $_GET['name'];
            $estadio = $_GET['stadium'];
            $organization = $_GET['organizer'];
            $seguidores = 0;
            $description = $_GET['description'];
            $tipe = $_GET['tipe'];
            $sport = $_GET['sport'];
            $f_inicio = $_GET['dateini'];
            $f_fin = $_GET['dateFin'];
            $logo = 'logo.jpg';
            $foto_perfil = 'foto_perfil.png';
            $estado = '2';

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
        case 'updatenoticia':
            require 'CLASS/Noticias.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_NOTICIA=new Noticias($CONN);
            $campeonato = 19;
            $fecha = '2020-12-12';
            $title = 'new noticia editao';
            $directorio = 'default.mp4';

            $CLASS_NOTICIA->setId($id);
            $CLASS_NOTICIA->setCampeonato($campeonato);
            $CLASS_NOTICIA->setFecha($fecha);
            $CLASS_NOTICIA->setTitle($title);
            $CLASS_NOTICIA->setDirectorio($directorio);

            $CLASS_NOTICIA->updateNoticia();

            $menssage = $CLASS_NOTICIA->getMessage();


            echo json_encode($menssage);


        break;
        case 'updatefases':
            if (!isset($_GET['id'])) die;
            
            require 'CLASS/Fases.php';
            $CLASS_FASES=new Fases($CONN);
            
            $id = $_GET['id'];
            $campeonato = $_GET['champions'];
            $create_by = $_GET['user'];
            $title = $_GET['title'];
            $first = $_GET['first'];
            $last = $_GET['last'];
            $playoffs = $_GET['playoffs'];

            $CLASS_FASES->setId($id);
            $CLASS_FASES->setCampeonato($campeonato);
            $CLASS_FASES->setCreateBy($create_by);
            $CLASS_FASES->setTitle($title);
            $CLASS_FASES->setFirst($first);
            $CLASS_FASES->setLast($last);
            $CLASS_FASES->setPlayoffs($playoffs);

            $CLASS_FASES->updateFases();

            $menssage = $CLASS_FASES->getMessage();
            echo json_encode($menssage);
        break;
        case 'updategrupo':
            

            if (!isset($_GET['id'])) die;


            require 'CLASS/Grupos.php';

            $CLASS_GRUPOS=new Grupos($CONN);

            $id = $_GET['id'];
            $cantidad = 4;
            
            $CLASS_GRUPOS->setId($id);
            $CLASS_GRUPOS->setCantidad($cantidad);

            $CLASS_GRUPOS->update();

            $menssage = $CLASS_GRUPOS->getMessage();


            echo json_encode($menssage);


        break;
        case 'updaterankingoptions':
            

            if (!isset($_GET['id'])) die;


            require 'CLASS/Ranking_Opciones.php';

            $CLASS_GRUPOS=new Ranking_Opciones($CONN);

            $id = $_GET['id'];
            
            $puntos = 2;
            $goles_contra = 1;
            $victorias = 3;
            $diferencia_goles = 4;
            $goles_a_favor = 5;
            $conflicto = 6;
            $aprovechamiento = 7;
            $tarjeta = 8;
            $wo = 9;
            $tarjeta_roja = 11;
            $tarjeta_amarilla = 10;
            $tarjeta_azul = 12;
            $sorteo = 13;
            
            $CLASS_GRUPOS->setId($id);
            $CLASS_GRUPOS->setPuntos($puntos);
            $CLASS_GRUPOS->setGoles_contra($goles_contra);
            $CLASS_GRUPOS->setVictorias($victorias);
            $CLASS_GRUPOS->setDiferencia_goles($diferencia_goles);
            $CLASS_GRUPOS->setGoles_a_favor($goles_a_favor);
            $CLASS_GRUPOS->setConflicto($conflicto);
            $CLASS_GRUPOS->setAprovechamiento($aprovechamiento);
            $CLASS_GRUPOS->setTarjeta($tarjeta);
            $CLASS_GRUPOS->setWo($wo);
            $CLASS_GRUPOS->setTarjeta_roja($tarjeta_roja);
            $CLASS_GRUPOS->setTarjeta_amarilla($tarjeta_amarilla);
            $CLASS_GRUPOS->setTarjeta_azul($tarjeta_azul);
            $CLASS_GRUPOS->setSorteo($sorteo);

            $CLASS_GRUPOS->update();

            $menssage = $CLASS_GRUPOS->getMessage();


            echo json_encode($menssage);


        break;
        case 'updatecampeonatoopciones':
            

            if (!isset($_GET['id'])) die;


            require 'CLASS/Campeonato_Opciones.php';

            $CLASS_GRUPOS=new Campeonato_Opciones($CONN);

            $id = $_GET['id'];
            
            $points_victory = 2;
            $points_draw = 2;
            $suspension_auto = 2;
            $suspension_auto2 = 2;
            
            $CLASS_GRUPOS->setId($id);
            $CLASS_GRUPOS->setPoints_victory($points_victory);
            $CLASS_GRUPOS->setPoints_draw($points_draw);
            $CLASS_GRUPOS->setSuspension_auto($suspension_auto);
            $CLASS_GRUPOS->setSuspension_auto2($suspension_auto2);


            $CLASS_GRUPOS->update();

            $menssage = $CLASS_GRUPOS->getMessage();


            echo json_encode($menssage);


        break;
        case 'updatealternativa':
            

            if (!isset($_GET['id'])) die;


            require 'CLASS/Alternativas.php';

            $CLASS_GRUPOS=new Alternativas($CONN);

            $id = $_GET['id'];
            $texto = 'texto editadoaaaaaaaaa';
            
            $CLASS_GRUPOS->setId($id);
            $CLASS_GRUPOS->setTexto($texto);

            $CLASS_GRUPOS->update();

            $menssage = $CLASS_GRUPOS->getMessage();


            echo json_encode($menssage);


        break;
        case 'updateencuesta':
            

            if (!isset($_GET['id'])) die;


            require 'CLASS/Encuesta.php';

            $CLASS_GRUPOS=new Encuesta($CONN);

            $id = $_GET['id'];

            $pregunta = 'pregunta 1 editado';
            $publico = true;
            $v_abierta = false;
            $showresult = true;
            $one_or_many = false;

            $CLASS_GRUPOS->setId($id);
            $CLASS_GRUPOS->setPregunta($pregunta);
            $CLASS_GRUPOS->setPublico($publico);
            $CLASS_GRUPOS->setV_abierta($v_abierta);
            $CLASS_GRUPOS->setShowresult($showresult);
            $CLASS_GRUPOS->setOne_or_many($one_or_many);

            $CLASS_GRUPOS->update();

            $menssage = $CLASS_GRUPOS->getMessage();


            echo json_encode($menssage);


        break;
        case 'updatemoderador':
            

            if (!isset($_GET['id'])) die;


            require 'CLASS/Moderadores.php';

            $CLASS_MODERADOR=new Moderadores($CONN);

            $id = $_GET['id'];
            $estado = 'DESHABILITADO';
            
            $CLASS_MODERADOR->setId($id);
            $CLASS_MODERADOR->setEstado($estado);

            $CLASS_MODERADOR->update();

            $menssage = $CLASS_MODERADOR->getMessage();


            echo json_encode($menssage);


        break;
        case 'updatearbitro':
            

            if (!isset($_GET['id'])) die;


            require 'CLASS/Arbitros.php';

            $CLASS_GRUPOS=new Arbitros($CONN);

            $id = $_GET['id'];
            $partido = 5;
            
            $CLASS_GRUPOS->setId($id);
            $CLASS_GRUPOS->setPartido($partido);

            $CLASS_GRUPOS->update();

            $menssage = $CLASS_GRUPOS->getMessage();


            echo json_encode($menssage);


        break;

        case 'changeestado':
            require 'CLASS/Campeonatos.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_CAMPEONATO=new Campeonato($CONN);

            $estado = '3';

            $CLASS_CAMPEONATO->setId($id);
            $CLASS_CAMPEONATO->setEstado($estado);

            $CLASS_CAMPEONATO->changeEstado();

            $menssage = $CLASS_CAMPEONATO->getMessage();


            echo json_encode($menssage);


        break;

        case 'updateequipo':

            if (!isset($_GET['id'])) die;
            require 'CLASS/Equipos.php';
            $CLASS_EQUIPO=new Equipos($CONN);

            $id = $_GET['id'];
            $name = $_GET['name'];
            $tecnico = $_GET['tecnico'];
            $imagen = $_GET['imagen'];
            $create_by = $_GET['create_by'];
            $campeonato = $_GET['campeonato'];

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

        case 'updatejugador':

            if (!isset($_GET['id'])) die;

            require 'CLASS/Jugadores.php';

            $CLASS_JUGADOR=new Jugadores($CONN);

            $id = $_GET['id'];
            $name = $_GET['nam'];
            $equipo = $_GET['equipment'];
            $numero = $_GET['num'];
            $posicion = $_GET['position'];
            $documento = $_GET['document'];
            $telefono = $_GET['phone'];
            $f_nacimiento = $_GET['date_nac'];
            $image = $_GET['photo'];

            $CLASS_JUGADOR->setId($id);
            $CLASS_JUGADOR->setName($name);
            $CLASS_JUGADOR->setEquipo($equipo);
            $CLASS_JUGADOR->setNumero($numero);
            $CLASS_JUGADOR->setPosicion($posicion);
            $CLASS_JUGADOR->setDocumento($documento);
            $CLASS_JUGADOR->setTelefono($telefono);
            $CLASS_JUGADOR->setF_nacimiento($f_nacimiento);
            $CLASS_JUGADOR->setImage($image);

            $CLASS_JUGADOR->updateJugador();

            $menssage = $CLASS_JUGADOR->getMessage();

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

        case 'deletenoticia':
            require 'CLASS/Noticias.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_NOTICIA=new Noticias($CONN);

            $CLASS_NOTICIA->setId($id);

            $CLASS_NOTICIA->deleteNoticia();

            $menssage = $CLASS_NOTICIA->getMessage();


            echo json_encode($menssage);


        break;
        case 'deletefases':
            require 'CLASS/Fases.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_FASES=new Fases($CONN);

            $CLASS_FASES->setId($id);

            $CLASS_FASES->deleteFases();

            $menssage = $CLASS_FASES->getMessage();


            echo json_encode($menssage);


        break;
        case 'deletegrupo':
            require 'CLASS/Grupos.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_GRUPO=new Grupos($CONN);

            $CLASS_GRUPO->setId($id);

            $CLASS_GRUPO->delete();

            $menssage = $CLASS_GRUPO->getMessage();


            echo json_encode($menssage);


        break;
        case 'deleterankingoptions':
            require 'CLASS/Ranking_Opciones.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_GRUPO=new Ranking_Opciones($CONN);

            $CLASS_GRUPO->setId($id);

            $CLASS_GRUPO->delete();

            $menssage = $CLASS_GRUPO->getMessage();


            echo json_encode($menssage);


        break;
        case 'deleteocampeonatoopciones':
            require 'CLASS/Campeonato_Opciones.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_GRUPO=new Campeonato_Opciones($CONN);

            $CLASS_GRUPO->setId($id);

            $CLASS_GRUPO->delete();

            $menssage = $CLASS_GRUPO->getMessage();


            echo json_encode($menssage);


        break;
        case 'deletealternativa':
            require 'CLASS/Alternativas.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_GRUPO=new Alternativas($CONN);

            $CLASS_GRUPO->setId($id);

            $CLASS_GRUPO->delete();

            $menssage = $CLASS_GRUPO->getMessage();


            echo json_encode($menssage);


        break;
        case 'deleteencuesta':
            require 'CLASS/Encuesta.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_GRUPO=new Encuesta($CONN);

            $CLASS_GRUPO->setId($id);

            $CLASS_GRUPO->delete();

            $menssage = $CLASS_GRUPO->getMessage();


            echo json_encode($menssage);


        break;
        case 'deletemoderador':
            require 'CLASS/Moderadores.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_MODERADOR=new Moderadores($CONN);

            $CLASS_MODERADOR->setId($id);

            $CLASS_MODERADOR->delete();

            $menssage = $CLASS_MODERADOR->getMessage();


            echo json_encode($menssage);


        break;
        case 'deletearbitro':
            require 'CLASS/Arbitros.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $ARBITRO=new Arbitros($CONN);

            $ARBITRO->setId($id);

            $ARBITRO->delete();

            $menssage = $ARBITRO->getMessage();


            echo json_encode($menssage);


        break;
        case 'deletejugador':
            require 'CLASS/Jugadores.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];

            $CLASS_JUGADOR=new Jugadores($CONN);

            $CLASS_JUGADOR->setId($id);

            $CLASS_JUGADOR->deleteJugador();

            $menssage = $CLASS_JUGADOR->getMessage();

            echo json_encode($menssage);


        break;
        case 'changeteam':
            require 'CLASS/Jugadores.php';

            if (!isset($_GET['id'])) die;

            $id = $_GET['id'];
            $equipo = 2;

            $CLASS_JUGADOR=new Jugadores($CONN);

            $CLASS_JUGADOR->setId($id);
            $CLASS_JUGADOR->setEquipo($equipo);

            $CLASS_JUGADOR->changeTeam();

            $menssage = $CLASS_JUGADOR->getMessage();

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

        case 'likenoticia':

            if (!isset($_GET['noticia'])) die;
            if (!isset($_GET['idUser'])) die;

            require 'CLASS/Noticia_Like.php';
            require 'CLASS/Noticias.php';


            $CLASS_NOTICIA_LIKE=new Noticia_Like($CONN);
            $CLASS_NOTICIA=new Noticias($CONN);


            $noticia = $_GET['noticia'];
            $idUser = $_GET['idUser'];

            $CLASS_NOTICIA_LIKE->setUser($idUser);
            $CLASS_NOTICIA_LIKE->setNoticia($noticia);

            $ok = $CLASS_NOTICIA_LIKE->getNoticiaLike();

            if($ok){
                $CLASS_NOTICIA_LIKE->insertNoticiaLike();

                $CLASS_NOTICIA->setId($noticia);
                $CLASS_NOTICIA->changeLikeNoticia();

            }

            $menssage = $CLASS_NOTICIA_LIKE->getMessage();

            echo json_encode($menssage);

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

        case 'listrankingopctions':
            require 'CLASS/Ranking_Opciones.php';

            $CLASS_GRUPOS=new Ranking_Opciones($CONN);

            $campeonato = 20;
            //$create_by = 'user2';
            
            $CLASS_GRUPOS->setCampeonato($campeonato);
            //$CLASS_GRUPOS->setCreateBy($create_by);

            $CLASS_GRUPOS->listar();

            $menssage = $CLASS_GRUPOS->getMessage();

            echo json_encode($menssage);

        break;
        case 'listcampeonatoopciones':
            require 'CLASS/Campeonato_Opciones.php';

            $CLASS_GRUPOS=new Campeonato_Opciones($CONN);

            $campeonato = 20;
            //$create_by = 'user2';
            
            $CLASS_GRUPOS->setCampeonato($campeonato);
            //$CLASS_GRUPOS->setCreateBy($create_by);

            $CLASS_GRUPOS->listar();

            $menssage = $CLASS_GRUPOS->getMessage();

            echo json_encode($menssage);

        break;
        case 'listarbitro':
            require 'CLASS/Arbitros.php';

            $CLASS_GRUPOS=new Arbitros($CONN);

            $campeonato = 20;
            //$create_by = 'user2';
            
            $CLASS_GRUPOS->setCampeonato($campeonato);
            //$CLASS_GRUPOS->setCreateBy($create_by);

            $CLASS_GRUPOS->listar();

            $menssage = $CLASS_GRUPOS->getMessage();

            echo json_encode($menssage);

        break;
        case 'listmoderadores':
            require 'CLASS/Moderadores.php';

            $CLASS_GRUPOS=new Moderadores($CONN);

            $campeonato = 20;
            //$create_by = 'user2';
            
            $CLASS_GRUPOS->setCampeonato($campeonato);
            //$CLASS_GRUPOS->setCreateBy($create_by);

            $CLASS_GRUPOS->listar();

            $menssage = $CLASS_GRUPOS->getMessage();

            echo json_encode($menssage);

        break;
        case 'listencuesta':
            require 'CLASS/Encuesta.php';

            $CLASS_GRUPOS=new Encuesta($CONN);

            $campeonato = 20;
            //$create_by = 'user2';
            
            $CLASS_GRUPOS->setCampeonato($campeonato);
            //$CLASS_GRUPOS->setCreateBy($create_by);

            $CLASS_GRUPOS->listar();

            $menssage = $CLASS_GRUPOS->getMessage();

            echo json_encode($menssage);

        break;
        case 'listencuestaalternativas':
            require 'CLASS/Alternativas.php';

            $CLASS_GRUPOS=new Alternativas($CONN);

            $campeonato = 20;
            //$create_by = 'user2';
            
            $CLASS_GRUPOS->setCampeonato($campeonato);
            //$CLASS_GRUPOS->setCreateBy($create_by);

            $CLASS_GRUPOS->listar();

            $menssage = $CLASS_GRUPOS->getMessage();

            echo json_encode($menssage);

        break;
        case 'listfases':
            require 'CLASS/Fases.php';
            $CLASS_GRUPOS=new Fases($CONN);
            $campeonato = $_GET['champions'];
            //$create_by = 'user2';
            $CLASS_GRUPOS->setCampeonato($campeonato);
            //$CLASS_GRUPOS->setCreateBy($create_by);
            $CLASS_GRUPOS->listar();
            $menssage = $CLASS_GRUPOS->getMessage();
            echo json_encode($menssage);
        break;
        case 'listgrupo':
            require 'CLASS/Grupos.php';

            $CLASS_GRUPOS=new Grupos($CONN);

            $campeonato = 20;
            //$create_by = 'user2';
            
            $CLASS_GRUPOS->setCampeonato($campeonato);
            //$CLASS_GRUPOS->setCreateBy($create_by);

            $CLASS_GRUPOS->listar();

            $menssage = $CLASS_GRUPOS->getMessage();

            echo json_encode($menssage);

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

            $CLASS_CAMPEONATO->setCreate_by($_GET['idUser']);
            $CLASS_CAMPEONATO->setNombre($_GET['name']);
            $CLASS_CAMPEONATO->setEstadio($_GET['stadius']);
            $CLASS_CAMPEONATO->setOrganization($_GET['organizer']);
            $CLASS_CAMPEONATO->setSeguidores(0);
            $CLASS_CAMPEONATO->setDescription($_GET['description']);
            $CLASS_CAMPEONATO->setTipe($_GET['tipe']);
            $CLASS_CAMPEONATO->setSport($_GET['sport']);
            $CLASS_CAMPEONATO->setF_inicio($_GET['date_ini']);
            $CLASS_CAMPEONATO->setF_fin($_GET['date_fin']);
            $CLASS_CAMPEONATO->setLogo("DefaultLogo.jpg");
            $CLASS_CAMPEONATO->setFoto_perfil('default.jpg');
            $CLASS_CAMPEONATO->setUbicacion($_GET['ubication']);
            $CLASS_CAMPEONATO->setEstado('2');


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

        case 'listestados':
            require 'CLASS/Estado.php';

            $CLASS_ESTADO=new Estado($CONN);

            $data = $CLASS_ESTADO->listEstados();

            echo json_encode($data);

        break;

        case 'teambychamp':
            require 'CLASS/Equipos.php';

            $CLASS_LOGIN=new Equipos($CONN);

            $CLASS_LOGIN->setCampeonato($_GET['id']);

            $data = $CLASS_LOGIN->getEquipoByCampeonato();

            echo json_encode($data);

        break;

        case 'playerbyteam':

            if (!isset($_GET['id'])) die;

            require_once 'CLASS/Jugadores.php';

            $CLASS_LOGIN=new Jugadores($CONN);


            $id = $_GET['id'];

            $CLASS_LOGIN->setEquipo($id);

            $data = $CLASS_LOGIN->getJugadoresByTeam();

            echo json_encode($data);
            // echo "asdfasd";
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

        case 'player':
            require 'CLASS/Jugadores.php';

            if (!isset($_GET['id'])) die;

            $CLASS_LOGIN = new Jugadores($CONN);

            $id = $_GET['id'];

            $CLASS_LOGIN->setEquipo($id);

            $data = $CLASS_LOGIN->getJugador();

            echo json_encode($data);

            break;
        default:
            echo 'operation undefied';
            break;
    }



} else{
    echo '$_GET["type"] no existe';
}
