$(document).ready(function() {
	verSubscripciones();
    function verSubscripciones(){
        $.ajax({
          url: 'php/CSpeedSnack.php?method=verSubscripcion',
          type: 'GET',
          success:function(data){
            if(data!=""){
              $("#tbody-subscripciones").html(data);
            }
          }
        })
    }

    $("#form-subscripcion").submit(function(event){
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
             url: 'php/CSpeedSnack.php?method=insertarSubscripcion',
             type: 'POST',
             data: data,
             success:function(data){
                 if(data==1){
                     Swal(
                       'Bien!',
                       'Lo hicimos bien!',
                       'success'
                     );
                     document.getElementById("form-subscripcion").reset();
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

   	$("#tbody-subscripciones").on("click", ".eliminar-subscripcion", function(){
   	  var idSubscripcion=$(this).attr("id-subscripcion");
   	  console.log(idSubscripcion);
   	  $.ajax({
   	       url: 'php/CSpeedSnack.php?method=eliminarSubscripcion',
   	       type: 'POST',
   	       data: {"codigoSubs":idSubscripcion},
   	       success:function(data){
   	       		console.log(data);
   	           if(data==1){
   	               Swal(
   	                 'Bien!',
   	                 'Lo hicimos bien!',
   	                 'success'
   	               );
   	               document.getElementById("form-subscripcion").reset();
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