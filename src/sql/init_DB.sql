 /* Creation of tables  */
/*On commence par supprimer toutes les tables que l'on va créer afin de s'assurer de ne pas créer de doublons*/
drop table REAL_USER;
drop table TMP_USER  ;
drop table REQUESTS ;
drop table PROTECT_FILES ;

/* REAL_USER : Cette table est une table définitive qui va contenir toutes les informations concernant un utilisateur. Ces informations 
   sont ajoutées si et seulement si l'admin valide son inscription */
create table REAL_USER (
email varchar(50) primary key,
name varchar(30) not null,
surname varchar(30) not null,
status varchar(30) not null,
password varchar(50) not null,
department varchar(30) not null);

/* TMP_USER : Cette table est une table temporaire qui va contenir toutes les informations concernant un utilisateur. Ces informations 
sont ajoutées lors de son inscription sur le site et avant la validation par l'admin */
create table TMP_USER (
email varchar(50) primary key,
name varchar(30) not null,
surname varchar(30) not null,
status varchar(30) not null,
password varchar(50) not null,
department varchar(30) not null,);

/* REQUESTS : Cette table est celle qui va contenir toutes les informations relatives à une demande d'impression faite par
   un utilisateur*/
create table REQUESTS (
id_request number(8) primary key identity(0,1),
user_email varchar(50) references REAL_USER,
path_file varchar(50) not null,
creation_date date not null,
delivery_date date not null,
num_copy number(3) not null,
num_page number(3) not null,
finition varchar(30) not null);

/* PROTECT_FILES : Cette table est celle qui va contenir toutes les informations relatives à une demande d'impression faite par
   un utilisateur et qui contient des pages d'un fichier protégé*/
create table PROTECT_FILES (
id_file number(8) primary key identity(0,1),
request number(8) references REQUESTS,
title varchar(100) not null,
author varchar(100) not null,
editor varchar(100) not null,
num_protect_page number(3) not null,
num_copy number(3) not null);
