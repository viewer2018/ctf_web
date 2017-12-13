* 创建版本库(repository:仓库)：
	* 所有的版本控制系统，其实只能跟踪文本文件的改动，比如TXT文件，网页，所有的程序代码等等，Git也不例外。
	* 选择一个合适的地方，创建一个空目录（或者也可以在已有的目录下创建仓库）：
		mkdir <directory>（文件夹名）
	* 打开进入这个目录：
		cd <directory>
	* 把这个目录变成Git可以管理的仓库(初始化仓库)：
		git init
	* 最后当前目录下多了一个.git的目录，这个目录是Git来跟踪管理版本库的。
	* 没看到是隐藏了，使用"ls -ah"命令就可以看见。
* 把文件添加到版本库：
	* 把文件放到仓库（之前创建的目录）中。
	* 告诉Git，把文件添加到仓库：
		git add <file>
	* 告诉Git，把文件提交到仓库（执行了commit操作，就会创建一个新的版本）：
		git commit -m "xxx(此次对文件进行了什么操作/新版本与前一个版本的区别)"
* 时光机穿梭：
	* "git status"命令可以让我们时刻掌握仓库当前的状态，如果一个文件被修改，该命令可以显示有文件被修改过，但不能显示具体修改了什么内容。
		* Changes not staged for commit:这一句表示修改还没加入(add)到版本库的暂存区。
		* Changes to be committed:这一句表示修改（已在暂存区）还没提交(commit)。
	* "git diff"(difference)命令可以显示具体修改的内容。
	* "cat <file>"可查看文件的内容
	* 版本回退：
		* 每当你觉得文件修改到一定程度的时候，就可以“保存一个快照”，这个快照在Git中被称为commit。一旦你把文件改乱了，或者误删了文件，
		还可以从最近的一个commit恢复，然后继续工作。
		* "git log"命令可以告诉我们修改的历史记录(查看历史版本，按Q退出)。
		* 如果嫌输出信息太多，看得眼花缭乱的，可以试试加上--pretty=oneline参数：
			* git log --pretty=oneline
		* 看到的一大串类似3628164...882e1e0的是commit id（版本号）,是一个SHA1计算出来的一个非常大的数字，用十六进制表示。
		* 首先，Git必须知道当前版本是哪个版本，在Git中，用HEAD表示当前版本，也就是最新的提交3628164...882e1e0，上一个版本就是HEAD^，
			上上一个版本就是HEAD^^，当然往上100个版本写100个^比较容易数不过来，所以写成HEAD~100。
		* 我们要把当前版本回退到上一个版本：
			 * git reset --hard HEAD^（--hard参数的意义待解释）
		* 然而，且慢，我们用git log再看看现在版本库的状态，可看出最新的版本已经看不到了。
		* 恢复最新版本的方法：
			1. 窗口未关闭，就可以顺着往上找，找到最新版本的commit id，于是就可以指定回到未来的某个版本：
				* git reset --hard <commit id>
			1. Git提供了一个命令"git reflog"(refer to log)用来记录你的每一次命令，这样也可以找到某一版本的commit id。
				* $ git reflog
				* df7d0eb (HEAD -> master) HEAD@{0}: reset: moving to df7d0
				* 039e024 HEAD@{1}: reset: moving to HEAD
				* 039e024 HEAD@{2}: reset: moving to HEAD^
				* df7d0eb (HEAD -> master) HEAD@{3}: commit: append GPL
				* 039e024 HEAD@{4}: commit: add distirbuted
				* c12e179 HEAD@{5}: commit (initial): wrote a new file
			* 以上不过哪一种，都需要知道某一版本的commit id。
		* 小结：
			* HEAD指向的版本就是当前版本，因此，Git允许我们在版本的历史之间穿梭，使用命令git reset --hard commit_id。
			* 穿梭前，用git log可以查看提交历史，以便确定要回退到哪个版本。
			* 要重返未来，用git reflog查看命令历史，以便确定要回到未来的哪个版本。
	* 工作区和暂存区：
		* ...
	* 管理修改：
		* 要注意：修改总是在工作区中完成的。
		* 第一次修改 -> git add -> 第二次修改 -> git commit。其中第二次修改并没有被提交。
		* 因为Git管理的是修改，当你用git add命令后，在工作区的第一次修改被放入暂存区，准备提交，但是，在工作区的第二次修改并没有放入暂存区，
			* 所以，git commit只负责把暂存区的修改提交了，也就是第一次的修改被提交了，第二次的修改不会被提交。
		* 提交后，用git diff HEAD -- readme.txt命令可以查看工作区和版本库里面最新版本的区别：
			* ......
			 * Git is a distributed version control system.
			 * Git is free software distributed under the GPL.
			 * Git has a mutable index called stage.
			* -Git tracks changes.
			* +Git tracks changes of files.
		* 那怎么提交第二次修改呢？
			1. 可以继续git add再git commit
			1. 也可以别着急提交第一次修改，先git add第二次修改，再git commit，就相当于把两次修改合并后一块提交了：
				* 第一次修改 -> git add -> 第二次修改 -> git add -> git commit
		* 小结：
			* 每次修改，如果不add到暂存区，那就不会加入到commit中。
	* 撤销修改：
		* 场景1：当你改乱了工作区某个文件的内容，想直接丢弃工作区的修改时，用命令"git checkout -- file"。
			* 这个命令的意思是把文件在工作区的修改全部撤销，这里有两种情况：
				* 一种是文件自修改后还没有被放到暂存区，现在，撤销修改就回到和版本库一模一样的状态；
				* 一种是readme.txt已经添加到暂存区后，又作了修改（在工作区中进行的修改），现在，撤销修改就回到添加到暂存区后的状态（这里可以与场景2联系起来）。
		* 场景2：当你不但改乱了工作区某个文件的内容，还添加到了暂存区时，想丢弃修改，分两步，
			* 第一步用命令"git reset HEAD file"可以把暂存区的修改撤销掉（unstage），即重新放回工作区，就回到了场景1，第二步按场景1操作。
			* "git reset"命令既可以回退版本，也可以把暂存区的修改回退到工作区。当我们用HEAD时，表示最新的版本。
		* 场景3：已经提交了不合适的修改到版本库时，想要撤销本次提交，参考版本回退一节，不过前提是没有推送到远程库。
	* 删除文件：
		* 特别注意：在Git中，删除也是一个修改操作。
		* 一般情况下，你通常直接在文件管理器中把没用的文件删了，或者用rm命令删了：
			* rm <file>
		* 这个时候，Git知道你删除了文件，因此，工作区和版本库就不一致了，git status命令会立刻告诉你哪些文件被删除了。
		* 现在有两个选择:
			1. 确定要将文件删掉。
				* git rm <file>
				* git commit -m "remove file"
			* 这样文件就从版本库中删除了（实际上创建了一个新的版本"remove file"），此时工作区和版本库的内容一致，即都删除了文件。
			* 注意即使前面执行了rm <file>，但这里还要再git rm <file>，因为rm <file>只是在工作区删除（修改）了文件，
				而git rm <file>则相当于rm <file>,git add <file>。这一命令把删除（修改）添加到版本库的暂存区，之后才能执行提交操作。
			1. 另一种情况是删错了。但是由于还没有将修改commit，故还没有创建一个新的版本，所以当前版本库中还保留着误删文件，这是就要用撤销修改：
				* A:rm file;没有add：git checkout -- file;
				* B:rm file;git add file;:git reset --hard HEAD;
			* git checkout其实是用版本库里的版本替换工作区的版本，无论工作区是修改还是删除，都可以“一键还原”。
		* 小结：
			* 命令git rm用于删除一个文件。如果一个文件已经被提交到版本库，那么你永远不用担心误删，但是要小心，你只能恢复文件到最新版本，
			* 你会丢失最近一次提交后你修改的内容。(删除A文件，commit，再修改B文件，commit，突然发现误删，只能退回到A文件还存在的版本，所以B文件的修改会丢失)
* 远程仓库：
	* 添加远程仓库：
		* 首先要把本地库与远程库相关联。git remote add origin <https://..../flasky.git>
		* 此后，每次本地提交后，只要有必要，就可以使用命令git push origin master推送最新修改。
		* 分布式版本系统的最大好处之一是在本地工作完全不需要考虑远程库的存在，也就是有没有联网都可以正常工作，而SVN在没有联网的时候是拒绝干活的！
		* 当有网络的时候，再把本地提交推送一下就完成了同步，真是太方便了！
	* 从远程库克隆:
		* 使用命令：
			* git clone <仓库地址.git>
* 分支管理：
	* 创建与合并分支：
		* 查看分支：git branch
		* 创建分支：git branch <name>
		* 切换分支：git checkout <name>
		* 创建+切换分支：git checkout -b <name>
		* 合并某分支到当前分支：git merge <name> (merge  美 [mɝdʒ] 合并，融合）
		* 删除分支：git branch -d <name> （-d delete)	
	* 解决冲突：
		* 当Git无法自动合并分支时，就必须首先解决冲突。解决冲突后，再提交，合并完成。
		* 用git log --graph命令可以看到分支合并图。（要显示简介一些：git log --graph --pretty=oneline --abbrev-commit）
	* 分支管理策略：
		* 通常，合并分支时，如果可能，Git会用Fast forward模式，但这种模式下，删除分支后，会丢掉分支信息。
		* 如果要强制禁用Fast forward模式，Git就会在merge时生成一个新的commit。
			 * git merge --no-ff -m "merge with no-ff" dev
		* 因为本次合并要创建一个新的commit，所以加上-m参数，把commit描述写进去。
		* 合并分支时，加上--no-ff参数就可以用普通模式合并，合并后的历史有分支，能看出来曾经做过合并，而fast forward合并就看不出来曾经做过合并。
	* BUG分支：
		* ......
		* 修复bug时，我们会通过创建新的bug分支进行修复，然后合并，最后删除；
		* 当手头工作没有完成时，先把工作现场git stash一下，然后去修复bug，修复后，再git stash pop，回到工作现场。
	* Feature分支：
		* ......
	* 多人合作：
		* 当你从远程仓库克隆时，实际上Git自动把本地的master分支和远程的master分支对应起来了，并且，远程仓库的默认名称是origin。
		1. 当你的小伙伴从远程库clone时，默认情况下，你的小伙伴只能看到本地的master分支。不信可以用git branch命令看看。
		  * 现在，你的小伙伴要在dev分支上开发，就必须创建远程origin的dev分支到本地，
			于是他用这个命令创建本地dev分支:git checkout -b branch-name origin/branch-name
		1. 你的小伙伴已经向origin/dev分支推送了他的提交，而碰巧你也对同样的文件作了修改，并试图推送：
		  * 推送失败，因为你的小伙伴的最新提交和你试图推送的提交有冲突，解决办法也很简单，Git已经提示我们，
		  * 先用git pull把最新的提交从origin/dev抓下来，然后，在本地合并，解决冲突，再推送：
		  * git pull也失败了，原因是没有指定本地dev分支与远程origin/dev分支的链接，根据提示，设置dev和origin/dev的链接：
		  * 再pull：git pull
		  * 这回git pull成功，但是合并有冲突，需要手动解决，解决的方法和分支管理中的解决冲突完全一样。解决后，提交，再push：
		* 小结：
			1. 查看远程库信息，使用git remote -v；
			1. 本地新建的分支如果不推送到远程，对其他人就是不可见的；
			1. 从本地推送分支，使用git push origin branch-name，如果推送失败，先用git pull抓取远程的新提交；
			1. 在本地创建和远程分支对应的分支，使用git checkout -b branch-name origin/branch-name，本地和远程分支的名称最好一致；
			1. 建立本地分支和远程分支的关联，使用git branch --set-upstream branch-name origin/branch-name；
			1. 从远程抓取分支，使用git pull，如果有冲突，要先处理冲突(处理方法与“解决冲突”一致)。
* 标签管理：
	* 发布一个版本时，我们通常先在版本库中打一个标签（tag），这样，就唯一确定了打标签时刻的版本。将来无论什么时候，取某个标签的版本，
		就是把那个打标签的时刻的历史版本取出来。所以，标签也是版本库的一个快照。
	* Git的标签虽然是版本库的快照，但其实它就是指向某个commit的指针（跟分支很像对不对？但是分支可以移动，标签不能移动），所以，
		创建和删除标签都是瞬间完成的。
	* 创建标签：
		* 在Git中打标签，首先，切换到需要打标签的分支上：
		* 默认标签是打在最新提交的commit上的。
		* 小结：
			* 命令git tag <name>用于新建一个标签，默认为HEAD，也可以指定一个commit id；（git tag <name> commit id）
			* git tag -a <tagname> -m "blablabla..."可以指定标签信息；
			* git tag -s <tagname> -m "blablabla..."可以用PGP签名标签；
			* 命令git tag可以查看所有标签。
	* 操作标签：
		* 小结：
			* 命令git push origin <tagname>可以推送一个本地标签；
			* 命令git push origin --tags可以推送全部未推送过的本地标签；
			* 命令git tag -d <tagname>可以删除一个本地标签；
			* 命令git push origin :refs/tags/<tagname>可以删除一个远程标签。
* http://blog.csdn.net/carolzhang8406/article/details/49761927

-----------------------------------------------------------------------
* git remote -v 查看关联的远程仓库
* git remote remove <name> 删除关联仓库
* git push -u origin master 首次把本地仓库所有内容提交到远程库
* git add *

* git push origin master -f 当你把当前版本push到远程库时，这时候你在本地回退一个或多个版本，之后再push，就会出现版本不匹配的情况，这时候就要-f强行覆盖
markdown文件file.md 才会在github显示出markdown元素，txt不会。
