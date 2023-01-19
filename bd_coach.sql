create database db_coach;
use db_coach;
create table cadastro(
	nome varchar (20) not null,
    email varchar (60) not null,
    senha varchar (20) not null,
	cod int not null auto_increment, 
    primary key(cod,email)
);
create table db_coach.formulario_15_anos(
	saude varchar (500),
    relacionamento varchar (500),
    financeiro varchar (500),
    espiritual varchar(500),
    outro varchar (800),
	cod int  not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key (cod)
);

ALTER TABLE `db_coach`.`cadastro` 
ADD COLUMN `telefone` VARCHAR(12) NULL AFTER `senha`,
ADD COLUMN `sexo` VARCHAR(10)  NULL AFTER `telefone`;
ALTER TABLE `db_coach`.`cadastro` 
CHANGE COLUMN `telefone` `telefone` VARCHAR(20) NULL DEFAULT NULL ;
ALTER TABLE db_coach.cadastro
add column cidade varchar(50) null after senha;
ALTER TABLE db_coach.cadastro
add column estado varchar(40) null after cidade;
;
create table db_coach.saude_12_meses(
	oque varchar (300) not null,
    porquem varchar (300) not null,
    onde varchar (300) not null,
    quando date not null,
    porque varchar (300) not null,
    como varchar (300) not null,
	cod int  not null auto_increment,
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
	cod int  not null auto_increment,
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
	cod int  not null auto_increment,
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
ALTER TABLE db_coach.formulario_15_anos
add column nome varchar(20) null after outro;
ALTER TABLE db_coach.formulario_15_anos
add column email varchar(60) null after nome;
ALTER TABLE `db_coach`.`saude_12_meses` 
ADD COLUMN `nome` VARCHAR(20) NULL AFTER `como`;
ALTER TABLE `db_coach`.`relacionamento_12_meses` 
ADD COLUMN `nome` VARCHAR(20) NULL AFTER `como`;
ALTER TABLE `db_coach`.`trabalho_12_meses` 
ADD COLUMN `nome` VARCHAR(20) NULL AFTER `como`;
ALTER TABLE `db_coach`.`dinheiro_12_meses` 
ADD COLUMN `nome` VARCHAR(20) NULL AFTER `como`;
ALTER TABLE `db_coach`.`outro_12_meses` 
ADD COLUMN `nome` VARCHAR(20) NULL AFTER `como`;
ALTER TABLE `db_coach`.`cadastro` 
ADD COLUMN `sobrenome` VARCHAR(45) NULL AFTER `nome`;
alter table db_coach.cadastro
add column data_nasc date null after estado;

ALTER TABLE `db_coach`.`saude_12_meses` 
ADD COLUMN `sobrenome` VARCHAR(45) NULL AFTER `nome`;
ALTER TABLE `db_coach`.`saude_12_meses` 
ADD COLUMN `objet` VARCHAR(200) NULL AFTER `sobrenome`;
ALTER TABLE `db_coach`.`saude_12_meses` 
ADD COLUMN `responsa` VARCHAR(200) NULL AFTER `objet`;
ALTER TABLE `db_coach`.`saude_12_meses` 
ADD COLUMN `data_inicio` date NULL AFTER `responsa`;
ALTER TABLE `db_coach`.`saude_12_meses` 
ADD COLUMN `data_fim` date  NULL AFTER `data_inicio`;
ALTER TABLE `db_coach`.`saude_12_meses` 
ADD COLUMN `obs` VARCHAR(300) NULL AFTER `data_fim`;
ALTER TABLE `db_coach`.`saude_12_meses` 
ADD COLUMN `obs_andre` VARCHAR(500) NULL AFTER `obs`;

ALTER TABLE `db_coach`.`relacionamento_12_meses` 
ADD COLUMN `sobrenome` VARCHAR(45) NULL AFTER `nome`;
ALTER TABLE `db_coach`.`relacionamento_12_meses` 
ADD COLUMN `objet` VARCHAR(200) NULL AFTER `sobrenome`;
ALTER TABLE `db_coach`.`relacionamento_12_meses` 
ADD COLUMN `responsa` VARCHAR(200) NULL AFTER `objet`;
ALTER TABLE `db_coach`.`relacionamento_12_meses` 
ADD COLUMN `data_inicio` date NULL AFTER `responsa`;
ALTER TABLE `db_coach`.`relacionamento_12_meses` 
ADD COLUMN `data_fim` date  NULL AFTER `data_inicio`;
ALTER TABLE `db_coach`.`relacionamento_12_meses` 
ADD COLUMN `obs` VARCHAR(300) NULL AFTER `data_fim`;
ALTER TABLE `db_coach`.`relacionamento_12_meses` 
ADD COLUMN `obs_andre` VARCHAR(500) NULL AFTER `obs`;

ALTER TABLE `db_coach`.`trabalho_12_meses` 
ADD COLUMN `sobrenome` VARCHAR(45) NULL AFTER `nome`;
ALTER TABLE `db_coach`.`trabalho_12_meses` 
ADD COLUMN `objet` VARCHAR(200) NULL AFTER `sobrenome`;
ALTER TABLE `db_coach`.`trabalho_12_meses` 
ADD COLUMN `responsa` VARCHAR(200) NULL AFTER `objet`;
ALTER TABLE `db_coach`.`trabalho_12_meses` 
ADD COLUMN `data_inicio` date NULL AFTER `responsa`;
ALTER TABLE `db_coach`.`trabalho_12_meses` 
ADD COLUMN `data_fim` date  NULL AFTER `data_inicio`;
ALTER TABLE `db_coach`.`trabalho_12_meses` 
ADD COLUMN `obs` VARCHAR(300) NULL AFTER `data_fim`;
ALTER TABLE `db_coach`.`trabalho_12_meses` 
ADD COLUMN `obs_andre` VARCHAR(500) NULL AFTER `obs`;

ALTER TABLE `db_coach`.`dinheiro_12_meses` 
ADD COLUMN `sobrenome` VARCHAR(45) NULL AFTER `nome`;
ALTER TABLE `db_coach`.`dinheiro_12_meses` 
ADD COLUMN `objet` VARCHAR(200) NULL AFTER `sobrenome`;
ALTER TABLE `db_coach`.`dinheiro_12_meses` 
ADD COLUMN `responsa` VARCHAR(200) NULL AFTER `objet`;
ALTER TABLE `db_coach`.`dinheiro_12_meses` 
ADD COLUMN `data_inicio` date NULL AFTER `responsa`;
ALTER TABLE `db_coach`.`dinheiro_12_meses` 
ADD COLUMN `data_fim` date  NULL AFTER `data_inicio`;
ALTER TABLE `db_coach`.`dinheiro_12_meses` 
ADD COLUMN `obs` VARCHAR(300) NULL AFTER `data_fim`;
ALTER TABLE `db_coach`.`dinheiro_12_meses` 
ADD COLUMN `obs_andre` VARCHAR(500) NULL AFTER `obs`;

ALTER TABLE `db_coach`.`outro_12_meses` 
ADD COLUMN `sobrenome` VARCHAR(45) NULL AFTER `nome`;
ALTER TABLE `db_coach`.`outro_12_meses` 
ADD COLUMN `objet` VARCHAR(200) NULL AFTER `sobrenome`;
ALTER TABLE `db_coach`.`outro_12_meses` 
ADD COLUMN `responsa` VARCHAR(200) NULL AFTER `objet`;
ALTER TABLE `db_coach`.`outro_12_meses` 
ADD COLUMN `data_inicio` date NULL AFTER `responsa`;
ALTER TABLE `db_coach`.`outro_12_meses` 
ADD COLUMN `data_fim` date  NULL AFTER `data_inicio`;
ALTER TABLE `db_coach`.`outro_12_meses` 
ADD COLUMN `obs` VARCHAR(300) NULL AFTER `data_fim`;
ALTER TABLE `db_coach`.`outro_12_meses` 
ADD COLUMN `obs_andre` VARCHAR(500) NULL AFTER `obs`;
ALTER TABLE `db_coach`.`formulario_15_anos` 
ADD COLUMN `sobrenome` VARCHAR(45) NULL AFTER `nome`;
ALTER TABLE `db_coach`.`saude_12_meses` 
ADD COLUMN `opcao` VARCHAR(3) NULL AFTER `objet`;
ALTER TABLE `db_coach`.`relacionamento_12_meses` 
ADD COLUMN `opcao` VARCHAR(3) NULL AFTER `objet`;
ALTER TABLE `db_coach`.`trabalho_12_meses` 
ADD COLUMN `opcao` VARCHAR(3) NULL AFTER `objet`;
ALTER TABLE `db_coach`.`dinheiro_12_meses` 
ADD COLUMN `opcao` VARCHAR(3) NULL AFTER `objet`;
ALTER TABLE `db_coach`.`outro_12_meses` 
ADD COLUMN `opcao` VARCHAR(3) NULL AFTER `objet`;

ALTER TABLE db_coach.formulario_15_anos
add column mot_edit varchar(350) null after cod;
ALTER TABLE db_coach.saude_12_meses
add column mot_edit varchar(350) null after obs;
ALTER TABLE db_coach.relacionamento_12_meses
add column mot_edit varchar(350) null after obs;
ALTER TABLE db_coach.trabalho_12_meses
add column mot_edit varchar(350) null after obs;
ALTER TABLE db_coach.dinheiro_12_meses
add column mot_edit varchar(350) null after obs;
ALTER TABLE db_coach.outro_12_meses
add column mot_edit varchar(350) null after obs;
ALTER TABLE db_coach.formulario_15_anos
add column obs_andre varchar(500) null after mot_edit;

ALTER TABLE db_coach.cadastro MODIFY COLUMN senha varchar(100);
ALTER TABLE db_coach.cadastro
add column cpf varchar(14) null after sexo;

create table db_coach.meta_relacionamento(
	nome varchar (20) not null,
    sobrenome varchar (45) not null,
    email varchar (60) not null,
    meta varchar (200) ,
    cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key(cod)
);
create table db_coach.meta_saude(
	nome varchar (20) not null,
    sobrenome varchar (45) not null,
    email varchar (60) not null,
    meta varchar (200) ,
    cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key(cod)
);
create table db_coach.meta_trabalho(
	nome varchar (20) not null,
    sobrenome varchar (45) not null,
    email varchar (60) not null,
    meta varchar (200) ,
    cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key(cod)
);
create table db_coach.meta_dinheiro(
	nome varchar (20) not null,
    sobrenome varchar (45) not null,
    email varchar (60) not null,
    meta varchar (200) ,
    cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key(cod)
);
create table db_coach.meta_outro(
	nome varchar (20) not null,
    sobrenome varchar (45) not null,
    email varchar (60) not null,
    meta varchar (200) ,
    cod int not null auto_increment,
    foreign key (cod) references cadastro(cod),
    primary key(cod)
);
ALTER TABLE db_coach.meta_relacionamento MODIFY COLUMN meta varchar(500);
ALTER TABLE db_coach.meta_relacionamento
add column feito varchar(5) null after meta;
ALTER TABLE db_coach.meta_saude
add column feito varchar(5) null after meta;
ALTER TABLE db_coach.meta_trabalho
add column feito varchar(5) null after meta;
ALTER TABLE db_coach.meta_dinheiro
add column feito varchar(5) null after meta;
ALTER TABLE db_coach.meta_outro
add column feito varchar(5) null after meta;


