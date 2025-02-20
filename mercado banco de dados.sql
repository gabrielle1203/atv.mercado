create database mercado;
use mercado;

create table cadastro(
    id_cliente int primary key auto_increment,
    cliente varchar(35) not null,
    cpf varchar(11) not null,
    rg varchar(9)not null,
    datanasc date not null,
    ocupacao varchar(200) null,
    fone varchar(11) null,
    email varchar(45) not null,
    cidade varchar(24)  
);

select * from cadastro;
