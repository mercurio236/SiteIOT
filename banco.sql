create database if not exists setor;
use setor;
create table if not exists tb_setor(
	idSetor int unsigned auto_increment primary key,
    nomeSetor varchar(200) not null
);

create table if not exists entrada(
	idEntrada int auto_increment not null,
    nomeEntrada varchar(200) not null,
    dataEntrada date not null,
    horaEntrada time not null,
    setorEntrada varchar(200) not null,
    primary key (idEntrada)
);

create table if not exists saida(
	idSaida int auto_increment not null,
    nomeSaida varchar(200) not null,
    dataSaida date not null,
    horaSaida time not null,
    setorSaida varchar(200) not null,
    primary key (idSaida)
);

create table if not exists Cadastro(
	idUsuario int unsigned auto_increment not null primary key,
    nomeUsuario varchar(200) not null
);


