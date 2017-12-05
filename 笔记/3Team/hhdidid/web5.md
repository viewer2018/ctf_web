- 想到是web就用burpsuite抓一下包。


- 看到响应头有FLAG字段，它的值后面有'=='，想到base64，所以解码了一下，得到P0ST_THIS_T0_CH4NGE_FL4G:hikW7bZEj

- 然后发了一个post

- 没什么发现，最后还是去网上看了writeup，知道要写程序
