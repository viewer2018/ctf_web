# 标题语法
在行首插入1-6个#，对应标题的1-6阶
# 一阶
## 二阶
### 三阶
#### 四阶
##### 五阶
###### 六阶

# 区块引用
使用email形式的 > 角括号
> This is a 区块（blockquote）
> 
> this is the second paragraph in the blockquote
>
> ## this is an H2 in a blockquote

区块引用可以嵌套，只要根据层次加上不同数量的`>`:
>这是第一层
>
>>这是第二层
>
>回到第一层

引用的区块内也可以使用其他的Markdown语法，包括标题、列表、代码区块等：
>## 这是一个标题
>
>1. 这是第一行列表项
>2. 这是第二行列表项
>
>给出一些例子代码：
>
>       return shell_exec("echo $input | $markdown_script");


## 修辞和强调
Markdown使用星号(asterisks)*和底线(underscores)_来标记需要强调的区段

一些词汇，要有空格 *斜体*.

 这个 _也是斜体_

使用两个星号*加粗  **strong emphasis**.

两个下划线_也加粗，__use two underscores insted__.

## 列表
##### 无序列表使用星号、加号、减号来作为列表的项目标记

* 使用星号
* 666
+ 试试加号
+ ok
- 再试试减号
- 也OK
##### 有序的列表则是使用一般的数字接着一个英文句点作为项目标记：
1. 试试
2. 这是有序的列表
3. OK
*   suibiandajigezi.henchanghenchangwozhishiyishi
*   nizaiganshenmeyabaobeierenzaiganma

##### 如果在项目之间插入空行，那项目的内容会用<p>包起来，你也可以在一个项目内放上多个段落，只要在它前面缩排4个空白或1个tab。
* 一个项目清单

空段落
* 另一个项目

列表项目可以包含多个段落，每个项目下的段落都必须缩进4个空格或是1个制表符：
1.  这是一个6666666666666666666666666666666666666666666666666666666666.
    7777777777777777777777777777777777777
2.  888888888
如果在列表项目内放进引用，那`>`就需要缩进：
*   123456789
    >123456

## 分隔线
可以在一行中用三个以上的星号、减号、底线来简历一个分隔线，行内不能有其他东西。也可以在星号或是减号中间插入空格。下面每种写法都可以简历分隔线：
* * *
***
******
- - -
----------

## 链接
##### markdown支持两种链接语法：行内和参考两种形式，两种都是使用角括号来把文字转成链接
行内形式是直接在后面用括号直接接上链接

this is an [链接](https://www.zhihu.com)。

也可以选择加上title属性

tihis an [链接](https://www.zhihu.com/question/20431718 "with a title")

##### 参考形式的链接让你可以为链接定一个名称，之后你也可以在文件的其他地方定义该链接内容：
这是一个链接 [google][1] 
这是另一个链接 [baidu][2]
这是第三个 [zhihu][3].

[1]: google.com "google"
[2]: baidu.com "baidu sousuo"
[3]: zhihu.com "zhihu wenwenti"

title属性是选择性的，链接名称可以用字符、数字和空格，但是不分大小写

I start my morning with a cup of coffee and [the New York Times][NY Times].

[ny times]: www.nyrimes.com

## 图片
图片的语法和链接很像
##### 行内形式（title 是选择性的）：
！[alt text](C:\Users\zhonghuixin\Pictures\微信图片_20171018210355.jpg "Title")
##### 参考形式：
！[alt text2][id]

[id]: C:\Users\zhonghuixin\Pictures\微信图片_20171018210355.jpg "Title"

## 代码
在一般的段落文字中，可以使用反引号`来标记代码区段，区段内的&、<和>都会被自动的转换成HTML实体，这项特性让你可以很容易的在代码区段内插入HTML码：

我强烈反对使用任何 `<blank>`标签。
我希望使用名字像 `&mdash;`
`&#8212;`.
##### 如果要建立一个已经格式化好的代码区块，只要每行都缩进4个空格或是1个tab就可以了，而`&`、`<`、`>`也一样会自动转成HTML实体

    daima
    <blockquote>
    <p>For example.</p>
    </blockquote>
    
`666`
如果在代码区段内插入反引号，你可以用多个反引号来开启和结束代码区段：
``There is a literal backtick (`) here.``

##反斜杠
可以利用反斜杠插入一些在语法中有其他意义的符号    
\*666\*

Markdown 支持以下这些符号前面加上反斜杠来帮助插入普通的符号：


\   反斜线
`   反引号
*   星号
_   底线
{}  花括号
[]  方括号
()  括弧
#   井字号
+   加号
-   减号
.   英文句点
!   惊叹号
