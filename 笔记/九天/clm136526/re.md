# 汇编语言中的整数常量表示
## 十进制整数:这是汇编器默认的数制。
## 十六进制数:这是汇编程序中最常用的数制。
## 二进制数:这也是一种常用的数制。（4位二进制数相当于一位十六进制数）
## 八进制数:调试器默认使用十六进制表示整数。

# 简单指令
- reg32，32-bit寄存器，如EAX、EBX等。
- reg16，16-bit寄存器，如AX，BX等。
- reg8？，8-bit寄存器，如AL，BH等。
- imm32，32-bit立即数，可以理解为常数。
- imm16，16-bit立即数。
- imm8？ 8-bit立即数。

# 逻辑运算
## 逻辑运算指令qnrt包括AND, OR, XOR, TEST, NOT，逻辑运算的结果会影响到CF, PF, AF, ZF, OF标志位。
- 参考[Win32 汇编 - 逻辑运算指令: AND、OR、XOR、NOT、TEST
[] (http://blog.csdn.net/betabin/article/details/7306347)

# 汇编语言的一些基本指令如下
[] (http://blog.csdn.net/microzone/article/details/6540145)

# 通用寄存器的表示方法
![](blob:https://maxiang.io/0a6c687d-7e0c-40d7-acb6-b87c688d0ae8)
上图中，数字表示的是位。可以看出，EAX是一个32-bit寄存器。同时，它的低16-bit又可以通过AX这个名字来访问；AX又被分为高、低8-bit两部分，分别由AH和AL表示。

# 通用寄存器(32-bit)
## EAX:在进行运算方面比较常用
## EBX:通常作为内存偏移指针使用
## ECX:通常用于特定指令的计数
## EDX:在某些运算中作为EAX的溢出寄存器
## ESI:通常在内存操作指令中作为源地址指针使用
## EDI:通常在内存操作指令中作为目的地址指针使用
## EBP:通常，它被高级语言编译器用以建造堆栈帧来保存函数或过程的局部变量
### 注意:后三个寄存器没有对应的8-bit分组。但可以通过SI、DI，BP分别访问他们的低16位

# 练习(未接触过汇编)
- 把寄存器全部设置成0的状态，然后执行下面的代码：
'''
mov eax,0a1234h			;将十六进制数0a1234h送入eax
mov bx,ax			;将ax内容送入bx
mov ah,bl			;将bl内容送入ah
mov al,bh			;将bh内容送入al
'''

1.mov eax,0a1234h 执行后，EAX变为000a1234
2.mov bx,ax 执行后，BX为1234
3.mov ah,bl 执行后，AH为34
4.mov al,bh 执行后, AL为12

- 所以AX为3412,EAX为000a3412(不知道对不对)
