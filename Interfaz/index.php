<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SpeedSnack | Usuarios</title>

  <!-- Bootstrap core CSS -->
  <link href="recursos/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="recursos/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Plugin CSS -->
  <link href="recursos/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/freelancer.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/sweetalert2.min.css" rel="stylesheet">

  <!-- Font awesome -->
  <link href="css/font-awesome.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">SpeedSnack <i class="fa fa-user-circle-o"></i></a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#formularios">Agregar</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#table-info">Ver datos</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#consultas">Consultas</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#busquedas">Busquedas</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Formularios de registro -->
  <section class="formularios bg-primary" id="formularios">
    <br>
    <br>
    <div class="container">
      <br>
      <div class="row">
        <div class="col-lg-6" id="container-form-usuario">
          <h3 class="text-center text-uppercase text-secondary mb-0">Usuario</h3>
          <form name="form-usuario" id="form-usuario" novalidate="novalidate" autocomplete="off">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Usuario institucional</label>
                <input class="form-control" id="input-usuario-login" type="text" placeholder="Usuario institucional" required="required">
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Correo institucional</label>
                <input class="form-control" id="input-correo-institucional" type="email" placeholder="Correo institucional" required="required" disabled>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Contraseña</label>
                <input class="form-control" id="input-contraseña" type="text" placeholder="Contraseña" required="required">
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nombre</label>
                <input class="form-control" id="input-nombre" type="text" placeholder="Nombre" required="required">
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Descripcion</label>
                <textarea class="form-control" id="input-descripcion" rows="2" placeholder="Descripcion"></textarea>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Facultad</label>
                <select class="form-control" id="input-facultad" required>
                  <option value="">Selecciona la facultad</option>
                  <option value="arquitectura">Arquitectura</option>
                  <option value="ciencias">Ciencias</option>
                  <option value="ciencias_agrarias">Ciencias agrarias</option>
                  <option value="ciencias_humanas_y_economicas">Ciencias humanas y economicas</option>
                  <option value="minas">Minas</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Rol</label>
                <select class="form-control" id="input-tipo" required>
                  <option value="">Selecciona tu rol</option>
                  <option value="comprador">Comprador</option>
                  <option value="vendedor">Vendedor</option>
                </select>
              </div>
            </div>
            <div id="inputs-comprador">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Gustos</label>
                  <input class="form-control" id="input-gustos" type="text" placeholder="Gustos">
                </div>
              </div>
            </div>
            <div id="inputs-vendedor">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Telefono de contacto</label>
                  <input class="form-control" id="input-telefono" type="tel" placeholder="Telefono de contacto" required="required">
                </div>
              </div>
               <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Campus</label>
                <select class="form-control" id="input-campus" required>
                  <option value="">Selecciona el campus</option>
                  <option value="volador">Campus Volador</option>
                  <option value="rio">Campus del Rio</option>
                  <option value="minas">Campus de Minas</option>
                </select>
              </div>
            </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="registrar-usuario">Registrar</button>
            </div>
          </form>
        </div>
        <div class="col-lg-6">
          <h3 class="text-center text-uppercase text-secondary mb-0">Suscripcion</h3>
          <form name="form-suscripcion" id="form-suscripcion" novalidate="novalidate" autocomplete="off">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Usuario seguidor</label>
                <select class="form-control inputs-usuarios" id="input-usuario-seguidor" required>
                  
                </select>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Usuario seguido</label>
                <select class="form-control inputs-usuarios" id="input-usuario-seguido" required>
                  
                </select>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Notificaciones</label>
                <select class="form-control" id="input-notificacion" required>
                  <option value="">Selecciona si desea notificaciones</option>
                  <option value="1">SI</option>
                  <option value="0">NO</option>
                </select>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="registrar-suscripcion">Registrar suscripcion</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Tabla Usuarios y Suscripcion -->
  <section id="table-info">
    <div class="container-small">
      <h3 class="text-center text-uppercase text-secondary mb-0">USUARIOS REGISTRADOS</h3>
      <div class="row mt-4">
        <div class="col-lg-12">
          <table class="table table-bordered table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">Usuario</th>
                <th scope="col">Correo</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Facultad</th>
                <th scope="col">Tipo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Disp</th>
                <th scope="col">Campus</th>
                <th scope="col">Gustos</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="tbody-usuarios">
              
            </tbody>
          </table>
          <div class="alert alert-danger display-none" role="alert" id="no-usuarios">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            Al parecer no hay registros <i class="fa fa-arrow-up"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="container-small">
      <h3 class="text-center text-uppercase text-secondary mb-0">SUSCRIPCIONES REGISTRADAS</h3>
      <div class="row mt-4">
        <div class="col-lg-12">
          <table class="table table-bordered table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">Codigo Suscripcion</th>
                <th scope="col">Seguidor</th>
                <th scope="col">Seguido</th>
                <th scope="col">Fecha inicio</th>
                <th scope="col">Notificaciones</th>
                <th scope="col"></th>

              </tr>
            </thead>
            <tbody id="tbody-suscripciones">
              
            </tbody>
          </table>
          <div class="alert alert-danger display-none" role="alert" id="no-suscripciones">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          Al parecer no hay registros <i class="fa fa-arrow-up"></i>
        </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Section -->
  <section id="consultas">
    <div class="container-small">
      <h2 class="text-center text-uppercase text-secondary mb-0">Consultas</h2>
      <hr class="star-dark mb-5">
      <div class="row">
       <div class="col-lg-8 mx-auto">
        <center>
          <button type="submit" class="btn btn-primary btn-xl" id="consulta1">Consulta 1</button>
          <button type="submit" class="btn btn-primary btn-xl" id="consulta2">Consulta 2</button>
          <button type="submit" class="btn btn-primary btn-xl" id="consulta3">Consulta 3</button>
        </center>
      </div>
    </div>
    <div class="row" id="row-consultas">
      <div class="col-lg-12">
        <table id = "table-consulta1" class="mt-4 table table-bordered table-hover">
          <thead class="thead-light">
            <h4 id="info-consulta1">El primer botón debe mostrar todos los datos de los usuarios que no son objeto de ninguna suscripción.</h4>
            <tr align="center" bottom="middle">
              <th scope="col">Usuario</th>
              <th scope="col">Correo</th>
              <th scope="col">Contraseña</th>
              <th scope="col">Nombre</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Facultad</th>
              <th scope="col">Tipo</th>
              <th scope="col">Telefono</th>
              <th scope="col">Disp</th>
              <th scope="col">Campus</th>
              <th scope="col">Gustos</th>
            </tr>
          </thead>
          <tbody id="tbody-consulta1">

          </tbody>
        </table>
        <div class="alert alert-danger display-none" role="alert" id="no-consulta1">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          Al parecer no hay registros, intenta una nueva consulta <i class="fa fa-arrow-up"></i>
        </div>
        <table id = "table-consulta2" class="mt-4 table table-bordered table-hover">
          <thead class="thead-light">
            <h4 id="info-consulta2">El segundo botón debe mostrar el usuario_login de cada usuario, su nombre y el número de suscripciones del cual es seguidor . Si el usuario es seguidor de cero suscripciones, debe salir con número de suscripciones igual a cero.</h4>
            <tr>
              <th scope="col">Usuario</th>
              <th scope="col">Nombre</th>
              <th scope="col">Numero de suscripciones</th>
            </tr>
          </thead>
          <tbody id="tbody-consulta2">

          </tbody>
        </table>
        <div class="alert alert-danger display-none" role="alert" id="no-consulta2">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          Al parecer no hay registros, intenta una nueva consulta <i class="fa fa-arrow-up"></i>
        </div>
        <table id = "table-consulta3" class="mt-4 table table-bordered table-hover">
          <thead class="thead-light">
            <h4 id="info-consulta3">El tercer botón debe mostrar todos los datos de los usuarios tal que todos las suscripciones que el usuario sigue son todos de la misma fecha . Por ejemplo, un usuario que  sigue a de 5 suscripciones y todas las 5 suscripciones son del 22 de abril del 2019 . Nota: El usuario debe ser al menos seguidor  de dos suscripciones para que sea mostrado.</h4>
            <tr>
              <th scope="col">Usuario</th>
              <th scope="col">Correo</th>
              <th scope="col">Contraseña</th>
              <th scope="col">Nombre</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Facultad</th>
              <th scope="col">Tipo</th>
              <th scope="col">Telefono</th>
              <th scope="col">Disp</th>
              <th scope="col">Campus</th>
              <th scope="col">Gustos</th>
            </tr>
          </thead>
          <tbody id="tbody-consulta3">

          </tbody>
        </table>
        <div class="alert alert-danger display-none" role="alert" id="no-consulta3">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          Al parecer no hay registros, intenta una nueva consulta <i class="fa fa-arrow-up"></i>
        </div>
      </div>
    </div>
  </div>
  </section>
  <section id="busquedas">
    <div class="container-small">
      <h2 class="text-center text-uppercase text-secondary mb-0">Busquedas</h2>
      <hr class="star-dark mb-5">
      <div class="row" id="row-busquedas">
        <div class="col-lg-12">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <h4 id="info-busqueda1">Con el usuario_login de un usuario se deben mostrar todas las suscripciones a las cuales el usuario está suscrito(o sea, de los cuales el usuario es seguidor).</h4>
              </div>
              <div class="col-lg-6">
                <form name="form-busqueda1" id="form-busqueda1" novalidate="novalidate" autocomplete="off">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <label>Usuario login </label>
                    <input class="form-control" id="input-usuario-login-busqueda" type="text" placeholder="Usuario login " required="required">
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary btn-xl" id="buscar-busqueda1">Buscar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <center>
            <div class="container-small mt-4">
              <h3 class="text-center text-uppercase text-secondary mb-0">SUSCRIPCIONES REGISTRADAS</h3>
              <div class="row mt-4">
                <div class="col-lg-12">
                  <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Codigo Suscripcion</th>
                        <th scope="col">Seguidor</th>
                        <th scope="col">Seguido</th>
                        <th scope="col">Fecha inicio</th>
                        <th scope="col">Notificaciones</th>

                      </tr>
                    </thead>
                    <tbody id="tbody-suscripciones-b1">

                    </tbody>
                  </table>
                  <div class="alert alert-danger display-none" role="alert" id="no-busqueda1">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    Al parecer no hay registros, intenta una nueva busqueda <i class="fa fa-arrow-up"></i>
                  </div>
                </div>
              </div>
            </div>
          </center>
        </div>
        <div class="col-lg-12">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <h4 id="info-busqueda2">Con el código de una suscripción se debe mostrar: la fecha de la suscripcion y a continuación todos los datos de los usuarios que son seguidores de al menos una suscripción que pertenezca la fecha de la suscripcion ingresada en la búsqueda. Ejemplo: si se ingresa el código de suscripcion 899 y se trata de una suscripcion del 22 de abril del 2019 , se deben imprimir los datos de todos los usuarios que son seguidores de al menos una suscripcion del 22 de abril del 2019.
                </h4>
              </div>
              <div class="col-lg-6">
                <form name="form-busqueda2" id="form-busqueda2" novalidate="novalidate" autocomplete="off">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <label>Codigo suscripcion</label>
                    <input class="form-control" id="input-suscripcion-busqueda" type="number" placeholder="Codigo suscripcion" required="required">
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-xl mt-4" id="buscar-busqueda2">Buscar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <center>
            <div class="container-small mt-4">
              <h3 class="text-center text-uppercase text-secondary mb-0">USUARIOS Y FECHA</h3>
              <div class="row mt-4">
                <div class="col-lg-12">
                  <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Fecha inicio</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Facultad</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Disp</th>
                        <th scope="col">Campus</th>
                        <th scope="col">Gustos</th>
                      </tr>
                    </thead>
                    <tbody id="tbody-suscripciones-b2">

                    </tbody>
                  </table>
                  <div class="alert alert-danger display-none" role="alert" id="no-busqueda2">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    Al parecer no hay registros, intenta una nueva busqueda <i class="fa fa-arrow-up"></i>
                  </div>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Integrantes</h4>
          <p class="lead mb-0">Juan Manuel Pajoy Lopez</p>
          <p class="lead mb-0">Juan Esteban Cendales Sora</p>
          <p class="lead mb-0">Juan Pablo Ortega Medina</p>
        </div>
        <div class="col-md-6">
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">Freelance is a free to use, open source Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>
      </div>
    </div>
  </footer>

  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Universidad Nacional de Colombia | Bases de datos 1 2018-2 Francisco Moreno</small>
    </div>
  </div>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>
  

  <!-- Bootstrap core JavaScript -->
  <script src="recursos/jquery/jquery.min.js"></script>
  <script src="recursos/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="recursos/jquery-easing/jquery.easing.min.js"></script>
  <script src="recursos/magnific-popup/jquery.magnific-popup.min.js"></script>


  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>
  <script src="js/sweetalert2.min.js"></script>
  <script src="js/script.js"></script>

</body>

</html>
