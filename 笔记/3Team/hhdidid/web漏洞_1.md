### low
- 查看源码，发现对用户的输入没做任何处理，所以直接构造命令：127.0.0.1;ls
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E_11.png)
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E_12.png)


### medium
- 查看源码，发现这里把&&和;都过滤成空字符，但仍可以使用&或|构造命令：127.0.0.1&ls
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E_13.png)
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E_14.png)


### high
- 查看源码，发现黑名单似乎很全，试了一下没什么思路，所以到网上看了writeup，发现我忽略的空格的作用，黑名单里虽然有"| "却没有" |"，于是构造命令：127.0.0.1 |ls
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E_15.png)
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E_16.png)


### impossible
- 查看源码，发现这次不是采用黑名单，由于一般的ipv4采用点分十进制法表示，所以这段代码使用"."将用户输入分割成四部分，只有当这四部分都是纯数字是，才执行命令，显然，不存在注入。
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E_17.png)


-------------------------------------------------------------------

- 关于Command Injection的基础知识来源：https://paper.seebug.org/papers/Archive/drops2/Shell%20Injection%20%26amp%3B%20Command%20Injection.html
- 参考的writeup：http://www.freebuf.com/articles/web/116714.html