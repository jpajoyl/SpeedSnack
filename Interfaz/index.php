<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SpeedSnack | Usuarios</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

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
  <!-- Portfolio Grid Section -->
  <section class="formularios bg-primary" id="formularios">
    <br>
    <br>
    <div class="container">
      <br>
      <div class="row">
        <div class="col-lg-6" id="container-form-usuario">
          <h3 class="text-center text-uppercase text-secondary mb-0">Usuario</h3>
          <form name="form-usuario" id="form-usuario" novalidate="novalidate">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Usuario institucional</label>
                <input class="form-control" id="input-usuario-login" type="text" placeholder="Usuario institucional" required="required" data-validation-required-message="Por favor ingresa el usuario.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Correo institucional</label>
                <input class="form-control" id="input-correo-institucional" type="email" placeholder="Correo institucional" required="required" data-validation-required-message="Por favor ingresa el usuario.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Contraseña</label>
                <input class="form-control" id="input-contraseña" type="text" placeholder="Contraseña" required="required" data-validation-required-message="Por favor ingresa la contraseña.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nombre</label>
                <input class="form-control" id="input-nombre" type="text" placeholder="Nombre" required="required" data-validation-required-message="Por favor ingresa el nombre.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Descripcion</label>
                <textarea class="form-control" id="input-descripcion" rows="2" placeholder="Descripcion"></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <select class="form-control" id="input-facultad" required>
                  <option value="">Selecciona la facultad</option>
                  <option value="arquitectura">Arquitectura</option>
                  <option value="ciencias">Ciencias</option>
                  <option value="ciencias_agrarias">Ciencias agrarias</option>
                  <option value="ciencias_humanas_y_economicas">Ciencias humanas y economicas</option>
                  <option value="minas">Minas</option>
                </select>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <select class="form-control" id="input-tipo" required>
                  <option value="">Selecciona tu rol</option>
                  <option value="comprador">Comprador</option>
                  <option value="vendedor">Vendedor</option>
                </select>
                <p class="help-block text-danger"></p>
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
                  <input class="form-control" id="input-telefono" type="tel" placeholder="Telefono de contacto" required="required" data-validation-required-message="Por favor ingresa un telefono.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
               <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <select class="form-control" id="input-campus" required>
                  <option value="">Selecciona el campus</option>
                  <option value="volador">Campus Volador</option>
                  <option value="rio">Campus del Rio</option>
                  <option value="minas">Campus de Minas</option>
                </select>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Registrar</button>
            </div>
          </form>
        </div>
        <div class="col-lg-6">
          <h3 class="text-center text-uppercase text-secondary mb-0">Subscripcion</h3>
          <form name="form-subscripcion" id="form-subscripcion" novalidate="novalidate">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Usuario seguidor</label>
                <select class="form-control inputs-usuarios" id="input-usuario-seguidor" required>
                  
                </select>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Usuario seguido</label>
                <select class="form-control inputs-usuarios" id="input-usuario-seguido" required>
                  
                </select>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <select class="form-control" id="input-notificacion" required>
                  <option value="">Selecciona si desea notificaciones</option>
                  <option value="1">SI</option>
                  <option value="0">NO</option>
                </select>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Registrar subscripcion</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
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
        </div>
      </div>
    </div>
    <?php
      include "juanes.php";
    ?>
  </section>

  <?php
    include "pajoy.php";
  ?>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">2215 John Daniel Drive
            <br>Clark, MO 65243</p>
        </div>
        <div class="col-md-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                <i class="fab fa-fw fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                <i class="fab fa-fw fa-google-plus-g"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                <i class="fab fa-fw fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                <i class="fab fa-fw fa-linkedin-in"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                <i class="fab fa-fw fa-dribbble"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">Freelance is a free to use, open source Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>
      </div>
    </div>
  </footer>

  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </div>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>
  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>
  <script src="js/sweetalert2.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/juanes.js"></script>
  <script src="js/pajoy.js"></script>

</body>

</html>
