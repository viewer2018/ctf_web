## 一、创建：

	初始化一个Git仓库，使用git init命令。

	添加文件到Git仓库，分两步：

	第一步，使用命令git add <file>，注意，可反复多次使用，添加多个文件
	
	第二步，使用命令git commit，完成。


## 二、版本转换：

	HEAD指向的版本就是当前版本，因此，Git允许我们在版本的历史之间穿梭，使用命令git reset --hard commit_id
	
 	穿梭前，用git log可以查看提交历史，以便确定要回退到哪个版本。
	
	要重返未来，用git reflog查看命令历史，以便确定要回到未来的哪个版本。
	
## 三、工作区与暂存区：

 ![](https://github.com/a972950363/ctf_web/blob/master/src/Image.png)
   
## 四、远程库：
     
     要关联一个远程库，使用命令git remote add origin git@server-name:path/repo-name.git；
     
     关联后，使用命令git push -u origin master第一次推送master分支的所有内容；

     此后，每次本地提交后，只要有必要，就可以使用命令git push origin master推送最新修改

     git clone从远程库克隆
## 五、分支：
    	
	查看分支：git branch
	
	创建分支：git branch <name>
	
	切换分支：git checkout <name>
	
	创建+切换分支：git checkout -b <name>
	
	合并某分支到当前分支：git merge <name>
	
	删除分支：git branch -d <name>

### 分支策略：

	在实际开发中，我们应该按照几个基本原则进行分支管理：

	首先，master分支应该是非常稳定的，也就是仅用来发布新版本，平时不能在上面干活；

	那在哪干活呢？干活都在dev分支上，也就是说，dev分支是不稳定的，到某个时候，比如1.0版本发布时，再把dev分支合并到master上，在master分支发布1.0版本；

	你和你的小伙伴们每个人都在dev分支上干活，每个人都有自己的分支，时不时地往dev分支上合并就可以了。

	所以，团队合作的分支看起来就像这样：

 ![](https://github.com/a972950363/ctf_web/blob/master/src/Image2.png)


### BUG修复：

	Git还提供了一个stash功能，可以把当前工作现场“储藏”起来，等以后恢复现场后继续工作：

	$ git stash

	Saved working directory and index state WIP on dev: 6224937 add merge

	HEAD is now at 6224937 add merge

	现在，用git status查看工作区，就是干净的（除非有没有被Git管理的文件），因此可以放心地创建分支来修复bug。

	首先确定要在哪个分支上修复bug，假定需要在master分支上修复，就从master创建临时分支：

	$ git checkout master

	Switched to branch 'master'Your branch is ahead of 'origin/master' by 6 commits.

	$ git checkout -b issue-101Switched to a new branch 'issue-101'

	现在修复bug，需要把“Git is free software ...”改为“Git is a free software ...”，然后提交
