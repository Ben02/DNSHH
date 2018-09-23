![1.png](https://i.loli.net/2018/09/23/5ba792509351c.png)

主题的名字 DNSHH 来源于 DNSHH，这是一个神奇的 DNS，可以 “自由” 地上网，可惜现在已经暂停供应了。这个主题整体架构仿自此网站，已得到原作者 Hang 的授权，可以由我公开发布。

## 主题特色

1. 单栏、蓝白、小清新、简洁，贴合当今网页设计的潮流。

2. 底栏根据不同情况自动切换。

![2.png](https://i.loli.net/2018/09/23/5ba7925013562.png)

3. 基于 Bootstarp 框架，内置许多精美实用的 UI 组件。

4. 评论认证功能，支持博主认证（黄 V），贵宾认证（蓝 V）和灌水达人（红星）

![3.png](https://i.loli.net/2018/09/23/5ba7925011bbd.png)

5. 集成 lazyload。

6. 文章页底部集成版权信息、百度分享、前后文章的实用功能

![4.png](https://i.loli.net/2018/09/23/5ba7924f9be28.png)

7. 集成 timthumb.php 略缩图显示。

![5.png](https://i.loli.net/2018/09/23/5ba79250951bc.png)

8. 集成短代码文字框（使用方法见下文）

9. 详细齐全的后台设置。具体的后台设置项截图 [点此查看](https://i.loli.net/2018/09/23/5ba7933925bfe.png "点此查看")

![6.png](https://i.loli.net/2018/09/23/5ba7925015204.png)

10.AJAX 翻页无刷新加载。

## 下载

DNSHH 主题现在由 Github 托管，欢迎 fork 或 star。主题目前已有 Typecho 和 Wordpress 版本，希望各界高手能帮忙移植到 EMLOG 等博客平台，万分感谢。

[点击下载](https://github.com/Ben02/DNSHH/blob/master/DNSHH-plugins.zip?raw=true)主题依赖插件包

另外上面还有一个主题依赖插件包，里面的插件都是要安装的，其中 Thumbnail 插件经过本人修改，与原版略有不同。

2013-06-25 更新：感谢 m208 移植 Wordpress 版本，点击下载 [DNSHH for Wordpress](https://github.com/Ben02/DNSHH/archive/wordpress.zip "DNSHH for Wordpress")。

## 使用前必读

在使用主题之前需要修改一些地方，才能让主题正常工作。

1. 下载上面的两个压缩包，解压`DNSHH-plugins.zip`，把里面的东西上传到`/usr/plugins`目录，然后到后台逐个启用插件。再把`DNSHH-master.zip`上传解压到`/usr/themes`目录，然后才能启用主题。

2. 如何进入后台：Typecho后台—控制台—外观—设置外观。里面的各项设置都有详细的说明，在这里就不解释了。

3. 进入[百度分享](http://share.baidu.com/code "百度分享")，用自己的百度帐号登录，在获取代码的地方找到图中所示位置：


这串数字就是你的百度分享 id，记住它，填到 DNSHH 主题设置，保存

![7.png](https://i.loli.net/2018/09/23/5ba7924f78693.png)

4. 进入`后台—设置—文章`和`后台—设置—评论`，把图中所示位置的数字改成 `5`

![9.png](https://i.loli.net/2018/09/23/5ba7924f89dc4.png)
![8.png](https://i.loli.net/2018/09/23/5ba7924f9a64b.png)

5. 最后是 timthumb 防盗链设置：`/usr/themes/DNSHH/thumb/timthumb.php`，修改 `127` 行，把博客地址跟自己常用的图床的根域名添加进去，保存

![10.png](https://i.loli.net/2018/09/23/5ba7924f79ba4.png)

6. 保留底部作者版权连接是对免费开源主题最基本的支持。

## 实用功能

经过一番设置之后，DNSHH 主题应该能正常使用了。下面要介绍的是一些内置功能的使用方法：

1. 短代码：Typecho 并没有短代码函数，这里所说的短代码并不 “短”，只是能显示各种颜色的框框

![QQ截图20180923212543.png](https://i.loli.net/2018/09/23/5ba79466bdb8a.png)

2. 随机图片：把图片放到`/usr/resources/rand/`目录，没有就新建。只要是放到目录中的图片，Thumbnail 插件会自动获取，不用使用统一的文件名，扔进去就可以。支持格式：jpg|gif|png|bmp|jpeg

3. 关于 Bootstarp 内置的东西：点击 [这里](http://wrongwaycn.github.com/bootstrap/docs/base-css.html "这里") 和 [这里](http://wrongwaycn.github.com/bootstrap/docs/components.html "这里")

## 升级方法

方法一：下载 DNSHH-master.zip，解压覆盖原来的文件。这种方法比较简单快捷，但是会丢失你原来对主题的修改。

方法二：利用 Git 神奇的特性，可以精确地查看版本修改。点击[此处](https://github.com/Ben02/DNSHH/commit/fbf3c2666501aa961ed1fd04220756053763dd05 "此处")，按照列出的文件进行修改。如下图所示，红色的是删除，绿色的是增加，我们只需要按照这个提示对自己的主题文件进行修改就行了。这种方法能保存你对以前主题所作的修改，但是比较复杂。


## 版本更新

**2013.03.10 发布 V1.2 版本**

1. 增加 AJAX 翻页无刷新加载。

2. 完善后台设置。

3. 增加代码版随机文章。

4. 删除 functions.php 和 style.css 里面的冗余代码。

**2013.03.02 发布 V1.1 版本**

本版本主要删除容易引起问题的插件，删除无用插件，精简文件，压缩 CSS 和图片。具体更新内容：

1. 删除 guestbook.php，删除 tags.php，压缩 bootstarp.css，压缩图片。

2. 删除 Useragen、ArticleList、Links 插件依赖，仅保留 Thumbnail 和 Stat 插件。

3. 增加插件接口 $this->footer(); 。

4. 细节优化，例如图片边框的调整。

**2013.02.24 发布 V1.0 版本**

## 特别鸣谢

主题原作者 Hang，Bug 测试员 m208，后台认证设置制作者 Wis，评论翻页 AJAX 来自牧风，首页翻页 AJAX 来自 Xider，后台设置项参照 White-M 主题。感谢你们让这个主题变得完美。
