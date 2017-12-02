#web作业#
 sql安装教程
 [网址](https://www.cnblogs.com/outsidersblogs/p/7777569.html)
 sql常用命令
 [命令](http://www.cnblogs.com/mr-wid/archive/2013/05/09/3068229.html#c1)
 
 创建一个数据库
 create database samp_db;
use samp_db;
create table student
(
	id int unsigned not null auto_increment primary key,
	username char(10) not null,
	password char(10) not null
	);

insert into users(username,password) values("ljd321",PASSWORD("ljd"));
