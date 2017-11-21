### 创建版本库
初始化一个Git仓库，使用`git init`命令。
添加文件到Git仓库，分两步：
第一步，使用命令`git add file`，注意，可反复多次使用，添加多个文件；
第二步，使用命令`git commit`，完成
`git commit -m` "修改注释"

### 基本命令
`git status` 查看缓冲区状态
`git diff` 查看修改内容
`git log` 显示从最远到最近的提交日志
`git log --pretty=oneline` 显示简单提交日志

git 中 HEAD表示当前版本  HEAD^表示上个版本  HEAD^^表示上上个版本  HEAD~N 表示上N个版本

`git reset --hard HEAD^`  就可以回退到上一个版本

`git reflog` 显示记录的每一次命令
`git reset --hard commit_id`  可以回退到对应ID的版本
`git checkout -- file` 可以放弃工作区的修改  

 >命令`git checkout -- readme.txt`意思就是，把`readme.txt`文件在工作区的修改全部撤销，这里有两种情况：
 一种是`readme.txt`自修改后还没有被放到暂存区，现在，撤销修改就回到和版本库一模一样的状态；
- 一种是`readme.txt`已经添加到暂存区后，又作了修改，现在，撤销修改就回到添加到暂存区后的状态。
- 总之，就是让这个文件回到最近一次`git commit`或`git add`时的状态。

　
>`git reset`命令既可以回退版本，也可以把暂存区的修改回退到工作区。当我们用HEAD时，表示最新的版本。

<br>
输入`rm file`  可以删除文件，然后你就会有两种选择
- 确实需要删除，则需要再输入`git rm`
- 删错了，则输入`git checkout -- file` 撤销删除
但是即使是删除了，也可以用`git reset HEAD file` 再次恢复文件

### 仓库操作
`$ ssh-keygen -t rsa -C "youremail@example.com"` 然后一直回车，新建SSH，会出现在默认目录里 **id_ras**是私钥　 **id_ras.pub**是公钥　将公钥添加到github里

`git push origin master`

要关联一个远程库，使用命令`git remote add origin git@server-name:path/repo-name.git` 如 `git remote add origin git@github.com:michaelliao/learngit.git` 关联后，使用命令`git push -u origin master`第一次推送master分支的所有内容；
此后，每次本地提交后，只要有必要，就可以使用命令`git push origin master`推送最新修改；

查看本地仓库已经关联的远程仓库:`git remote -v`
取消关联仓库：`git remote rm origin`


`$ git clone git@github.com:michaelliao/gitskills.git` 克隆仓库

### 分支
查看分支：`git branch`
创建分支：`git branch <name>`
切换分支：`git checkout <name>`
创建+切换分支：`git checkout -b <name>`
合并某分支到当前分支：`git merge <name>`
删除分支：`git branch -d <name>`

- 如果分支合并冲突就要在冲突的文件修改，然后在add和commit,合并完成。 
Git会用`<<<<<<<`，`=======`，`>>>>>>>`标记出不同分支的内容

- 用带参数的git log也可以看到分支的合并情况:
`git log --graph --pretty=oneline --abbrev-commit`
用git log --graph命令可以看到分支合并图。

- Fast forward模式，当使用这种模式进行合并时，删除分支后，会丢掉分支信息。
可以使用`git merge --no-ff`禁用Ff模式。
![不使用Ff模式](https://cdn.webxueyuan.com/cdn/files/attachments/001384909222841acf964ec9e6a4629a35a7a30588281bb000/0)
合并分支时，加上--no-ff参数就可以用普通模式合并，合并后的历史有分支，能看出来曾经做过合并，而fast forward合并就看不出来曾经做过合并


- 当要切换到其他分支进行工作时，可以用`git stash`保存工作现场。
  - `git stash list`可以查看保存的工作现场列表。
  - `git stash pop`可以出栈第一个工作现场，同时删除列表中对应现场。
  - `git stash apply`可以取出第一个工作现场，但不会删除列表中对应现场，需要`git stash drop`删除。
  - `git stash apply stash@{n}` 可以删除第n个工作现场
  

- 如果要丢弃一个没有被合并过的分支，可以通过`git branch -D <name>` 强行删除


- **多人协作的工作模式：**
1. 首先，可以试图用`git push origin branch-name`推送自己的修改；
2. 如果推送失败，则因为远程分支比你的本地更新，需要先用`git pull`试图合并；
3. 如果合并有冲突，则解决冲突，并在本地提交；
4. 没有冲突或者解决掉冲突后，再用`git push origin branch-name`推送就能成功！
- 在本地创建和远程分支对应的分支，使用：`git branch --set-upstream-to=origin/<branch> dev`，本地和远程分支的名称最好一致；

### 遇到的问题
- >git error: failed to push some refs to git@github.com

　　出现这个错误的原因是因为你有远程库中的文件没有下载下来。所以你需要先运行`git pull origin master`,然后才可以继续运行`git push -u origin master`
- 如何修改git默认目录(未解决)

- 廖雪峰git教程中：
>本地分支和远程分支的链接关系没有创建，用命令`git branch --set-upstream branch-name origin/branch-name`

 但git给出的答复是应该用`git branch --set-upstream-to=origin/<branch> dev`

- 关于ctf_web下 \笔记\ 使用`git status`时会显示乱码解决方案：
 会显示形如 274\232\350\256\256\346\200\273\347\273\223.md 的乱码。 
解决方案：在bash提示符下输入： `git config --global core.quotepath false` core.quotepath设为false的话，就不会对0x80以上的字符进行quote。中文显示正常