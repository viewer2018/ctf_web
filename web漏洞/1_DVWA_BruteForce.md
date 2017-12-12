接下来，我们依托DVWA进行web漏洞的学习。

# 1. DVWA简介
DVWA（Damn Vulnerable Web Application）是一个用来进行安全脆弱性鉴定的PHP/MySQL Web应用，旨在为安全专业人员测试自己的专业技能和工具提供合法的环境，帮助web开发者更好的理解web应用安全防范的过程。

DVWA共有十个模块，分别是Brute Force（暴力（破解））、Command Injection（命令行注入）、CSRF（跨站请求伪造）、File Inclusion（文件包含）、File Upload（文件上传）、Insecure CAPTCHA（不安全的验证码）、SQL Injection（SQL注入）、SQL Injection（Blind）（SQL盲注）、XSS（Reflected）（反射型跨站脚本）、XSS（Stored）（存储型跨站脚本）。

需要注意的是，DVWA 1.9的的题目可以设置不同的难度，对应为四种安全级别：Low，Medium，High，Impossible。在做题的时候可以通过比较这四种级别的代码，回顾些经典漏洞的攻防历史,也可以接触到一些代码审计的内容。
# 2. 环境配置
这里使用的环境为
```
vmware＋win7虚拟机＋phpStudy(apache＋php＋mysql)
```
具体使用如下
## 1. 下载与安装
* [参考说明](https://github.com/ethicalhack3r/DVWA)
* BurpSuite下载
1.7.26永久版本 burp
https://pan.baidu.com/s/1eR3Myrg 3fnb

* [DVWA-1.9.zip下载地址](https://codeload.github.com/ethicalhack3r/DVWA/zip/v1.9)

* [phpStudy](http://www.phpstudy.net/phpstudy/phpStudy20161103.zip)
解压，然后点击`phpStudy20161103.exe`进行安装，我选择的安装路径为`C:\phpStudy`,安装完成后运行界面如下：

![Alt text](../src/BruteForce/1512983560605.png)

mysql 的默认口令：`root:root`

![Alt text](../src/BruteForce/1512983713276.png)

## 2. 配置DVWA
* 将`DVWA-1.9.zip`解压到`C:\phpStudy\WWW`路径下，并重命名为`DVWA`

![Alt text](../src/BruteForce/1512984105262.png)

* 修改默认配置中的数据库密码
修改`C:\phpStudy\WWW\DVWA\config\config.inc.php`文件中`db_password`的值为默认密码`root`

 ![Alt text](../src/BruteForce/1512984195773.png)
 
* 访问`http://127.0.0.1/dvwa/setup.php`进行配置
 
 ![Alt text](../src/BruteForce/1512985061391.png)
 
红色部分表示有问题的，但暂时不影响学习，可以到需要的时候再修改
* 点击`Create/Reset Database`创建数据库
 
  ![Alt text](../src/BruteForce/1512985131581.png)
  
* 成功创建数据库后，页面会自动跳转到登陆页面，使用默认口令`admin:password`进行登陆做题学习

  ![Alt text](../src/BruteForce/1512985283943.png)

* 刚开始我们将难度设置为`Low`，后续根据学习情况进行其他级别设置

![Alt text](../src/BruteForce/1512985620958.png)



下面是第一个漏洞类型的学习笔记：`Brute Force`

---
#  Brute Force
`Brute Force`，即暴力（破解），是指黑客利用密码字典，使用穷举法猜解出用户口令，是现在最为广泛使用的攻击手法之一，如2014年轰动全国的12306“撞库”事件，实质就是暴力破解攻击。相对于其他漏洞，爆破学习门槛低，实施成本更容易，但其中也有很多窍门，拓展阅读请参考[爆破为王](http://www.52bug.cn/%E9%BB%91%E5%AE%A2%E6%8A%80%E6%9C%AF/2421.html)

下面将对四种级别的代码进行分析。
## 1. Low

### 服务器端核心代码

![Alt text](../src/BruteForce/1513050713394.png)

可以看到，服务器只是验证了参数`Login`是否被设置（`isset`函数在`php`中用来检测变量是否设置，该函数返回的是布尔类型的值，即`true/false`），没有任何的防爆破机制，且对参数username、password没有做任何过滤，存在明显的sql注入漏洞。

### 漏洞利用
爆破利用burpsuite即可完成。我这里使用的环境是
* Linux kali 4.3.0-kali1-amd64+自带burpsuite+Lceweasel浏览器
* vmware＋win7虚拟机＋phpStudy(apache＋php＋mysql)

参考步骤如下：
1. 打开burpsuite，配置好Lceweasel浏览器代理

![Alt text](../src/BruteForce/1513051816931.png)

2. 输入dvwa网址，进入Brute Force界面，随便输入一个用户名和密码，进行抓包

![Alt text](../src/BruteForce/1513052426469.png)

抓包结果为：

![Alt text](../src/BruteForce/1513052384833.png)

3. 在`Request`版面下右键，选择`Send to Instruder`

![Alt text](../src/BruteForce/1513052855648.png)

4. 在`Instruder`模块，

 a. 选择admin和password为爆破参数
 
![Alt text](../src/BruteForce/1513055234639.png)

 b. 选择`Cluster bomb`攻击类型
 
![Alt text](../src/BruteForce/1513053167828.png)

 c. 选择payload set 1
 
![Alt text](../src/BruteForce/1513055296578.png)

 d. 选择payload set 2
[参考字典](http://wiki.jeary.org/#!top10000pass.md)

![Alt text](../src/BruteForce/1513055424585.png)

 e. 点击`Start attack`,开始爆破

5. 最后，尝试在爆破结果中找到正确的密码，可以看到password的响应包长度（length）**与众不同**，可推测password为正确密码，手工验证登陆成功。可点击Length进行排序，选择最大或者最小的异常包。

![Alt text](../src/BruteForce/1513056403475.png)

## 2. Medium
### 核心代码如下：

![Alt text](../src/BruteForce/1513058008530.png)

相比Low级别的代码，Medium级别的代码主要增加了
* `mysql_real_escape_string`函数，这个函数会对字符串中的特殊符号（`\x00`,`\n`,`\r`,`\`,`'`,`"`,`x1a`）进行转义，基本上能够抵御sql注入攻击，说基本上是因为查到说 `MySQL5.5.37`以下版本如果设置编码为GBK，能够构造编码绕过`mysql_real_escape_string` 对单引号的转义(有兴趣的同学可以试试)；
* $pass做了MD5校验，杜绝了通过参数password进行sql注入的可能性。
但是，依然没有加入有效的防爆破机制（sleep(2)实在算不上）。

### 漏洞利用

虽然sql注入不再有效，但依然可以使用Burpsuite进行爆破，与Low级别的爆破方法基本一样，这里就不赘述了。

## 3. high
### 服务端核心代码

![Alt text](../src/BruteForce/1513058982718.png)

* High级别的代码加入了`Token`，可以抵御CSRF攻击，同时也增加了爆破的难度，通过抓包，可以看到，登录验证时提交了四个参数：username、password、Login以及user_token。

![Alt text](../src/BruteForce/1513059036465.png)

每次服务器返回的登陆页面中都会包含一个随机的user_token的值，用户每次登录时都要将user_token一起提交。服务器收到请求后，会优先做token的检查，再进行sql查询。

![Alt text](../src/BruteForce/1513059117687.png)

* 同时，High级别的代码中，使用了stripslashes（去除字符串中的反斜线字符,如果有两个连续的反斜线,则只去掉一个）、 mysql_real_escape_string对参数username、password进行过滤、转义，进一步抵御sql注入。

### 漏洞利用
#### 方法一、使用Burpsuite的Macros功能爆破Token
Burpsuite中的Macros就是获取响应报文中的一些值，例如Token，然后自动替换下一个请求报文中的参数值。具体设置方法如下：
1. 切换到 Burpsuite 的 Project options 选项卡，点击Macros下的add按钮 

![Alt text](../src/BruteForce/1513061629222.png)

2. 点击add按钮之后，这时候弹出两个窗口，一个是Macro 记录器，一个是Macro编辑器，Macro记录器是记录发送那些HTTP请求，Macro编辑器是编辑一些参数，比如具体截取响应报文中的哪一个参数等等

3. 首先操作Macro记录器，点击选择我们要发送HTTP请求，然后点击右下角的OK按钮即可（比如下图这样）

![Alt text](../src/BruteForce/1513065504607.png)

4. 然后开始操作Macro编辑器， 选择右侧Configure item, 在弹出的界面中找到`Custom parameter locations in response`区域，然后点击右侧的 Add按钮

![Alt text](../src/BruteForce/1513066747593.png)

5. 在弹出的窗口中，首先给要截取得参数值命名，我这里命名为`user_token` ，然后用鼠标选择我们要截取的内容，这里就把`user_token`的32位数字和字母的值选取了即可，如果出现如下界面就表示OK了

![Alt text](../src/BruteForce/1513065745023.png)

然后点击右下角的OK，然后在所有回到的界面中继续点击右下角的OK

6. 测试下Macro是否设置正确，下图所示正确产生新的token即可。至此，我们就配置完毕了Macro。

![Alt text](../src/BruteForce/1513065882305.png)

7. 接着开始让Burpsuite自动调用Macros，并替换经过代理的请求中的`user_token`的值。我们切换回Project options 的选项卡，找到Session Handling Rules

![Alt text](../src/BruteForce/1513066068389.png)

在弹出的界面中进行如下设置，然后点击ok

![Alt text](../src/BruteForce/1513066223899.png)

点击Scope，进行如下设置，这里仅更新`Intruder`模块中的请求

![Alt text](../src/BruteForce/1513066280757.png)

8. 然后进行爆破，结果如下：

![Alt text](../src/BruteForce/1513066476119.png)


#### 方法二、python脚本
下面是我自己写的一个脚本（python 2.7），用户名为admin，对password参数进行爆破并打印结果，仅供各位参考。
```python
#!/usr/bin/env python
#coding=utf8
import re

import requests
header = {
    'Host': '172.16.163.192',
    'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64; rv:43.0) Gecko/20100101 Firefox/43.0 Iceweasel/43.0.4',
    'Cookie': 'security=high; PHPSESSID=bn9u8bm1m67uba8eqqgf0ssq67',
    'Referer': 'http://172.16.163.192/dvwa/vulnerabilities/brute/'
}
file = open('pass1.txt', 'r')
url = 'http://172.16.163.192/dvwa/vulnerabilities/brute/'

dvwa_session = requests.Session()
for line in file:
    resp = dvwa_session.get(url, headers=header)
    # 使用正则表达式 获取提交 token
    token = re.search(r'[a-z0-9]{32}', resp.text).group()
    # print 'user_token : ', token
    password = line.strip()
    url2 = 'http://172.16.163.192/dvwa/vulnerabilities/brute/?username=admin&password=' + password +'&Login=Login&user_token=' + str(token)
    # print url
    resp = dvwa_session.get(url2, headers=header)

    # print password.strip(), len(resp.text)
    if len(resp.text)!=5031:
        print "admin find password:",password
file.close()

pass1.txt
123456
1234567
12345678
1q2w3e4r
qaz123wsx
123!@#qwe
123qweasdzxc
qweasdzxc
111111
5201314
admin
admin123
admin888
root@123
password
P@ssword
888888
```
运行结果：
![Alt text](../src/BruteForce/1513059634271.png)
对比结果看到，密码为password时返回的长度不太一样，手工验证，登录成功，爆破完成。

## 4. Impossible
### 服务器端核心代码

![Alt text](../src/BruteForce/1513059850299.png)

* Impossible级别的代码加入了可靠的防爆破机制，当检测到频繁的错误登录后，系统会将账户锁定，爆破也就无法继续。
* 同时采用了更为安全的PDO（[PHP Data Object](http://www.cnblogs.com/pinocchioatbeijing/archive/2012/03/20/2407869.html)）机制防御sql注入，这是因为不能使用PDO扩展本身执行任何数据库操作，而sql注入的关键就是通过破坏sql语句结构执行恶意的sql命令


---

## 5. burpsuite attack四种类型
### 1) sniper
* Sniper是狙击手的意思，也是我们最常用的
*  这一模式是使用单一的payload组
*  一次请求改变position中一个$$位置的值
* 这种攻击类型适合对常见漏洞中的请求参数单独进行测试
* 攻击中的请求总数是position数量和payload数量的乘积
### 2) Battering ram 
* 这一模式是使用单一的payload组。
* 这个模式下，所有的变量共用一组payload，一次请求中所有position中的$$为相同值
* 这种攻击类型适合那种需要在请求中把相同的输入放到多个位置的情况；或者说是一个payload字典同时应用到多个position中
* 攻击中的请求总数是payload组中payload的总数
### 3) Pitchfork
* 这一模式使用多个payload组，每个定义的位置可以使用不同的payload组
* 攻击会同步迭代所有的payload组，把payload放入每个定义的位置中。比如：position中A处有a字典，B处有b字典，则a【1】将会对应b【1】进行attack处理
* 这种攻击类型非常适合那种不同位置中需要插入不同但相关的输入的情况
* 请求的数量应该是最小的payload组中的payload数量
### 4) Cluster bomb
* 这种模式会使用多个payload组。每个定义的位置中有不同的payload组
* 攻击会迭代每个payload组，每种payload组合都会被测试一遍。比如：position中A处有a字典，B处有b字典，则两个字典将会循环搭配组合进行attack处理
* 这种攻击适用于那种位置中需要不同且不相关或者未知的输入的攻击，例如，在不知道用户名与用户密码的情况下，对用户名与用户密码进行爆破
* 攻击请求的总数是各payload组中payload数量的乘积




#  参考资料
1. http://www.52bug.cn/%E9%BB%91%E5%AE%A2%E6%8A%80%E6%9C%AF/2421.html
2. http://www.freebuf.com/articles/web/116437.html
3. http://search.freebuf.com/search/?search=dvwa#article

# 作业
查找资料，完成DVWA漏洞类型`Brute Force`的学习，提交详细学习笔记。（请大家以这个学习笔记为模版，整理自己的学习笔记）
