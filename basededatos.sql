create database taller_mail;
use taller_mail;

-- show tables;

-- select * from formulario;

-- drop table formulario;	

create table formulario(id_registro int auto_increment  primary key, 
nombre varchar(25) not null,
correo varchar(50)not null, departamento varchar(30) not null,
mensaje varchar(300) not null,empleado varchar(30) not null);

select  id_registro,nombre,departamento,empleado from formulario order by  id_registro desc limit 1;