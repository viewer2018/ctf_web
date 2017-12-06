# 如何使用github
## 创建版本库（涉及的命令）
### *初始化一个Git仓库*
- pwd：显示当前目录
- git init：把这个目录变成Git可以管理的仓库（关键！）
- ls -ah：看见隐藏的.git目录（把仓库建好后，当前目录下多了一个Git来跟踪管理版本库的.git目录。这个目录默认隐藏）
### *添加文件到Git仓库*
- git add <file>：（注意，可反复多次使用，添加多个文件）
- git commit（commit可以一次提交很多文件，所以可以多次add不同的文件）
- 例子如下：
- $ git add file1.txt
- $ git add file2.txt file3.txt
- $ git commit -m "add 3 files."
## 时光机穿梭
### *回顾自己的修改*
- git status：掌握仓库当前的状态，告诉我们被修改过但还没有提交的地方
- git diff：过一段时间仍能用该命令看看具体修改了什么内容
### *提交修改*
1. git add：与提交新文件一样的操作
2. git status：（看看当前仓库的状态，再次确认）
3. git commit：提交
4. git status：看看仓库的当前状态，显示nothing to commit，成功啦！
## 版本回退
- (注：HEAD指向的版本是当前版本）
- git reset --hard commit_id:在版本的历史之间穿梭
- git log:显示从最近到最远的提交日志（如果输出信息太多，加上--pretty=oneline）
- git reset：如当前版本“append GPL”回退到上一个版本“add distributed”【回到过去】
- git reflog：看命令历史，确定要回到未来的哪个版本【回到未来】
## Git如何跟踪修改
- case1:第一次修改 -> git add -> 第二次修改 -> git commit
- result1:第一次修改成功，第二次失败(第一次修改被放入暂存区,工作区的第二次修改并没有放入暂存区)
- case2:第一次修改 -> git add -> 第二次修改 -> git add -> git commit
- result2:两次都成功！
## Git如何撤销修改
- case1:git checkout -- file(改乱了工作区某个文件的内容，想直接丢弃工作区的修改）
- case2:第一步、git reset HEAD file(改乱了工作区某个文件的内容，还添加到了暂存区时，想丢弃修改)
-       第二步、按case1操作
- case3:交了不合适的修改到版本库时，想要撤销本次提交，参考版本回退
## Git如何删除修改
- 第一步：git rm
- 第二步：git commit，文件就从版本库中被删除了
- 特殊情况：文件误删？
- 用git checkout！！！（注意与撤销修改的不同！！）用版本库里的版本替换工作区的版本，无论工作区是修改还是删除，都可以“一键还原”
