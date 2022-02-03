create database ingreso;
use ingreso;

create table usuario(
    Nombre_Usuario varchar(10) primary key,
    contrasena varchar(20) not null);

create table persona(
    Id_Persona int(12) primary key,
    Nombre_Persona varchar(45) not null,
    Apellido_Persona varchar(45) not null,
    Correo_Persona varchar(45) not null,
    Nombre_Usuario_FK varchar(10) not null,
    foreign key (Nombre_Usuario_FK) references usuario (Nombre_Usuario));