$(document).ready(function() {
  verUsuarios();
  verSuscripciones();
  tipoFormularioUsuario();
  obtenerUsuariosSuscripcion();
  $('#input-tipo').bind("change", function(e) {
    tipoFormularioUsuario();
  });

  function obtenerUsuariosSuscripcion(){
    $.ajax({
      url: 'php/CSpeedSnack.php?method=usuarioOpciones',
      type: 'GET',
      success:function(data){
        if(data!=""){
          $(".inputs-usuarios").html(data);
        }
      }
    })
  }

  function tipoFormularioUsuario(){
    var tipo=$("#input-tipo").val();
    if(tipo=="comprador"){
      $("#inputs-vendedor").fadeOut(0);
      $("#inputs-comprador").fadeIn(0);
      document.getElementById("input-telefono").value="";
      document.getElementById("input-campus").value="";
    }else if(tipo=="vendedor"){
      $("#inputs-comprador").fadeOut(0);
      $("#inputs-vendedor").fadeIn(0);
      document.getElementById("input-gustos").value="";
    }else{
      $("#inputs-vendedor").fadeOut(0);
      $("#inputs-comprador").fadeOut(0);
      document.getElementById("input-telefono").value="";
      document.getElementById("input-campus").value="";
      document.getElementById("input-gustos").value="";
    }
  }

  function verUsuarios(){
    $.ajax({
      url: 'php/CSpeedSnack.php?method=verUsuario',
      type: 'GET',
      success:function(data){
        if(data!=""){
          if(data!=0 && data!=2){
             $("#tbody-usuarios").html(data);
             $("#no-usuarios").fadeOut(0);
           }else if(data==2){
             $("#tbody-usuarios").html("");
             $("#no-usuarios").fadeIn(200);
           }else if(data==0){
             Swal(
               'Error!',
               'Ha ocurrido un error!',
               'error'
               );
           }
        }
      }
    })
  }

  $("#form-usuario").submit(function(event){
   event.preventDefault();
   var usuarioLogin=$("#input-usuario-login").val();
   var correoInstitucional=$("#input-correo-institucional").val();
   var contraseña=$("#input-contraseña").val();
   var nombre=$("#input-nombre").val();
   var descripcion=$("#input-descripcion").val();
   var facultad=$("#input-facultad").val();
   var tipo=$("#input-tipo").val();
   var gustos=$("#input-gustos").val();
   var telefono=$("#input-telefono").val();
   var disponibilidad="";
   var campus=$("#input-campus").val();

   var insertar=true;

   if(tipo=="comprador"){
    telefono="";
    campus="";
  }else if(tipo=="vendedor"){
    gustos="";
    if(telefono=="" || campus==""){
      insertar=false;
    }
    disponibilidad=1;
  }

  if(usuarioLogin=="" || correoInstitucional=="" || contraseña=="" || nombre=="" || facultad=="" || tipo==""){
    insertar=false;
  }

  if(insertar){
    var data={
      "usuarioLogin":usuarioLogin,
      "correoInstitucional":correoInstitucional,
      "nombre":nombre,
      "descripcion":descripcion,
      "facultad":facultad,
      "contraseña":contraseña,
      "descripcion":descripcion,
      "tipo":tipo,
      "telefono":telefono,
      "disponibilidad":disponibilidad,
      "campus":campus,
      "gustos":gustos
    }
    $.ajax({
     url: 'php/CSpeedSnack.php?method=insertarUsuario',
     type: 'POST',
     data: data,
     success:function(data){
      console.log(data);
      if(data==1){
       Swal(
         'Bien!',
         'Lo hicimos bien!',
         'success'
         );
       document.getElementById("form-usuario").reset();
       verUsuarios();
       verSuscripciones();
       obtenerUsuariosSuscripcion();
     }else{
       Swal(
         'Error!',
         'Ha ocurrido un error!',
         'error'
         );
     }
   }
 });
  }else{
    Swal(
      'Error!',
      'Al parecer los datos ingresados no son correctos!',
      'error'
      );
  }

});

  $("#tbody-usuarios").on("click", ".eliminar-usuario", function(){
    var idUsuario=$(this).attr("id-usuario");
    $.ajax({
     url: 'php/CSpeedSnack.php?method=eliminarUsuario',
     type: 'POST',
     data: {"usuarioLogin":idUsuario},
     success:function(data){
       if(data==1){
         Swal(
           'Bien!',
           'Lo hicimos bien!',
           'success'
           );
         document.getElementById("form-usuario").reset();
         verUsuarios();
         verSuscripciones();
       }else{
         Swal(
           'Error!',
           'Ha ocurrido un error!',
           'error'
           );
       }
     }
   });
  });

    //SUSCRIPCIONES

    function verSuscripciones(){
     $.ajax({
       url: 'php/CSpeedSnack.php?method=verSuscripcion',
       type: 'GET',
       success:function(data){
         if(data!=""){
           if(data!=0 && data!=2){
             $("#tbody-suscripciones").html(data);
             $("#no-suscripciones").fadeOut(0);
           }else if(data==2){
             $("#tbody-suscripciones").html("");
             $("#no-suscripciones").fadeIn(200);
           }else if(data==0){
             Swal(
               'Error!',
               'Ha ocurrido un error!',
               'error'
               );
           }
         }
       }
     })
   }

   $("#form-suscripcion").submit(function(event){
    event.preventDefault();
    var usuarioSeguidor=$("#input-usuario-seguidor").val();
    var usuarioSeguido=$("#input-usuario-seguido").val();
    var notificacion =$("#input-notificacion").val();


    var insertar=true;


    if(usuarioSeguidor=="" || usuarioSeguido=="" || notificacion==""){
     insertar=false;
   }

   if(usuarioSeguidor==usuarioSeguido){
    insertar=false;
  }

  if(insertar){
   var data={
     "usuarioSeguidor":usuarioSeguidor,
     "usuarioSeguido":usuarioSeguido,
     "notificacion":notificacion

   }
   $.ajax({
    url: 'php/CSpeedSnack.php?method=insertarSuscripcion',
    type: 'POST',
    data: data,
    success:function(data){
      if(data==1){
        Swal(
          'Bien!',
          'Lo hicimos bien!',
          'success'
          );
        document.getElementById("form-suscripcion").reset();
        verSuscripciones();
      }else{
        Swal(
          'Error!',
          'Ha ocurrido un error!',
          'error'
          );
      }
    }
  });
 }else{
   Swal(
     'Error!',
     'Al parecer los datos ingresados no son correctos!',
     'error'
     );
 }

});

   $("#tbody-suscripciones").on("click", ".eliminar-suscripcion", function(){
    var idSuscripcion=$(this).attr("id-suscripcion");
    console.log(idSuscripcion);
    $.ajax({
     url: 'php/CSpeedSnack.php?method=eliminarSuscripcion',
     type: 'POST',
     data: {"codigoSuscripcion":idSuscripcion},
     success:function(data){
      if(data==1){
       Swal(
         'Bien!',
         'Lo hicimos bien!',
         'success'
         );
       document.getElementById("form-suscripcion").reset();
       verSuscripciones();
     }else{
       Swal(
         'Error!',
         'Ha ocurrido un error!',
         'error'
         );
     }
   }
 });
  });

      //CONSULTAS

      $('#consulta1').click(function(){
        $.ajax({
          url: 'php/CSpeedSnackConsultasBusquedas.php?method=usuariosSinSuscripciones',
          type: 'GET',
          success:function(data){
            $("#info-consulta3").fadeOut(0);
            $("#info-consulta2").fadeOut(0);
            $("#table-consulta3").fadeOut(0);
            $("#table-consulta2").fadeOut(0);
            $("#table-consulta1").fadeIn(0);
            $("#info-consulta1").fadeIn(0);
            $("#table-consulta1").fadeIn(0);
            if(data!=0 && data!=2){
              $("#tbody-consulta1").html(data);
              $("#no-consulta1").fadeOut(0);
              $("#no-consulta2").fadeOut(0);
              $("#no-consulta3").fadeOut(0);
            }else if(data==2){
              $("#tbody-consulta1").html("");
              $("#no-consulta1").fadeIn(200);
              $("#no-consulta2").fadeOut(0);
              $("#no-consulta3").fadeOut(0);
            }else if(data==0){
              Swal(
                'Error!',
                'Ha ocurrido un error!',
                'error'
                );
            }
          }
        })
      });
      $('#consulta2').click(function(){
        $.ajax({
          url: 'php/CSpeedSnackConsultasBusquedas.php?method=usuariosYSuscripciones',
          type: 'GET',
          success:function(data){
            $("#info-consulta3").fadeOut(0);
            $("#info-consulta1").fadeOut(0);
            $("#table-consulta3").fadeOut(0);
            $("#table-consulta1").fadeOut(0);
            $("#info-consulta2").fadeIn(0);
            $("#table-consulta2").fadeIn(0);
            $("#table-consulta2").fadeIn(0);
            if(data!=0 && data!=2){
              $("#tbody-consulta2").html(data);
              $("#no-consulta1").fadeOut(0);
              $("#no-consulta2").fadeOut(0);
              $("#no-consulta3").fadeOut(0);
            }else if(data==2){
              $("#tbody-consulta2").html("");
              $("#no-consulta2").fadeIn(200);
              $("#no-consulta1").fadeOut(0);
              $("#no-consulta3").fadeOut(0);
            }else if(data==0){
              Swal(
                'Error!',
                'Ha ocurrido un error!',
                'error'
                );
            }
          }
        })
      });
      $('#consulta3').click(function(){
        $.ajax({
          url: 'php/CSpeedSnackConsultasBusquedas.php?method=usuariosSuscripcionesIguales',
          type: 'GET',
          success:function(data){
            $("#info-consulta2").fadeOut(0);
            $("#info-consulta1").fadeOut(0);
            $("#table-consulta1").fadeOut(0);
            $("#table-consulta2").fadeOut(0);
            $("#info-consulta3").fadeIn(0);
            $("#table-consulta3").fadeIn(0);
            if(data!=0 && data!=2){
              $("#tbody-consulta3").html(data);
              $("#no-consulta1").fadeOut(0);
              $("#no-consulta2").fadeOut(0);
              $("#no-consulta3").fadeOut(0);
            }else if(data==2){
              $("#tbody-consulta3").html("");
              $("#no-consulta3").fadeIn(200);
              $("#no-consulta1").fadeOut(0);
              $("#no-consulta2").fadeOut(0);
            }else if(data==0){
              Swal(
                'Error!',
                'Ha ocurrido un error!',
                'error'
                );
            }
          }
        })
      });

      //BUSQUEDAS

      $("#form-busqueda1").submit(function(event){
        event.preventDefault();
        var usuarioLogin=$("#input-usuario-login-busqueda").val();
        var data={
         "usuarioLogin":usuarioLogin
       }
       $.ajax({
        url: 'php/CSpeedSnackConsultasBusquedas.php?method=suscripcionesDeUsuario',
        type: 'POST',
        data: data,
        success:function(data){
          if(data!=0 && data!=2){
            $("#tbody-suscripciones-b1").html(data);
            $("#no-busqueda1").fadeOut(0);
          }else if(data==2){
            $("#tbody-suscripciones-b1").html("");
            $("#no-busqueda1").fadeIn(200);
          }else if(data==0){
            Swal(
              'Error!',
              'Ha ocurrido un error!',
              'error'
              );
          }
       }
     });

     });
      $("#form-busqueda2").submit(function(event){
        event.preventDefault();
        var codSuscripcion=$("#input-suscripcion-busqueda").val();
        var data={
         "codSuscripcion":codSuscripcion
       }
       $.ajax({
        url: 'php/CSpeedSnackConsultasBusquedas.php?method=usuariosSuscripcionesMismaFecha',
        type: 'POST',
        data: data,
        success:function(data){
          if(data!=0 && data!=2){
            $("#tbody-suscripciones-b2").html(data);
            $("#no-busqueda2").fadeOut(0);
          }else if(data==2){
            $("#tbody-suscripciones-b2").html("");
            $("#no-busqueda2").fadeIn(200);
          }else if(data==0){
            Swal(
              'Error!',
              'Ha ocurrido un error!',
              'error'
              );
          }
       }
     });

     });

    });