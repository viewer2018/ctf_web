#### 创建数据库
![image](https://github.com/huixinzzZ/ctf_web/blob/master/src/sql1.png?raw=true)

![image](https://github.com/huixinzzZ/ctf_web/blob/master/src/sql2.png?raw=true)

#### 笔记
配置mysql
首先添加path环境变量，路径指向mysql所在bin目录下  
   
* 注册windows系统服务  
添加变量完成后，还是不能正常启动mysql，因为用户初始配置并没有建立，安装目录下并没有DATA文件夹和初始化配置文件。 
新建一个my.ini文件

* 建立data文件夹   
mysql 5.7版本后已经不自带data，没有默认数据库就是上文说的data文件夹。  
在管理员模式下运行命令行。并且打开到自己的解压缩目录下。  
打开cmd命令窗口，并且进入到mysql安装目录的bin目录下。然后输入命令
mysqld --initialize-insecure --user=mysql

* 安装mysql 
打开管理员模式cmd的， 
进入mysql\bin目录下，输入服务安装命令：
mysqld -install
* 启动mysql服务
net start mysql
* 登录数据库
cmd--“命令提示字符”窗口录入，
录入cd C:\mysql\bin 并按下回车键，将目录切换为 cd C:\mysql\bin
再键入命令mysql -uroot -p，回车后提示你输密码，如果刚安装好MYSQL，超级用户root是没有密码的，故直接回车即可进入到MYSQL中了。
MYSQL的提示符是：mysql>
*  修改root密码
set password for root@localhost = password('1234'); （结尾要加；分号）
出现错误；
刷新一下权限表。
mysql> flush privileges;
* 常用命令  
http://www.cnblogs.com/mr-wid/archive/2013/05/09/3068229.html#c1

