@(ctf)[mysql]

[TOC]
# 本次任务
## 1. 学习HTML/CSS
http://www.w3school.com.cn/h.asp
## 2. 学习JavaScript
http://www.w3school.com.cn/b.asp
## 3. 学习MySql

时间很紧，HTML/CSS和JavaScript就不讲了，大家自行学习，基本要求能看懂代码就行，自我要求高点的要能写些基本的，比如HTML的表单，JavaScript的alert弹框。

下面是我学MySQL的笔记，希望大家在学习的过程中多实验，多查资料，多思考，多动手,实在搞不定了再问问题。

---
# MySQL学习笔记
## 1. MySQL服务的启动、停止与卸载
```
在 Windows 命令提示符下运行:
启动: net start MySQL
停止: net stop MySQL
卸载: sc delete MySQL
＃使用这些命令要看你的服务里存在不存在相应的服务，`services.msc`
```
## 2. 登陆
```
#mysql -h 主机名 -u 用户名 -p
mysql -h 1.1.1.1 -u user -ppassword
```
## 3. 修改root用户密码
### 方法1： 用SET PASSWORD命令 
```
首先登录MySQL。 
格式：mysql> set password for 用户名@localhost = password('新密码'); 
例子：mysql> set password for root@localhost = password('123'); 
```
### 方法2：用mysqladmin 
```
格式：mysqladmin -u用户名 -p旧密码 password 新密码 
例子：mysqladmin -uroot -p123456 password 123
或者
使用 mysqladmin 方式:
打开命令提示符界面, 执行命令: mysqladmin -u root -p password 新密码
执行后提示输入旧密码完成密码修改,当旧密码为空时直接按回车键确认即可。
```
### 方法3：用UPDATE直接编辑user表 
```
首先登录MySQL。 
mysql> use mysql; 
mysql> update user set password=password('123') where user='root' and host='localhost'; 
mysql> flush privileges; 
```
### 方法4：在忘记root密码的时候，可以这样 
```
以windows为例： 
1. 关闭正在运行的MySQL服务。 
2. 打开DOS窗口，转到mysql\bin目录。 
3. 输入mysqld --skip-grant-tables 回车。--skip-grant-tables 的意思是启动MySQL服务的时候跳过权限表认证。 
4. 再开一个DOS窗口（因为刚才那个DOS窗口已经不能动了），转到mysql\bin目录。 
5. 输入mysql回车，如果成功，将出现MySQL提示符 >。 
6. 连接权限数据库： use mysql; 。 
6. 改密码：update user set password=password("123") where user="root";（别忘了最后加分号） 。 
7. 刷新权限（必须步骤）：flush privileges;　。 
8. 退出 quit。 
9. 注销系统，再进入，使用用户名root和刚才设置的新密码123登录。
```
## 4. 创建数据库
```
#create database 数据库名 [其他选项];
create database samp_db character set gbk;
```
>提示: 可以使用 `show databases;` 命令查看已经创建了哪些数据库。
## 5. [执行sql语句](http://blog.csdn.net/lwei_998/article/details/11806223)
### 1. 直接输入sql执行

```
MySQL> select now();
+---------------------+
| now()               |
+---------------------+
| 2013-09-18 13:55:45 |
+---------------------+
1 row in set (0.00 sec)
```
### 2. 执行编写好的sql脚本
```
mysql> source H:/1.sql
+---------------------+
| now()               |
+---------------------+
| 2013-09-18 13:54:04 |
+---------------------+
1 row in set (0.00 sec)

mysql -u用户名 -p密码 数据库名 < 数据库名.sql
#mysql -uabc_f -p abc < abc.sql
```
### 3. `select ...into outfile` 方式执行sql
```
例1:
mysql> select now()  into outfile 'h:/data/2.sql';
Query OK, 1 row affected (0.00 sec)
例2:
MariaDB [dvwa]>  select now()  into outfile 'C:/xampp/htdocs/1.sql';
Query OK, 1 row affected (0.02 sec)
MariaDB [dvwa]> load_file('C:/xampp/htdocs/1.sql');
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'load_file('C:/xampp/htdocs/1.sql')' at line 1
MariaDB [dvwa]> select load_file('C:/xampp/htdocs/1.sql');^A
+------------------------------------+
| load_file('C:/xampp/htdocs/1.sql') |
+------------------------------------+
| 2017-05-25 00:06:06
               |
+------------------------------------+
```

### 4. 使用mysql命令执行
#### `mysql -D mysql -u root -p -e`
```
例1
H:\>mysql -uadmin -p -e "select now()"
Enter passworH: ****
+---------------------+
| now()               |
+---------------------+
| 2013-09-18 13:57:09 |
+---------------------+
例2
mysql -D mysql -u root -p -e "select 1234"
Enter password:
+------+
| 1234 |
+------+
| 1234 |
+------+
```
#### `mysql -D samp_db -u root -p <` 
```
#在控制台下, MySQL客户端也可以对语句进行单句的执行而不用保存为.sql文件。
#createtable.sql 的文件中,通过命令提示符下的文件重定向执行执行该脚本。
mysql -D samp_db -u root -p < createtable.sql
```
## 6. 创建表
```
#create table 表名称(列声明);
	create table students
	（
		id int unsigned not null auto_increment primary key,
		name char(8) not null,
		sex char(4) not null,
		age tinyint unsigned not null,
		tel char(13) null default "-"
	);
```
>提示: 
>1. 使用 `show tables;` 命令可查看已创建了表的名称; 
>2. 使用 `describe 表名;` 或`desc 表名` 命令可查看已创建的表的详细信息。


## 7. 插入数据
```
#insert [into] 表名 [(列名1, 列名2, 列名3, ...)] values (值1, 值2, 值3, ...);
insert into students values(NULL, "王刚", "男", 20, "13811371377");
insert into students (name, sex, age) values("孙丽华", "女", 21);
```
## 8. 查询数据
```
#select 列名称 from 表名称 [查询条件];
select name, age from students;
select * from students;
```
### `where`子句
```
##select 列名称 from 表名称 where 条件;
##where 子句不仅仅支持 "where 列名 = 值" 这种名等于值的查询形式, 对一般的比较运算的运算符都是支持的, 例如 =、>、<、>=、<、!= 以及一些扩展运算符 is [not] null、in、like 等等。 还可以对查询条件使用 or 和 and 进行组合查询, 以后还会学到更加高级的条件查询方式, 这里不再多做介绍。
select * from students where sex="女";
###查询年龄在21岁以上的所有人信息: 
select * from students where age > 21;
###查询名字中带有 "王" 字的所有人信息: 
select * from students where name like "%王%";
###查询id小于5且年龄大于20的所有人信息: 
select * from students where id<5 and age>20;
```
## 9. 更新数据
```
#update 表名称 set 列名称=新值 where 更新条件;
update students set tel=default where id=5;#将id为5的手机号改为默认的"-"
update students set age=age+1;#将所有人的年龄增加1
update students set name="张伟鹏", age=19 where tel="13288097888";#将手机号为 13288097888 的姓名改为 "张伟鹏", 年龄改为 19
```
## 10. 删除数据
```
#delete from 表名称 where 删除条件;
删除id为2的行: 
delete from students where id=2;
删除所有年龄小于21岁的数据: 
delete from students where age<20;
`删除表中的所有数据`: 
delete from students;
```
## 11. 创建后对表的修改
### 1. 添加列
```
##alter table 表名 add 列名 列数据类型 [after 插入位置];
###在表的最后追加列 address: 
alter table students add address char(60);
###在名为 age 的列后插入列 birthday: 
alter table students add birthday date after age;
```
### 2. 修改列
```
##alter table 表名 change 列名称 列新名称 新数据类型
###将表 tel 列改名为 telphone: 
alter table students change tel telphone char(13) default "-";
###将 name 列的数据类型改为 char(16): 
alter table students change name name char(16) not null;
```
### 3. 删除列
```
##alter table 表名 drop 列名称;
###删除 birthday 列: 
alter table students drop birthday;
```
### 4. 重命名表
```
##alter table 表名 rename 新表名;
###重命名 students 表为 workmates: 
alter table students rename workmates;
```
### 5. 删除整张表
```
##drop table 表名;
###删除 workmates 表: 
drop table workmates;
```
### 6. 删除整个数据库
```
##drop database 数据库名;
###删除 samp_db 数据库: 
drop database samp_db;
```
## 12. 启用mysql执行sql语句日志

以本机MySQL为例，先查看mysql日志启用情况，默认情况下mysql日志是关闭状态，可以通过如下语句 
```
SHOW VARIABLES LIKE "general_log%"
``` 
，进行查看，这时我们看到的是OFF，还有日志所在的位置，使用此默认位置

![图片标题](http://img.blog.csdn.net/20161121151649785?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQv/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70/gravity/Center)

可以通过如下语句开启，
```
SET GLOBAL general_log = 'ON'
```
，执行成功之后看到如下

![图片标题](http://img.blog.csdn.net/20161121152120244?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQv/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70/gravity/Center)

# 参考
1. http://www.cnblogs.com/mr-wid/archive/2013/05/09/3068229.html#c1
2. http://www.cnblogs.com/gzchenjiajun-php/articles/4917976.html
3. http://blog.csdn.net/lwei_998/article/details/11806223

# 作业

## 1. 编写一个完整的html登录页面并提交
里面要有登录表单，表单有用户名和密码，点击提交时，使用js做本地验证
## 2. 编写一个提交发言html的页面并提交
本地js做验证
## 3. 编写一个上传图片的html页面并提交
本地js做验证
## 4.手动创建一个数据库，提交sql文件
数据库中包括一个表，表中至少包括三列
* id,为整型，自动递增
* username，字符型，为所在小组成员github id号
* password，字符型，使用PASSWORD函数加密

并对数据库、表、列，数据其进行增删该查

## 5.提交学习笔记
写代码时请加上注释
