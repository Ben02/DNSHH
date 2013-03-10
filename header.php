<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
  	<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php if (is_single()): ?>
    <link rel="canonical" href="<?php get_permalink() ?>" />
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" href=" <?php bloginfo('template_url'); ?> /style.css">
    <link rel="stylesheet" type="text/css" href=" <?php bloginfo('template_url'); ?> /bootstarp.css">
    <?php wp_head(); ?>
    <script src="<?php bloginfo('template_url'); ?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>lazyload/lazyload.js"></script>
    <script type="text/javascript">
  jQuery(function() {          
      jQuery("img").not("#respond_box img").lazyload({
          placeholder:"<?php bloginfo('template_url'); ?>lazyload/loading.gif",
            effect:"fadeIn"
          });
      });
</script>
  </head>

  <body>
  	<div id="Main">
<div id="Header">
  			<a href="<?php echo site_url(); ?>" title="<?php bloginfo('name') ?>">
          <?php //if (get_options('logoUrl')): ?>
            <!--<img src="<?php //echo get_options('logoUrl'); ?>" alt="<?php //bloginfo('name'); ?>" />-->
          <?php //else : ?>
            <span style="font-size:35px;margin-bottom: 13px;"><?php bloginfo('name'); ?></span><span><?php bloginfo('description') ?></span>
          <?php //endif ?>
        </a>
</div>

  	
<div id="Center">
<ul class="breadcrumb">
  <li <?php if(is_home()): ?> class="current"<?php endif; ?><?php if (is_single()): ?>class="active"<?php endif; ?>><a href="<?php site_url(); ?>">首页</a></li>
  <?php //if ($this->options->menuDisplay == 'page') { ?>
				<?php //$this->widget('Widget_Contents_Page_List')->to($pages); ?>
				<?php //while($pages->next()): ?>
				<!--<li <?php //if($this->is('page', $pages->slug)): ?> class="active"<?php //endif; ?>><a href="<?php //$pages->permalink(); ?>"><?php //$pages->title(); ?></a></li>
				<?php //endwhile; ?>
        <?php //} ?>
<?php //if ($this->options->menuDisplay == 'cat') { ?>
            <?php //$this->widget('Widget_Metas_Category_List')->to($categories); ?>
            <?php //while($categories->next()): ?>
                <li<?php //if($this->is('category', $categories->slug)): ?> class="active"<?php //endif; ?>><a href="<?php //$categories->permalink(); ?>"><?php //$categories->name(); ?></a></li>
            <?php //endwhile; ?>
<?php //} ?>
				<li><a href="<?php //$this->options->feedUrl(); ?>" class="menu-rss" target="_blank">订阅</a></li>
<form  style="display:inline;" class="form-search" action="/search" method="get" >
    <input  style="height:13px;width:120px;display:inline;color:#999;float:right" type="text" class="input-medium search-query"  name="s" value="回车以搜索..." onfocus="if (value =='回车以搜索...'){value =''}" onblur="if (value ==''){value='回车以搜索...'}" lang="zh-CN" >
    </form>-->
</ul><div id="bottom-bar"></div>
</div>
