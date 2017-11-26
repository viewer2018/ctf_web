# git 学习心得
### github的作用 ##

github比bitbucket稳定，可以上传大文件
github是一个免费的版本控制的网盘(上传大软件)
github没有被公司屏蔽，没有别GFW屏蔽
## 使用git bash设置ssh登录 ## 
### 步骤 ###

设置用户名:git config --global user.name "LeeH0ng"

设置用户邮箱:git config --global user.email "lihong9708@gmail.com"

使用ssh登录:git config --global http.sslVerify false

启动ssh服务器:ssh-agent bash

生产私钥和公钥:ssh-keygen -t rsa -C "yanjie.jw@163.com"

添加私钥到本地:ssh-add ～/.ssh/id_rsa

添加私钥是否已经添加:ssh-add -l

把公钥和私钥复制出来到当前目录下: cp -R ~/.ssh/* .

打开公钥id_rsa.pub,登录到对应的网站,输入公钥

进入相应的本地仓库

git init

git add .

git commit -m "remark"

git remote add origin https://github.com/LeeH0ng/**(仓库名).git

### 重点说明 ###

每个仓库的local配置都保存在.git/config文件
没有本地local没有配置,就找全局global，没有全局global没有配置就找系统system

## 安装github for windows##

国内请安装免费翻墙软件：PsiPon3, 下载安装并运行
打开chrome浏览器 github for windows
下载github for windows安装包（670K左右）
运行安装包，在线安装必须翻墙,因为程序是托管在亚马逊云上
进行用github用户名和密码登录配置
## 利用github git shell登录github##

如果仓库在github上，优先选择git shell
利用github UI登录后，可直接使用git shell来登录
直接利用git add. git commit -m "update" git push
推荐先在github上建立仓库，然后利用git clone来实现
##利用git 返回到某个版本

git log 获取所有commit版本
git reset --hard commitno (获取前面6位)
## 本地已存在项目

在网站上建立仓库
进入项目文件夹
执行git bash设置ssh登录中的步骤
git push origin master
##FAQ##

配置密钥后,还是需要输入用户名问题

网站上一个公钥，是否所有电脑还共用一个私钥

git和http的网址是否相同

http.sslverify配置具体含义

fatal:The remote end hung up unexpectedly

error: fatal: WRPC failed: HTTP 400 curl 22 The requested URL returned error:400 Bad Request

error: RPC failed; curl 56 SSL read: err三种方式 or

ssh: connect to host bitbucket.org port 22: Connection timed out

fatal:Could not read from remote repository

bitbucket.org/coding.net push不上去大的项目,但是github可以

fatal: unable to access '':the requested URL returned error:500 解决：生成密钥并部署密钥

hint:updates were rejected because a pushed branch tip is behind its remote.hint:counterpart. check out this branch and integrate the remote change hint:<e.g git pull....> before pushing again.see the Note about fast-forwards in 'git push--help ' for details 解决方案：一般是branch选择错误。

访问有三种方式1.ssh 2.https 3.http

在github shell中可以通过一个 ./ 来执行脚本

在git log时可以通过q来退出这个命令行

在修改后的文件中，只能执行下git add.;git commit ,git push后通过git reset --hard commit号来执行返回

当说两个文件冲突时，可以先开一个branch

git config --global --list 里面global的设置都保存在C:\Documents and settings\用户名.gitconfig文件夹下（windows）

git remote show origin 查看远程origin

修改远程目录名称 git remote rename origin oldname newname

Recv failture: Connnection was reset （原因：没有连上网络）

rsa routines:RSA_padding_check_PKCS1_type_1:block type is not 01 进行配置git config --global http.sslVerify false

fatal: The remote end hung up unexpectedly

coding.net不允许上传超过20M的单个文件 <<<<<<< HEAD

Identity added: /root/.ssh/id_rsa(/c/Users/yye/.ssh/id_rsa) =======

fatal: unable to access 'https://github.com/LeeH0ng/****.git'：/Unkown
SSL protocal error in connection to github .com:443 进行配置git config --global http.sslVerify false
