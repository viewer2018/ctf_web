#### 第二次学习任务-划重点

----

> #### HTTP

----

1. HTTP协议，Hyper Text Transfer Protocol（超文本传输协议），是用于从万维网(WWW:World Wide Web)服务器传输超文本到本地浏览器的传送协议。
2. 基于TCP/IP通信协议来传递数据（HTML 文件, 图片文件, 查询结果等）
3. 工作于客户端-服务端架构为上。
- 客户端通过连接到服务器达到向服务器发送一个或多个HTTP的请求的目的。
- 服务器通过接收客户端的请求并向客户端发送HTTP响应数据。
4. 工作原理：
- 浏览器作为HTTP客户端通过URL向HTTP服务端即WEB服务器发送所有请求。
    - Web服务器根据接收到的请求后，向客户端发送响应信息。
5. 默认端口号为80，但是你也可以改为8080或者其他端口。
6. 三个特点
|特点|备注|补充|
|:-:|:-:|
|无连接|限制每次连接只处理一个请求。|i|
|媒体独立|只要客户端和服务器知道如何处理的数据内容，任何类型的数据都可以通过HTTP发送|ii|
|无状态|协议对于事务处理没有记忆能力。|iii|

i)服务器处理完客户的请求，并收到客户的应答后，即断开连接。采用这种方式可以节省传输时间。

ii)客户端以及服务器指定使用适合的MIME-type内容类型。

iii)缺少状态意味着如果后续处理需要前面的信息，则它必须重传，这样可能导致每次连接传送的数据量增大。另一方面，在服务器不需要先前信息时它的应答就较快。

7. 附：Web服务器有：Apache服务器，Nginx服务器，IIS服务器（Internet Information Services）等。
8. HTTP协议是TCP/IP协议族中应用层的一种协议。
9. 
 ![](https://camo.githubusercontent.com/8c676ac04cbe78666d60d0015e64b193a0167d16/687474703a2f2f696d6167652e7765627265616465722e64756f6b616e2e636f6d2f6d667376322f646f776e6c6f61642f66647363332f703031746a517665336951492f58584b4144776252536a7744744c2e6a7067)
10. 使用统一资源标识符（Uniform Resource Identifiers, URI）来传输数据和建立连接。
11. 一个HTTP的请求消息包括：
- 请求行（request line）（包括请求方法、URL、协议版本等）
- 请求头部（header）
- 空行
- 请求数据
12. 一个HTTP的相应消息包括：
- 状态行
- 消息报头
- 空行
- 响应正文
13. HTTP状态码：[(｡・`ω´･)](http://www.runoob.com/http/http-status-codes.html)
**其中常用的有**
>200 - 请求成功
>301 - 资源（网页等）被永久转移到其它URL
>404 - 请求的资源（网页等）不存在
>500 - 内部服务器错误


14. 请求方法
![](https://github.com/DigBullTech-viewer/ctf_web/raw/master/src/1510982805904.png)
15. 响应头信息
![](https://github.com/DigBullTech-viewer/ctf_web/raw/master/src/1510982839885.png)
16. - Content-Type
- 内容类型
- 一般是指网页中存在的Content-Type，用于定义网络文件的类型和网页的编码，决定浏览器将以什么形式、什么编码读取这个文件，这就是经常看到一些Asp网页点击的结果却是下载到的一个文件或一张图片的原因。
17. - Session ID
- HTTP协议不保持请求之间的状态，为了维护状态，得使用状态追踪机制。
- 一个会话标识符（Session ID）通常在请求中传递，以将请求与回话相关联。
- 传递方式：
     - URL
     - 隐藏的表单字段
     - HTTP报文头中的Cookie字段 
18. - Cookies
- 最常见用来传递Session ID的地方
- 发起一个回话时，服务器发送一个Set-Cookie响应头
- 以一个NAME=VALUE键值对开始，后跟0个或更多分号分割的属性值对（Domain，Path，Expires，Secure）

> #### URI与URL

----

**URI**
- Uniform Resource Identifier的缩写，是由某个协议方案表示的资源的定位标识符。
- 协议方案是指访问资源所使用的协议类型名称。
-  采用HTTP协议时，协议方案就是http。除此之外，还有ftp、mailto、telnet、file等。

**URL**
- Uniform Resource Locator，统一资源定位符,表示资源在互联网上的地址。
- 它其实是URI的一个子集。
- URI仅仅表示「标识」， 标识的类型有很多，比如ISBN号码，电话号码，邮箱，网页链接地址等，而URL则把概念缩小到了「地址」。
-  虽然URI在绝大多数场景下都是以URL的形式存在，但两者是有区别的。


> #### 作业

----

1. 学习HTTP协议，尝试用浏览器（chrome或者firefox）和burpsuite分别抓取HTTP请求头和响应头,截图放在自己笔记中提交到版本库中
2. 请用自己的话简述在浏览器地址栏中输入网址www.baidu.com，从按回车键到页面显示这个过程中，发生了什么？

----
1.
**chrome**
- 请求头
![](https://github.com/RhythmMark/hello-world/blob/master/crc/header1.png?raw=true)
- 响应头
![](https://github.com/RhythmMark/hello-world/blob/master/crc/header2.png?raw=true)

**burpsuit**
- 请求头
![](https://github.com/RhythmMark/hello-world/blob/master/crc/header3.png?raw=true)
- 响应头
![](https://github.com/RhythmMark/hello-world/blob/master/crc/header4.png?raw=true)

2. 输入回车后
- 浏览器解析URL
- 浏览器查找本地HOSTS文件，或通过DNS服务器进行DNS查询，查找域名对应的web服务器的IP地址
- 通过ARP协议将服务器的IP地址转换为MAC地址
- 浏览器与服务器进行三次握手后，建立TCP连接。
- 浏览器向服务器发送HTTP请求
- 服务器处理请求
- 服务器发送响应给客户端
- 浏览器渲染页面
