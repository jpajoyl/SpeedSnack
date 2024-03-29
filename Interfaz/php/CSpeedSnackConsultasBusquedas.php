<?php
include_once 'conexion.php';
mysqli_set_charset($conexion,"utf8");

$method = isset($_GET['method'])?$_GET['method']:"";

// CONSULTAS
if (!strcmp($method,"usuariosSinSuscripciones")){

	// CONSULTA 1
	$query="SELECT * FROM usuario WHERE NOT EXISTS (SELECT codigo_suscripcion FROM suscripcion WHERE usuario.usuario_login = suscripcion.usuario_login_seguido)";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		if(mysqli_num_rows($result)>0){
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
				$table=$table."<td>".(($fila['disponibilidad']=="1")?"Si":(($fila['disponibilidad']=="0")?"No":""))."</td>";
				$table=$table."<td>".$fila['campus']."</td>";
				$table=$table."<td>".$fila['gustos']."</td>";
				$table=$table. "</tr>";
			}

			echo $table;
		}else{
			echo 2;
		}
	}else{
		echo 0;
	}
}else if (!strcmp($method,"usuariosYSuscripciones")){
	// CONSULTA 2
	$query="(SELECT `usuario_login`, `nombre`, '0' AS 'numero_de_suscripciones' FROM usuario WHERE `usuario_login` NOT IN (SELECT DISTINCT `usuario_login_seguidor` FROM SUSCRIPCION )) UNION (SELECT usuario.usuario_login,usuario.nombre,COUNT(*) AS 'numero_de_suscripciones'
			 	FROM USUARIO INNER JOIN SUSCRIPCION ON usuario.usuario_login = suscripcion.usuario_login_seguidor
			 	GROUP BY usuario.usuario_login,usuario.nombre) ";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		if(mysqli_num_rows($result)>0){
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
			echo 2;
		}
	}else{
		echo 0;
	}
}else if (!strcmp($method,"usuariosSuscripcionesIguales")){
	// CONSULTA 3
	$query="SELECT * FROM usuario WHERE usuario_login IN (SELECT usuario_login_seguidor FROM (SELECT usuario_login_seguidor,fecha_inicio FROM suscripcion AS S1 WHERE usuario_login_seguidor IN (SELECT usuario_login_seguidor FROM suscripcion AS S0 GROUP BY usuario_login_seguidor HAVING COUNT(*) >=2) GROUP BY usuario_login_seguidor,fecha_inicio) AS S2 GROUP BY usuario_login_seguidor HAVING COUNT(*) = 1)";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		if(mysqli_num_rows($result)>0){
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
				$table=$table."<td>".(($fila['disponibilidad']=="1")?"Si":(($fila['disponibilidad']=="0")?"No":""))."</td>";
				$table=$table."<td>".$fila['campus']."</td>";
				$table=$table."<td>".$fila['gustos']."</td>";
				$table=$table. "</tr>";
			}

			echo $table;
		}else{
			echo 2;
		}
	}else{
		echo 0;
	}
}else if (!strcmp($method,"suscripcionesDeUsuario")){
	//BUSQUEDAS
	// BUSQUEDA 1
	$usuario_login=$_POST['usuarioLogin'];
	$query="SELECT * FROM suscripcion WHERE usuario_login_seguidor = '$usuario_login'";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		if(mysqli_num_rows($result)>0){
			$table="";
			while($fila=$result->fetch_array(MYSQLI_ASSOC)){
				if ($fila['notificacion'] == 1){
					$notificacion = "Si";
				}else{
					$notificacion = "No";
				}
				$table=$table."<tr>";
				$table=$table."<td>".$fila['codigo_suscripcion']."</td>";
				$table=$table."<td>".$fila['usuario_login_seguidor']."</td>";
				$table=$table."<td>".$fila['usuario_login_seguido']."</td>";
				$table=$table."<td>".$fila['fecha_inicio']."</td>";
				$table=$table."<td>".$notificacion."</td>";
				$table=$table. "</tr>";
			}

			echo $table;
		}else{
			echo 2;
		}
	}else{
		echo 0;
	}
}else if (!strcmp($method,"usuariosSuscripcionesMismaFecha")){
	//BUSQUEDA 2
	$codigoSuscripcion=$_POST['codSuscripcion'];
	$query= "SELECT DISTINCT suscripcion.fecha_inicio ,usuario.usuario_login, usuario.correo_institucional, usuario.nombre, usuario.facultad, usuario.contraseña, usuario.descripcion, usuario.tipo, usuario.telefono, usuario.disponibilidad, usuario.campus,usuario.gustos FROM USUARIO INNER JOIN SUSCRIPCION ON usuario.usuario_login = suscripcion.usuario_login_seguidor WHERE  suscripcion.fecha_inicio IN	(SELECT `fecha_inicio` FROM  SUSCRIPCION WHERE `codigo_suscripcion` = '$codigoSuscripcion') ";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		if(mysqli_num_rows($result)>0){
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
				$table=$table."<td>".(($fila['disponibilidad']=="1")?"Si":(($fila['disponibilidad']=="0")?"No":""))."</td>";
				$table=$table."<td>".$fila['campus']."</td>";
				$table=$table."<td>".$fila['gustos']."</td>";
				$table=$table. "</tr>";
			}

			echo $table;
		}else{
			echo 2;
		}
	}else{
		echo 0;
	}
}



  ?>
