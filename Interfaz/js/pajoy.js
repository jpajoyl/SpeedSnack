$(document).ready(function() {
   $('#consulta1').click(function(){
   	$.ajax({
   	  url: 'php/CSpeedSnackConsultasBusquedas.php?method=usuariosSinSubscripciones',
   	  type: 'GET',
   	  success:function(data){
   	      $("#info-consulta3").fadeOut(0);
   	      $("#info-consulta2").fadeOut(0);
   	      $("#table-consulta3").fadeOut(0);
   	      $("#table-consulta2").fadeOut(0);
   	      $("#table-consulta1").fadeIn(0);
   	      $("#info-consulta1").fadeIn(0);
   	      $("#tbody-consulta1").html(data);
   	    
   	  }
   	})
   });
   $('#consulta2').click(function(){
   	$.ajax({
   	  url: 'php/CSpeedSnackConsultasBusquedas.php?method=usuariosYSubscripciones',
   	  type: 'GET',
   	  success:function(data){
   	      $("#info-consulta3").fadeOut(0);
   	      $("#info-consulta1").fadeOut(0);
   	      $("#table-consulta3").fadeOut(0);
   	      $("#table-consulta1").fadeOut(0);
   	      $("#info-consulta2").fadeIn(0);
   	      $("#table-consulta2").fadeIn(0);
   	      $("#tbody-consulta2").html(data);
   	    
   	  }
   	})
   });
   $('#consulta3').click(function(){
   	$.ajax({
   	  url: 'php/CSpeedSnackConsultasBusquedas.php?method=usuariosSubscripcionesIguales',
   	  type: 'GET',
   	  success:function(data){
   	      $("#info-consulta2").fadeOut(0);
   	      $("#info-consulta1").fadeOut(0);
   	      $("#table-consulta1").fadeOut(0);
   	      $("#table-consulta2").fadeOut(0);
   	      $("#info-consulta3").fadeIn(0);
   	      $("#table-consulta3").fadeIn(0);
   	      $("#tbody-consulta3").html(data);
   	    
   	  }
   	})
   });
      $("#form-busqueda1").submit(function(event){
         event.preventDefault();
         var usuarioLogin=$("#input-usuario-login-busqueda").val();
        var data={
          "usuarioLogin":usuarioLogin
        }
        $.ajax({
             url: 'php/CSpeedSnackConsultasBusquedas.php?method=subscripcionesDeUsuario',
             type: 'POST',
             data: data,
             success:function(data){
              $("#tbody-subscripciones-b1").html(data);
             }
         });

      });
      $("#form-busqueda2").submit(function(event){
         event.preventDefault();
         var codSuscripcion=$("#input-subscripcion-busqueda").val();
        var data={
          "codSuscripcion":codSuscripcion
        }
        $.ajax({
             url: 'php/CSpeedSnackConsultasBusquedas.php?method=usuariosSubscripcionesMismaFecha',
             type: 'POST',
             data: data,
             success:function(data){
              $("#tbody-subscripciones-b2").html(data);
             }
         });

      });
});