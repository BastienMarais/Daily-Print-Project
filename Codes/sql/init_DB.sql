/* Creation of tables  */

drop table REAL_USER;
drop table TMP_USER  ;
drop table REQUESTS ;
drop table PROTECT_FILES ;

create table REAL_USER (
email varchar(50) primary key, check (email LIKE "%@%"),
name varchar(30) not null,
surname varchar(30) not null,
status varchar(30) not null,
password varchar(50) not null,
department varchar(30) not null);

create table TMP_USER (
email varchar(50) primary key, check (email LIKE "%@%.%"),
name varchar(30) not null,
surname varchar(30) not null,
status varchar(30) not null,
password varchar(50) not null,
department varchar(30) not null,);

create table REQUESTS (
id_requests number(8) primary key identity(0,1),
creation_date date not null,
delivery_date date not null,
user_email varchar(50) references REAL_USER,
num_copy number(3) not null,
num_page number(3) not null,
finition varchar(30) not null,
TODO);

create table PROTECT_FILES (
title varchar(100) not null,
author varchar(100) not null,
editor varchar(100) not null,
num_protect_page number(3) not null,
num_copy number(3) not null,
requests number(8) references REQUESTS);
