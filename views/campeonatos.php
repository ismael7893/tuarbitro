<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- Required meta tags -->

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <link rel="stylesheet" href="views/style.css">
  <title>CAMPEONATOS</title>
</head>

<body class="bg-light">
  <div class="container-fluid bg-success-im">
    <div class="row">
      <nav class="col-12 navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="#">Tuarbitro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Español
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Ingles</a>
                  <a class="dropdown-item" href="#">Frances</a>
                  <a class="dropdown-item" href="#">Portugues</a>
                  <a class="dropdown-item" href="#">Italiano</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?view=user">Perfil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?view=logout">Salir</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div id="perfil" class="jumbotron text-center m-0">
    <h1 id="title" class="text-light">titulo</h1>
    <p id="description" class="text-light">subtitulo</p>
  </div>
  <!-- Centered Tabs -->
  <div class="bg-success-im bg-success">
    <div class="container">
      <nav class="col-12 navbar navbar-expand-lg navbar-dark bg-success">
        <!-- <a class="navbar-brand" href="#">Tuarbitro</a> -->
        <a class="nav-link dropdown-toggle navbar-brand" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Opciones
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#detalleChampions" onclick="loadChampions()">
            <ion-icon name="list-box"></ion-icon>
            <span>Detalle del campeonato<span>
          </a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#equipos" onclick="loadEquipment()">
            <ion-icon name="people"></ion-icon>
            <span>Editar equipos</span>
          </a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#inscripciones">
            <ion-icon name="pie"></ion-icon>
            <span>Editar inscripciones</span>
          </a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#fases" onclick="loadFases()">
            <ion-icon name="albums"></ion-icon>
            <span>Editar Fases</span>
          </a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#grupos">
            <ion-icon name="pie"></ion-icon>
            <span>Editar Grupos</span>
          </a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#opciones">
            <ion-icon name="cog"></ion-icon>
            <span>Editar Opciones del deporte</span>
          </a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#arbitraje">
            <ion-icon name="flag"></ion-icon>
            <span>Arbitraje y Lugares</span>
          </a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#encuesta">
            <ion-icon name="list"></ion-icon>
            <span>Ranking y Encuestas</span>
          </a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modeladores">
            <ion-icon name="lock"></ion-icon>
            <span>Modeladores y visualizaciones</span>
          </a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#auspiciadores">
            <ion-icon name="image"></ion-icon>
            <span>Editar patrocinios</span>
          </a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#planes">
            <ion-icon name="journal"></ion-icon>
            <span>Planes de suscripción</span>
          </a>
          <!-- <a class="dropdown-item" href="campeonato.php">Mis Campeonatos</a> -->
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent2">
          <ul class="navbar-nav mr-auto">
          </ul>
          <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
              <li class="active nav-item"><a class="nav-link" href="#">INICIO</a></li>
              <li class="nav-item"><a class="nav-link" href="#">CLASIFICACIÓN</a></li>
              <li class="nav-item"><a class="nav-link" href="#">FOTOS VÍDEOS Y NOTICIAS</a></li>
              <li class="nav-item"><a class="nav-link" href="#">RANKINGS Y ENCUESTAS</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="container mt-4">
    <div class="modal fade" id="detalleChampions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalles del campeonato</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <!-- Default input -->
            <label for="exampleForm2">Titulo</label>
            <input type="text" id="ch_title" class="form-control">
            <label for="exampleForm2">Descripcion</label>
            <input type="text" id="ch_description" class="form-control">
            <div class="row">
              <div class="col-6">
                <label for="exampleForm2">Fecha inicio</label>
                <input type="date" id="ch_date_ini" class="form-control">
              </div>
              <div class="col-6">
                <label for="exampleForm2">Fecha fin</label>
                <input type="date" id="ch_date_fin" class="form-control">
              </div>
            </div>
            <label for="exampleForm2">Lugar</label>
            <input type="text" id="ch_ubication" class="form-control">
            <div class="row">
              <div class="col-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d64491821.66873477!2d7.6373959018396835!3d9.397825560082614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1580754749355!5m2!1ses-419!2spe" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
              </div>
              <div class="col-md-6">
                <label for="exampleForm2">Organizador</label>
                <input type="text" id="ch_organizer" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="exampleForm2">Estadio</label>
                <input type="text" id="ch_stadium" class="form-control">
              </div>
              <div class="col-sm-12">
                <button type="button" class="btn btn-primary w-100 my-3" onclick="saveChampions()">Guardar cambios</button>
              </div>
              <div class="col-sm-12">
                <button type="button" class="btn btn-danger w-100 mb-3">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- modal editar campeonato-->
    <div class="modal fade" id="equipos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header row">
            <div class="col-12">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h5 class="modal-title" id="exampleModalLabel">Equipos</h5>
            </div>
            <div class="col-12">
              <div class="input-group">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary" type="button" title="Mis equipos">Descargar</button>
                </div>
                <div class="input-group-prepend">
                  <span class="input-group-text">Nombre:</span>
                </div>
                <input id="eq_namePrimary" class="form-control" type="text">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary small" type="button" onclick="saveNewEquipment()">AGREGAR</button>
                </div>
              </div>
            </div>
            <div class="col-12">
              <span>Cantidad: </span>
              <span id="numEquipment">0</span>
            </div>
          </div>
          <div class="modal-body">
            <!-- Default input  -->
            <div class="list list-equipment">
              <ul id="list-equipment">
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="equipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalles de equipo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div id="eq_perfil" class="col-12 text-center">
              </div>
            </div>
            <!-- Default input -->
            <label for="exampleForm2">Nombre</label>
            <input type="text" id="eq_name" class="form-control">
            <label for="exampleForm2">Tecnico</label>
            <input type="text" id="eq_tecnico" class="form-control">
            <div class="card p-2 my-2">
              <h5 style="text-transform: uppercase;text-align: center; ">Jugadores</h5>
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend"><span class="input-group-text">Jugador:</span></div><input id="pl_namePrimary" class="form-control" type="text" placeholder="Nombre del jugador">
                <div class="input-group-append"><button class="btn btn-outline-secondary small" type="button" onclick="saveNewPlayer()">AGREGAR</button></div>
              </div>
              <p style="margin-bottom: 0px;">
                <b>Cantidad: </b>
                <span id="numPlayer">0</span>
              </p>
              <div id="players"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="updateEquipment();">Guardar</button>
            <button type="button" class="btn btn-danger" onclick="deleteEquipment();">Eliminar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="player" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalles del jugador</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Default input -->
            <div class="row">
              <div id="pl_perfil" class="col-12 text-center">
              </div>
              <div class="col-12">
                <label for="exampleForm2">Nombre</label>
                <input type="text" id="pl_name" class="form-control">
              </div>
              <div class="col-6">
                <label for="exampleForm2">Documento</label>
                <input type="text" id="pl_doc" class="form-control">
              </div>
              <div class="col-6">
                <label for="exampleForm2">Télefono</label>
                <input type="text" id="pl_phone" class="form-control">
              </div>
              <div class="col-6">
                <label for="exampleForm2">Número del jugador</label>
                <input type="text" id="pl_num" class="form-control">
              </div>
              <div class="col-6">
                <label for="exampleForm2">Posición</label>
                <input type="text" id="pl_position" class="form-control">
              </div>
            </div>
            <label for="exampleForm2">fecha de nacimiento</label>
            <input type="date" id="pl_dateNac" class="form-control">
            <div class="form-group pt-2">
              <div class="input-group mb-3"><select class="form-control" type="text">
                  <option disabled="" selected="" value="p">Seleccione equipo</option>
                </select>
                <div class="input-group-append"><button class="btn btn-outline-secondary" type="button" disabled="">Transferir jugador</button></div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="deletePlayer();">Eliminar</button>
            <button type="button" class="btn btn-success" onclick="updatePlayer();">Guardar</button>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Default input -->
            <div class="modal-body">
              <ul class="list-group" id="list-fases">
                <!---->
              </ul>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-outline-secondary" style="float: right" data-toggle="modal" data-target="#editfase" type="button">Agregar</button></div>
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
                <input type="text" class="form-control" id="fa_title">
              </div>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="fa_point_all">
                <label class="custom-control-label" for="fa_point_all">Puntos total</label>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Destacar primeros</label>
                  <select class="custom-select" id="fa_primary" required>
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
                  <select class="custom-select" id="fa_final" required>
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
                <button type="button" class="btn btn-danger" onclick="addDelete();">Eliminar fase</button>
                <button id="btn-saveFases" type="button" class="btn btn-success" onclick="addFases();">Guardar</button>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group my-9">
              <form id="formulario" class="m-3" style="display:none;">
                <button type="button" class="close" data-dismiss="modal" onclick="cancelar();" aria-label="Close">
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

              <div class="row">
                <input class="btn btn-success" style=" margin: 20px;" type="button" value="Adicionar campo" onclick="agregar();">

                <input class="btn btn-success" style=" margin: 20px;" type="button" data-toggle="modal" data-target="#categoria1" value="Agregar categoria">
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="categoria" class="m-3">
              <h2 class="modal-title">Categoria</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
              <hr>
              <div class="form-group">
                <h4>Nombre del campo</h4>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nombre del campo">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div "">
              <section class="cf-main__section">
                <header class="cf-main__section-header">
                  <h4 class="cf-title">Moderadores</h4>
                </header>
                <ul class="list-group">
                  <!---->
                </ul>
                <div style="display: block;text-align:right ">
                  <button class="btn btn-outline-secondary small" data-toggle="modal" data-target="#agrmoderadores">AGREGAR</button></div>
              </section>
              <!---->
              <section class="cf-main__section">
                <header class="cf-main__section-header">
                  <h4 class="cf-title">Accesos</h4>
                </header>
                <ul class="list-group">
                  <li class="list-group-item">Total de visualizaciones: 20</li>
                  <li class="list-group-item">Visualizaciones anónimas: 20</li>
                  <li class="list-group-item">Visualizaciones de usuarios: 0</li>
                  <li class="list-group-item">Usuarios distintos: 0</li>
                </ul>
              </section>
              <!---->
              <section _ngcontent-qow-c13="" class="cf-main__section">
                <header class="cf-main__section-header">
                  <h4 class="cf-title">Seguidores</h4>
                </header>
                <button _ngcontent-qow-c13="" class="btn btn-outline-secondary small">VISUALIZAR</button>
              </section>
            </div>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="ml-2 mr-2 mt-2">
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
            <div style="display: flex;position: absolute;top: 16px;right:16px;">
              <i class="material-icons mousePoi edit" title="Importar">file_download</i></div>
            <h4 class="modal-title">EDITAR PATROCINIOS</h4>
          </div>
          <div class="modal-body">

            <!-- Default input -->
            <div class="modal-body">
              <!---->
              <p style="text-align: center;">Campeonato no posee patrocinios</p>
              <ul class="list-group">
                <!---->
              </ul>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#patrocinio1" style="float: right" type="button">Agregar</button></div>
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
            <form id="formulario1" style=" margin:15px;">
              <div class="form-row">
                <div class="form-group col-md-5">
                  <input type="file" class="form-control-file" required="true" id="inputEmail4">
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
                <input type="file" class="form-control-file" required="true" id="inputEmail4">
              </div>
              <hr>
              <div class="form-group ">
                <label for="inputState">Banner de la palicacion</label>
                <input type="file" class="form-control-file" required="true" id="inputEmail4">
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
          <app-edit-inscriptions class="component-host-scrollable">
            <!---->
            <div class="modal-header" style="border-bottom:none ;">
              <div style="display: flex;position: absolute;top: 16px;right:16px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 100%;">
                <li class="nav-item"><a class="nav-link cf-uppercase active">Configuraciones</a></li>
                <li class="nav-item"><a class="nav-link cf-uppercase">Inscripciones</a></li>
              </ul>
            </div>
            <!---->
            <div class="modal-body">
              <!----><label class="cf-toogle-wrap">
                <input class="cf-toogle" type="checkbox">
                <div class="cf-toogle-label">Inscripciones abiertas</div>
              </label>
              <!---->
              <div class="form-group">
                <label for="info">Información</label>
                <!---->
                <textarea class="form-control" id="info" rows="3" placeholder="Información sobre la inscripción"></textarea>
              </div>
              <!---->
              <div class="cf-match__section line-bottom">
                <!---->
                <h4 class="cf-title"> Formulario de los equipos </h4>
                <!---->
                <!---->
                <div>
                  <h5 class="cf-subtitle">
                    <!---->
                  </h5>
                  <!---->
                  <div style="display: flex;justify-content: space-between;">
                    <form style="border-radius: 8px; margin-top: 20px;border-color:black 5px solid; background-color:#F0EEEE ; display:none;">
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
                <div class="flex">
                  <div style="display: flex;justify-content: space-between;"></div>
                  <button class="btn btn-outline-secondary" type="submit" style="margin:8px;">Adicionar campo</button>
                  <!---->
                  <button class="btn btn-outline-secondary" style="margin:8px;" data-toggle="modal" data-target="#categoria13">Agregar categoría</button>
                </div>
              </div>
              <div class="cf-match__section line-bottom">
                <!---->
                <!---->
                <h4 class="cf-title"> Formulario de los Jugadores </h4>
                <!---->
                <div class="flex">
                  <h5 class="cf-subtitle">
                    <!---->
                  </h5>
                  <!---->
                  <div style="display: flex;justify-content: space-between;"></div>
                  <button class="btn btn-outline-secondary" style="margin:8px;">Adicionar campo</button>
                  <button class="btn btn-outline-secondary" style="margin:8px;" data-toggle="modal" data-target="#categoria13">Agregar categoría</button>
                </div>
              </div>
            </div>
            <!---->
          </app-edit-inscriptions>
        </div>
      </div>
    </div>
    <!-- modal agrgar segunda categoria-->
    <div class="modal fade" id="categoria13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
            <button type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="customRange2">Cantidad de grupos <b id="bindingRang">1</b></label>
              <input class="custom-range" id="customRange2" max="16" min="1" type="range" onchange="rangeVerifique(this.value)" oninput="rangeVerifique(this.value)" value="1"></div>
            <button class="btn btn-outline-secondary">Sortear equipos</button>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Concluir</button></div>

        </div>
      </div>
    </div>
    <!-- modal opciones del deporte -->
    <div class="modal fade" id="opciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Opciones del deporte</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ulclass="list-group">
              <li class="list-group-item">
                <label>puntos vitoria</label>
                <select class="form-control">
                  <option value="1"> 1 </option>
                  <option value="2"> 2 </option>
                  <option value="3"> 3 </option>
                </select>
              </li>
              <li class="list-group-item">
                <label>puntos empate</label>
                <select class="form-control">
                  <option value="0"> 0 </option>
                  <option value="1"> 1 </option>
                  <option value="2"> 2 </option>
                </select>
              </li>
              <li class="list-group-item">
                <label>suspensao_automatica</label>
                <select class="form-control">
                  <option value="0">No</option>
                  <option value="1">1 tarjeta roja</option>
                  <option value="2">1 tarjeta roja o 1 amarilla </option>
                  <option value="3"> 1 tarjeta roja o 2 amarillas </option>
                  <option value="4">1 tarjeta roja o 3 amarillas</option>
                  <option value="5"> 1 tarjeta azul </option>
                  <option value="6">2 tarjetas amarillas </option>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div>
              <section class="cf-main__section">
                <header class="cf-main__section-header">
                  <h4 class="cf-title">Arbitraje</h4>
                </header>
                <ul class="list-group">
                  <!---->
                  <li class="list-group-item list-group-item-action mousePoi">? </li>
                </ul>
                <div style="display: block;text-align:right;padding: 8px; ">
                  <button class="btn btn-outline-secondary small" data-toggle="modal" data-target="#agregararbitro">Agregar árbitro</button></div>
              </section>
              <section class="cf-main__section">
                <header class="cf-main__section-header">
                  <h4 class="cf-title">Lugares</h4>
                </header>
                <ul class="list-group">
                  <li class="list-group-item list-group-item-action mousePoi"></li>
                </ul>
                <div style="display: block;text-align:right;padding: 8px;  ">
                  <button class="btn btn-outline-secondary small" data-toggle="modal" data-target="#Lugar">AGREGAR LUGAR</button></div>
              </section>
            </div>
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
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre del lugar">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Dirección</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="form-group">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.6543820452353!2d-77.03591788561769!3d-12.067284345567035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8eb498672dd%3A0xefa377174834b5d7!2sEstadio%20Nacional!5e0!3m2!1sen!2spe!4v1580246804887!5m2!1sen!2spe" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success">Guardar</button>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <section class="cf-main__section">
              <header class="cf-main__section-header">
                <h4 class="cf-title">Rankings de los jugadores</h4>
              </header>
              <ulclass="list-group">
                <li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#Rankigns">Goleadores</li>
                <li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#Rankigns">Asistencias</li>
                <li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#Rankigns">Sanciones</li>
                <li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#Rankigns">

                </li>
                </ul>
                <div style="display: block;text-align:right;padding: 8px; ">
                  <button class="btn btn-outline-secondary small" data-toggle="modal" data-target="#Rankigns">Agregar</button>
                </div>
            </section>
            <section class="cf-main__section">
              <header class="cf-main__section-header">
                <h4 class="cf-title">Encuestas</h4>
              </header>
              <ul class="list-group">
                <!---->
                <li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#editencueta"></li>
                <li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#editencueta">

                </li>
              </ul>
              <div _ngcontent-qow-c26="" style="display: block;text-align:right;padding: 8px;  ">
                <button _ngcontent-qow-c26="" class="btn btn-outline-secondary small" data-toggle="modal" data-target="#editencueta">Agregar</button></div>
            </section>
          </div>
          </app-edit-rankings-poll>
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
                <input type="text" class="form-control" id="inputAddress">
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
              <div class="form-group">
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
                <label class="form-check-label">
                  Vicible
                </label>
              </div>
              <br>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="exampleRadios" id="btn2" value="option2">
                <label class="form-check-label">
                  Decrescente
                </label>
              </div>
              <br>
              <div class="form-group">
                <label>Nombre de la columna</label>
                <input type="text" class="form-control" id="nombre">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Campeonato</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

                <input data-provide="datepicker">
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
        </div>
      </div>
    </div>
    <div class="row pt-6 pb-4">
      <div class="col-lg-8 mb-3">
        <div class="card p-3">
          <div class="row">
            <h5 class="col-12 text-secondary">ACERCA DE</h5>
            <div class="col-sm-4 line-bottom">
              <div style="width: 40px; float: left;">
                <ion-icon name="calendar" style="width: 70%; margin-top:  15%;"></ion-icon>
              </div>
              <div style="width: 140px; float: left">
                <h9>COMIENZO</h9>
                <p id="date_ini">Friday,12/18/20</p>
              </div>
            </div>
            <div class="col-sm-4 line-bottom">
              <div style="width: 40px; float: left;">
                <ion-icon name="calendar" style="width: 70%; margin-top:  15%;"></ion-icon>
              </div>
              <div style="width: 140px; float: left">
                <h9>FINALIZACIÓN<h9>
                    <p id="date_fin">Friday,12/18/20</p>
              </div>
              </h9>
              </h9>
            </div>
            <div class="col-sm-4 line-bottom">
              <div style="width: 40px; float: left;">
                <ion-icon name="contact" style="width: 70%; margin-top:  15%;"></ion-icon>
              </div>
              <div style="width: 140px; float: left">
                <h9>ORGANIZADOR<h9>
                    <p id="organizer">Gustavo Aquino</p>
              </div>
              </h9>
              </h9>
            </div>
          </div>
          <div class="row">
            <h5 class="col-12 text-secondary">CONTACTO</h5>
            <p class="col-12">
              <ion-icon name="contact"></ion-icon>
              <span id="name">Bryan Goicochea<span>
            </p>
            <p class="col-12">
              <ion-icon name="mail"></ion-icon>
              <span id="email">man_on_fire_88@hotmail.com</span>
            </p>
            <p class="col-12">
              <ion-icon name="call"></ion-icon>
              <span id="phone">941713130</span>
            </p>
          </div>
          <div class="row">
            <h5 class="col-12 text-secondary">REGLAS</h5>
            <p class="col-12"></p>
          </div>

          <div id="basicMap"></div>
          <h5 style="color: gray;">PREMIOS</h5>
          <p>
            <h6 class="line-bottom" style="color: gray;">1° Puesto</h6>

            <h6 class="line-bottom" style="color: gray;">2° Puesto</h6 class="line-botton">

            <h6 class="line-bottom" style="color: gray;">3° Puesto</h6 class="line-botton">

            <h6 class="line-bottom" style="color: gray;">OTROS</h6 class="line-botton">


            <!-- <table class="table" id="ranking">
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
            </table> -->
            <section class="row">
              <header class="col-12">
                <h4 class="cf-title">Comentarios</h4>
              </header>
              <div class="col-12">
                <textarea class="col-12 w-100 form-control" placeholder="Deje su comentario"></textarea>
              </div>
              <div class="col-12 text-right">
                <button class="btn btn-primary btn-small mt-2"> Enviar </button>
              </div>
              <ul class="col-12 list-unstyled">
                <li class="border-bottom mb-2">
                  <div class="dropdown" ngbdropdown="">
                    <figure class="">
                      <img class="border-radius" src="./assets/images/avatar.png">
                    </figure>
                    <div class="row">
                      <header class="col-12">
                        <h6 class="d-inline-block">asd</h6>
                        <time class="text-secondary" style="font-size: 10px">31/1/20 18:45</time>
                        <div class="float-right">
                          <a class="nav-link dropdown-toggle text-dark" href="#" id="coment" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <ion-icon name="create"></ion-icon>
                          </a>
                          <div class="dropdown-menu row" aria-labelledby="coment">
                            <h5 class="col-12 text-secondary">Mensaje</h5>
                            <div class="col-12">
                              <textarea id="" class="form-control w-100" rows="5"></textarea>
                            </div>
                            <div class="col-12 mt-2 text-right">
                              <button class="btn btn-sm btn-outline-info">Editar</button>
                              <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                            </div>
                          </div>
                        </div>
                      </header>
                      <p class="col-12"> asdfasdf </p>
                    </div>
                  </div>
                </li>
              </ul>
              <!---->
            </section>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card p-3">
          <h3 class="text-secondary text-center border-bottom pb-1">JUEGOS</h3>
          <div>
            <div class="container">
              <div class="row">
                <div class="col-sm-6">
                  <h5 class="text-muted">Fases</h5>
                </div>
                <div class="col-sm-6">
                  <h5 class="text-muted">Fechas</h5>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-6 pl-0">
                      <select id="" class="form-control">
                        <option>Fase 1</option>
                      </select>
                    </div>
                    <div class="col-6 pr-0">
                      <select id="" class="form-control">
                        <option>1° fecha</option>
                        <option>Nueva Fecha</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-12 border mY-3 pY-2">
                  <div class="row">
                    <div class="col-sm-5 text-center">
                      <img src="https://firebasestorage.googleapis.com/v0/b/copafacil-web.appspot.com/o/imgs%2F-LuJ_RoQEjgijnts-D19.png?alt=media" style="width:70px; height: 70px;" />
                      <p class="text-muted">Nombre de equipo</p>
                    </div>
                    <div class="col-sm-2 text-center">
                      <h1>X</h1>
                    </div>
                    <div class="col-sm-5 text-center">
                      <img src="https://firebasestorage.googleapis.com/v0/b/copafacil-web.appspot.com/o/imgs%2F-LuJ_RoQEjgijnts-D19.png?alt=media" style="width:70px; height: 70px;" />
                      <p class="text-muted">Nombre de equipo</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
  <script>
    // document.querySelector("#message").style.display = 'none';
    // document.querySelector("#message2").style.display = 'none';
    var search = function() {
      let champions = localStorage.getItem('champions');
      axios.get(`api/index.php?type=champbyid&id=${champions}`).then(function(data) {
        if (data.data.errors) {
          // document.querySelector("#message").style.display = 'block';
          // document.querySelector("#message").innerHTML = data.data.errors[0].description;
        }
        if (data.data.id) {
          let info = data.data;
          document.querySelector("#title").innerHTML = info.nombre;
          document.querySelector("#description").innerHTML = info.description;

          document.querySelector("#date_ini").innerHTML = info.f_inicio;
          document.querySelector("#date_fin").innerHTML = info.f_fin;
          document.querySelector("#organizer").innerHTML = info.organization;

          document.querySelector("#name").innerHTML = info.create_by.NAME;
          document.querySelector("#email").innerHTML = info.create_by.email;
          document.querySelector("#phone").innerHTML = info.create_by.telefono;

          document.querySelector('#perfil').style.backgroundImage = `url("views/img/${info.foto_perfil}")`;
        }
      });
    }
    var loadChampions = function() {
      let champions = localStorage.getItem('champions');
      axios.get(`api/index.php?type=champbyid&id=${champions}`).then(function(data) {
        if (data.data.errors) {
          // document.querySelector("#message").style.display = 'block';
          // document.querySelector("#message").innerHTML = data.data.errors[0].description;
        }
        if (data.data.id) {
          let info = data.data;
          date_ini = ((info.f_inicio).split(" ")[1]).split('-');
          date_fin = ((info.f_fin).split(" ")[1]).split("-");
          console.log(date_ini);
          document.querySelector("#ch_title").value = info.nombre;
          document.querySelector("#ch_description").value = info.description;
          document.querySelector("#ch_stadium").value = info.estadio;
          document.querySelector("#ch_ubication").value = info.ubication;
          document.querySelector("#ch_date_ini").value = `${date_ini[2]}-${date_ini[1]}-${date_ini[0]}`;
          document.querySelector("#ch_date_fin").value = `${date_fin[2]}-${date_fin[1]}-${date_fin[0]}`;
          document.querySelector("#ch_organizer").value = info.organization;
          localStorage.setItem('tipe', info.tipe);
          localStorage.setItem('sport', info.sport);
        }
      });
    }
    var saveChampions = function() {
      let champions = localStorage.getItem('champions');
      id = localStorage.getItem('champios');
      tipe = localStorage.getItem('tipe');
      sport = localStorage.getItem('sport');
      data = {
        id: champions,
        name: document.querySelector("#ch_title").value,
        stadium: document.querySelector("#ch_stadium").value,
        organizer: document.querySelector("#ch_organizer").value,
        ubication: document.querySelector("#ch_ubication").value,
        description: document.querySelector("#ch_description").value,
        tipe: tipe,
        sport: sport,
        dateini: document.querySelector("#ch_date_ini").value,
        dateFin: document.querySelector("#ch_date_fin").value
      }
      ruta = `&id=${data.id}&name=${data.name}&stadium=${data.stadium}&organizer=${data.organizer}&ubication=${data.ubication}&description=${data.description}&tipe=${data.tipe}&sport=${data.sport}&dateini=${data.dateini}&dateFin=${data.dateFin}`;
      axios.get(`api/index.php?type=updatecampeonato${ruta}`).then(function(data) {
        removeModal();
        if (data.data) {

        }
      });
    }
    var deleteChampios = function() {

    }
    var loadEquipment = function() {
      document.querySelector("#list-equipment").innerHTM = '';
      let champions = localStorage.getItem('champions');
      axios.get(`api/index.php?type=teambychamp&id=${champions}`).then(function(data) {
        if (data.data[0]) {
          html = '';
          for (let i = 0; i < data.data.length; i++) {
            const element = data.data[i];
            html += `<li class=" line-bottom" data-toggle="modal" data-target="#equipo" onclick="loadEquipmentOne(${element.id},'${element.name}','${element.tecnico}','${element.imagen}')">
                <img src="views/img/${element.imagen}" class="rounded-circle">
                <h4>${element.name}</h4>
                <p>
                  <span class="">${element.tecnico}</span>
                </p>
              </li>`;
          }
          document.querySelector("#list-equipment").innerHTML = html;
        }
      });
    }
    var saveNewEquipment = function() {
      if (document.querySelector('#eq_namePrimary').value != "") {
        data = {
          user: localStorage.getItem('username'),
          name: document.querySelector('#eq_namePrimary').value,
          champions: localStorage.getItem('champions')
        }
        axios.get(`api/index.php?type=addequipo&user=${data.user}&name=${data.name}&champions=${data.champions}`).then(function(data) {
          console.log(data.data);
          if (data.data.code && data.data.code == 0) {
            element = data.data.equipment;
            ant = document.querySelector('#list-equipment').innerHTML;
            document.querySelector('#list-equipment').innerHTML = `<li class=" line-bottom" data-toggle="modal" data-target="#equipo" onclick="loadEquipmentOne(${element.id},'${element.name}','${element.tecnico}','${element.imagen}')">
                <img src="views/img/${element.imagen}" class="rounded-circle">
                <h4>${element.name}</h4>
                <p>
                  <span class="">${element.tecnico}</span>
                </p>
              </li>${ant}`;
            document.querySelector('#eq_namePrimary').value = '';
          }
        });
      }
    }
    var updateEquipment = function() {
      data = {
        id: localStorage.getItem('equipment'),
        user: localStorage.getItem('username'),
        name: document.querySelector('#eq_name').value,
        tecnico: document.querySelector('#eq_tecnico').value,
        champions: localStorage.getItem('champions'),
        imagen: localStorage.getItem('perfilquipment'),
        create_by: localStorage.getItem('username')
      }
      param = `id=${data.id}&name=${data.name}&tecnico=${data.tecnico}&imagen=${data.imagen}&create_by=${data.create_by}&campeonato=${data.champions}`;
      axios.get(`api/index.php?type=updateequipo&${param}`).then(function(data) {
        console.log(data.data);
        if (data.data.messages.code && data.data.messages.code == 0) {
          document.querySelector("#equipo").style.display = 'none';
          m = document.getElementsByClassName('modal-backdrop')[1];
          m.parentNode.removeChild(m);
          loadEquipment();
        }
      });
    }
    var player = function(id, photo) {
      modal3('player');
      localStorage.setItem('player', id);
      // localStorage.setItem('equipment', equipment);
      localStorage.setItem('photo', photo);
      axios.get(`api/index.php?type=player&id=${id}`).then(function(data) {
        cont = data.data[0];
        if (data.data[0]) {
          document.querySelector('#pl_perfil').innerHTML = `<img src="views/img/${cont.imagen}" class="rounded-circle" height="60" width="60" />`;
          document.querySelector('#pl_name').value = cont.NAME;
          document.querySelector('#pl_num').value = cont.numero;
          document.querySelector('#pl_position').value = cont.posicion;
          document.querySelector('#pl_dateNac').value = cont.f_nacimiento;
          document.querySelector('#pl_doc').value = cont.documento;
          document.querySelector('#pl_phone').value = cont.telefono;
        }
      });
    }
    var saveNewPlayer = function() {
      data = {
        idequipo: localStorage.getItem('equipment'),
        name: document.querySelector('#pl_namePrimary').value
      }
      axios.get(`api/index.php?type=addjugador&idequipo=${data.idequipo}&name=${data.name}`).then(function(data) {
        console.log(data);
        if (data.data.player) {
          player0 = data.data.player;
          ant = document.querySelector('#players').innerHTML;
          html = `<div class="player-item line-bottom" data-toggle="modal" data-target="#player" onclick="player(${player0.id},'${player0.imagen}')">${player0.nombre}</div>`;
          document.querySelector('#players').innerHTML = html + ant;
        }
      });
    }
    var updatePlayer = function() {
      // modal3('palyer');
      data = {
        pl_id: localStorage.getItem('player'),
        pl_name: document.querySelector('#pl_name').value,
        pl_doc: document.querySelector('#pl_doc').value,
        pl_phone: document.querySelector('#pl_phone').value,
        pl_num: document.querySelector('#pl_num').value,
        pl_position: document.querySelector('#pl_position').value,
        pl_dateNac: document.querySelector('#pl_dateNac').value,
        pl_equipment: localStorage.getItem('equipment'),
        pl_photo: localStorage.getItem('photo')
      }
      let param = `id=${data.pl_id}&nam=${data.pl_name}&equipment=${data.pl_equipment}&num=${data.pl_num}&position=${data.pl_position}&document=${data.pl_doc}&phone=${data.pl_phone}&date_nac=${data.pl_dateNac}&photo=${data.pl_photo}`;

      axios.get(`api/index.php?type=updatejugador&${param}`).then(function(data) {
        console.log(data);
        if (data.data.data.code) {
          console.log("primer if");
          if (data.data.data.code == '0') {
            console.log("segundo if");
            m = document.getElementsByClassName('modal-backdrop')[2];
            m.parentNode.removeChild(m);
            document.querySelector('#player').style.display = 'none';

            id = localStorage.getItem('equipment');
            name = document.querySelector('#eq_name').value;
            tecnico = document.querySelector('#eq_tecnico').value;
            perfil = localStorage.getItem('perfilquipment');
            loadEquipmentOne(id, name, tecnico, perfil);
          }
        }
      });
    }
    var loadEquipmentOne = function(id, name, tecnico, perfil) {
      modal2('equipo');
      document.querySelector('#players').innerHTML = '';
      localStorage.setItem('equipment', id);
      localStorage.setItem('perfilquipment', perfil);
      document.querySelector('#eq_perfil').innerHTML = `<img src="views/img/${perfil}" class="rounded-circle" height="60" width="60" />`;
      document.querySelector('#eq_name').value = name;
      document.querySelector('#eq_tecnico').value = tecnico;
      axios.get(`api/index.php?type=playerbyteam&id=${id}`).then(function(data) {
        cont = data.data;
        document.querySelector('#numPlayer').innerHTML = cont.length;
        if (cont.length > 0) {
          html = '';
          for (let i = 0; i < cont.length; i++) {
            const item = cont[i];
            html += `<div class="player-item line-bottom" data-toggle="modal" data-target="#player" onclick="player(${cont[i].id},'${cont[i].imagen}')">${cont[i].NAME}</div>`;
          }
          document.querySelector('#players').innerHTML = html;
        }
      });
    };
    search();

    var addFases = function() {
      modal2('editfase');
      data = {
        fa_champions: localStorage.getItem('champions'),
        fa_user: localStorage.getItem('username'),
        fa_title: document.querySelector('#fa_title').value,
        fa_point_all: document.querySelector('#fa_point_all').checked,
        fa_primary: document.querySelector('#fa_primary').value,
        fa_final: document.querySelector('#fa_final').value,
      }
      param = `champions=${data.fa_champions}&user=${data.fa_user}&title=${data.fa_title}&first=${data.fa_primary}&last=${data.fa_final}&playoffs=${data.fa_point_all}`;

      axios.get(`api/index.php?type=addfase&${param}`).then(function(data) {
        // console.log(data);
        if (data.data.messages.code && data.data.messages.code == '0') {
          document.querySelector('#editfase').style.display = 'none';
          m = document.getElementsByClassName('modal-backdrop')[1];
          m.parentNode.removeChild(m);
          loadFases();
        }
      });
    }

    var loadFases = function() {
      param = `champions=${localStorage.getItem('champions')}`;
      axios.get(`api/index.php?type=listfases&${param}`).then(function(data) {
        if (data.data.data) {
          cont = data.data.data
          html = `<li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#editfase"></li>`;
          for (let i = 0; i < cont.length; i++) {
            const act = cont[i];
            html = `<li class="list-group-item list-group-item-action mousePoi" data-toggle="modal" data-target="#editfase" onclick="loadFase(${act.id})">${act.title}</li>${html}`;
          }
          document.querySelector('#list-fases').innerHTML = html;
        }
      });
    }
    var loadFase = function(id) {
      // searchFase
      axios.get(`api/index.php?type=searchFase&id=${id}`).then(function(data) {
        console.log(data);
        if (data.data.data.id) {
          element = data.data.data;
          document.querySelector('#fa_title').value = element.title;
          document.querySelector('#fa_point_all').value = element.playoffs;
          document.querySelector('#fa_primary').value = element.first;
          document.querySelector('#fa_final').value = element.last;

          m = document.querySelector('#btn-saveFases');
          m.parentNode.innerHTML += `<button type="button" class="btn btn-success" onclick="updateFases(${element.id});">Guardar</button>`;
          m = document.querySelector('#btn-saveFases');
          m.parentNode.removeChild(m);
        }
      });
    }
    var updateFases = function(id) {
      modal2('editfase');
      data = {
        fa_id: id,
        fa_champions: localStorage.getItem('champions'),
        fa_user: localStorage.getItem('username'),
        fa_title: document.querySelector('#fa_title').value,
        fa_point_all: document.querySelector('#fa_point_all').checked,
        fa_primary: document.querySelector('#fa_primary').value,
        fa_final: document.querySelector('#fa_final').value,
      }
      param = `id=${data.id}&champions=${data.fa_champions}&user=${data.fa_user}&title=${data.fa_title}&first=${data.fa_primary}&last=${data.fa_final}&playoffs=${data.fa_point_all}`;

      param = `champions=${data.fa_champions}&user=${data.fa_user}&title=${data.fa_title}&first=${data.fa_primary}&last=${data.fa_final}&playoffs=${data.fa_point_all}`;

      axios.get(`api/index.php?type=updatefases&${param}`).then(function(data) {
        // console.log(data);
        if (data.data.messages.code && data.data.messages.code == '0') {
          document.querySelector('#editfase').style.display = 'none';
          m = document.getElementsByClassName('modal-backdrop')[1];
          m.parentNode.removeChild(m);
          loadFases();
        }
      });
    }



    var rangeVerifique = function(val) {
      document.querySelector('#bindingRang').innerText = val;
    }
    var removeModal = function() {
      document.querySelector(".modal").classList.remove('show');
      document.querySelector(".modal-backdrop").remove();
    }
    var modal2 = (id) => {
      document.querySelector("#" + id).style.zIndex = '1051';
      setTimeout(function() {
        modal = document.getElementsByClassName("modal-backdrop")[1];
        // console.log(modal);
        modal.style.zIndex = '1050';
      }, 100);
    }
    var modal3 = (id) => {
      document.querySelector("#" + id).style.zIndex = '1053';
      setTimeout(function() {
        modal = document.getElementsByClassName("modal-backdrop")[2];
        // console.log(modal);
        modal.style.zIndex = '1052';
      }, 100);
    }
  </script>
</body>

</html>