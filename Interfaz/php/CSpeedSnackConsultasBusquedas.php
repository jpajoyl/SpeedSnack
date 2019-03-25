<?php
include_once 'conexion.php';
mysqli_set_charset($conexion,"utf8");

$method = isset($_GET['method'])?$_GET['method']:"";

// CONSULTAS
if (!strcmp($method,"usuariosSinSubscripciones")){

	// CONSULTA 1
	$query="SELECT * FROM usuario WHERE NOT EXISTS (SELECT codigo_subs FROM subscripcion WHERE usuario.usuario_login = subscripcion.usuario_login_seguido)";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		$table="";
		while($fila=$result->fetch_array(MYSQLI_ASSOC)){
			$table=$table."<tr>";
			$table=$table."<td>".$fila['usuario_login']."</td>";
			$table=$table."<td>".$fila['correo_institucional']."</td>";
			$table=$table."<td>".$fila['contraseña']."</td>";
			$table=$table."<td>".$fila['nombre']."</td>";
			$table=$table."<td>".$fila['descripcion']."</td>";
			$table=$table."<td>".$fila['facultad']."</td>";
			$table=$table."<td>".$fila['tipo']."</td>";
			$table=$table."<td>".$fila['telefono']."</td>";
			$table=$table."<td>".$fila['disponibilidad']."</td>";
			$table=$table."<td>".$fila['campus']."</td>";
			$table=$table."<td>".$fila['gustos']."</td>";
			$table=$table. "</tr>";
		}

		echo $table;
	}else{
		echo 0;
	}
}else if (!strcmp($method,"usuariosYSubscripciones")){
	// CONSULTA 2
	$query="(SELECT `usuario_login`, `nombre`, '0' AS 'numero_de_suscripciones' FROM usuario WHERE `usuario_login` NOT IN (SELECT DISTINCT `usuario_login_seguidor` FROM SUBSCRIPCION )) UNION (SELECT usuario.usuario_login,usuario.nombre,COUNT(*) AS 'numero_de_suscripciones'
			 	FROM USUARIO INNER JOIN SUBSCRIPCION ON usuario.usuario_login = subscripcion.usuario_login_seguidor
			 	GROUP BY usuario.usuario_login,usuario.nombre) ";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		$table="";
		while($fila=$result->fetch_array(MYSQLI_ASSOC)){
			$table=$table."<tr>";
			$table=$table."<td>".$fila['usuario_login']."</td>";
			$table=$table."<td>".$fila['nombre']."</td>";
			$table=$table."<td>".$fila['numero_de_suscripciones']."</td>";
			$table=$table. "</tr>";
		}

		echo $table;
	}else{
		echo 0;
	}
}else if (!strcmp($method,"usuariosSubscripcionesIguales")){
	// CONSULTA 3
	$query="SELECT * FROM usuario WHERE usuario_login IN (SELECT usuario_login_seguidor FROM (SELECT usuario_login_seguidor,fecha_inicio FROM subscripcion AS S1 WHERE usuario_login_seguidor IN (SELECT usuario_login_seguidor FROM subscripcion AS S0 GROUP BY usuario_login_seguidor HAVING COUNT(*) >=2) GROUP BY usuario_login_seguidor,fecha_inicio) AS S2 GROUP BY usuario_login_seguidor HAVING COUNT(*) = 1)";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		$table="";
		while($fila=$result->fetch_array(MYSQLI_ASSOC)){
			$table=$table."<tr>";
			$table=$table."<td>".$fila['usuario_login']."</td>";
			$table=$table."<td>".$fila['correo_institucional']."</td>";
			$table=$table."<td>".$fila['contraseña']."</td>";
			$table=$table."<td>".$fila['nombre']."</td>";
			$table=$table."<td>".$fila['descripcion']."</td>";
			$table=$table."<td>".$fila['facultad']."</td>";
			$table=$table."<td>".$fila['tipo']."</td>";
			$table=$table."<td>".$fila['telefono']."</td>";
			$table=$table."<td>".$fila['disponibilidad']."</td>";
			$table=$table."<td>".$fila['campus']."</td>";
			$table=$table."<td>".$fila['gustos']."</td>";
			$table=$table. "</tr>";
		}

		echo $table;
	}else{
		echo 0;
	}
}else if (!strcmp($method,"subscripcionesDeUsuario")){
	//BUSQUEDAS
	// BUSQUEDA 1
	$usuario_login=$_POST['usuarioLogin'];
	$query="SELECT * FROM subscripcion WHERE usuario_login_seguidor = '$usuario_login'";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		$table="";
		while($fila=$result->fetch_array(MYSQLI_ASSOC)){
			$table=$table."<tr>";
			$table=$table."<td>".$fila['codigo_subs']."</td>";
			$table=$table."<td>".$fila['usuario_login_seguidor']."</td>";
			$table=$table."<td>".$fila['usuario_login_seguido']."</td>";
			$table=$table."<td>".$fila['fecha_inicio']."</td>";
			$table=$table."<td>".$fila['notificacion']."</td>";
			$table=$table. "</tr>";
		}

		echo $table;
	}else{
		echo 0;
	}
}else if (!strcmp($method,"usuariosSubscripcionesMismaFecha")){
	//BUSQUEDA 2
	$codigoSubs=$_POST['codSuscripcion'];
	$query= "SELECT DISTINCT subscripcion.fecha_inicio ,usuario.usuario_login, usuario.correo_institucional, usuario.nombre, usuario.facultad, usuario.contraseña, usuario.descripcion, usuario.tipo, usuario.telefono, usuario.disponibilidad, usuario.campus,usuario.gustos FROM USUARIO INNER JOIN SUBSCRIPCION ON usuario.usuario_login = subscripcion.usuario_login_seguidor WHERE  subscripcion.fecha_inicio IN	(SELECT `fecha_inicio` FROM  SUBSCRIPCION WHERE `codigo_subs` = '$codigoSubs') ";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		$table="";
		while($fila=$result->fetch_array(MYSQLI_ASSOC)){
			$table=$table."<tr>";
			$table=$table."<td>".$fila['fecha_inicio']."</td>";
			$table=$table."<td>".$fila['usuario_login']."</td>";
			$table=$table."<td>".$fila['correo_institucional']."</td>";
			$table=$table."<td>".$fila['contraseña']."</td>";
			$table=$table."<td>".$fila['nombre']."</td>";
			$table=$table."<td>".$fila['descripcion']."</td>";
			$table=$table."<td>".$fila['facultad']."</td>";
			$table=$table."<td>".$fila['tipo']."</td>";
			$table=$table."<td>".$fila['telefono']."</td>";
			$table=$table."<td>".$fila['disponibilidad']."</td>";
			$table=$table."<td>".$fila['campus']."</td>";
			$table=$table."<td>".$fila['gustos']."</td>";
			$table=$table. "</tr>";
		}

		echo $table;
	}else{
		echo 0;
	}
}



  ?>
