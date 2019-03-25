$(document).ready(function() {
    verUsuarios();
    tipoFormularioUsuario();
    obtenerUsuariosSubscripcion();
   	$('#input-tipo').bind("change", function(e) {
        tipoFormularioUsuario();
    });

    function obtenerUsuariosSubscripcion(){
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
              $("#tbody-usuarios").html(data);
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
                     verSubscripciones();
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
                   verSubscripciones();
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

});