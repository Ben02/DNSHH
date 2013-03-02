![DNSHH](http://labimg-labimg.stor.sinaapp.com/original/fa5c5a3c9ed90d9375025db341a53ef3.png)

这是一款简洁小清新主题，代码托管于Github，欢迎fork或star。主题目前只有Typecho版，希望各界高手能帮忙移植到WordPress和EMLOG等博客平台，万分感谢。

##主题特色

1.单栏、蓝白、小清新、简洁，贴合当今网页设计的潮流。

2.文章页相关文章显示。

3.评论认证功能，支持博主认证（黄V），贵宾认证（蓝V）和灌水达人（红星）

![](http://labimg-labimg.stor.sinaapp.com/original/2200e978cbc26e7bff5f1779d1664c10.png)

4.基于Bootstarp框架，内置许多精美实用的UI组件。

5.集成lazyload。

6.文章页底部集成版权信息、百度分享、上下文章的实用功能

![](http://labimg-labimg.stor.sinaapp.com/original/c8de63a267b0fd4c315d9469773db632.png)

7.集成timthumb.php略缩图显示。

8.集成短代码文字框（使用方法见下文）

##使用前必读

因为这个主题功能太多（误），所以要修改的地方比较多。但都是很简单的，不要知难而退了啊。

1.[下载DNSHH-plugins-master.zip](https://github.com/Ben02/DNSHH-plugins/archive/master.zip)，解压，把`/plugins-master`文件夹内的东西上传到`/usr/plugins`目录，然后到后台逐个启用插件。再把此主题上传解压到`/usr/themes`目录，然后才能启用主题。

2.进入[百度分享](http://share.baidu.com/code)，用自己的百度帐号登录，在获取代码的地方找到图中所示位置：

![](http://labimg-labimg.stor.sinaapp.com/original/9a2d155ea6d3fa64f4bf9513adcefa26.png)

这串数字就是你的百度分享id，记住它，填到DNSHH主题设置，保存

![](http://labimg-labimg.stor.sinaapp.com/original/a25257b6e05ef18258bc8c383102b486.png)

3.进入`functions.php`，修改25行，把邮箱改成你自己的，保存

![](http://labimg-labimg.stor.sinaapp.com/original/6c6b3c4f1905fa1841863715e53e421d.png)

4.进入`后台—设置—文章`和`后台—设置—评论`，把图中所示位置的数字改成5

![](http://labimg-labimg.stor.sinaapp.com/original/4294d58e9af29c31e785b8f51ac97bbc.png)

![](http://labimg-labimg.stor.sinaapp.com/original/6e91950053fcec2d6d5fcb51d8d7a6e1.png)

5.最后是timthumb防盗链设置：`/usr/themes/DNSHH/thumb/timthumb.php`，修改127行，把博客地址跟自己常用的图床的根域名添加进去，保存

![](http://labimg-labimg.stor.sinaapp.com/original/c9258316ad22b8aab24914d6322c9d86.png)

6.保留底部作者版权连接是对免费开源主题最基本的支持。

##功能调用

经过一番设置之后，DNSHH主题应该能正常使用了。下面要介绍的是一些内置功能的使用方法：

1.短代码：Typecho并没有短代码函数，这里所说的短代码并不“短”，只是能显示各种颜色的框框

![](http://labimg-labimg.stor.sinaapp.com/original/ea0f1a0c950dec9613d1185405fabcae.png)

2.关于认证：进入DNSHH后台设置，按照提示把邮箱填到合适的框内，一行一个，保存

![](http://labimg-labimg.stor.sinaapp.com/original/3c8df06e0c2a8af129450391179df4c2.png)

3.关于Bootstarp内置的东西：点击 [这里](http://wrongwaycn.github.com/bootstrap/docs/base-css.html) 和 [这里](http://wrongwaycn.github.com/bootstrap/docs/components.html)

##升级方法

方法一：下载最新版本，覆盖原来的文件。这种方法比较简单快捷，但是会丢失你原来对主题的修改。

方法二：利用Git神奇的特性，可以精确地查看版本修改。点击[此处](https://github.com/Ben02/DNSHH/commit/f2d69244dea226d8661e84ab9f58a3b8aa9a4daa)，按照列出的文件进行修改。如下图所示，红色的是删除，绿色的是增加，我们只需要按照这个提示对自己的主题文件进行修改就行了。这种方法能保存你对以前主题所作的修改，但是比较复杂。

![](http://labimg-labimg.stor.sinaapp.com/original/d4e576bc82249cedd71c52642641477b.png)

##版本更新

2013.03.02 发布V1.1版本

本版本主要删除容易引起问题的插件，删除无用插件，精简文件，压缩CSS和图片。具体更新内容：

1.删除guestbook.php，删除tags.php，压缩bootstarp.css，压缩图片。

2.删除Useragen、ArticleList、Links插件依赖，仅保留Thumbnail和Stat插件。

3.增加插件接口`<?php $this->footer(); ?>`。

4.细节优化，例如图片边框的调整。

2013.02.24 发布DNSHH第一版1.0

##特别鸣谢

主题原作者[Hang](https://www.dnshh.com/)，Bug测试员[m208](http://www.m208zone.tk/)，DNSHH后台设置制作者[Wis](http://wislab.net/)。感谢你们让这个主题变得完美。