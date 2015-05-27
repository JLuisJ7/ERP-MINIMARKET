create TABLE Boleta (
nroSerie char(3) not null,
nroBol int  unsigned,
idCliente int,
idEmpleado int,
fechEmic TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
Total NUMERIC ( 8, 2 ) NOT NULL,
estadoFact char(1) default 1,
fechaElim date DEFAULT Null
);

create TABLE DetalleBoleta(
nroSerie Char(3) not  null, 
nroBol int unsigned NOT NULL,
idProducto int  NOT NULL,
cantidad INT unsigned NOT NULL,
precio NUMERIC ( 8, 2 ) NOT NULL
);


alter table Boleta add constraint pk_seri_num_bol  PRIMARY KEY(nroSerie,nroBol);

alter table Boleta add CONSTRAINT fk_Bol_Cli FOREIGN KEY (idCliente) references Cliente(idCliente);
alter table DetalleBoleta add CONSTRAINT fk_Bol_detFac FOREIGN KEY (nroSerie,nroBol) references Boleta(nroSerie,nroBol);
alter table DetalleBoleta add CONSTRAINT fk_DetBol_Prod FOREIGN KEY (idProducto) references Producto(idProducto);




Drop table DetalleFactura;
drop table Factura;
drop table inventario;
drop table detalleordencompra;
drop table ordencompra;


CREATE TABLE Inventario (
  idMovimiento int unsigned AUTO_INCREMENT PRIMARY KEY,
  tipo_documento char(1) ,
  serie char(3) ,
  nro_documento int unsigned ,
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
  tipo char(1),
  idproducto int,
  cantidad int(10) unsigned ,
  valor_unitario decimal(8,2) ,
  total decimal(8,2)
);
alter table Inventario add CONSTRAINT fk_Inv_Prod FOREIGN KEY (idProducto) references Producto(idProducto);

   
Create table OrdenCompra(
nroSerie char(3) not null,
nroOrden int unsigned NOT NULL,
idProveedor int,
idEmpleado int,
FechaOrden TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
subTotal numeric(8,2),
IGV numeric(8,2),
Total numeric(8,2),
estadoOrden char(1) default 1,
fechaElim date default NULL
);
create TABLE DetalleOrdenCompra(
nroSerie Char(3) not  null, 
nroOrden int unsigned NOT NULL,
idProducto int  NOT NULL,
cantidad INT unsigned NOT NULL,
precio NUMERIC ( 8, 2 ) NOT NULL
);


alter table OrdenCompra add constraint pk_seri_num_ord  PRIMARY KEY(nroSerie,nroOrden);

alter table OrdenCompra add CONSTRAINT fk_ord_Prov FOREIGN KEY (idProveedor) references Proveedor(idProveedor);
alter table DetalleOrdenCompra add CONSTRAINT fk_ord_detord FOREIGN KEY (nroSerie,nroOrden) references OrdenCompra(nroSerie,nroOrden);
alter table DetalleOrdenCompra add CONSTRAINT fk_Detord_Prod FOREIGN KEY (idProducto) references Producto(idProducto);




create TABLE Factura (
nroSerie char(3) not null,
nroFact int  unsigned,
idCliente int,
idEmpleado int,
fechEmic TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
subTotal NUMERIC ( 8, 2 ) NOT NULL,
IGV NUMERIC (8, 2 ) NOT NULL,
Total NUMERIC ( 8, 2 ) NOT NULL,
estadoFact char(1) default 1,
fechaElim date DEFAULT Null
);

create TABLE DetalleFactura(
nroSerie Char(3) not  null, 
nroFact int unsigned NOT NULL,
idProducto int  NOT NULL,
cantidad INT unsigned NOT NULL,
precio NUMERIC ( 8, 2 ) NOT NULL
);


alter table Factura add constraint pk_seri_num_fact  PRIMARY KEY(nroSerie,nroFact);

alter table Factura add CONSTRAINT fk_Fac_Cli FOREIGN KEY (idCliente) references Cliente(idCliente);
alter table DetalleFactura add CONSTRAINT fk_Fac_detFac FOREIGN KEY (nroSerie,nroFact) references Factura(nroSerie,nroFact);
alter table DetalleFactura add CONSTRAINT fk_DetFac_Prod FOREIGN KEY (idProducto) references Producto(idProducto);

--  from Detallefactura;
CREATE TRIGGER ActualizarStock
AFTER INSERT ON DetalleFactura 
FOR EACH ROW
  UPDATE Producto 
     SET stock = stock - NEW.cantidad
   WHERE idProducto = NEW.idProducto

CREATE TRIGGER ActualizarStockCompra
AFTER INSERT ON DetalleOrdenCompra 
FOR EACH ROW
  UPDATE Producto 
     SET stock = stock + NEW.cantidad
   WHERE idProducto = NEW.idProducto
   



create table Cliente(
idCliente int AUTO_INCREMENT primary key,
RazSoc_Cli varchar(250) not null,
tipoPersona_Cli char(1) not null,
ruc_Cli char(11) not null,
direccion_Cli varchar(150) not null,
telefono_Cli char(9) not null,
email_Cli varchar(50),
fec_reg_Cli TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
estado_Cli char(1) not null DEFAULT '1'
);

create table Proveedor(
idProveedor int AUTO_INCREMENT primary key,
RazSoc_Prov varchar(250) not null,
tipoPersona_Prov char(1) not null,
ruc_Prov char(11) not null,
direccion_Prov varchar(150) not null,
telefono_Prov char(9) not null,
email_Prov varchar(50),
fec_reg_Prov TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
estado_Prov char(1) not null DEFAULT '1'
);

create table Producto(
idProducto int AUTO_INCREMENT PRIMARY KEY,
desc_Prod varchar(100) NOT NULL,
presentacion varchar(20) NOT NULL,
tipoProd char(1) NOT  NULL DEFAULT '1',
stock int NOT NULL,
idMarca int ,
idCategoria int,
fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
estadoProd char(1) not null DEFAULT '1',
Precio numeric(8,2),
idProveedor int 
);




create table Marca(
idMarca int AUTO_INCREMENT PRIMARY KEY,
nomMarca varchar(100) unique not null
);
create table Categoria(
idCategoria int AUTO_INCREMENT PRIMARY KEY,
nomCategoria varchar(50) unique not null
);

alter table Producto add CONSTRAINT fk_producto_categoria FOREIGN KEY (idCategoria) references Categoria(idCategoria);
alter table Producto add CONSTRAINT fk_producto_marca FOREIGN KEY (idMarca) references Marca(idMarca);
alter table Producto add CONSTRAINT fk_producto_proveedor FOREIGN KEY (idProveedor) references Proveedor(idProveedor);


/*
----------------------------------------------------------------------------------------------
*/





select  *from Detallefactura;
select  * from cliente;
select nroSerie,nroFact,CONCAT(nroSerie,'-',nroFact) as Factura,c.RazSoc_Cli as Cliente,idEmpleado as Empleado,DATE_FORMAT(FechEmic,'%d-%m-%Y') as Fecha,SubTotal,IGV,Total 
from factura as f
inner join Cliente as c ON c.idCliente=f.idCliente;
SELECT * from Producto;

select nroSerie,nroOrden,prov.RazSoc_Prov as Proveedor,idEmpleado as Empleado,DATE_FORMAT(FechaOrden,'%d-%m-%Y') as Fecha,subTotal,IGV,Total from ordencompra as oc inner join proveedor as prov ON prov.idProveedor=oc.idProveedor  


select  p.desc_Prod,cantidad,df.precio,(cantidad*df.precio) as importe from DetalleFactura as df
INNER JOIN Producto as p ON p.idProducto=df.idProducto
where nroSerie='001' and nroFact=33;

select  p.desc_Prod,cantidad,doc.precio,(cantidad*doc.precio) as importe  from detalleordencompra doc INNER JOIN  Producto as p ON p.idProducto=doc.idProducto where nroSerie='001' and nroOrden=1;


select idMovimiento,IF(tipo_documento = '1', 'Factura','Orden de Compra') as documento,serie,nro_documento,
DATE_FORMAT(fecha,'%d-%m-%Y') as fecha, IF(tipo = 'S', 'Salida','Entrada') AS Tipo,p.desc_Prod as producto,cantidad,valor_unitario,total 
from Inventario as i
INNER JOIN Producto as p ON p.idProducto=i.idProducto


select count(*) as numero from producto where stock=0;



select *  from producto where stock=0

create table Empleado(
idEmpleado int unsigned AUTO_INCREMENT PRIMARY KEY,
apePat varchar(50),
apeMat varchar(50),
nombres varchar(50),
fechaNac date,
DNI char(8),
telefono char(9),
sexo char(1),
fechaReg TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
estado char(1) DEFAULT '1'
);

select  p.desc_Prod,cantidad,df.precio,(cantidad*df.precio) as importe from DetalleFactura as df
INNER JOIN Producto as p ON p.idProducto=df.idProducto
where nroSerie='001' and nroFact=18;




select  *from factura;
select  * from cliente;
select nroSerie,nroFact,CONCAT(nroSerie,'-',nroFact) as Factura,c.RazSoc_Cli as Cliente,idEmpleado as Empleado,DATE_FORMAT(FechEmic,'%d-%m-%Y') as Fecha,SubTotal,IGV,Total 
from factura as f
inner join Cliente as c ON c.idCliente=f.idCliente;


select * from Factura;
select * from DetalleFactura;
select * from ordencompra;
select * from detalleordencompra;
select * from producto;

select * from Factura as f
inner join Detallefactura as df ON f.nroSerie=df.nroSerie and f.nroFact=df.nroFact

CREATE TABLE Inventario (
  idMovimiento int unsigned AUTO_INCREMENT PRIMARY KEY,
  tipo_documento char(1) ,
  serie char(3) ,
  nro_documento int unsigned ,
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
  tipo char(1),
  idproducto int,
  cantidad int(10) unsigned ,
  valor_unitario decimal(8,2) ,
  total decimal(8,2)
);

alter table Inventario add CONSTRAINT fk_Inv_Prod FOREIGN KEY (idProducto) references Producto(idProducto);

select * from Inventario;
select * from Producto;


drop table OrdenCompra;
drop table DetalleOrdenCompra;

select * from OrdenCompra;
select * from DetalleOrdenCompra;
select * from Producto;
select * from factura;
select * from detalleFactura;

CREATE TRIGGER ActualizarStockCompra
AFTER INSERT ON DetalleOrdenCompra 
FOR EACH ROW
  UPDATE Producto 
     SET stock = stock + NEW.cantidad
   WHERE idProducto = NEW.idProducto
   

create TABLE DetalleFactura(
nroSerie Char(3) not  null, 
nroFact int unsigned NOT NULL,
idProducto int  NOT NULL,
cantidad INT unsigned NOT NULL,
precio NUMERIC ( 8, 2 ) NOT NULL
);


create TABLE Factura (
nroSerie char(3) not null,
nroFact int  unsigned,
idCliente int,
idEmpleado int,
fechEmic TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
subTotal NUMERIC ( 8, 2 ) NOT NULL,
IGV NUMERIC (8, 2 ) NOT NULL,
Total NUMERIC ( 8, 2 ) NOT NULL,
estadoFact char(1) default 1,
fechaElim date DEFAULT Null
);

alter table Factura add constraint pk_seri_num_fact  PRIMARY KEY(nroSerie,nroFact);

alter table Factura add CONSTRAINT fk_Fac_Cli FOREIGN KEY (idCliente) references Cliente(idCliente);
alter table DetalleFactura add CONSTRAINT fk_Fac_detFac FOREIGN KEY (nroSerie,nroFact) references Factura(nroSerie,nroFact);
alter table DetalleFactura add CONSTRAINT fk_DetFac_Prod FOREIGN KEY (idProducto) references Producto(idProducto);




select * from Factura;
select * from detalleFactura;


select c.RazSoc_cli,f.nroFact,f.Total from Cliente as c
inner join factura as f on f.idCliente=c.idCliente

select * from Producto;

INSERT INTO detallefactura values('001',2,2,30,2.80);




select * from Detallefactura;
select * from Producto;

--  from Detallefactura;
CREATE TRIGGER ActualizarStock
AFTER INSERT ON DetalleFactura 
FOR EACH ROW
  UPDATE Producto 
     SET stock = stock - NEW.cantidad
   WHERE idProducto = NEW.idProducto



create table Producto(
idProducto int AUTO_INCREMENT PRIMARY KEY,
desc_Prod varchar(100) NOT NULL,
presentacion varchar(20) NOT NULL,
tipoProd char(1) NOT  NULL DEFAULT '1',
stock int NOT NULL,
idMarca int ,
idCategoria int,
fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
estadoProd char(1) not null DEFAULT '1',
Precio numeric(8,2),
idProveedor int
);
ALTER TABLE PRoducto ADD Precio numeric(8,2);

create table DetalleFactura(
nroFact int,
idProducto int,
cantidad int,
Precio numeric(8,2),
valor_Venta numeric(8,2)
);

select * from DetalleFactura


delete from DetalleFactura;

create table Cliente(
idCliente int AUTO_INCREMENT primary key,
RazSoc_Cli varchar(250) not null,
tipoPersona_Cli char(1) not null,
ruc_Cli char(11) not null,
direccion_Cli varchar(150) not null,
telefono_Cli char(9) not null,
email_Cli varchar(50),
fec_reg_Cli TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
estado_Cli char(1) not null DEFAULT '1'
);

create table Proveedor(
idProveedor int AUTO_INCREMENT primary key,
RazSoc_Prov varchar(250) not null,
tipoPersona_Prov char(1) not null,
ruc_Prov char(11) not null,
direccion_Prov varchar(150) not null,
telefono_Prov char(9) not null,
email_Prov varchar(50),
fec_reg_Prov TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
estado_Prov char(1) not null DEFAULT '1'
);


create table Marca(
idMarca int AUTO_INCREMENT PRIMARY KEY,
nomMarca varchar(100) unique not null
);
create table Categoria(
idCategoria int AUTO_INCREMENT PRIMARY KEY,
nomCategoria varchar(50) unique not null
);
drop table Producto;
drop table Marca;
drop table Categoria;

/* Categorias*/
select * from producto
insert into Categoria(nomCategoria) values('Helados');
insert into Categoria(nomCategoria) values('Galletas');
insert into Categoria(nomCategoria) values('Cereales');
insert into Categoria(nomCategoria) values('Lacteos');
insert into Categoria(nomCategoria) values('Bebidas');
insert into Categoria(nomCategoria) values('Snacks');
insert into Categoria(nomCategoria) values('Dulces');
insert into Categoria(nomCategoria) values('Frutas');
insert into Categoria(nomCategoria) values('Fideos');

delete from categoria
admin053jawkga
/*Marcas*/

insert into Marca(nomMarca) values('Gloria');
insert into Marca(nomMarca) values('Nestle');
insert into Marca(nomMarca) values('Karinto');
insert into Marca(nomMarca) values('Donofrio');
insert into Marca(nomMarca) values('Coca Cola');
insert into Marca(nomMarca) values('Pura Vida');
insert into Marca(nomMarca) values('San Luis');
insert into Marca(nomMarca) values('Soda');
insert into Marca(nomMarca) values('Inka Kola');
insert into Marca(nomMarca) values('Lavaghi');

select * from Marca
alter table Producto add CONSTRAINT fk_producto_categoria FOREIGN KEY (idCategoria) references Categoria(idCategoria);
alter table Producto add CONSTRAINT fk_producto_marca FOREIGN KEY (idMarca) references Marca(idMarca);

select * from Marca where nomMarca='Gloria'
select * from Categoria where nomCategoria='Bebidas'

select * from Marca where nomMarca=Gloria
create table Cliente(
idCliente int AUTO_INCREMENT Primary key,
RazonSocial varchar(150),
tipoPersona char(1),
ruc varchar(11),
direccion varchar(150),
telefono char(9),
email varchar(30),
fechaInsc datetime
);

create table Proveedor(
idProveedor int AUTO_INCREMENT Primary Key,
RasonSocial varchar(200),
tipoPersona char(1),
RUC varchar(11),
direccion varchar(100),
telefono char(9),
email varchar(255),
stado char(1)
);

select * from Proveedor
select * from PRODUCTO
alter table Producto add CONSTRAINT fk_producto_proveedor FOREIGN KEY (idProveedor) references Proveedor(idProveedor);

insert into Proveedor values('abc.sac',1,'10234567895','los olivos','12345678')

SELECT * FROM Producto WHERE idProducto=1

select prod.idProducto,prod.descripcion,prov.nombre from Proveedor prov,Producto prod

SELECT idProducto,idProveedor,Descripcion,precioCompra,precioVenta,stock,fechaVencimiento,
 IF(stado = 'V', 'Vigente','Caducado') AS Estado
FROM Producto as  prod  WHERE idProducto=1;

SELECT idProducto,idProveedor,Descripcion,precioCompra,precioVenta,stock,fechaVencimiento,
 IF(stado = 'V', 'Vigente','Caducado') AS stado
FROM Producto

SELECT IF(stado = 'V', 'Vigente','Caducado') AS stado
FROM Producto

SELECT CompanyName, 
    CASE WHEN Country IN ('USA', 'Canada') THEN 'North America'
         WHEN Country = 'Brazil' THEN 'South America'
         ELSE 'Europe' END AS Continent
FROM Suppliers
ORDER BY CompanyName;}


select * from sispersona t
INNER JOIN admcatalogo ac ON ac.ide_elemento=t.ide_condicion
where ac.ide_elemento=18
$dataProvider=new CActiveDataProvider('Sispersona', array(
		    'criteria' => array(
		        'join' => 'INNER JOIN admcatalogo ac ON ac.ide_elemento=t.ide_condicion',
		        'condition' =>'ac.ide_elemento='.$ideCondicion,
                                        

select * from sispersona;






 



select * from DetalleOrdenCompra;

select * from  Producto;





