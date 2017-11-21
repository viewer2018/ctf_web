# HTTP学习笔记
## 1.HTTP 协议通讯流程
  ![5](https://github.com/Avscx/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/5team/Avscx/image/5.png)
## 2.URI和URL
   -URI
        URI是Uniform Resource Identifier的缩写，是由某个协议方案表示的资源的定位标识符。协议方案是指访问资源所使用的协议类型名称。 
		采用HTTP协议时，协议方案就是http。除此之外，还有ftp、mailto、telnet、file等
   -URL
        Uniform Resource Locator，统一资源定位符,表示资源在互联网上的地址，它其实是URI的一个子集 URI仅仅表示「标识」， 
		标识的类型有很多，比如ISBN号码，电话号码，邮箱，网页链接地址等，而URL则把概念缩小到了「地址」。 由于URI在绝大多数场景下都
		是以URL的形式存在，大家一般都说URL居多，这也没什么问题，但是在心里要清楚URI和URL还是有所区别的
## 3.HTTP所属层次(TCP/IP协议族)
   ![4](https://github.com/Avscx/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/5team/Avscx/image/4.png)
## 4.HTTP请求方法
   ![7](https://github.com/Avscx/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/5team/Avscx/image/7.png)
## 5.服务器响应消息
   ![9](https://github.com/Avscx/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/5team/Avscx/image/9.png)
   -请求头、响应头例子
   ![8](https://github.com/Avscx/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/5team/Avscx/image/8.png)
## 6.HTTP状态码
   ![6](https://github.com/Avscx/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/5team/Avscx/image/6.png)
   ![10](https://github.com/Avscx/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/5team/Avscx/image/10.png)
   ![11](https://github.com/Avscx/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/5team/Avscx/image/11.png)
## 7.GET和POST的区别
   GET是用来获取资源，POST使用来处理资源（RFC7231）
# 作业
## 1.用浏览器（chrome或者firefox）和burpsuite分别抓取HTTP请求头和响应头
   -firefox
    （右键-查看元素-控制台-选择正确的get-查看详细信息）
   ![1](https://github.com/Avscx/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/5team/Avscx/image/1.png)
   ![2](https://github.com/Avscx/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/5team/Avscx/image/2.png)
   -burpsuite
   （firefox和burp suite同时设置代理127.0.0.1：5555）
   ![3](https://github.com/Avscx/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/5team/Avscx/image/3.png)
## 2.在浏览器地址栏中输入网址www.baidu.com，从按回车键到页面显示这个过程中，发生了什么？
   ![12](https://github.com/Avscx/ctf_web/blob/master/%E7%AC%94%E8%AE%B0/5team/Avscx/image/12.png)















