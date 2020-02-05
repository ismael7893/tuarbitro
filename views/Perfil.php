<!DOCTYPE html>
<html lang="">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=gb18030">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="views/style.css">
</head>

<body>
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
                  Esapñol
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Ingles</a>
                  <a class="dropdown-item" href="#">Frances</a>
                  <a class="dropdown-item" href="#">Portugues</a>
                  <a class="dropdown-item" href="#">Italiano</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Perfil</a>
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
  <div class="row">
    <div class="container">
      <div class="row mt-5">
        <div class="col-xs-12 col-md-4 mb-2">
          <div class="card">
            <div class="text-center my-2">
              <img style="width: 70%;max-width:80px;" src="https://disenopaginasweb.club/wp-content/uploads/2019/04/usuario.png">
            </div>
            <h5 class="text-center">Usuario</h5>
            <h6 class="text-center">corero </h6>
            <div class="text-center my-1">
              <button class="btn btn-outline-secondary">Mis equipos</button>
            </div>
            <div class="text-center mt-1 mb-3">
              <button class="btn btn-success">Planes de suscripcion</button>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-4  mb-2">
          <div class="card">
            <div class="card-body">
              <div>
                <h2>Canpeonatos siguientes</h2>
              </div>
              <div>
                <h4>No hay campeonatos disponibles</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-4  mb-2">
          <div class="card">
            <div class="card-body">
              <div>
                <h2>Mis campeonatos</h2>
                <div id="message" class="alert alert-warning"></div>
              </div>
              <div class="form-group">
                <img src="">
                <input type="text" name="txt" placeholder="nombre del campeonato">
              </div>
              <ul id="list-champions">
              </ul>
              <div>
                <button class=" btn btn-primary" data-toggle="modal" data-target="#agregar">
                  Nuevo campeonato
                </button>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
  <!-- modal-->
  <div class="modal" id="agregar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Agregar Campeonato</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleFormControlInput1">Nombre del campeonato</label>
            <input type="text" class="form-control" id="name" placeholder="Nombre del campeonato">
          </div>
          <div class="form-row">
            <div class="col">
              <label for="exampleFormControlSelect1">Estadio</label>
              <input class="form-control" type="text" id="stadium" placeholder="Estadio">
            </div>
            <div class="col">
              <label for="exampleFormControlSelect1">Organizador</label>
              <input class="form-control" type="text" id="organizer" placeholder="Organizador">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Ubicacion</label>
            <input type="text" class="form-control" id="ubication" placeholder="Nombre del campeonato">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Descripción</label>
            <input type="text" class="form-control" id="description" placeholder="Nombre del campeonato">
          </div>
          <div class="form-row">
            <div class="col">
              <label for="exampleFormControlSelect1">Tipo de campeonato</label>
              <select class="form-control" id="tipe">
                <option>Campeonato Individual</option>
                <option>Campeonato Categoria</option>
              </select>
            </div>
            <div class="col">
              <label for="exampleFormControlSelect1">Eliga el deporte</label>
              <select class="form-control" id="sport">
                <option>Futbol</option>
                <option>futbol</option>
                <option>tenis</option>
                <option>Tenis de Mesa</option>
                <option>Voley</option>
                <option>Otros</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="exampleFormControlSelect1">Fecha de inicio</label>
              <input class="form-control" type="date" id="dateini">
            </div>
            <div class="col">
              <label for="exampleFormControlSelect1">Fecha de fin</label>
              <input class="form-control" type="date" id="dateFin">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div id="message" class="alert alert-warning"></div>
          <button type="button" class="btn btn-success" onclick="saveChampion()">Guardar campeonato</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
  <script>
    document.querySelector("#message").style.display = 'none';
    var saveChampion = function() {
      data = {
        userId: localStorage.getItem('username'),
        name: document.querySelector("#name").value,
        stadium: document.querySelector("#stadium").value,
        organizer: document.querySelector("#organizer").value,
        ubication: document.querySelector("#ubication").value,
        description: document.querySelector("#description").value,
        tipe: document.querySelector("#tipe").value,
        sport: document.querySelector("#sport").value,
        dateini: document.querySelector("#dateini").value,
        dateFin: document.querySelector("#dateFin").value
      }
      let ruta = `api/index.php?type=autogeneratecampeonato&idUser=${data.userId}&name=${data.name}&stadius=${data.stadium}&organizer=${data.organizer}&ubication=${data.ubication}&description=${data.description}&tipe=${data.tipe}&sport=${data.sport}&date_ini=${data.dateini}&date_fin=${data.dateFin}`;

      axios.get(ruta).then(function(data) {
        console.log(data.data);
        if (data.data.errors) {
          document.querySelector("#message").style.display = 'block';
          document.querySelector("#message").innerHTML = data.data.errors[0].description;
        }
        if (data.data.data) {
          let champion = data.data.data;
          var template = `<li class="line-bottom" onclick=viewChampions(${champion.id})>
                            <h3>${champion.nombre}</h3>
                            <h6>${champion.estadio}</h6>
                          </li>`;
          document.querySelector("#list-champions").innerHTML += template;
          removeModal();
        }
      });
    }
    var loadChampions = function() {
      let user = localStorage.getItem('username');
      ruta = `api/index.php?type=campeonatosporcreador&user=${user}`;
      axios.get(ruta).then(function(data) {
        if (data.data) {
          var list = "";
          for (i = 0; i < data.data.length; i++) {
            champion = data.data[i];
            list += `<li class="line-bottom" onclick=viewChampions(${champion.id})>
                            <h3>${champion.nombre}</h3>
                            <h6>${champion.estadio}</h6>
                          </li>`;
          }
          console.log(list);
          document.querySelector("#list-champions").innerHTML = list;
        } else {
          console.log("error");
        }
      });
    }
    var viewChampions = function(id) {
      localStorage.setItem('champions', id);
      location.href = '?view=champions';
    }
    var removeModal = function() {
      document.querySelector(".modal").classList.remove('show');
      document.querySelector(".modal-backdrop").remove();
    }
    loadChampions();
  </script>
</body>

</html>