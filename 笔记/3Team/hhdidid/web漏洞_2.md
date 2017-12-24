## XSS (Reflected)

### low

- 看源码，没有对用户输入作任何处理，构造输入：<script>alert ("Hello")</script>
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E2low.png)
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E2low1.png)

### medium

- 看源码，把<script>过滤掉了，想起之前对空格的使用，所以试着在<script>的t后面加一个空格：<script >alert ("Hello")</script>，居然可以。另一个是在后面看到high的源码中的正则表达式中使用了模式修饰符i（模式中的字母会进行大小写不敏感匹配。），所以返回来试着使用了大写：<Script>alert ("Hello")</script>，也可以。
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E2medium.png)
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E2medium1.png)

### high

- 源码使用正则表达式，把medium的两种方法都过滤了。去找了writeup。	”虽然无法使用<script>标签注入XSS代码，但是可以通过img、body等标签的事件或者iframe等标签的src注入恶意的js代码。“构造：<img src=1 onerror=alert("Hello")>。<img>标签的src是必须的，它的值是图片的路径，这里把src的值设置为1，加载页面时找不图片，就会发生错误，所以就会出发onerror。
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E2high.png)
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E2high1.png)

### impossible

- "可以看到，Impossible级别的代码使用htmlspecialchars函数把预定义的字符&、”、 ’、<、>转换为 HTML 实体，防止浏览器将其作为HTML元素。"
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E2impossible.png)

## XSS (Stored)

### low

- Name输入框有长度限制只能输入少量字符，而Message输入框可以输入较多字符，故在Message框输入：<script>alert ("Hello")</script>
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E21low1.png)

### medium

- 查看源码，看到对Name输入过滤掉<script>，对Message输入使用了strip_tags函数（剥去字符串中的 HTML、XML 以及 PHP 的标签），以及htmlspecialchars函数，转化特殊字符。看到这里我是懵逼的。看了writeup，知道要对Name输入域动手，因为对Name的检查比Message的检查宽松很多。由于Name框有长度限制，所以抓包改数据。
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E21medium.png)
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E21medium1.png)
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E21medium2.png)

### high

- 查看源码，对Name输入做了正则表达式过滤，跟刚才一样抓包，但这次构造：<img src=1 onerror=alert("Hello")>。刷新页面后，就可以看到有三次弹框。
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E21high.png)
![hhdidid](https://github.com/hhdidid/ctf_web/raw/master/%E7%AC%94%E8%AE%B0/3Team/hhdidid/images/web%E6%BC%8F%E6%B4%9E21high1.png)

### impossible

- 源码对Name输入框及Message输入框都做了同样的安全处理，解决了xss。

----------------------------------------------------------------------------------

writeup:http://www.freebuf.com/articles/web/123779.html

