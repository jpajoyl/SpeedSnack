<?php 
include_once 'conexion.php';
mysqli_set_charset($conexion,"utf8");

$method = isset($_GET['method'])?$_GET['method']:"";
if (!strcmp($method,"insertarUsuario")){
	$usuarioLogin=$_POST['usuarioLogin'];
	$correoInstitucional=$_POST['correoInstitucional'];
	$nombre=$_POST['nombre'];
	$facultad=$_POST['facultad'];
	$contraseña=$_POST['contraseña'];
	$descripcion=$_POST['descripcion'];
	$tipo=$_POST['tipo'];
	$telefono=$_POST['telefono'];
	$disponibilidad=$_POST['disponibilidad'];
	$campus=$_POST['campus'];
	$gustos=$_POST['gustos'];

	$query="INSERT INTO `usuario`(`usuario_login`, `correo_institucional`, `nombre`, `facultad`, `contraseña`, `descripcion`, `tipo`, `telefono`, `disponibilidad`, `campus`, `gustos`) VALUES ('$usuarioLogin','$correoInstitucional','$nombre','$facultad','$contraseña',".(($descripcion=="")?'NULL':$descripcion).",'$tipo',".(($telefono=="")?'NULL':$telefono).",'$disponibilidad',".(($campus=="")?'NULL':$campus).",".(($gustos=="")?'NULL':$gustos).")";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		echo 1;
	}else{
		echo 0;
	}

}else if (!strcmp($method,"verUsuario")) {
	$query="SELECT * FROM `usuario` WHERE 1 ORDER BY `tipo` ASC";
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
			$table=$table."<td>".(($fila['disponibilidad']=="1")?"Si":(($fila['disponibilidad']=="0")?"No":""))."</td>";
			$table=$table."<td>".$fila['campus']."</td>";
			$table=$table."<td>".$fila['gustos']."</td>";
			$table=$table."<td><center><button class='btn btn-danger btn-xs eliminar-usuario' id-usuario='".$fila['usuario_login']."'>
						    <i class='fa fa-trash-o'></i></button></center></td>";
			$table=$table. "</tr>";
			
		}

		echo $table;
	}else{
		echo 0;
	}
}else if (!strcmp($method,"eliminarUsuario")){
	$usuarioLogin=$_POST['usuarioLogin'];
	$query="DELETE FROM `usuario` WHERE `usuario_login` = '$usuarioLogin'";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		echo 1;
	}else{
		echo 0;
	}
}else if (!strcmp($method,"insertarSuscripcion")){
	$notificacion=$_POST['notificacion'];
	//$fechaInicio=$_POST['fechaInicio'];
	$usuarioLoginSeguidor=$_POST['usuarioSeguidor'];
	$usuarioLoginSeguido=$_POST['usuarioSeguido'];

	$query= "INSERT INTO `suscripcion`(`codigo_suscripcion`, `notificacion`, `fecha_inicio`, `usuario_login_seguidor`, `usuario_login_seguido`) VALUES (NULL,'$notificacion', NOW(),'$usuarioLoginSeguidor','$usuarioLoginSeguido')";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		echo 1;
	}else{
		echo 0;
	}
}else if (!strcmp($method,"verSuscripcion")){
	$query="SELECT * FROM `suscripcion` WHERE 1";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
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
			$table=$table."<td><center><button class='btn btn-danger btn-xs eliminar-suscripcion' id-suscripcion='".$fila['codigo_suscripcion']."'>
						    <i class='fa fa-trash-o'></i></button></center></td>";
			$table=$table. "</tr>";
			
		}

		echo $table;
	}else{
		echo 0;
	}

}else if (!strcmp($method,"eliminarSuscripcion")){
	$codigoSuscripcion=$_POST['codigoSuscripcion'];
	$query="DELETE FROM `suscripcion` WHERE `codigo_suscripcion` = '$codigoSuscripcion'";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		echo 1;
	}else{
		echo 0;
	}
}else if (!strcmp($method,"usuarioOpciones")){
	$query="SELECT `usuario_login` FROM `usuario` WHERE 1";
	$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
	if($result){
		$menu="";
		$menu=$menu.'<option value="">Selecciona un usuario</option>';
		while($fila=$result->fetch_array(MYSQLI_ASSOC)){
			$menu=$menu.'<option value="'.$fila['usuario_login'].'">'.$fila['usuario_login'].'</option>';
		}
		echo $menu;
	}else{
		echo 0;
	}
}


mysqli_close($conexion);
 




 ?>