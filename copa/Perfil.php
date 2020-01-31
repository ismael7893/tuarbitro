<!DOCTYPE html>
<html lang="">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
   
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
     <nav class="navbar" style="background-color: green; width: 100%;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Tuarbitro</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
     <li><select class="form-control" style="margin-top: 10px; ">
         <option>Espa�0�9ol</option>
         <option>Ingles</option>
         <option>Frances</option>
         <option>Portugues</option>
         <option>Italiano</option>
     </select></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Salir</a></li>
    </ul>
  </div>
    </nav>
       
      <div class="row">
          <div class="container">
     <div class="card col-8 center-align perfil" style="background-color:silver">
         <img  style="width: 70%;max-width:80px; " 
         src="https://disenopaginasweb.club/wp-content/uploads/2019/04/usuario.png"><h5 style="position: relative;text-align:center ">Usuario</h5>
         <h6 style="position: relative;text-align:center">corero </h6><div  style="display: flex;justify-content: center;padding: 8px;">
             <button class="btn btn-outline-secondary">Mis equipos</button></div><div style="display: flex;justify-content: center;padding: 8px;">
        <button class="btn btn-success">Planes de suscripcion</button></div></div> 
     
<div class="card col-8 mv-100" style=" background-color:silver;width: 20%;height:130px;">
  <div class="card-body">
    <div>
        <h2>Canpeonatos siguientes</h2>
    </div>
    <div>
        <h4>No hay campeonatos disponibles</h4>
    </div>
  </div>
</div>

  <div class="card col-4 mv-100" style="background-color:silver;width: 20%;height:130px;">
  <div class="card-body">
    <div>
        <h2>Mis campeonatos</h2>
    </div>
    <div class="form-group">
       <img src="...">
        <input type="text" name="txt" placeholder="nombre del campeonato">
    </div>
    <div>
        <button class=" btn btn-primary"data-toggle="modal" data-target="#agregar" style=" margin-left: 30px;">
            Nuevo campeonato
        </button>
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
        <form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre del campeonato</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre del campeonato">
  </div>
  <div class="form-row">
   <div class="col">
    <label for="exampleFormControlSelect1">Tipo de campeonato</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Campeonato Individual</option>
      <option>Campeonato Categoria</option>
      
    </select>
    </div>
    <div class="col">
    <label for="exampleFormControlSelect1">Eliga el deporte</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Futbol</option>
      <option>futbol</option>
      <option>tenis</option>
        <option>Tenis de Mesa</option>
         <option>Voley</option>
            <option>Otros</option>
    </select>
    </div>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Nuevo Campeonato</button>
      </div>
    </div>
  </div>
</div> 

</body>
 <style>
    </style>   
</html>