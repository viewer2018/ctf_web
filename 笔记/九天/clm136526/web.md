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
