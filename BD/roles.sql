SELECT * FROM sispersona s;
INSERT INTO sispersona VALUES(16, 'JOSE LUIS', 'AYALA', 'BENITO', '', '48563891', 10, '965326947', 'jose.luis154@gmail.com', 12, 18, 21, 23, '1990-10-05', '1');
INSERT INTO sispersona VALUES(17, 'CRISTIAN', 'QUICAÑO', 'ROJAS', '', '42568197', 10, '975248639', 'cristianperucho@hotmail.com', 12, 18, 21, 23, '1989-05-13', '1');

SELECT * FROM sisusuario;
INSERT INTO sisusuario VALUES(2, 'joseluis@sismima.com', 'e10adc3949ba59abbe56e057f20f883e', 5, 15);
INSERT INTO sisusuario VALUES(3, 'cristian@sismima.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 16);

SELECT * FROM admrol;
INSERT INTO admrol VALUES(5, 'GERENTE GENERAL');

SELECT * FROM admopcion;

SELECT * FROM admrolopcion a;
-- ROL ADMINISTRADOR
INSERT INTO admrolopcion VALUES(1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,1),(8,8,1),(9,9,1),(10,10,1),(11,11,1),(12,12,1),(13,13,1),(14,14,1);

-- ROL VENTAS
INSERT INTO admrolopcion VALUES(15,1,2),(16,2,2),(17,7,2),(18,8,2);
--ROL GERENTE GENERAL
INSERT INTO admrolopcion VALUES(19,1,5),(20,2,5),(21,3,5),(22,4,5),(23,5,5),(24,6,5),(25,7,5),(26,8,5),(27,11,5),(28,12,5);

--generar Facturas
INSERT INTO admrolopcion VALUES(29,15,1);
--listar Facturas
INSERT INTO admrolopcion VALUES(30,16,1);
--listar Ordenes de Compra
INSERT INTO admrolopcion VALUES(31,18,1);

--listar Inventario
INSERT INTO admrolopcion VALUES(32,17,1);

-- listar modulo utilitarios
INSERT INTO admrolopcion VALUES(33,19,1);

-- listar Parametros generales
INSERT INTO admrolopcion VALUES(34,20,1);



SELECT ide_usuario,des_usuario as Usuario,concat(p.des_nombres,' ',p.des_apepat,' ',p.des_apemat) as Empleado,r.des_nombre as Rol FROM sisusuario as u
inner join admrol as r ON r.ide_rol=u.ide_rol
inner join sispersona as p ON p.ide_persona=u.ide_persona

alter table sisusuario add CONSTRAINT pk_user_rol FOREIGN KEY (ide_rol) references admrol(ide_rol);
alter table sisusuario add CONSTRAINT pk_user_persona FOREIGN KEY (ide_persona) references sispersona(ide_persona);



