
SELECT ide_usuario,des_usuario as Usuario,concat(p.des_nombres,' ',p.des_apepat,' ',p.des_apemat) as Empleado,r.des_nombre as Rol FROM sisusuario as u
inner join admrol as r ON r.ide_rol=u.ide_rol
inner join sispersona as p ON p.ide_persona=u.ide_persona
alter table sisusuario add CONSTRAINT pk_user_rol FOREIGN KEY (ide_rol) references admrol(ide_rol);
alter table sisusuario add CONSTRAINT pk_user_persona FOREIGN KEY (ide_persona) references sispersona(ide_persona);
-- ADMINISTRADOR
INSERT into admrolopcion(ide_opcion,ide_rol) values(1,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(2,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(16,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(5,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(3,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(18,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(6,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(7,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(8,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(17,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(11,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(12,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(19,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(20,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(9,1);
INSERT into admrolopcion(ide_opcion,ide_rol) values(13,1);
-- GERENTE DE VENTAS
INSERT into admrolopcion(ide_opcion,ide_rol) values(1,2);
INSERT into admrolopcion(ide_opcion,ide_rol) values(2,2);
INSERT into admrolopcion(ide_opcion,ide_rol) values(16,2);
INSERT into admrolopcion(ide_opcion,ide_rol) values(5,2);
INSERT into admrolopcion(ide_opcion,ide_rol) values(19,2);
INSERT into admrolopcion(ide_opcion,ide_rol) values(20,2);

-- GERENTE DE COMPRAS
INSERT into admrolopcion(ide_opcion,ide_rol) values(3,3);
INSERT into admrolopcion(ide_opcion,ide_rol) values(18,3);
INSERT into admrolopcion(ide_opcion,ide_rol) values(6,3);
INSERT into admrolopcion(ide_opcion,ide_rol) values(19,3);
INSERT into admrolopcion(ide_opcion,ide_rol) values(20,3);

-- GERENTE DE Almacen
INSERT into admrolopcion(ide_opcion,ide_rol) values(7,4);
INSERT into admrolopcion(ide_opcion,ide_rol) values(8,4);
INSERT into admrolopcion(ide_opcion,ide_rol) values(17,4);

-- GERENTE DE RRHH
INSERT into admrolopcion(ide_opcion,ide_rol) values(11,5);
INSERT into admrolopcion(ide_opcion,ide_rol) values(12,5);
INSERT into admrolopcion(ide_opcion,ide_rol) values(19,5);
INSERT into admrolopcion(ide_opcion,ide_rol) values(20,5);





