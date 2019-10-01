CREATE DATABASE GestionActivos;
USE GestionActivos;

CREATE TABLE ACTIVOS(
ID INT PRIMARY KEY auto_increment,
NOMBRE NVARCHAR(50),
DESCRIPCION NVARCHAR(100),
FCOMPRA NVARCHAR(10),
FINSTALACION NVARCHAR(10),
TVIDA NVARCHAR(20),
GARANTIA NVARCHAR(20)
);

SELECT * FROM ACTIVOS;

insert into ACTIVOS (NOMBRE,DESCRIPCION,FCOMPRA,FINSTALACION,TVIDA,GARANTIA) values ('Hidrolavadora','Limpiadora de alta presión «K4 Premium Car» con motor refrigerado por agua. Ideal para coches, vallas o bicicletas con suciedad media.','17-08-19','20-08-19','3 años','1 año');
insert into ACTIVOS (NOMBRE,DESCRIPCION,FCOMPRA,FINSTALACION,TVIDA,GARANTIA) values ('Pistola de calor','Marca Black+Decker y modelo HG1500, ajuste de flujo y temperatura variable para mayor versatilidad. Superficie trasera plana para apoyar','25-08-19','30-08-19','2 años','1 año');
insert into ACTIVOS (NOMBRE,DESCRIPCION,FCOMPRA,FINSTALACION,TVIDA,GARANTIA) values ('Pistola de aire','Manejo agradable y un trabajo sin fatiga, gracias a su diseño ergónomico, es de marca Bauker y modelo HG2031.','06-09-19','10-09-19','2 años','1 año');


CREATE TABLE TECNICOS(
ID INT PRIMARY KEY auto_increment,
NOMBRE NVARCHAR(100),
APELLIDO NVARCHAR(100),
DNI INT,
TELEFONO INT
);

SELECT * FROM TECNICOS;

insert into TECNICOS (NOMBRE,APELLIDO,DNI,TELEFONO) values ('Raziel','Castillo Rojas',15300162,917998845);
insert into TECNICOS (NOMBRE,APELLIDO,DNI,TELEFONO) values ('Mateo','Vara Fernandez',71061425,987654321);
insert into TECNICOS (NOMBRE,APELLIDO,DNI,TELEFONO) values ('Franco','Tapia Vilchez',77139671,900098845);

CREATE TABLE CRONOGRAMAS(
ID INT PRIMARY KEY auto_increment,
IDMAQUINA INT,
IDTECNICO INT,
TMANTENIMIENTO NVARCHAR(50),
FINICIO NVARCHAR(10),
FFIN NVARCHAR(10),
OBSERVACION NVARCHAR(200),
FALLAS NVARCHAR(200),
FOREIGN KEY (IDMAQUINA) REFERENCES ACTIVOS(ID),
FOREIGN KEY (IDTECNICO) REFERENCES TECNICOS(ID)
);

SELECT * FROM CRONOGRAMAS;

insert into CRONOGRAMAS (IDMAQUINA,IDTECNICO,TMANTENIMIENTO,FINICIO,FFIN,OBSERVACION,FALLAS) values (1,1,'Correctivo','05-09-19','06-09-19','Defectuoso','Ninguno');
insert into CRONOGRAMAS (IDMAQUINA,IDTECNICO,TMANTENIMIENTO,FINICIO,FFIN,OBSERVACION,FALLAS) values (2,2,'Preventivo','20-09-19','22-09-19','Optimo','Ninguno');
insert into CRONOGRAMAS (IDMAQUINA,IDTECNICO,TMANTENIMIENTO,FINICIO,FFIN,OBSERVACION,FALLAS) values (3,3,'Predictivo','30-09-19','01-10-19','Optimo','Ninguno');
