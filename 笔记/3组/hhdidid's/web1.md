![hhdidid_request](https://github.com/hhdidid/ctf_web/raw/master/src/hhdidid_web1.PNG)

![hhdidid_response](https://github.com/hhdidid/ctf_web/raw/master/src/hhdidid_web2.PNG)

- 输入URL:www.baidu.com时，http客户端（浏览器）就知道要访问的服务器的域名是www.baidu.com，要想实现与对应服务器的通信，还要知道服务器的IP地址，这时候浏览器就把通过URL解析出对于IP地址的任务交给DNS进程处理。
- DNS进程先检查自己的cache中有无请求URL的IP地址，有则告诉浏览器，没有就检查本地host文件（用来保存域名以及域名对应的IP地址），有则交给浏览器，无则交给本地DNS服务器（发个消息给他）。
- 本地DNS服务器检查cache，有则回消息给DNS进程，没有就发消息给互联网的上级DNS服务器（根域名服务器？），让其查找。
- 上级DNS服务器一般能找到，于是就返回给浏览器。
- 浏览器知道IP地址后，就向服务器发送HTPP请求，服务器收到请求，将数据发送给浏览器，浏览器收到后经过渲染后呈现百度的页面。