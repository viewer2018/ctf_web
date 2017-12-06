- 想到是web就用burpsuite抓一下包。

![hhdidid_web5_1](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web5_1.png)

- 看到响应头有FLAG字段，它的值后面有'=='，想到base64，所以解码了一下，得到P0ST_THIS_T0_CH4NGE_FL4G:hikW7bZEj

- 然后发了一个post

![hhdidid_web5_2](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web5_2.png)

- 没什么发现，最后还是去网上看了writeup，知道要写程序

```
import base64
import requests

url = "http://ctf5.shiyanbar.com/web/10/10.php"
flag = requests.get(url).headers["FLAG"]

flag = base64.b64decode(flag).decode('ascii')

flag = flag[flag.find(':')+1:]		#字符串切片
print (flag)

postData = {'key':flag}

r = requests.post(url,data=postData).text
print (r)

```

![hhdidid_web5_3](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web5_3.png)
