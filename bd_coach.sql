create database db_coach;
use db_coach;
create table cadastro(
	nome varchar (45) not null,
    email varchar (45) not null,
    senha varchar (20) not null,
	cod int not null auto_increment, 
    primary key(cod,email)
);
create table formulario(
    meta varchar (300) not null,
    data_conclusao date not null,
    status_meta varchar (500) not null,
    cod int not null auto_increment, 
    primary key(cod)
);
create table tb_login(
	email varchar (45) not null,
    senha varchar (20) not null,
    cod int not null auto_increment,
    primary key (cod)
);
ALTER TABLE `db_coach`.`cadastro` 
ADD COLUMN `telefone` VARCHAR(12) NULL AFTER `senha`,
ADD COLUMN `sexo` VARCHAR(10) NOT NULL AFTER `telefone`;
ALTER TABLE `db_coach`.`cadastro` 
CHANGE COLUMN `telefone` `telefone` VARCHAR(20) NULL DEFAULT NULL ;




