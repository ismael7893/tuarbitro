<!doctype html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- Required meta tags -->

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>INICIO</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg " style="background-color:#14913E ;">
      <a class="navbar-brand" href="#">Tuarbitro</a>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" style="color:white; font-size:20px;  margin-left: 200px;" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:white; font-size:20px;" href="#">Tuarbitro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:white; font-size:20px;" href="#">Campeonatos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:white; font-size:20px;" href="#">Tutoriales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:white; font-size:20px;" href="#">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:white; font-size:20px;" href="#">Descarga</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:white; font-size:20px;" href="#">Planes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:white; font-size:20px;" href="#">Contacto</a>
          </li>
          <li class="nav-item dropdown">
            <select class="form-control" style="margin-top: 10px; ">
              <option>Español</option>
              <option>Ingles</option>
              <option>Frances</option>
              <option>Portugues</option>
              <option>Italiano</option>
            </select>
      </div>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Ingresar</button>
      </ul>
      </div>
    </nav>
  </header>
  <div class="jumbotron text-center" style="background: #ffd400;">
    <h1>CAMPEONATOS</h1>
    <p>Aqui você encontra os mais variados tipos de campeonatos</p>
  </div>
  <div class="container">
    <div class="row">
      <div id="listChampios" class="col-sm-6">
        <h3 style="text-align: center; color: gray;">CAMPEONATOS</h3>
      </div>
      <div class="col-sm-6">
        <h3 style="text-align: center; color: gray;">CAMPEONATOS SEGUIDOS</h3>
        <div class="border mb-2">
          <img src="https://firebasestorage.googleapis.com/v0/b/copafacil-web.appspot.com/o/users%2F9B2CbvqFMWh4tPoUhOcYQSBBMCY2%2F1549203206022.png?alt=media&token=178b06a7-a1b9-421b-a5e3-7624d040b388" style="width:70px; height: 70px; float: left;" />
          <h4>Liga Movistar 1 2020</h4>
          <p>Liga de Futbol Profesional</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingresar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-sm-12">
            <label for="exampleForm2">Usuario</label>
            <input type="text" id="username" class="form-control">
            <label for="exampleForm2">Contrasena</label>
            <input type="password" id="password" class="form-control">
            <div id="message" class="alert alert-warning mt-2"></div>
            <button class="btn btn-primary w-100 my-3" onclick="login()">Ingresar</button>
          </div>
          <div class="col-sm-12">
            <button type="button" class="btn btn-success w-100 mb-3" data-toggle="modal" data-target="#register">Registrar</button>
          </div>
          <div class="col-sm-12">
            <button type="button" class="btn btn-info w-100 mb-3">Facebook</button>
          </div>
          <div class="col-sm-12">
            <button type="button" class="btn btn-danger w-100 mb-3">Google</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-sm-12">
            <label for="exampleForm2">Nombre</label>
            <input type="text" id="name" class="form-control">
            <label for="exampleForm2">email</label>
            <input type="email" id="email" class="form-control">
            <label for="exampleForm2">Usuario</label>
            <input type="text" id="user" class="form-control">
            <label for="exampleForm2">Contraseña</label>
            <input type="password" id="pass" class="form-control">
            <label for="exampleForm2">Confirmar contraseña</label>
            <input type="password" id="passConfir" class="form-control">
            <div id="message2" class="alert alert-warning mt-2"></div>
            <button class="btn btn-primary w-100 my-3" onclick="save()">Registrarme</button>
          </div>
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
    document.querySelector("#message2").style.display = 'none';
    var login = function() {
      data = {
        username: document.querySelector("#username").value,
        password: document.querySelector("#password").value
      }
      axios.get(`api/index.php?type=login&username=${data.username}&password=${data.password}`).then(function(data) {
        console.log(data.data);
        if (data.data.errors) {
          document.querySelector("#message").style.display = 'block';
          document.querySelector("#message").innerHTML = data.data.errors[0].description;
        }
        if (data.data.data) {
          localStorage.setItem('id', data.data.data.id);
          localStorage.setItem('role', data.data.data.role);
          localStorage.setItem('name', data.data.data.name);
          localStorage.setItem('username', data.data.data.username);
          location.href = "?view=user";
        }
      });
    }
    var save = function() {
      data = {
        name: document.querySelector('#name').value,
        email: document.querySelector('#email').value,
        user: document.querySelector('#user').value,
        pass: document.querySelector('#pass').value,
        passConfir: document.querySelector('#passConfir').value
      }
      if (data.pass === data.passConfir) {
        document.querySelector("#message2").style.display = 'block';
        document.querySelector("#message2").innerHTML = "Las contraseña no coinciden verifique se sean iguales.";
      } else {
        axios.get(`api/index.php?type=login&name=${data.name}&email=${data.email}&user=${data.user}&pass=${data.pass}`).then(function(data) {
          console.log(data.data);
          if (data.data.errors) {
            document.querySelector("#message").style.display = 'block';
            document.querySelector("#message").innerHTML = data.data.errors[0].description;
          }
          if (data.data.data) {
            localStorage.setItem('id', data.data.data.id);
            localStorage.setItem('role', data.data.data.role);
            localStorage.setItem('name', data.data.data.name);
            localStorage.setItem('username', data.data.data.username);

            // location.href = "?view=user";
          }
        });
      }
    }
    var loadData = function() {
      axios.get('api/index.php?type=listcampeonatos').then(function(data) {
        if (data.data[0]) {
          let html = '';
          for (let i = 0; i < data.data.length; i++) {
            const element = data.data[i];
            html += `<div class="border mb-2">
                  <img src="${element.logo}" style="width:70px; height: 70px; float: left;"/>
                  <h4>${element.nombre}</h4>
                  <p>${element.description}</p>
                </div>`;
          }
          document.querySelector('#listChampios').innerHTML += html;
        }
      });
    }
    loadData();
  </script>
</body>

</html>