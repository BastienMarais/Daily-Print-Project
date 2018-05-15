 /* Creation of tables  */
/*On commence par supprimer toutes les tables que l'on va créer afin de s'assurer de ne pas créer de doublons*/
drop table IF EXISTS REAL_USER;
drop table IF EXISTS TMP_USER  ;
drop table IF EXISTS REQUESTS ;
drop table IF EXISTS PROTECT_FILES ;

/* REAL_USER : Cette table est une table définitive qui va contenir toutes les informations concernant un utilisateur. Ces informations 
   sont ajoutées si et seulement si l'admin valide son inscription */
create table REAL_USER (
user_email varchar(50) primary key,
name varchar(30) not null,
surname varchar(30) not null,
statut varchar(30) not null,
password varchar(300) not null,
department varchar(30) not null,
notification boolean not null);

/* TMP_USER : Cette table est une table temporaire qui va contenir toutes les informations concernant un utilisateur. Ces informations 
sont ajoutées lors de son inscription sur le site et avant la validation par l'admin */
create table TMP_USER (
user_email varchar(50) primary key,
name varchar(30) not null,
surname varchar(30) not null,
statut varchar(30) not null,
password varchar(300) not null,
department varchar(30) not null,
notification boolean not null);

/* REQUESTS : Cette table est celle qui va contenir toutes les informations relatives à une demande d'impression faite par
   un utilisateur*/
create table REQUESTS (
id_request int(10) AUTO_INCREMENT primary key,
user_email varchar(50) not null,
path_file varchar(50) not null,
creation_date date not null,
delivery_date date not null,
num_copy int(3) not null,
couleur varchar(50) not null,
recto_verso varchar(50) not null,
finition varchar(50) not null);

/* PROTECT_FILES : Cette table est celle qui va contenir toutes les informations relatives à une demande d'impression faite par
   un utilisateur et qui contient des pages d'un fichier protégé*/
create table PROTECT_FILES (
id_file int(10) AUTO_INCREMENT primary key,
request int(10) not null,
title varchar(100) not null,
author varchar(100) not null,
editor varchar(100) not null,
num_protect_page integer(3) not null,
num_copy int(3) not null);

/* On ajoute un admin par défaut */
INSERT INTO `REAL_USER` (`user_email`, `name`, `surname`, `statut`, `password`, `department`, `notification`) VALUES ('admin@dailyprint.xyz', 'Admin', 'Super', 'Admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Autre', '0')
