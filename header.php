<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title('-',true,'right'); ?><?php bloginfo('name');?></title>
<?php if (is_single()): ?>
<link rel="canonical" href="<?php get_permalink() ?>" />
<?php endif; ?>
<link href="http://cdn.bootcss.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href=" <?php echo get_stylesheet_uri();?>">
<script src="http://libs.baidu.com/jquery/1.8.2/jquery.min.js"></script>
<?php wp_head(); ?>
<script type="text/javascript">
// Lazyload
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(5($){$.J.L=5(r){8 1={d:0,A:0,b:"h",v:"N",3:4};6(r){$.D(1,r)}8 m=9;6("h"==1.b){$(1.3).p("h",5(b){8 C=0;m.t(5(){6(!$.k(9,1)&&!$.l(9,1)){$(9).z("o")}j{6(C++>1.A){g B}}});8 w=$.M(m,5(f){g!f.e});m=$(w)})}g 9.t(5(){8 2=9;$(2).c("s",$(2).c("i"));6("h"!=1.b||$.k(2,1)||$.l(2,1)){6(1.u){$(2).c("i",1.u)}j{$(2).K("i")}2.e=B}j{2.e=x}$(2).T("o",5(){6(!9.e){$("<V />").p("X",5(){$(2).Y().c("i",$(2).c("s"))[1.v](1.Z);2.e=x}).c("i",$(2).c("s"))}});6("h"!=1.b){$(2).p(1.b,5(b){6(!2.e){$(2).z("o")}})}})};$.k=5(f,1){6(1.3===E||1.3===4){8 7=$(4).F()+$(4).O()}j{8 7=$(1.3).n().G+$(1.3).F()}g 7<=$(f).n().G-1.d};$.l=5(f,1){6(1.3===E||1.3===4){8 7=$(4).I()+$(4).U()}j{8 7=$(1.3).n().q+$(1.3).I()}g 7<=$(f).n().q-1.d};$.D($.P[\':\'],{"Q-H-7":"$.k(a, {d : 0, 3: 4})","R-H-7":"!$.k(a, {d : 0, 3: 4})","S-y-7":"$.l(a, {d : 0, 3: 4})","q-y-7":"!$.l(a, {d : 0, 3: 4})"})})(W);',62,62,'|settings|self|container|window|function|if|fold|var|this||event|attr|threshold|loaded|element|return|scroll|src|else|belowthefold|rightoffold|elements|offset|appear|bind|left|options|original|each|placeholder|effect|temp|true|of|trigger|failurelimit|false|counter|extend|undefined|height|top|the|width|fn|removeAttr|lazyload|grep|show|scrollTop|expr|below|above|right|one|scrollLeft|img|jQuery|load|hide|effectspeed'.split('|'),0,{}));
jQuery(function() {          
  jQuery("img").not("#respond_box img").lazyload({
    placeholder:"<?php bloginfo('template_url'); ?>/img/loading.gif",
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
        <?php 
          if (of_get_option('menudisplay','page') == 'page'){
            wp_list_pages('depth=1&title_li=&sort_column=menu_order'); 
          }
          if (of_get_option('menudisplay','page') == 'cat') {
            wp_list_categories('depth=1&title_li=&show_count=0&hide_empty=0&child_of=0');
          } 
        ?>
      	<li><a href="<?php bloginfo('rss2_url'); ?>" class="menu-rss" target="_blank">订阅</a></li>
        <form style="display:inline;" class="form-search" action="<?php echo home_url( '/' )?>" method="get" >
          <input style="height:13px;width:120px;display:inline;color:#999;float:right" type="text" class="input-medium search-query" name="s" value="回车以搜索..." name="s" onfocus="if (value =='回车以搜索...'){value =''}" onblur="if (value ==''){value='回车以搜索...'}" lang="zh-CN" >
        </form>
      </ul>
      <div id="bottom-bar"></div>
    </div>