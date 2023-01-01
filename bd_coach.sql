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
    nome varchar (45) not null,
    data_conclusao date not null,
    status_meta varchar (500) not null,
    cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key(cod)
);
create table tb_login(
	email varchar (45) not null,
    senha varchar (20) not null,
    cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key (cod)
);
ALTER TABLE `db_coach`.`cadastro` 
ADD COLUMN `telefone` VARCHAR(12) NULL AFTER `senha`,
ADD COLUMN `sexo` VARCHAR(10) NOT NULL AFTER `telefone`;
ALTER TABLE `db_coach`.`cadastro` 
CHANGE COLUMN `telefone` `telefone` VARCHAR(20) NULL DEFAULT NULL ;
ALTER TABLE db_coach.cadastro
add column cidade varchar(50) null after senha;
ALTER TABLE db_coach.cadastro
add column estado varchar(40) null after cidade;
ALTER TABLE db_coach.formulario
add column desc_meta varchar(500) not null after meta;
ALTER TABLE db_coach.formulario
add column data_inicio date not null after desc_meta;
ALTER TABLE db_coach.formulario
add column email varchar (45) not null after nome;
insert into db_coach.cadastro values("Gustavo","eradesvilarinho@gmail.com",123456,"Brasilia","DF",61994490664,"masculino",1);
create table db_coach.formulario_15_anos(
	saude varchar (500),
    relacionamento varchar (500),
    financeiro varchar (500),
    espiritual varchar(500),
    outro varchar (800),
	cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key (cod)
);
create table db_coach.saude_12_meses(
	oque varchar (300) not null,
    porquem varchar (300) not null,
    onde varchar (300) not null,
    quando date not null,
    porque varchar (300),
    como varchar (300),
	cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key (cod)
);
create table db_coach.relacionamento_12_meses(
	oque varchar (300) not null,
    porquem varchar (300) not null,
    onde varchar (300) not null,
    quando date not null,
    porque varchar (300),
    como varchar (300),
	cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key (cod)
);
create table db_coach.trabalho_12_meses(
	oque varchar (300) not null,
    porquem varchar (300) not null,
    onde varchar (300) not null,
    quando date not null,
    porque varchar (300),
    como varchar (300),
	cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key (cod)
);
create table db_coach.dinheiro_12_meses(
	oque varchar (300) not null,
    porquem varchar (300) not null,
    onde varchar (300) not null,
    quando date not null,
    porque varchar (300),
    como varchar (300),
	cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key (cod)
);
create table db_coach.outro_12_meses(
	oque varchar (300) not null,
    porquem varchar (300) not null,
    onde varchar (300) not null,
    quando date not null,
    porque varchar (300),
    como varchar (300),
	cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key (cod)
);
ALTER TABLE db_coach.formulario
add column saude varchar(200) null after nome;
ALTER TABLE db_coach.formulario
add column relacionamento varchar(200) null after saude;
ALTER TABLE db_coach.formulario
add column financeiro varchar(200) null after relacionamento;
ALTER TABLE db_coach.formulario
add column espiritual varchar(200) null after financeiro;
ALTER TABLE db_coach.formulario
add column outro varchar(200) null after espiritual;

