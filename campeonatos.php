<?php 

include('WS/CLASS/DBase.php');
require 'WS/CLASS/Campeonatos.php';
require 'WS/CLASS/Premios.php';
require 'WS/CLASS/Persona.php';
require 'WS/CLASS/Equipos.php';

$CONN=\DBase::Conect();



$ok=true;

$id = 1;            

if($ok){
    

    $CLASS_CAMPEONATO=new Campeonato($CONN);
    $CLASS_PREMIO=new Premios($CONN);
    $CLASS_PERSONA=new Persona($CONN);
    $CLASS_EQUIPO=new Equipos($CONN);

    $CLASS_CAMPEONATO->setId($id);
    $CLASS_PREMIO->setCampenato($id);
    


    $list_campeonatos = $CLASS_CAMPEONATO->getCampeonatosForId();
    $list_premios = $CLASS_PREMIO->getPremiossForId();
    $list_campeonatos['partidos'] = $CLASS_CAMPEONATO->getPartidos();

    $idUser=  $list_campeonatos["create_by"];  
    
    $CLASS_PERSONA->setId($idUser);

    $data_user = $CLASS_PERSONA->getPersonaForId();


    $titulo=  $list_campeonatos["nombre"];  
    $subtitulo= $list_campeonatos["estadio"];
    $logo= $list_campeonatos["foto_perfil"]; 

    $portada= $list_campeonatos["logo"]; 
    $portada= "imgs/$portada"; 

    $organizador= $list_campeonatos["organization"]; 
    $fecha_inicio= $list_campeonatos["f_inicio"]; 
    $fecha_fin= $list_campeonatos["f_fin"]; 
    //var_dump($list_premios);
    
    $premio1= $list_premios[0]["description"]; 
    $premio2= $list_premios[1]["description"]; 
    $premio3= $list_premios[2]["description"]; 
    $premio4= $list_premios[3]["description"];

    //var_dump($data_user);
    $name_user = $data_user['NAME'];
    $correo_user = $data_user['email'];

    //CONTINUAR
    //FALTA EXTRAER LA DATA DE CADA EQUIPO POR ID
    //EL ID ME DA LA CLASE partidos

    var_dump( $list_campeonatos['partidos'] );

    $CONN = null;
    //echo json_encode($list_campeonatos);

}
?>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- js creado por alex-->
       <script type="text/javascript" src="funcions.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <title>CAMPEONATOS</title>
        <style type="text/css">
      html, body, #basicMap {
          width: 100%;
          height: 100%;
          margin: 0;
      }
    </style>
    <script src="OpenLayers.js"></script>
    <script>
      function init() {
        map = new OpenLayers.Map("basicMap");
        var mapnik         = new OpenLayers.Layer.OSM();
        var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
        var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
        var position       = new OpenLayers.LonLat(13.41,52.52).transform( fromProjection, toProjection);
        var zoom           = 15; 

        map.addLayer(mapnik);
        map.setCenter(position, zoom );
      }
    </script>
  </head>
  <body onload="init();">
      <?php


  ?>    
   <div class="jumbotron text-center" style="background: url('<?php echo $portada; ?>');">
  <h1><?php echo $titulo; ?></h1>
  <p><?php echo $subtitulo; ?></p>

</div>
<!-- Centered Tabs -->
<div style="background: red; margin-top: -35px; height: 44px;" >
     <div class="dropdown">
     <div class="container">
   <div class="row">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" list_campeonatos-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#" list_campeonatos-toggle="modal"  list_campeonatos-target="#exampleModal">Detalle del campeonato</a>
    <a class="dropdown-item" href="#" list_campeonatos-toggle="modal" list_campeonatos-target="#equipos">Editar equipos</a>
    <a class="dropdown-item" href="#"list_campeonatos-toggle="modal" list_campeonatos-target="#inscripciones">Editar inscripciones</a>
     <a class="dropdown-item" href="#"list_campeonatos-toggle="modal" list_campeonatos-target="#fases">Editar Fases</a>
    <a class="dropdown-item" href="#"list_campeonatos-toggle="modal" list_campeonatos-target="#grupos">Editar Grupos</a>
    <a class="dropdown-item" href="#"list_campeonatos-toggle="modal" list_campeonatos-target="#opciones">Editar Opciones del deporte</a>
     <a class="dropdown-item" href="#" list_campeonatos-toggle="modal" list_campeonatos-target="#arbitraje">Arbitraje y Lugares</a>
    <a class="dropdown-item" href="#"list_campeonatos-toggle="modal" list_campeonatos-target="#encuesta">Ranking y Encuestas</a>
    <a class="dropdown-item" href="#" list_campeonatos-toggle="modal" list_campeonatos-target="#modeladores">Modeladores y visualizaciones</a>
    <a class="dropdown-item" href="#"list_campeonatos-toggle="modal" list_campeonatos-target="#auspiciadores">Editar patrocinios</a>
    <a class="dropdown-item" href="#"list_campeonatos-toggle="modal" list_campeonatos-target="#planes">Planes de suscripción</a>
  </div>
    <div class="col-sm-10">
<ul class="nav nav-tabs nav-justified" style="padding: 10px; border: none;">
  <li class="active" ><a href="#" style="padding: 10px; color: white t; margin-left: 200px;">INICIO</a></li>
  <li><a href="#" style="padding: 10px; color: white;">CLASIFICACIÓN</a></li>
  <li><a href="#" style="padding: 10px; color: white;">FOTOS VÍDEOS Y NOTICIAS</a></li>
  <li><a href="#" style="padding: 10px; color: white;">RANKINGS Y ENCUESTAS</a></li>
</ul>
</div>
 </div>
</div>

</div>
</div>
<div class="container" style="padding-top: 50px;">
<div class="row" style="background: black;">

        <div class="col-sm-4">
<ul class="nav nav-tabs nav-justified" style="padding: 2px; border: none;">
  
</ul>
</div>
</div>
  <!-- modal editar campeonato-->
<div class="modal fade" id="equipos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Equipos</h5>
        <button type="button" class="close" list_campeonatos-dismiss="modal" list_campeonatos-toggle="modal" list_campeonatos-target="#exampleModal5" aria-label="Close">
        <input type="button" class="btn btn-primary" value="Agregar equipos">
          <span aria-hidden="true">&times;</span>
        </button>
           </div>
        <div class="input-group">
         <div  class="input-group-prepend">
             <button class="btn btn-outline-secondary" type="button" title="Mis equipos">Descargar</button>
             </div>
        <div class="input-group-prepend"><span  class="input-group-text">Nombre:</span>
          </div><input class="form-control" type="text">
          <div class="input-group-append"><button  class="btn btn-outline-secondary small" type="button">AGREGAR</button></div></div>
   
      <div class="modal-body">

        <!-- Default input  -->
        <div  class="list">
       <ul>
     <li class="ng-star-inserted">
    <img src="assets/images/logo2.png">
    <h4>aass</h4><p ><!----><spanclass="ng-star-inserted">Grupo: B </span><!---->
<span  class="ng-star-inserted"> - </span><!----><span  class="ng-star-inserted">8 Jugadores </span></p>
</li><li class="ng-star-inserted"><img src="assets/images/logo2.png"><h4 >alee</h4>
<p><!----><span class="ng-star-inserted">Grupo: A </span>
</p></li></ul></div>
        
      </div>
  </div>
  </div>
</div>
 <!-- modal-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar</h5>
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Default input -->
<label for="exampleForm2">Usuario</label>
<input type="text" id="exampleForm2" class="form-control">
<label for="exampleForm2">Contrasena</label>
<input type="password" id="exampleForm3" class="form-control">

             <div class="row">
         <div class="col-sm-12">
                <button type="button" class="btn btn-primary" style="width: 100%; margin-top:15px;">Ingresar</button>
          </div>
            <div class="col-sm-12">
        <button type="button" class="btn btn-primary" style="width: 100%; margin-top:15px;  margin-bottom:15px;">Registrar</button>
        </div>
      </div>
      </div>
  </div>
  </div>
</div>
 <!-- modal fase-->
 <div class="modal fade" id="fases" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar faces</h5>
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Default input -->
       <div class="modal-body">
           <ul class="list-group"><!---->
            <li class="list-group-item list-group-item-action mousePoi">Fase 1</li>
             <li  class="list-group-item list-group-item-action mousePoi" list_campeonatos-toggle="modal" list_campeonatos-target="#editfase"></li>
             </ul>
           </div>
      </div>
      <div class="modal-footer"> 
       <button  class="btn btn-outline-secondary" style="float: right" list_campeonatos-toggle="modal" list_campeonatos-target="#editfase" type="button">Agregar</button></div>
  </div>
  </div>
</div>
 <!--editar fase-->
 <div class="modal fade" id="editfase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fase</h5>
      </div>
      <div class="modal-body">
      <form style="margin:20px;">
  
  <div class="form-group">
    <label for="inputAddress">Titulo</label>
    <input type="text" class="form-control" id="inputAddress" >
  </div>
  <div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" id="customSwitch1">
  <label class="custom-control-label" for="customSwitch1">Puntos total</label>
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Destacar primeros</label>
       <select class="custom-select" id="validationCustom04" required>
        <option selected disabled value="">0</option>
         <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Destacar ultimos</label>
       <select class="custom-select" id="validationCustom04" required>
         <option selected disabled value="">0</option>
          <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
      </select>
      </select>
    </div>
  </div>
 <div style="display: flex;padding: 8px;justify-content: space-between;margin-top:16px ;"><button class="btn btn-outline-secondary" style="margin: 0px; ">Copiar tabla</button><button class="btn btn-outline-secondary" style="margin: 0px;" disabled="">Restablecer tabla</button>
 <button class="btn btn-outline-secondary">Seleccionar equipos</button></div>
 <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Mostrar hilo de las eliminatorias
  </label>
</div>
<br>
<div class="modal-footer">
   <button type="button" class="btn btn-danger">Eliminar fase</button> 
   <button type="button" class="btn btn-success">Guardar</button> 
</div>
</form>
      </div>
  </div>
  </div>
</div>
 <!--modal--->
 
 <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar</h5>
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Default input -->
<label for="exampleForm2">Usuario</label>
<input type="text" id="exampleForm2" class="form-control">
<label for="exampleForm2">Contrasena</label>
<input type="password" id="exampleForm3" class="form-control">

             <div class="row">
         <div class="col-sm-12">
                <button type="button" class="btn btn-primary" style="width: 100%; margin-top:15px;">Ingresar</button>
          </div>
            <div class="col-sm-12">
        <button type="button" class="btn btn-primary" style="width: 100%; margin-top:15px;  margin-bottom:15px;">Registrar</button>
        </div>
      </div>
      </div>
  </div>
  </div>
</div>

 <!--modal--->
 
 <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario De Los Equipos</h5>
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group my-9">
     <form id="formulario" class="m-3" style="display:none;" >
    <button type="button" class="close" list_campeonatos-dismiss="modal"  onclick="cancelar();"aria-label="Close">
     <span aria-hidden="true">&times;</span>
     </button>
  <div class="form-group">
    <h4>Nombre del campo</h4>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nombre del campo">
  </div>
  <div class="form-group">
    <h4>Tipo de campo</h4>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Texto</option>
      <option>Adjunto</option>
      <option>Completo</option>
      <option>fecha</option>
      <option>Casilla de seleccion</option>
    </select>
  </div>
   <div class="form-group">
    <h4>Descripcion</h4>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Descripcion">
  </div>
</form>
  
    <div class="row" >
         <input class="btn btn-success" style=" margin: 20px;"type="button" value="Adicionar campo"onclick="agregar();">
         
          <input class="btn btn-success" style=" margin: 20px;" type="button" list_campeonatos-toggle="modal" list_campeonatos-target="#categoria1" value="Agregar categoria">
      </div>
      </div>
  </div>
  </div>
</div>
</div>
<!--modal categoria--->
 
 <div class="modal fade" id="categoria1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar categorias</h5>
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="categoria" class="m-3">
     <h2 class="modal-title">Categoria</h2>
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
        </button>
        <hr>
         <div class="form-group">
        <h4>Nombre del campo</h4>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nombre del campo">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" list_campeonatos-dismiss="modal" >Guardar</button>
        <button type="button" class="btn btn-primary" onclick="eliminar();">Cancelar</button>
      </div>
    </div>
    </form>
      </div>
  </div>
 


 <!--modal modeladores--->
 
 <div class="modal fade" id="modeladores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div ""><section class="cf-main__section"><header class="cf-main__section-header">
             <h4  class="cf-title">Moderadores</h4></header><ul class="list-group"><!----></ul>
             <div style="display: block;text-align:right ">
                 <button class="btn btn-outline-secondary small" list_campeonatos-toggle="modal" list_campeonatos-target="#agrmoderadores">AGREGAR</button></div></section><!---->
                 <section class="cf-main__section">
                     <header class="cf-main__section-header"><h4  class="cf-title">Accesos</h4></header>
                     <ul class="list-group"><li class="list-group-item">Total de visualizaciones: 20</li>
                     <li  class="list-group-item">Visualizaciones anónimas: 20</li>
                     <li  class="list-group-item">Visualizaciones de usuarios: 0</li>
                     <li class="list-group-item">Usuarios distintos: 0</li></ul></section><!----><section _ngcontent-qow-c13="" class="cf-main__section">
                         <header class="cf-main__section-header"><h4 class="cf-title">Seguidores</h4></header>
         <button _ngcontent-qow-c13="" class="btn btn-outline-secondary small">VISUALIZAR</button></section></div>
      </div>
  </div>
  </div>
</div>
 <!--modal agregar moderadores--->
 
 <div class="modal fade" id="agrmoderadores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Moderadores</h5>
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="ml-2 mr-2 mt-2" >
      <div class="form-group">
    <h5>Usuario/email</h5>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword">
    </div>
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-light" value="Adición de los seguidores">
     <input type="button" class="btn btn-light" value="Agregar">

    </div>
   </form> 
      </div>
  </div>
  </div>
</div>
<!--modal auspisiadores--->
     <div class="modal fade" id="auspiciadores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <div  style="display: flex;position: absolute;top: 16px;right:16px;">
            <i  class="material-icons mousePoi edit" title="Importar">file_download</i></div>
        <h4  class="modal-title">EDITAR PATROCINIOS</h4>
      </div>
      <div class="modal-body">

        <!-- Default input -->
        <div class="modal-body"><!---->
        <p  style="text-align: center;">Campeonato no posee patrocinios</p>
        <ul class="list-group"><!----></ul></div>
      </div>
      <div  class="modal-footer">
          <button class="btn btn-outline-secondary"list_campeonatos-toggle="modal" list_campeonatos-target="#patrocinio1"style="float: right" type="button">Agregar</button></div>
  </div>
  </div>
</div>
 <!-- modal editar patrocinadores-->
 <div class="modal fade" id="patrocinio1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Patrocinio</h5>
      </div>
      <div class="modal-body">
       <form id="formulario1" style=" margin:15px;" >
  <div class="form-row">
    <div class="form-group col-md-5">
      <input type="file" class="form-control-file"  required="true"id="inputEmail4">
    </div>
    <div class="form-group col-md-7">
      <input type="password" class="form-control" id="inputPassword4">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Telfono</label>
    <input type="number" class="form-control" id="telefono" placeholder="Telefono">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Sitio WEB</label>
    <input type="text" class="form-control" id="web" placeholder="sitio web">
  </div>
    <hr>
    <div class="form-group">
      <label for="inputCity">Baner del citio</label>
      <input type="file" class="form-control-file"  required="true"id="inputEmail4">
    </div>
    <hr>
    <div class="form-group ">
      <label for="inputState">Banner de la palicacion</label>
       <input type="file" class="form-control-file"  required="true"id="inputEmail4">
      </select>
    </div>
    <div class="modal-footer">
  <button type="submit" class="btn btn-success">Guardar</button>
  </div>
</form>
      
      </div>
  </div>
  </div>
</div>
<!--modalplanes--->
     <div class="modal fade-xl" id="planes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar</h5>
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
          <div class="row">
          <div class="card" style="width: 18rem;">
       <img src="https://d2x3xhvgiqkx42.cloudfront.net/12345678-1234-1234-1234-1234567890ab/35eb8f38-063e-406c-972a-3d3f8fa99412/2018/10/25/327191e3-a559-416d-8e53-2397a7684c65.png" class="card-img-top" alt="...">
       <div class="card-body">
        <h5 class="card-title">Card title</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Elegir</a>
        </div>
         </div>
         <div class="card" style="width: 18rem;">
       <img src="https://d2x3xhvgiqkx42.cloudfront.net/12345678-1234-1234-1234-1234567890ab/35eb8f38-063e-406c-972a-3d3f8fa99412/2018/10/25/327191e3-a559-416d-8e53-2397a7684c65.png" class="card-img-top" alt="...">
       <div class="card-body">
        <h5 class="card-title">Card title</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Elegir</a>
        </div>
         </div>
         <div class="card" style="width: 18rem;">
       <img src="https://d2x3xhvgiqkx42.cloudfront.net/12345678-1234-1234-1234-1234567890ab/35eb8f38-063e-406c-972a-3d3f8fa99412/2018/10/25/327191e3-a559-416d-8e53-2397a7684c65.png" class="card-img-top" alt="...">
       <div class="card-body">
        <h5 class="card-title">Card title</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Elegir</a>
        </div>
         </div>
         <div class="card" style="width: 18rem;">
       <img src="https://d2x3xhvgiqkx42.cloudfront.net/12345678-1234-1234-1234-1234567890ab/35eb8f38-063e-406c-972a-3d3f8fa99412/2018/10/25/327191e3-a559-416d-8e53-2397a7684c65.png" class="card-img-top" alt="...">
       <div class="card-body">
        <h5 class="card-title">Card title</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Elegir</a>
        </div>
         </div>
         </div>
      </div>
  </div>
  </div>
</div>
    
<!--modalconfiguraciones--->

 
 <div class="modal fade" id="inscripciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div role="document" class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
    <app-edit-inscriptions  class="component-host-scrollable"><!---->
    <div class="modal-header" style="border-bottom:none ;">
    <div style="display: flex;position: absolute;top: 16px;right:16px;">
         <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div><ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 100%;">
        <li  class="nav-item"><a class="nav-link cf-uppercase active">Configuraciones</a></li>
    <li class="nav-item"><a class="nav-link cf-uppercase">Inscripciones</a></li></ul></div><!---->
    <div class="modal-body"><!----><label class="cf-toogle-wrap">
    <input  class="cf-toogle" type="checkbox">
    <div class="cf-toogle-label">Inscripciones abiertas</div></label><!----><div class="form-group">
        <label  for="info">Información</label><!---->
        <textarea  class="form-control" id="info" rows="3" placeholder="Información sobre la inscripción"></textarea>
        </div><!----><div class="cf-match__section"><!----><h4 class="cf-title"> Formulario de los equipos </h4><!----><!---->
        <div ><h5  class="cf-subtitle"> <!----></h5><!----><div style="display: flex;justify-content: space-between;">
            <form style="border-radius: 8px; margin-top: 20px;border-color:black 5px solid; background-color:#F0EEEE ; display:none;" >
        <div class="form-group">
    <label for="formGroupExampleInput">Nombre del campeonato</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nombre del campo">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Tipo de campo</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Texto</option>
      <option>Adjunto</option>
      <option>Completo</option>
      <option>Fecha</option>
      <option>Casilla de seleccion</option>
    </select>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Descripción</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Descripcíon">
  </div>
  <div class="form-check">
  <input class="form-check-input position-static" type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label=""> Dejar informacion publica
  <br>
  <br>
</div>
</form>
            
        </div>
        </div>
        <div>
        <div style="display: flex;justify-content: space-between;"></div>
        <button class="btn btn-outline-secondary" type="submit" style="margin:8px;">Adicionar campo</button><!---->
        <button  class="btn btn-outline-secondary" style="margin:8px;" list_campeonatos-toggle="modal" list_campeonatos-target="#categoria13">Agregar categoría</button></div>
        </div><div  class="cf-match__section"><!----><!----><h4  class="cf-title"> Formulario de los Jugadores </h4><!---->
        <div ><h5 class="cf-subtitle"> <!----></h5><!----><div style="display: flex;justify-content: space-between;">
            
        </div><button  class="btn btn-outline-secondary" style="margin:8px;">Adicionar campo</button>
        <button  class="btn btn-outline-secondary" style="margin:8px;" list_campeonatos-toggle="modal" list_campeonatos-target="#categoria13">Agregar categoría</button></div></div></div><!---->
    </app-edit-inscriptions></div></div>
</div>
<!-- modal agrgar segunda categoria-->
<div class="modal fade" id="categoria13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Categoria</h5>
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="categoria" class="m-3">
         <div class="form-group">
        <h6>Nombre de la categoria</h6>
      <input type="text" class="form-control" id="formGroupExampleInput">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" list_campeonatos-dismiss="modal" >Guardar</button>
        <button type="button" class="btn btn-primary" onclick="eliminar();">Cancelar</button>
      </div>
    </div>
    </form>
      </div>
  </div>
 
<!-- modal-->
<div class="modal fade" id="grupos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Grupos</h5>
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div  class="form-group">
<label for="customRange2">Cantidad de grupos <b>12</b></label>
<input class="custom-range" id="customRange2" max="16" min="1" type="range"></div>
<button class="btn btn-outline-secondary">Sortear equipos</button></div>
<div  class="modal-footer">
    <button  class="btn btn-success">Concluir</button></div>

      </div>
  </div>
  </div>
  <!-- modal opciones del deporte -->
     <div class="modal fade" id="opciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Opciones del deporte</h5>
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ulclass="list-group">
            <li  class="list-group-item">
            <label >pontos_vitoria</label>
        <select  class="form-control">
        <option  value="1"> 1 </option>
        <option value="2"> 2 </option>
        <option  value="3"> 3 </option>
        </select>
        </li>
        <li  class="list-group-item">
        <label>pontos_empate</label>
        <select class="form-control">
        <option value="0"> 0 </option>
        <option  value="1"> 1 </option>
        <option value="2"> 2 </option>
        </select>
        </li>
        <li class="list-group-item">
        <label>suspensao_automatica</label>
        <select  class="form-control">
        <option value="0">No</option>
        <option value="1">1 tarjeta roja</option>
        <option value="2">1 tarjeta roja o 1 amarilla  </option>
        <option value="3"> 1 tarjeta roja o 2 amarillas </option>
        <option  value="4">1 tarjeta roja o 3 amarillas</option>
        <option value="5"> 1 tarjeta azul </option>
        <option  value="6">2 tarjetas amarillas </option>
        <option value="7">3 tarjeta amarilla</option>
        </select>
        </li>
        <li class="list-group-item">
        <label>suspensao_automatica</label>
        <select class="form-control">
        <option value="1"> No respetar </option>
        <option value="2">Respetar</option>
        </select>
        </li>
        </ul>
        <!-- Default input -->

      </div>
  </div>
  </div>
</div>
<!--modalarbitrage--->
 
 <div class="modal fade" id="arbitraje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div><section  class="cf-main__section"><header class="cf-main__section-header">
             <h4 class="cf-title">Arbitraje</h4></header><ul class="list-group"><!---->
             <li class="list-group-item list-group-item-action mousePoi">? </li></ul>
             <div style="display: block;text-align:right;padding: 8px; ">
                 <button class="btn btn-outline-secondary small" list_campeonatos-toggle="modal" list_campeonatos-target="#agregararbitro">Agregar árbitro</button></div></section>
                 <section class="cf-main__section">
                     <header class="cf-main__section-header"><h4  class="cf-title">Lugares</h4></header>
                     <ul class="list-group">
                    <li  class="list-group-item list-group-item-action mousePoi"></li></ul>
                <div style="display: block;text-align:right;padding: 8px;  ">
             <button  class="btn btn-outline-secondary small" list_campeonatos-toggle="modal" list_campeonatos-target="#Lugar">AGREGAR LUGAR</button></div></section></div>
      </div>
  </div>
  </div>
</div>
 <!-- modal lugar-->
 <div class="modal fade" id="Lugar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar Lugar</h4>
      </div>
      <div class="modal-body">
           <form style="margin:20px;">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre del lugar" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Dirección</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.6543820452353!2d-77.03591788561769!3d-12.067284345567035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8eb498672dd%3A0xefa377174834b5d7!2sEstadio%20Nacional!5e0!3m2!1sen!2spe!4v1580246804887!5m2!1sen!2spe" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
  <div class="modal-footer">
         <button type="button" class="btn btn-success" >Guardar</button>  
  </div>
</form>
      </div>
  </div>
  </div>
</div>
 <!-- modal agregar abitro-->
 <div class="modal fade" id="agregararbitro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Arbitro</h5>
      </div>
      <div class="modal-body">
        <form class="ml-2 mr-2 mt-2">
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-1 col-form-label">IMG</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 col-form-label">Funcion</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" placeholder="Funcion del Arbitro">
    </div>
  </div>
  <div class="modal-footer">
  <input type="button" class="btn btn-success" value="Guardar">
  </div>
</form> 
 
      </div>
  </div>
  </div>
</div>
<!--modal encuestas-->
 <div class="modal fade" id="encuesta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <section class="cf-main__section">
            <header class="cf-main__section-header">
            <h4  class="cf-title">Rankings de los jugadores</h4>
            </header>
            <ulclass="list-group">
            <li class="list-group-item list-group-item-action mousePoi" list_campeonatos-toggle="modal" list_campeonatos-target="#Rankigns">Goleadores</li>
            <li class="list-group-item list-group-item-action mousePoi" list_campeonatos-toggle="modal" list_campeonatos-target="#Rankigns">Asistencias</li>
            <li class="list-group-item list-group-item-action mousePoi" list_campeonatos-toggle="modal" list_campeonatos-target="#Rankigns">Sanciones</li>
            <li class="list-group-item list-group-item-action mousePoi" list_campeonatos-toggle="modal" list_campeonatos-target="#Rankigns">
                
            </li></ul><div  style="display: block;text-align:right;padding: 8px; ">
                <button  class="btn btn-outline-secondary small" list_campeonatos-toggle="modal" list_campeonatos-target="#Rankigns">Agregar</button>
                </div>
                </section>
                <section  class="cf-main__section"><header  class="cf-main__section-header">
                    <h4 class="cf-title">Encuestas</h4></header><ul  class="list-group"><!---->
                    <li  class="list-group-item list-group-item-action mousePoi" list_campeonatos-toggle="modal" list_campeonatos-target="#editencueta"></li>
                    <li class="list-group-item list-group-item-action mousePoi" list_campeonatos-toggle="modal" list_campeonatos-target="#editencueta">
        
                    </li></ul><div _ngcontent-qow-c26="" style="display: block;text-align:right;padding: 8px;  ">
               <button _ngcontent-qow-c26="" class="btn btn-outline-secondary small" list_campeonatos-toggle="modal" list_campeonatos-target="#editencueta">Agregar</button></div>
                  </section></div></app-edit-rankings-poll>
    </div>
  </div>
  </div>
  <!-- modal encuestas-->
 <div class="modal fade" id="editencueta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
      </div>
      <div class="modal-body">
        <form style="margin:20px;">
  
  <div class="form-group">
    <label for="inputAddress">Pregunta</label>
    <input type="text" class="form-control" id="inputAddress" >
  </div>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Público
  </label>
</div>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Votació abierta
  </label>
</div>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    mostrando resultado
  </label>
</div>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
   Elejir mas de una
  </label>
</div>
   <div style="display: flex;padding: 8px;justify-content: space-between;margin-top:16px ;">
     <button class="btn btn-outline-secondary" style="margin: 0px; ">Copiar tabla</button>
   </div>
   <h5>Alternativas</h5>
 <div style="display: flex;padding: 8px;justify-content: space-between;margin-top:16px ;">
 <button class="btn btn-outline-secondary" style="margin: 0px; ">Copiar tabla</button>
</div>
<br>
<div class="modal-footer">
   <button type="button" class="btn btn-success">Guardar</button> 
</div>
</form>
      </div>
  </div>
  </div>
</div>
   <!-- modal agregar ranking-->
 <div class="modal fade" id="Rankigns" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Ranking </h4>
      </div>
      <div class="modal-body">
        <form style="margin:20px;">
  <div class="form-group" >
    <label for="exampleFormControlInput1">Titulo</label>
    <input type="text" class="form-control" id="titulo" placeholder="Titulo">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Tipo</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Ranking Manual</option>
      <option>Votacion</option>
    </select>
  </div>
  <br>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="exampleRadios" id="btn1" value="option1" checked>
  <label class="form-check-label" >
    Vicible
  </label>
</div>
<br>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="exampleRadios" id="btn2" value="option2">
  <label class="form-check-label" >
    Decrescente
  </label>
</div>
 <br>
  <div class="form-group">
    <label >Nombre de la columna</label>
   <input type="text" class="form-control" id="nombre" >
  </div>
  <hr>
  <div class="modal-footer">
   <button type="button" class="btn btn-success">Guardar</button>
   </div>
</form>
      </div>
  </div>
  </div>
</div>
<!-- modal-->

  <div class="row">
    <div class="col-sm-8">
        <div id="main">
      <h5 style="color: gray;">ACERCA DE</h5>
  <div class="row">
   
           <div class="col-sm-4"><div style="width: 40px; float: left;"><ion-icon name="calendar" style="width: 70%; margin-top:  15%;"></ion-icon></div><div style="width: 140px; float: left"><h9>COMIENZO<h9><p><?php echo $fecha_inicio; ?></p></div></h9></h9></div>
 <div class="col-sm-4"><div style="width: 40px; float: left;"><ion-icon name="calendar" style="width: 70%; margin-top:  15%;"></ion-icon></div><div style="width: 140px; float: left"><h9>FIN<h9><p><?php echo $fecha_fin; ?></p></div></h9></h9></div>
 <div class="col-sm-4"><div style="width: 40px; float: left;"><ion-icon name="contact" style="width: 70%; margin-top:  15%;"></ion-icon></div><div style="width: 140px; float: left"><h9>ORGANIZADOR<h9><p><?php echo $organizador; ?></p></div></h9></h9></div>   
    </div>  
      <h5 style="color: gray;">CONTACTO</h5>

<p><?php echo $name_user; ?></p>
<p><ion-icon name="mail"></ion-icon><?php echo $correo_user; ?></p>

<p><ion-icon name="call"></ion-icon>941713130</p>

      
    <div id="basicMap"></div>
<h5 style="color: gray;">PREMIOS</h5>
   <p> 
<h6 style="color: gray;">1째 PLACE</h6>
<?php echo $premio1; ?>

<h6 style="color: gray;">2째 PLACE</h6>
<?php echo $premio2; ?>

<h6 style="color: gray;">3째 PLACE</h6>
<?php echo $premio3; ?>

<h6 style="color: gray;">OTROS</h6>
<?php echo $premio4; ?>
</div>
    <table class="table" id="ranking">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
  </div>
  
    
    <div class="col-sm-4" ">
      <h3 style="text-align: center; color: gray;">JUEGOS</h3>
      <div style='border: 1px solid #eee;'>
        <div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h5>CATEGORIAS</h5>
 <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" list_campeonatos-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
</div>
<div class="col-sm-6">
   <h5>RONDAS</h5>
 <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" list_campeonatos-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
    </div>
</div>
  <div class="row" style="margin-top: 50px;">



    <div class="col-sm-5">
      <img src="https://firebasestorage.googleapis.com/v0/b/copafacil-web.appspot.com/o/imgs%2F-LuJ_RoQEjgijnts-D19.png?alt=media" style="width:70px; height: 70px; margin-left:25%"/>

      
    </div>
      <div class="col-sm-2">
      <h1>X</h1>
    </div>
      <div class="col-sm-5">
      <img src="https://firebasestorage.googleapis.com/v0/b/copafacil-web.appspot.com/o/imgs%2F-LuJ_RoQEjgijnts-D19.png?alt=media" style="width:70px; height: 70px; margin-left:25%;"/>

  </div>

</div></div>
</div>

    </div>

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Campeonato</h5>
        <button type="button" class="close" list_campeonatos-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Default input -->
<label for="exampleForm2">Titulo</label>
<input type="text" id="exampleForm2" class="form-control">
<div class="row">
  <div class="col-sm-6">
<label for="dropdown">Subtitulo</label>
<input type="text" id="exampleForm2" class="form-control">
<label for="dropdown">Empieza</label>

<input list_campeonatos-provide="datepicker">
</div>



      </div>

      <div class="modal-footer">
             <div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-11">
        <button type="button" class="btn btn-primary" style="margin-left: 130px;">Nuevo Campeonato</button>
          </div>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<?php $conn->close(); ?>