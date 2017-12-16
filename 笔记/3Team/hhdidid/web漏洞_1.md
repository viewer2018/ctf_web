###low
- 查看源码，发现对用户的输入没做任何处理，所以直接构造命令：127.0.0.1;ls

###medium
- 查看源码，发现这里把&&和;都过滤成空字符，但仍可以使用&或|构造命令：127.0.0.1&ls

###high
- 查看源码，发现黑名单似乎很全，试了一下没什么思路，所以到网上看了writeup，发现我忽略的空格的作用，黑名单里虽然有"| "却没有" |"，于是构造命令：127.0.0.1 |ls



-------------------------------------------------------------------
关于Command Injection的基础知识来源：https://paper.seebug.org/papers/Archive/drops2/Shell%20Injection%20%26amp%3B%20Command%20Injection.html
参考的writeup：http://www.freebuf.com/articles/web/116714.html