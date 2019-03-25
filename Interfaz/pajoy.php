<!-- Contact Section -->
<section id="consultas">
  <div class="container-small">
    <h2 class="text-center text-uppercase text-secondary mb-0">Consultas</h2>
    <hr class="star-dark mb-5">
    <div class="row">
     <div class="col-lg-8 mx-auto">
      <center>
        <button type="submit" class="btn btn-primary btn-xl" id="consulta1">Consulta i)</button>
        <button type="submit" class="btn btn-primary btn-xl" id="consulta2">Consulta ii)</button>
        <button type="submit" class="btn btn-primary btn-xl" id="consulta3">Consulta iii)</button>
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
      <table id = "table-consulta2" class="mt-4 table table-bordered table-hover">
        <thead class="thead-light">
          <h4 id="info-consulta2">El segundo botón debe mostrar el usuario_login de cada usuario, su nombre y el número de suscripciones del cual es seguidor . Si el usuario es seguidor de cero subscripciones, debe salir con número de subscripciones igual a cero.</h4>
          <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Nombre</th>
            <th scope="col">Numero de suscripciones</th>
          </tr>
        </thead>
        <tbody id="tbody-consulta2">

        </tbody>
      </table>
      <table id = "table-consulta3" class="mt-4 table table-bordered table-hover">
        <thead class="thead-light">
          <h4 id="info-consulta3">El tercer botón debe mostrar todos los datos de los usuarios tal que todos las subscripciones que el usuario sigue son todos de la misma fecha . Por ejemplo, un usuario que  sigue a de 5 subscripciones y todas las 5 subscripciones son del 22 de abril del 2019 . Nota: El usuario debe ser al menos seguidor  de dos subscripciones para que sea mostrado.</h4>
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
    </div>
  </div>
</div>
</section>
<section id="busquedas">
  <div class="container-small">
    <h2 class="text-center text-uppercase text-secondary mb-0">Busquedas</h2>
    <hr class="star-dark mb-5">
    <div class="row" id="row-busquedas">
      <div class="col-lg-6" id="container-form-usuario">
        <center>
          <h4>El usuario_login de un usuario y se deben mostrar todas las subscripciones a las cuales el usuario está suscrito(o sea, de los cuales el usuario es seguidor).</h4>
          <form name="form-busqueda1" id="form-busqueda1" novalidate="novalidate">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>Usuario login </label>
              <input class="form-control" id="input-usuario-login-busqueda" type="text" placeholder="Usuario login " required="required" data-validation-required-message="Por favor ingresa el usuario.">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Buscar</button>
            </div>
          </form>
        </center>
        <div class="container-small">
          <h3 class="text-center text-uppercase text-secondary mb-0">SUBSCRIPCIONES REGISTRADOS</h3>
          <div class="row mt-4">
            <div class="col-lg-12">
              <table class="table table-bordered table-hover">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Codigo Subscripcion</th>
                    <th scope="col">Seguidor</th>
                    <th scope="col">Seguido</th>
                    <th scope="col">Fecha inicio</th>
                    <th scope="col">Notificaciones</th>

                  </tr>
                </thead>
                <tbody id="tbody-subscripciones-b1">

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-6" id="container-form-usuario">
        <center>
          <h4>El código de una suscripción y se debe mostrar: la fecha de la subscripcion y a continuación todos los datos de los usuarios que son seguidores de al menos una suscripción que pertenezca la fecha de la subscripcion ingresada en la búsqueda. Ejemplo: si se ingresa el código de subscripcion 899 y se trata de una subscripcion del 22 de abril del 2019 , se deben imprimir los datos de todos los usuarios que son seguidores de al menos una subscripcion del 22 de abril del 2019.
          </h4>
          <form name="form-busqueda2" id="form-busqueda2" novalidate="novalidate">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>Codigo subscripcion</label>
              <input class="form-control" id="input-subscripcion-busqueda" type="number" placeholder="Codigo subscripcion" required="required" data-validation-required-message="Por favor ingresa el codigo.">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Buscar</button>
            </div>
          </form>
        </center>
        <div class="container-small">
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
                <tbody id="tbody-subscripciones-b2">

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>