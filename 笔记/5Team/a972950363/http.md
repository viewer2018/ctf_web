# 1、本地过程

  1.若DNS缓存中没有相关数据，则IE浏览器先向DNS服务器发出DNS请求：
  
  2.这一过程的目的是获取www.sina.com这个域名所对应的IP地址；
  
  3.IE浏览器向本机DNS模块发出DNS请求，DNS模块生成相关的DNS报文；
  
  4.DNS模块将生成的DNS报文传递给传输层的UDP协议单元；
  
  5.UDP协议单元将该数据封装成UDP数据报，传递给网络层的IP协议单元；
  
  6.IP协议单元将该数据封装成IP数据包，其中目的IP地址为DNS服务器的IP地址；
  
  7.封装好的IP数据包将传递给数据链路层的协议单元进行发送；
  
  8.发送时如果ARP缓存中没有相关数据，则发送ARP广播请求，等待ARP回应；
  
  9.得到ARP回应后，将IP地址与路由下一跳MAC地址对应的信息写入ARP缓存表；
  
  10.写入缓存后，以路由下一跳地址填充目的MAC地址，并以数据帧形式转发；
  
  11.这个转发过程可能会进行多次，这取决于DNS服务器在校园网中的位置；
  
  12.DNS请求被发送到DNS服务器的数据链路层协议单元；
  
  13.DNS服务器的数据链路层协议单元解析收到的数据帧，将其内部所含有的IP数据包传递给网络层IP协议单元；
  
  14.DNS服务器的IP协议单元解析收到的IP数据包，将其内部所含有的UDP数据报传递给传输层的UDP协议单元
  ；
  15.DNS服务器的UDP协议单元解析收到的UDP数据包，将其内部所含有的DNS报文传递给该服务器上的DNS服务单元；
  
  16.DNS服务单元收到DNS请求，将域名解析为对应的IP地址，产生DNS回应报文；
  
  17.DNS回应报文→UDP→IP→MAC→→请求域名解析的主机；
  
  18.请求域名解析的主机收到数据帧，该数据帧→IP→UDP→DNS→IE浏览器；
  
  19.将域名解析的结果以域名和IP地址对应的形式写入DNS缓存表。
  
# 2、IE浏览器与www.baidu.com建立TCP连接：TCP建立连接的三次握手


  1.IE浏览器向www.baidu.com发出TCP连接请求报文；
  
  2.该请求TCP报文中的SYN标志位被设置为1，表示连接请求；
  
  3.该TCP请求报文→IP(DNS)→MAC(ARP)→→校园网关→→www.baidu.com主机；
  
  4.该TCP请求报文经过IP层时，填入的目的IP地址就是上面DNS过程获得的IP地址；
  
  5.经过数据链路层时，若MAC地址不明，还要进行上面所叙述的ARP过程；
  
  6.www.baidu.com收到的数据帧→IP→TCP，TCP协议单元会回应请求应答报文；
  
  7.该请求应答TCP报文中的SYN和ACK标志位均被设置为1，表示连接请求应答；
  
  8.该TCP请求应答报文→IP→MAC(ARP)→→校园网关→→请求主机；
  
  9.请求主机收到数据帧→IP→TCP，TCP协议单元会回应请求确认报文；
  
  10.该请求应答TCP报文中的ACK标志位被设置为1，表示连接请求确认；
  
  11.该TCP请求确认报文→IP→MAC(ARP)→→校园网关→→www.baidu.com主机；
  
  12.www.baidu.com收到的数据帧→IP→TCP，连接建立完成；
  
  13.在这个过程中，任何一个报文出错或超时，都要进行重传； 

# 3、IE浏览器开始HTTP访问过程

  1.IE浏览器向www.baidu.com发出HTTP-GET方法报文；
  
  2.该HTTP-GET方法报文→TCP→IP→MAC→→校园网关→→www.baidu.com主机；
  
  3.www.baidu.com收到的数据帧→IP→TCP→HTTP，HTTP协议单元会回应HTTP协议格式封装4.好的HTML超文本形式数据
  ；
  5.HTTP-HTML数据→TCP→IP→MAC(ARP)→→校园网关→→请求主机；
  
  6.请求主机收到的数据帧→IP→TCP→HTTP→IE浏览器，浏览器会以网页形式显示HTML超文7.本，就是我们所看到的网页。
  
# 4、断开TCP连接：TCP断开连接的四次握手

  1.IE浏览器向www.baidu.com发出TCP连接结束请求报文；
  
  2.该请求TCP报文中的FIN标志位被设置为1，表示结束请求；
  
  3.该TCP结束请求报文→IP→MAC(ARP)→→校园网关→→www.baidu.com主机；
  
  4.www.baidu.com收到的数据帧→IP→TCP，TCP协议单元会回应结束应答报文；
  
  5.该结束应答TCP报文中的FIN和ACK标志位均被设置为1，表示结束应答；
  
  6.该TCP结束应答报文→IP→MAC(ARP)→→校园网关→→请求主机；
  
  
BURP抓取请求：

![](https://github.com/a972950363/ctf_web/blob/master/src/burp.png)
