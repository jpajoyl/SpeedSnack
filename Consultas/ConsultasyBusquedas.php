<?php  

//------------------------------------CONSULTAS--------------------------------------------------------
//CONSULTA 1
//El primer botón debe mostrar todos los datos de los usuarios que no son objeto de ninguna suscripción 
mysqli_query("SELECT * FROM usuario WHERE NOT EXISTS (SELECT codigo_subs FROM subscripcion WHERE usuario.usuario_login = subscripcion.usuario_login_seguido)"); /* tiempo: 0.0010 */

mysqli_query("SELECT * FROM usuario WHERE usuario_login NOT IN (SELECT DISTINCT usuario_login_seguido FROM subscripcion)"); /*tiempo: 0.0011*/ 


//CONSULTA 2
// El segundo botón debe mostrar el usuario_login de cada usuario, su nombre y el número de suscripciones del cual es seguidor . Si el usuario es seguidor de cero subscripciones, debe salir con número de subscripciones igual a cero.

mysqli_query(" (SELECT `usuario_login`, `nombre`, '0' AS 'numero_de_suscripciones' FROM usuario WHERE `usuario_login` NOT IN (SELECT DISTINCT `usuario_login_seguidor` FROM SUBSCRIPCION )) UNION (SELECT usuario.usuario_login,usuario.nombre,COUNT(*) AS 'numero_de_suscripciones'
			 	FROM USUARIO INNER JOIN SUBSCRIPCION ON usuario.usuario_login = subscripcion.usuario_login_seguidor
			 	GROUP BY usuario.usuario_login,usuario.nombre) ")
//CONSULTA 3
/*El tercer botón debe mostrar todos los datos de los usuarios tal que todos las subscripciones que el usuario sigue son todos de la misma fecha . Por ejemplo, un usuario que  sigue a 5 subscripciones y todas las 5 subscripciones son del 22 de abril del 2019 . Nota: El usuario debe ser al menos seguidor  de dos subscripciones para que sea mostrado.*/

mysqli_query("SELECT * FROM usuario WHERE usuario_login IN (SELECT usuario_login_seguidor FROM (SELECT usuario_login_seguidor,fecha_inicio FROM subscripcion AS S1 WHERE usuario_login_seguidor IN (SELECT usuario_login_seguidor FROM subscripcion AS S0 GROUP BY usuario_login_seguidor HAVING COUNT(*) >=2) GROUP BY usuario_login_seguidor,fecha_inicio) AS S2 GROUP BY usuario_login_seguidor HAVING COUNT(*) = 1)");




//------------------------------------BUSQUEDAS--------------------------------------------------------------


//BUSQUEDA 1
//El usuario_login de un usuario y se deben mostrar todas las subscripciones a las cuales el usuario está suscrito(o sea, de los cuales el usuario es seguidor ).

$usuario_login="jpajoyl";
mysqli_query("SELECT * FROM subscripcion WHERE usuario_login_seguidor = $usuario_login");




//BUSQUEDA 2
//El código de una suscripción y se debe mostrar: la fecha de la subscripcion y a continuación todos los datos de los usuarios que son seguidores de al menos una suscripción que pertenezca la fecha de la subscripcion ingresada en la búsqueda. Ejemplo: si se ingresa el código de subscripcion 899 y se trata de una subscripcion del 22 de abril del 2019 , se deben imprimir los datos de todos los usuarios que son seguidores de al menos una subscripcion del 22 de abril del 2019.

$codigoSubscripcion = 1;
mysqli_query("SELECT DISTINCT subscripcion.fecha_inicio ,usuario.usuario_login, usuario.correo_institucional, usuario.nombre, usuario.facultad, usuario.contraseña, usuario.descripcion, usuario.tipo, usuario.telefono, usuario.disponibilidad, usuario.campus,usuario.gustos 
			 	FROM USUARIO INNER JOIN SUBSCRIPCION ON usuario.usuario_login = subscripcion.usuario_login_seguidor
			 	WHERE  subscripcion.fecha_inicio IN	(SELECT `fecha_inicio` FROM  SUBSCRIPCION WHERE `codigo_subs` = $codigoSubscripcion )
				")


?>