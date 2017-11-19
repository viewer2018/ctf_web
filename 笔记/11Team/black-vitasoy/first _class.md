## 汇编语言
- 汇编语言是一只接近计算机核心编码且可以被人读懂的语言
- Need : 胆量,知识,开放,经验,脑子
- 处理器执行被编译过的汇编语言,也就是机器语言
- 处理器任务 : 从内存中获取机器语言的指令,和译码,然后执行一系列操作
- 寄存器位于CPU, 可以对数据进行存储
## 通用寄存器分类
- EAX: 进行运算,可作为内存偏移指针
- EBX:内存偏移指针
- ECX:特定指令的计数,可作为内存偏移指针
- EDX:EAX的溢出寄存器,可作为内存偏移指针
## 指针
- ESL:原地址指针
- EDI:目的地址指针
- EBP:建造堆帧来保护函数或过程的局部变量
- 可通过 SI,DI,BP访问低16位
- 实模式下的段寄存器到保护模式下，摇身一变就成了选择器。不同的是，实模式下的段选择器是16-bit的，而保护模式下的选择器是32-bit的。
- CS:代码段,DS数据段,ES:附加段,FS:默认寄存器的替代品
## 特殊寄存器
- EIP(重要) : 同CS一同指向将执行的命令的地址,不能直接修改值
- ESP 指向堆栈中被操作的地址,可修改,一般软件逆向就用得到
- 还有 控制寄存器,调试寄存器,测试寄存器
## git
Window 下  [Git安装](https://git-for-windows.github.io)
安装完成后，在开始菜单里找到`Git`->`Git Bash`
### 最后设置 : 
  $ git config --global user.name "Your Name"
  $ git config --global user.email "email@example.com"
## 创建一个空目录版本库
  $ mkdir learngit     $ cd learngit     $ pwd
  /Users/michael/learngit
  
  显示 :/c/Users/Administrator/learngit
  
  Git init
## 编码UTF-8
- 一定要放到learngit目录下（子目录也行）
- $ git add readme.txt
- $git commit -m "wrote a readme file"
- $ git add file1.txt
- $ git add file2.txt file3.txt
- $ git commit -m "add 3 files."
## 密码学知识
### [二进制，八进制，十进制，十六进制的概念以及相互转换](http://www.360doc.com/content/17/0227/22/8067272_632545159.shtml)
- 与(&): 两个都为一
- 或(|):一个为一即可
- 非(~):把结果反过来
- 异或(xor):两个加起来mod2
## 原码,补码,反码
- 原码就是符号位加上真值的绝对值, 即用第一位表示符号, 其余位表示值
- 正数的补码就是其本身
- 正数的反码是其本身
## 密码学基本信息
- 明文: 未加密的
- 密文:加密了的
- 秘钥:用来加密的函数
- 公钥:不保密的秘钥
- 私钥:保密的秘钥
- 密钥空间:加密秘钥大小的范围
- 凯撒密码:代换密码,偏移量为3,A->D
