# 请求头和响应头

## Burpsuite Request

![](https://github.com/clm136526/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/%E7%AC%ACX%E7%BB%84/%E5%BE%AE%E4%BF%A1%E5%9B%BE%E7%89%87_20171120185829.png?raw=true)
## Burpsuite Response

![](https://github.com/clm136526/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/%E7%AC%ACX%E7%BB%84/%E5%BE%AE%E4%BF%A1%E5%9B%BE%E7%89%87_20171120191051.png?raw=true)

# 输入网址www.baidu.com的过程
## 大概蒙一下吧！
- 输入百度的URL后

1.首先客户端会请求DNS将此域名解析成相应IP地址。

2.然后根据IP地址在互联网上的位置找到服务器并向服务器发送http请求。

3.接着服务器就会根据各种流程返回数据给访问用户。

4.emmm,就百度的话，一般都返回200（成功）的状态码啦。

5.最后屏幕就成功访问了百度的页面.

# 修正：较为准确的过程
- 浏览器输入百度网址回车后

1.浏览器会根据这个URL去查找其对应的IP，首先是查找浏览器缓存，浏览器会保存一段时间你之前访问过的一些网址的DNS信息。如果还是没找到对应的IP，那么接着会发送一个请求到路由器上，然后路由器在自己的路由器缓存上查找记录。如果还是没有，这个请求就会被发送到ISP（Internet Service Provider，互联网服务提供商）。如果还是没有的话， 你的ISP的DNS服务器会将请求发向根域名服务器进行搜索。（这也就是为什么打开一个新页面会有点慢，因为本地没什么缓存，要这样递归地查询下去。）

2.浏览器终于得到了IP以后，浏览器接着给这个IP的服务器发送了一个http请求，方式为get。如下图
![](https://github.com/clm136526/ctf_web/blob/master/src/%E5%BE%AE%E4%BF%A1%E5%9B%BE%E7%89%87_20171120222231.png?raw=true)

3.这个get请求包含了主机（host）、用户代理(User-Agent)，用户代理就是自己的浏览器，它是你的"代理人"，Connection（连接属性）中的keep-alive表示浏览器告诉对方服务器在传输完现在请求的内容后不要断开连接，不断开的话下次继续连接速度就很快了。其他的顾名思义就行了。还有一个重点是Cookies，Cookies保存了用户的登陆信息，在每次向服务器发送请求的时候会重复发送给服务器。

4.发送完请求接下来就是等待回应了，接到回应后，如下图：
![](https://github.com/clm136526/ctf_web/blob/master/src/%E5%BE%AE%E4%BF%A1%E5%9B%BE%E7%89%87_20171120222734.png?raw=true)

5.接收到302状态码，代表暂时性转。

6.浏览器解析response后,就会对域名内的元素（jsp,php,html等进行解析并呈现）
![](https://github.com/clm136526/ctf_web/blob/master/src/%E5%BE%AE%E4%BF%A1%E5%9B%BE%E7%89%87_20171120224330.png?raw=true)
