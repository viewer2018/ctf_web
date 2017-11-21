# GIT使用笔记
## 各系统平台安装git
    linux：
	使用命令:
    sudo apt-get install git
	分支：（debian、unbuntu linux):
	sudo apt-get git-core
    Max os:
    通过homebrew安装git，[教程]http://brew.sh/
	通过xcode-preferences-downloads-command Line tools安装
    Windows:
          1.下载mysysgit
          2.设置身份：(git Bash)
          3.git config --global user.name "your name“
          4.git config --global user.email "your email address" 
		  
## 创建版本库（本机）
     选择一个地方，创建一个空目录
     1.mkdir 目录name
     2.cd    目录name
     3.pwd   显示当前目录（git Bash 窗口上方也有显示当前目录）
	
     初始化仓库(变为可管理):git init
     添加一个文本文件：（windows下由于编码问题不能用自带笔记本编辑，可使用Notepad ++) 
     提交到暂存区:git add 文件名字
     提交到版本库（只能跟踪文本文件如txt的改动，Microsofe的word由于使用二进制编辑不能跟踪改动）:git commit -m "备注”
	 
## 时光穿梭机
     查看仓库当前状态:git status
     查看当前修改与上一次修改的difference：git diff
     查看历史记录：git log 查看历史记录（简化）：git log --pretty=online
     回退：git reset --hard commit_id （最近也可用HEAD、HEAD^、HEAD~number）
     查看历史命令：git reflog 搭配回退有神奇的效果
   
     丢弃工作区修改：git checkout --file
     撤回暂存区修改：git reset HEAD file（由于暂存区会整合最新add的修改，因此不用考虑到commit_id）（从暂存区撤回的文件会被重新调回工作区）
   
     从版本库中删除文件：git rm file
     从版本库恢复文件：git checkout --file（等价于撤销工作区修改）（工作区最新修改会消失）  
 
     注意点:只有添加（git add）到暂存区的文件才能提交（git commit）到版本库

## 远程仓库
     创建SSH KEY（可在用户主目录下查看有无.ssh目录（包含id_rsa（私钥）\id_rsa.pub（公钥）))若无,在git Bash输入命令：ssh-keygen -t rsa -C “邮件地址”
     最后
     将ssh key中的id_rsa.pub添加到github上的ssh keys中，便可向github推送文件（公开）
     注意：每台电脑的ssh key不同
    
     关联远程仓库：git remote add origin git@github.com:github名称/仓库名称（.git)
     向远程仓库推送本地分支所有内容：git push -u origin master 
     推送最新修改：git push origin master
   
     克隆一个远程仓库：git clone git@github.com:github名称/仓库名称(远程仓库）

   
 

   
   
   
   
      