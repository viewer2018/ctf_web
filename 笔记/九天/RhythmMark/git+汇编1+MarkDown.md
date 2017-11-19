------------------------------------------------
## 第一次作业-划重点：

### 1.可以用DVWA进行漏洞学习，里面有：
- [x] 暴力破解（账户名和密码）
- [x] 命令行注入
- [x] 跨站请求伪造（CSRF）
- [x] 文件包含
- [x] 文件上传
- [x] 不安全的验证码（易绕过）
- [x] SQL注入
- [x] SQL盲注
- [x] 反射和存储型的跨站脚本（XSS）
十个漏洞。

### 2.git
---网页版---
1）每个GitHub项目右上角都有这三个按钮
- watch--关注--能收到相关邮件
- star--点赞，收藏--可在your satrs中找到该项目
- fork--拷贝--可修改

2）创建文件夹：
create new file
           ↓
![](http://i.stack.imgur.com/n3Wg3.gif)

3)pull request

---git---
参照：[廖雪峰的git教程](https://www.liaoxuefeng.com/wiki/0013739516305929606dd18361248578c67b8067c8c017b000)
0)安装：
- Linux：sudo apt-get install git
- Windows：[镜像地址](https://git-for-windows.github.io/)

1)创建版本库
ii)mkdir learngit    //创建空目录
- cd learngit          //进入空目录
- cd(Windows)/pwd(MAC)              //显示当前目录

ii)git init             //初始化

2)新建文件

i) 用Notepad++新建txt文件并保存到lerngit目录下
ii)git add readme.txt    //将文件添加到仓库
iii)git commit -m "wrote a readme file"   //把（缓冲区的文件）文件提交给仓库，并添加下相关说明

3)修改文件
i)使用Notepad++修改
ii)git add xxx.txt
iii)git commit -m "XXX"   //存盘
**要记得先add再commit**

4)回退

- git log      //显示提交日志
- git log --pretty=oneline       //简化，注：第一个参数为commit id

- git reset --hard HEAD^    //回退到上一版本
//若在Windows下，会出现个“MORE”，应改成 git reset --hard "HEAD^"
//"HEAD"后面的“^”表示回退为上一个版本，“^^”为两个，当然如果是100个的话为"~100"
 //感谢：[Solitary_King](http://blog.csdn.net/Solitary_King/article/details/73739636)[簡睿](http://jdev.tw/blog/4239/git-rest-hard-head-in-windows-cmd-exe)
- git reset --hard 9a4a7779  //回到最新版，数字为该版本的commit id的前几位

5）工作区和版本库
- 它们长这样：
![](https://cdn.webxueyuan.com/cdn/files/attachments/001384907702917346729e9afbf4127b6dfbae9207af016000/0)

- git status    //查看暂存区(stage)状态
//没add过的文件状态是untracked的

6)撤销修改
- git checkout --readme.txt   //文件修改后，add前，可以撤销修改，也就是撤销工作区修改

- //如果是add了之后：
i)git reset HEAD readme.txt  //撤销暂存区修改
ii)git checkout -- readme.txt  //撤销工作区修改



### 3.逆向工程-汇编基础

i)汇编语言被编译成机器语言之后，将由CPU执行。
CPU会执行机器语言指令，并管理寄存器和修改内存的内容，还会相应其它硬件地中断请求。
寄存器在CPU中，

ii)通用寄存器：
- EXA：运算
- EBX：内存偏移指针
- ECX：特定指令的计数
- EDX：EAX的溢出寄存器
- ESI：源地址指针
- EDI：目的地址指针
- EBP：指针寄存器

### 4.MarkDown
[-中文教程-](http://www.jianshu.com/p/q81RER)
