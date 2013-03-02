<!DOCTYPE html>
<html lang="zh-CN">
  <head>
  	<meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); ?></title>
    <?php if ($this->is('post')): ?>
    <link rel="canonical" href="<?php $this->permalink() ?>" />
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl(); ?>style.css">
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl(); ?>bootstarp.css">
    <?php $this->header("generator=&template="); ?>
    <script src="<?php $this->options->themeUrl(); ?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl(); ?>lazyload/lazyload.js"></script>
    <script type="text/javascript">
  jQuery(function() {          
      jQuery("img").not("#respond_box img").lazyload({
          placeholder:"<?php $this->options->themeUrl(); ?>lazyload/loading.gif",
            effect:"fadeIn"
          });
      });
</script>
  </head>

  <body>
  	<div id="Main">
<div id="Header">
  			<a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>"><span style="font-size:35px;margin-bottom: 13px;"><?php $this->options->title(); ?></span><span><?php $this->options->description() ?></span></a>
</div>

  	
<div id="Center">
<ul class="breadcrumb">
  <li <?php if($this->is('index')): ?> class="current"<?php endif; ?><?php if ($this->is('post')): ?>class="active"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
				<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
				<?php while($pages->next()): ?>
				<li <?php if($this->is('page', $pages->slug)): ?> class="active"<?php endif; ?>><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
				<?php endwhile; ?>
				<li><a href="<?php $this->options->feedUrl(); ?>" class="menu-rss" target="_blank">订阅</a></li>
<form  style="display:inline;" class="form-search" action="/search" method="get" >
    <input  style="height:13px;width:120px;display:inline;color:#999;float:right" type="text" class="input-medium search-query"  name="s" value="回车以搜索..." onfocus="if (value =='回车以搜索...'){value =''}" onblur="if (value ==''){value='回车以搜索...'}" lang="zh-CN" >
    </form>
</ul><div id="bottom-bar"></div>
</div>