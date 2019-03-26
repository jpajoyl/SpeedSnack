
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP DATABASE IF EXISTS `SpeedSnack`;

CREATE DATABASE `SpeedSnack`;

USE `SpeedSnack`;

CREATE TABLE USUARIO (
	`usuario_login` varchar(20) , 
	`correo_institucional` varchar(30) NOT NULL,
	`nombre` varchar(20) NOT NULL,
	`facultad` varchar(20) NOT NULL,
	`contraseña` varchar(20) NOT NULL,
	`descripcion` varchar(255),
	`tipo` varchar(10) NOT NULL,
	`telefono` bigint,
	`disponibilidad` tinyint(1),
	`campus` varchar(10),
	`gustos` varchar(255),
	UNIQUE(`correo_institucional`),
	PRIMARY KEY(`usuario_login`)
);

ALTER TABLE USUARIO ADD 
	CONSTRAINT `chk_tipo`
		CHECK( `tipo` IN ('vendedor','comprador'));

ALTER TABLE USUARIO ADD 
	CONSTRAINT `chk_subtipos`
		CHECK((`tipo` = 'vendedor' AND `telefono` IS NOT NULL AND `disponibilidad` IS NOT NULL AND `campus` IS NOT NULL AND `gustos` IS NULL) OR (tipo = 'comprador' AND `telefono` IS NULL AND `disponibilidad` IS NULL AND `campus` IS NULL AND `gustos` IS NOT NULL));

ALTER TABLE USUARIO ADD 
	CONSTRAINT `chk_campus`
		CHECK (`campus` IN ('minas','volador','rio'));

ALTER TABLE USUARIO ADD 
	CONSTRAINT `chk_correo`
		CHECK (SUBSTRING_INDEX(`correo_institucional`, '@', -1) = 'unal.edu.co');

ALTER TABLE USUARIO ADD 
	CONSTRAINT `chk_usuario_correo`
		CHECK (SUBSTRING_INDEX(`correo_institucional`, '@', 1) = `usuario_login`);


CREATE TABLE COMPRA (
	codigo int(12),
	estado varchar(9) NOT NULL,
	fecha date NOT NULL,
	hora time NOT NULL,
	puntaje_vendedor int(12),
	puntaje_comprador int(12),
	descripcion_vendedor varchar(140),
	descripcion_comprador varchar(140),
	usuario_login_vendedor varchar(20) NOT NULL,
	usuario_login_comprador varchar(20) NOT NULL,
	PRIMARY KEY (codigo),
	FOREIGN KEY (usuario_login_vendedor) REFERENCES USUARIO(usuario_login) ON DELETE CASCADE,
	FOREIGN KEY (usuario_login_comprador) REFERENCES USUARIO(usuario_login) ON DELETE CASCADE,
	CHECK (estado='aceptada' OR estado='rechazada' OR estado='pendiente'),
	CHECK (puntaje_vendedor BETWEEN 0 AND 5),
	CHECK (puntaje_comprador BETWEEN 0 AND 5)
);
ALTER TABLE COMPRA ADD 
	CONSTRAINT chk_tipo_comprador
		CHECK (usuario_login_comprador IN (SELECT usuario_login FROM USUARIO WHERE usuario_login=usuario_login_comprador AND tipo='comprador'));

ALTER TABLE COMPRA ADD 
	CONSTRAINT chk_tipo_vendedor
		CHECK (usuario_login_vendedor IN (SELECT usuario_login FROM USUARIO WHERE usuario_login=usuario_login_vendedor AND tipo='vendedor'));


        
CREATE TABLE SUSCRIPCION(
	codigo_suscripcion int(12) AUTO_INCREMENT,
	notificacion tinyint(1) NOT NULL,
	fecha_inicio date NOT NULL,
	usuario_login_seguidor varchar(20) NOT NULL,
	usuario_login_seguido varchar(20) NOT NULL,
	PRIMARY KEY (codigo_suscripcion),
	UNIQUE (usuario_login_seguidor, usuario_login_seguido),
	FOREIGN KEY (usuario_login_seguido) REFERENCES USUARIO(usuario_login) ON DELETE CASCADE,
	FOREIGN KEY (usuario_login_seguidor) REFERENCES USUARIO(usuario_login) ON DELETE CASCADE,
	CHECK (usuario_login_seguidor <> usuario_login_seguido)
);



CREATE TABLE PUNTO_DE_VENTA(
		`usuario_login` VARCHAR(20) NOT NULL,
		`lugar` VARCHAR(45) NOT NULL,
		`bloque_referencia`VARCHAR(45) NOT NULL,
		PRIMARY KEY(`usuario_login`),
		CONSTRAINT `fk_usuario_login_punto_de_venta`
			FOREIGN KEY(`usuario_login`) REFERENCES `SpeedSnack`.`USUARIO` (`usuario_login`) ON DELETE CASCADE	
	);
ALTER TABLE PUNTO_DE_VENTA ADD 
	CONSTRAINT `chk_tipo`
		CHECK (`usuario_login` IN (SELECT `usuario_login` FROM `USUARIO` WHERE `usuario_login`=`usuario_login` AND `tipo`=`vendedor`));


CREATE TABLE DOMICILIARIO(
		`usuario_login` VARCHAR(20) NOT NULL,
		`intercampus` TINYINT(1) NOT NULL,
		`precio_intercampus`INT(12) NOT NULL,
		PRIMARY KEY(`usuario_login`),
		CONSTRAINT `fk_usuario_login_domiciliario`
			FOREIGN KEY(`usuario_login`) REFERENCES `SpeedSnack`.`USUARIO` (`usuario_login`) ON DELETE CASCADE	
	);
ALTER TABLE DOMICILIARIO ADD 
	CONSTRAINT `chk_tipo`
		CHECK (`usuario_login` IN (SELECT `usuario_login` FROM `USUARIO` WHERE `usuario_login`=`usuario_login` AND `tipo`=`vendedor`));

CREATE TABLE PRODUCTO(
		`codigo_producto` INT NOT NULL AUTO_INCREMENT,
		`nombre` VARCHAR(100) NOT NULL,
		`categoria` VARCHAR(100),
		PRIMARY KEY(`codigo_producto`),
		UNIQUE(`nombre`)
	);

CREATE TABLE INVENTARIOxPRODUCTOxVENDEDOR(
	`usuario_login` varchar(20),
	`codigo_producto` int (12) ,
	`precio` int(12) NOT NULL,
	`unidades` int(12) NOT NULL,
	PRIMARY KEY (`codigo_producto`,`usuario_login`),
	FOREIGN KEY (`usuario_login`) REFERENCES USUARIO(usuario_login) ON DELETE CASCADE,
	FOREIGN KEY (`codigo_producto`) REFERENCES PRODUCTO(codigo_producto) ON DELETE CASCADE

);

ALTER TABLE INVENTARIOxPRODUCTOxVENDEDOR ADD 
	CONSTRAINT `chk_precio`
		CHECK (`precio` >= 0);

ALTER TABLE INVENTARIOxPRODUCTOxVENDEDOR ADD 
	CONSTRAINT `chk_unidades`
		CHECK (`unidades` >= 0);


CREATE TABLE ARTICULO_POR_COMPRA(
		`usuario_login` VARCHAR(20) NOT NULL,
		`codigo_producto` INT(12) NOT NULL,
		`codigo` INT(12) NOT NULL,
		`unidades_compradas` INT(12) NOT NULL,
		PRIMARY KEY(`usuario_login`,`codigo_producto`,`codigo`),
		CONSTRAINT `fk_usuario_login_codigo_producto`
			FOREIGN KEY(`usuario_login`,`codigo_producto`) 
			REFERENCES `SpeedSnack`.`INVENTARIOxPRODUCTOxVENDEDOR` (`usuario_login`,`codigo_producto`) ON DELETE CASCADE,
		CONSTRAINT `fk_codigo`
			FOREIGN KEY(`codigo`)
			REFERENCES `SpeedSnack`.`COMPRA` (`codigo`) ON DELETE CASCADE
	);

ALTER TABLE ARTICULO_POR_COMPRA ADD 
	CONSTRAINT `chk_unidades_compradas`
		CHECK (`unidades_compradas`>0);



-- inserciones

INSERT INTO USUARIO (`usuario_login`,`correo_institucional`, `nombre`, `facultad`,`contraseña`,`descripcion`, `tipo`, `telefono`,`disponibilidad`,`campus`,`gustos`) VALUES (
	'jpajoyl',              -- usuario
	'jpajoyl@unal.edu.co',  -- correo
	'Juan Manuel',          -- nombre
	'Minas' ,              	-- facultad
	'12345678c-',          	-- contraseña
	NULL,                  	-- descripcion
	'Vendedor' ,          	-- tipo
	3112863524,            	-- tel VENDEDOR
	1,                     	-- disponibilidad VENDEDOR
	'Volador',             	-- campus VENDEDOR
	NULL 					-- gustos COMPRADOR
);

INSERT INTO USUARIO (`usuario_login`,`correo_institucional`, `nombre`, `facultad`,`contraseña`,`descripcion`, `tipo`, `telefono`,`disponibilidad`,`campus`,`gustos`) VALUES (
	'jcendaless',              -- usuario
	'jcendaless@unal.edu.co',  -- correo
	'Juanes',          			-- nombre
	'Minas' ,              		-- facultad
	'75346',          		-- contraseña
	NULL,                  		-- descripcion
	'Comprador' ,           		-- tipo
	NULL,            		-- tel VENDEDOR
	NULL,                     		-- disponibilidad VENDEDOR
	NULL,             		-- campus VENDEDOR
	'GOMITAS TRULULU' 						-- gustos COMPRADOR
);

INSERT INTO USUARIO (`usuario_login`,`correo_institucional`, `nombre`, `facultad`,`contraseña`,`descripcion`, `tipo`, `telefono`,`disponibilidad`,`campus`,`gustos`) VALUES (
	'jcandelap',              -- usuario
	'jcandelap@unal.edu.co',  -- correo
	'Juanes Candela',          			-- nombre
	'Ciencias' ,             	-- facultad
	'523442',          		-- contraseña
	NULL,                  	-- descripcion
	'Comprador' ,           -- tipo
	NULL,            		-- tel VENDEDOR
	NULL,                   -- disponibilidad VENDEDOR
	NULL,             		-- campus VENDEDOR
	'CIGARRILLOS' 			-- gustos COMPRADOR
);

INSERT INTO USUARIO (`usuario_login`,`correo_institucional`, `nombre`, `facultad`,`contraseña`,`descripcion`, `tipo`, `telefono`,`disponibilidad`,`campus`,`gustos`) VALUES (
	'acarrasquillal',              -- usuario
	'acarrasquillal@unal.edu.co',  -- correo
	'Alberto Carrasquilla',          			-- nombre
	'Humanas' ,              		-- facultad
	'6666666',          		-- contraseña
	'Alto funcionario y me gustan los negocios',                  		-- descripcion
	'Comprador' ,           		-- tipo
	NULL,            		-- tel VENDEDOR
	NULL,                     		-- disponibilidad VENDEDOR
	NULL,             		-- campus VENDEDOR
	'CIANURO' 						-- gustos COMPRADOR
);

INSERT INTO USUARIO (`usuario_login`,`correo_institucional`, `nombre`, `facultad`,`contraseña`,`descripcion`, `tipo`, `telefono`,`disponibilidad`,`campus`,`gustos`) VALUES (
	'pameander',              -- usuario
	'pameander@unal.edu.co',  -- correo
	'Pamela Anderson',          			-- nombre
	'Arquitectura' ,              		-- facultad
	'98436483',          		-- contraseña
	'Modelo y Actriz',                  		-- descripcion
	'Comprador' ,           		-- tipo
	NULL,            		-- tel VENDEDOR
	NULL,                     		-- disponibilidad VENDEDOR
	NULL,             		-- campus VENDEDOR
	'HACHAS' 						-- gustos COMPRADOR
);



INSERT INTO USUARIO (`usuario_login`,`correo_institucional`, `nombre`, `facultad`,`contraseña`,`descripcion`, `tipo`, `telefono`,`disponibilidad`,`campus`,`gustos`) VALUES (
	'jportegame',              -- usuario
	'jportegame@unal.edu.co',  -- correo
	'Juan Pablo',          -- nombre
	'Minas' ,              	-- facultad
	'elParkour',          	-- contraseña
	NULL,                  	-- descripcion
	'Vendedor' ,          	-- tipo
	3175648576,            	-- tel VENDEDOR
	1,                     	-- disponibilidad VENDEDOR
	'Volador',             	-- campus VENDEDOR
	NULL 					-- gustos COMPRADOR
);
INSERT INTO USUARIO (`usuario_login`,`correo_institucional`, `nombre`, `facultad`,`contraseña`,`descripcion`, `tipo`, `telefono`,`disponibilidad`,`campus`,`gustos`) VALUES (
	'cricop',              -- usuario
	'cricop@unal.edu.co',  -- correo
	'Carlos',          -- nombre
	'Humanas' ,              	-- facultad
	'LaPlata12',          	-- contraseña
	NULL,                  	-- descripcion
	'Vendedor' ,          	-- tipo
	3117564756,            	-- tel VENDEDOR
	0,                     	-- disponibilidad VENDEDOR
	'Minas',             	-- campus VENDEDOR
	NULL 					-- gustos COMPRADOR
);
INSERT INTO USUARIO (`usuario_login`,`correo_institucional`, `nombre`, `facultad`,`contraseña`,`descripcion`, `tipo`, `telefono`,`disponibilidad`,`campus`,`gustos`) VALUES (
	'tayswift',              -- usuario
	'tayswift@unal.edu.co',  -- correo
	'Taylor',          -- nombre
	'Arquitectura' ,              	-- facultad
	'laBasilica4',          	-- contraseña
	NULL,                  	-- descripcion
	'Vendedor' ,          	-- tipo
	3166765434,            	-- tel VENDEDOR
	0,                     	-- disponibilidad VENDEDOR
	'Rio',             	-- campus VENDEDOR
	NULL 					-- gustos COMPRADOR
);




-- SUSCRIPCIONES

INSERT INTO SUSCRIPCION (`codigo_suscripcion`,`notificacion`, `fecha_inicio`, `usuario_login_seguidor`,`usuario_login_seguido`) VALUES (
	7,              		  -- codigo_suscripcion
	0,  					  -- notificacion
	'2019-09-22',        	  -- fecha_inicio
	'jcendaless' ,          -- usuario_login_seguidor
	'tayswift'          	  -- usuario_login_seguido
);

INSERT INTO SUSCRIPCION (`codigo_suscripcion`,`notificacion`, `fecha_inicio`, `usuario_login_seguidor`,`usuario_login_seguido`) VALUES (
	8,              		  -- codigo_suscripcion
	1,  					  -- notificacion
	'2019-09-22',        	  -- fecha_inicio
	'tayswift' ,          -- usuario_login_seguidor
	'jportegame'          	  -- usuario_login_seguido
);

INSERT INTO SUSCRIPCION (`codigo_suscripcion`,`notificacion`, `fecha_inicio`, `usuario_login_seguidor`,`usuario_login_seguido`) VALUES (
	9,              		  -- codigo_suscripcion
	0,  					  -- notificacion
	'2019-09-22',        	  -- fecha_inicio
	'pameander' ,         	  -- usuario_login_seguidor
	'jportegame'          	  -- usuario_login_seguido
);


INSERT INTO SUSCRIPCION (`codigo_suscripcion`,`notificacion`, `fecha_inicio`, `usuario_login_seguidor`,`usuario_login_seguido`) VALUES (
	10,              		  -- codigo_suscripcion
	1,  					  -- notificacion
	'2019-09-22',        	  -- fecha_inicio
	'acarrasquillal' ,          -- usuario_login_seguidor
	'jcendaless'          	  -- usuario_login_seguido
);

INSERT INTO SUSCRIPCION (`codigo_suscripcion`,`notificacion`, `fecha_inicio`, `usuario_login_seguidor`,`usuario_login_seguido`) VALUES (
	11,              		  -- codigo_suscripcion
	0,  					  -- notificacion
	'2019-09-22',        	  -- fecha_inicio
	'jpajoyl' ,          -- usuario_login_seguidor
	'jcandelap'          	  -- usuario_login_seguido
);

INSERT INTO SUSCRIPCION (`codigo_suscripcion`,`notificacion`, `fecha_inicio`, `usuario_login_seguidor`,`usuario_login_seguido`) VALUES (
	12,              		  -- codigo_suscripcion
	1,  					  -- notificacion
	'2019-09-22',        	  -- fecha_inicio
	'jcandelap' ,          -- usuario_login_seguidor
	'jpajoyl'          	  -- usuario_login_seguido
);
INSERT INTO SUSCRIPCION (`codigo_suscripcion`,`notificacion`, `fecha_inicio`, `usuario_login_seguidor`,`usuario_login_seguido`) VALUES (
	1,              		  -- codigo_suscripcion
	1,  					  -- notificacion
	'2019-07-19',        	  -- fecha_inicio
	'jcendaless' ,          -- usuario_login_seguidor
	'jpajoyl'          	  -- usuario_login_seguido
);
INSERT INTO SUSCRIPCION (`codigo_suscripcion`,`notificacion`, `fecha_inicio`, `usuario_login_seguidor`,`usuario_login_seguido`) VALUES (
	2,              		  -- codigo_suscripcion
	0,  					  -- notificacion
	'2019-07-19',        	  -- fecha_inicio
	'jcendaless' ,          -- usuario_login_seguidor
	'cricop'          	  -- usuario_login_seguido
);
INSERT INTO SUSCRIPCION (`codigo_suscripcion`,`notificacion`, `fecha_inicio`, `usuario_login_seguidor`,`usuario_login_seguido`) VALUES (
	3,              		  -- codigo_suscripcion
	1,  					  -- notificacion
	'2019-07-19',        	  -- fecha_inicio
	'jportegame' ,          -- usuario_login_seguidor
	'jcendaless'          	  -- usuario_login_seguido
);
INSERT INTO SUSCRIPCION (`codigo_suscripcion`,`notificacion`, `fecha_inicio`, `usuario_login_seguidor`,`usuario_login_seguido`) VALUES (
	4,              		  -- codigo_suscripcion
	0,  					  -- notificacion
	'2019-07-19',        	  -- fecha_inicio
	'jcandelap' ,          -- usuario_login_seguidor
	'cricop'          	  -- usuario_login_seguido
);
INSERT INTO SUSCRIPCION (`codigo_suscripcion`,`notificacion`, `fecha_inicio`, `usuario_login_seguidor`,`usuario_login_seguido`) VALUES (
	5,              		  -- codigo_suscripcion
	1,  					  -- notificacion
	'2019-09-22',        	  -- fecha_inicio
	'acarrasquillal' ,          -- usuario_login_seguidor
	'tayswift'          	  -- usuario_login_seguido
);
INSERT INTO SUSCRIPCION (`codigo_suscripcion`,`notificacion`, `fecha_inicio`, `usuario_login_seguidor`,`usuario_login_seguido`) VALUES (
	6,              		  -- codigo_suscripcion
	0,  					  -- notificacion
	'2019-07-19',        	  -- fecha_inicio
	'tayswift' ,          -- usuario_login_seguidor
	'jpajoyl'          	  -- usuario_login_seguido
);