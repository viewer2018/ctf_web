# Git入门笔记（上）


## 0x01 Git简介

### Git和其他版本控制系统、SVN的不同

- 暂存区概念
- Git跟踪并管理的是修改而非文件
- 创建和切换分支速度快

### 添加文件到git指定项目托管文件夹


```
git add readme.txt (readme.txt一定要在.git存在的目录下)
```

```
git add file1.txt file2.txt (添加多个文件)（实际上是把文件修改添加到暂存区）
```

### 将文件添加到本地仓库

```
git commit -m "wrote a readme file" 
 (-m后面是输入本次提交的说明)
```

### 查看工作区当前的状态

```
git status （查看是否被修整过）
```

### 查看本地仓库中某个文件最近一次怎么修改的

```
git difference (git diff)
```

### 版本回退

* (当文件修改到一定程度，保存快照，改乱或误删文件，从最近commit恢复)

### 查看历史记录

 * git log
 * git log --pretty=oneline (简约显示：commitid（由SHA1计算出来的数字）, 修改内容)

### 回退到上一个版本

* git reset
* git reset --hard HEAD^

### 指定回到历史某个版本

* git reset --hard {commit id} (前提是你要知道你刚才的版本号是多少，版本号没必要写全)
* git reset --hard HEAD^ (HEAD指向的是当前版本，^回退到上一个版本)
* git reset --hard HEAD^^ (回退到上上个版本)
* git reset --hard HEAD~100 (回退往上100个版本)

>原因：Git内部有个指向当前版本的HEAD指针，当回退版本时HEAD直接指向commit id 所属的历史项目

### 高级回退（版本回退）

原因: 回退到某个版本，关掉了电脑，第二天早上后悔，想恢复新版本，但未知commit id

```
git reflog（记录每一次命令，包括项目的commit id ）
```


### 工作区和暂存区

* 工作区：在你电脑里能够看到的目录
* 暂存区：在git版本库中，有个东西叫stage 或 index
* Git版本库：
    * stage 或 index
    * master （第一个分支）
    * HEAD (指向master 的一个指针)
    * 运行流程
     * git add 将文件修改添加到暂存区(stage)
     * git commit 将文件所做的所有修改一次性从暂存区添加到master 分支

    
### 使用Git在本地

* 使用git管理版本的文件在本地会有下面三个过程：
    * 已修改(modified)：就是你修改了在git管理下的文件
    * 已暂存(staged)：就是将你修改的文件放在缓存区中，等待处理
    * 已提交(committed)：就是在你的本地确定了你这次保存在缓冲区中的文件与上一次committed的文件一起，为一个版本，这里先不要考虑远程的情况，到此为止，本地能完成的事情已经完成了。
    
### 管理修改

* git diff HEAD -- readme.txt （查看工作区和版本库里面最新版本的区别）
    * 问题：
        * 1、 第二次的修改没有被提交到master
         * 需要先git add 再git commit 别急着 add第一次的修改，但如果修改过的话要再 git add 一次，需谨记git commit 是将暂存区中的添加到master
         * 处理： 第一次修改-> git add ->第二次修改 -> git add -> git commit
         * 总结：Git的跟踪修改，如果不add到stage就不会加入到commit

### 撤销修改
* 撤销工作区的修改
    * git checkout -- file (丢弃工作区的修改，-- 很重要，没有它就变成了切换到另一个分支)
    * git checkout -- readme.txt (将readme.txt文件在工作区的修改全部撤销)
* 撤销暂存区的修改
    * git reset HEAD file （HEAD 表示最新版本）
    * git reset HEAD readme.txt （将readme.txt文件在暂存区中的修改撤掉）
    * 处理：git reset HEAD readme.txt (丢暂存区)--> git checkout -- readme.txt（丢工作区）
* 撤销版本库的修改 （前提：没有推送到远程库）
    * 回到版本回退
    
### 删除文件
```
rm test.txt --> git status --> git rm test.txt --> git commit -m 'remove test.txt'
```

*   删错了：
    * git checkout -- test.txt (用版本库里的版本替换工作区中的版本)
    * 小结: 文件被提交到版本库，不用担心误删，只要恢复文件到最新版本，但你会丢失最近一次提交后你修改的内容
    
### 远程仓库

需求： 搭建一代远程的运行Git的服务器
现实利用：
Github： 提供Git仓库托管服务的

1. 安全性： Git 和 Github之间传输是需要进行远程SSH加密
2. 透视性：Github上面的仓库，每个人具有可读性，但只有你自己才可以更改
3. 保密性： 切记不要把敏感信息放到里面去
4. 私有性：不想让别人看到你的代码
    * 方法一、 交点保护费：Github会把公开的仓库变成私有的(不可读更不可写)
    * 方法二、自己动手搭建一个Git服务器CodingNET

### 添加远程仓库：

1. 从远程仓库克隆出一个新的仓库
2. 将一个已有的本地仓库与之关联
```
git remote add origin git@github.com:michaelliao/learngit.git
(需将上面的michaelliao替换成你自己的Github账户名，关联是没有问题的，但是推送不上去，因为你的SSH Key公钥不在我的账户列表里)
```
3.  把本地仓库推送到Github仓库
```
git push -u origin master 
(将当前分支master推送到远程, -u 表示不但推送，而且建立本地和远程的相互关联，再次推送可以就简化指令)
git push origin master (初次-u后，都可以简写)
```

4. SSH 警告： 确认Github的Key指纹信息是否真的来自Github的服务器，若yes则添加到known hosts中，若担心，输入yes前，校验Github的RSA key的fingerprinter是否与SSH连接给出的一致


### 从远程库克隆
1. 从零开发：创建远程库-->从远程库克隆
    * 登录Github --> 创建 gitskills -->勾选 Initialize this repository with a README --> 远程库准备完成 --> git clone git@github.com:xxx/gitskills.git
    * 多协议：
        * git:// 使用ssh
            * 优点：ssh支持的原生git协议速度最快
        * https协议： https://github.com/xxx/gitskills.git
            * 缺点：
                * 速度慢
                * 每次推送都必须输入口令
            * 优点：
                * 但在某些只开放http端口的公司内部就无法使用ssh协议而只能用https
                
### 分支管理
* master --> 最新提交， HEAD --> master（确定了当前的分支）
* 创建与合并分支
    * 创建dev分支并切换：
        * git checkout -b dev (-b 表示创建并切换)
* 查看当前分支
    * git branch dev （当前分支前面有一个 * 号）
* 列出版本库下所有分支
    * git branch
* 切换分支
    * git checkout dev
    * git checkout master
* 合并分支
    * 首先要先切换为master分支
    * 再指定想要合并的分支
        * git merge dev 
        （当前为master分支，但是想合并dev）
        * fast-forward （快进模式，但不是每次都能使用这个模式）
* 删除分支
    * git branch -d dev 
    （git鼓励你使用分支完成某个任务后删除分支，和直接在master分支上工作效果是一样的）

### 解决冲突

* 消除冲突：
    * 用下面的标记出不同分支的内容
        * git branch &lt;name&gt;（创建分支）
        * git branch merge&lt;name&gt; (合并某分支到当前分支)
        * &lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;
        * =======
        * &gt;&gt;&gt;&gt;&gt;&gt;&gt;
* 查看分支合并情况
    * git log --graph --pretty=oneline --abbrev-commit
    * git log --graph (查看分支合并图)
* 分支管理策略
    * Fast forword模式（在此模式下，删除分支后，会丢掉分支信息）
        * git merge --no-ff -m "merge with no-ff" dev (禁用Fast forward模式)
* BUG分支
    * 情景：
        * “修复bug时，我们会通过创建新的bug分支进行修复，然后合并，最后删除；当手头工作没有完成时，先把工作现场git stash一下，然后去修复bug，修复后，再git stash pop，回到工作现场。”
    * 每个bug都可以通过一个新的临时分支来进行修复 --> 修复后，合并分支 -->将临时分支删除
    * 将当前工作现场“存储”起来
        * git stash
    * 实战：（原计划两个小时的bug修复只花了5分钟，再回到dev下干活）
        * git stash --> git status --> git checkout master --> git checkout -b issue-101 --> 修改对应的bug文件readme.txt --> git add readme.txt --> git commit -m "fix bug 101" --> git checkout master --> git merge --no-ff -m "merge bug fix 101" issue-101 (修复漏洞)
        * git checkout dev --> git status --> git stash list (查看刚才的工作环境去哪里了) --> git stash apply (恢复环境但不删除) --> git stash drop (删除) 或者 用git stash pop （在恢复的同时删除stash的内容）--> git stash list 查看stash的内容
        * 恢复指定的stash：git stash apply stash@{0}
* Feature分支
    * 情景：新功能的添加——一些实验性质的代码
    * Command：
        * 开发一个新的feature， 最好新建一个分支，如果要丢弃一个没有被合并过的分支，可以：
            * git branch -D &lt;name&gt; （强行删除未合并过的分支）
    * 实战：
        * git checkout -b feature-vulcan --> git add vulcan.py --> git status --> git commit -m "add feature vulcan" --> git checkout dev(切回dev准备合并) --> git checkout -d feature-vulcan(删除此新功能分支，出现提示) --> git branch -D feature-vulcan(分支还没有整合，强行删除的话会丢失掉修改，这里直接强行删除)

### 多人协作

* 情景： 有推送权限，可以看到push地址
* 远程仓库的默认名称： origin
* 本地master和远程master自动对应
* Command
    * git remote （查看远程库的信息）
    * git remote -v (显示更详细的信息)

