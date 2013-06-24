<!DOCTYPE html>
<html lang="zh-CN">
  <head>
  	<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('-',true,'right'); ?><?php bloginfo('name');?></title>
    <?php if (is_single()): ?>
    <link rel="canonical" href="<?php get_permalink() ?>" />
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" href=" <?php echo get_stylesheet_uri();?>">
    <link rel="stylesheet" type="text/css" href=" <?php bloginfo('template_url'); ?>/bootstarp.css">
    <?php wp_head(); ?>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lazyload/lazyload.js"></script>
    <script type="text/javascript">
  jQuery(function() {          
      jQuery("img").not("#respond_box img").lazyload({
          placeholder:"<?php bloginfo('template_url'); ?>/lazyload/loading.gif",
            effect:"fadeIn"
          });
      });
</script>
  </head>

  <body>
  	<div id="Main">
<div id="Header">
  			<a href="<?php echo site_url(); ?>" title="<?php bloginfo('name') ?>">
          <?php if (of_get_option('logourl','')): ?>
            <img src="<?php echo of_get_option('logourl',''); ?>" alt="<?php bloginfo('name'); ?>" />
          <?php else : ?>
            <span style="font-size:35px;margin-bottom: 13px;"><?php bloginfo('name'); ?></span><span><?php bloginfo('description') ?></span>
          <?php endif ?>
        </a>
</div>

  	
<div id="Center">
<ul class="breadcrumb">
  <li <?php if(is_home()): ?> class="current"<?php endif; ?><?php if (is_single()): ?>class="active"<?php endif; ?>><a href="<?php bloginfo('siteurl') ?>">首页</a></li>
  <?php if (of_get_option('menudisplay','page') == 'page') { ?>
			<?php wp_list_pages('depth=1&title_li=&sort_column=menu_order'); ?>
        <?php } ?>
<?php if (of_get_option('menudisplay','page') == 'cat') { ?>
            <?php wp_list_categories('depth=1&title_li=&show_count=0&hide_empty=0&child_of=0'); ?>
		<?php } ?>
				<li><a href="<?php bloginfo('rss2_url'); ?>" class="menu-rss" target="_blank">订阅</a></li>
<form  style="display:inline;" class="form-search" action="<?php echo home_url( '/' )?>" method="get" >
    <input  style="height:13px;width:120px;display:inline;color:#999;float:right" type="text" class="input-medium search-query"  name="s" value="回车以搜索..." name="s" onfocus="if (value =='回车以搜索...'){value =''}" onblur="if (value ==''){value='回车以搜索...'}" lang="zh-CN" >
    </form>
</ul><div id="bottom-bar"></div>
</div>
