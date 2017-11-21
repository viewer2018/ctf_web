## Web基础-HTTP 作业
> by huixinzzZ
***
* 学习HTTP协议，尝试用浏览器（chrome或者firefox）和burpsuite分别抓取HTTP请求头和响应头,截图放在自己笔记中提交到版本库中
*** 

利用buupsuite抓取广州大学官网

请求头  
![请求头](https://github.com/huixinzzZ/ctf_web/blob/master/src/request.png)

响应头  
![响应头](https://github.com/huixinzzZ/ctf_web/blob/master/src/response.png)

firefox firebug  
![firefox](https://github.com/huixinzzZ/ctf_web/blob/master/src/firefox.png)


***
* 请用自己的话简述在浏览器地址栏中输入网址 www.baidu.com，从按回车键到页面显示这个过程中，发生了什么？
***

1. 输入地址 www.baidu.com
2. 浏览器查找域名的IP地址
3. 浏览器向web服务器发送一个HTTP请求
4. 服务器的永久重定向响应
5. 浏览器跟踪重定向地址
6. 服务器处理请求
7. 服务器返回一个HTTP响应
8. 浏览器显示HTML
9. 浏览器发生请求获取嵌入在HTML中的资源（图片、音频、视频、CSS、JS……）
10. 浏览器发送异步请求


