# 汇编语言
汇编语言(Assembly Language)是面向机器的程序设计语言
# 通用寄存器
通用寄存器可用于传送和暂存数据，也可参与算术逻辑运算，并保存运算结果
 
#数据寄存器    
EAX,EBX,ECX,EDX(Data Register)
寄存器AX通常称为累加器(Accumulator)，用累加器进行的操作可能需要更少时间。累加器可用于乘、除、输入/输出等操作，它们的使用频率很高； 
寄存器BX称为基地址寄存器(Base Register)。它可作为存储器指针来使用； 
寄存器CX称为计数寄存器(Count Register)。在循环和字符串操作时，要用它来控制循环次数；在位操作中，当移多位时，要用CL来指明移位的位数； 
寄存器DX称为数据寄存器(Data Register)。在进行乘、除运算时，它可作为默认的操作数参与运算，也可用于存放I/O的端口地址。
#指针寄存器  
EBP,ESP(Pointer Register)
寄存器BP称为基址指针寄存器（Base Pointer）
寄存器SP称为堆栈指针寄存器（Stack Pointer）
#变址寄存器  
ESI,EDI(Index Register)
寄存器SI称为源变址寄存器 （Source Index）
寄存器DI称为目的变址寄存器（Destination Index）
