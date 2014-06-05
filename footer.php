<div id="sidebar">
	<?php get_sidebar(); ?>
</div>
    <div id="copyr">      
      <blockquote class="pull-right">
  		<small>Copyright &copy;   <a title="<?php bloginfo('name') ?>" href="<?php bloginfo('siteurl')?>"><?php bloginfo('name') ?></a>  /  Theme by <a href="https://www.dnshh.com/" target="_blank">Hang</a> & <a href="http://ben-lab.com/" target="_blank">Ben</a>  /  <a title="自豪地采用WordPress" href="https://cn.wordpress.org" target="_blank">WordPress</a>  </small>
      </blockquote>
    </div>
</div>

<script src="http://cdn.bootcss.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/DNSHH.js"></script>
<script>
jQuery(function() {          
  jQuery("img").not("#respond_box img").lazyload({
    placeholder:"<?php bloginfo('template_url'); ?>/img/loading.gif",
      effect:"fadeIn"
  });
});
</script>
<a id="gotop"><img src="http://img170.poco.cn/mypoco/myphoto/20120429/14/61279828201204291423333116442926539_000.jpg" title="返回顶部" /></a>
<?php wp_footer(); ?>	
	</body>
</html>