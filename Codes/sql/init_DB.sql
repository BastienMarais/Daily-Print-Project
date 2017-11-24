/* Creation of tables  */

drop table REAL_USER;
drop table TMP_USER  ;
drop table REQUESTS ;
drop table PROTECT_FILES ;

create table REAL_USER (
email varchar(50) primary key,
name varchar(30) not null,
surname varchar(30) not null,
status varchar(30) not null,
password varchar(50) not null,
department varchar(30) not null);

create table TMP_USER (
email varchar(50) primary key,
name varchar(30) not null,
surname varchar(30) not null,
status varchar(30) not null,
password varchar(50) not null,
department varchar(30) not null,);

create table REQUESTS (
id_request number(8) primary key identity(0,1),
user_email varchar(50) references REAL_USER,
path_file varchar(50) not null,
creation_date date not null,
delivery_date date not null,
num_copy number(3) not null,
num_page number(3) not null,
finition varchar(30) not null);

create table PROTECT_FILES (
id_file number(8) primary key identity(0,1),
request number(8) references REQUESTS,
title varchar(100) not null,
author varchar(100) not null,
editor varchar(100) not null,
num_protect_page number(3) not null,
num_copy number(3) not null);
