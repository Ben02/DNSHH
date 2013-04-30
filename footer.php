<div id="sidebar">
	<?php //get_sidebar(); ?>
</div>
    <div id="copyr">      
      <blockquote class="pull-right">
  <small>Copyright &copy;   <a title="<?php bloginfo('name') ?>" href="<?php bloginfo('siteurl')?>"><?php bloginfo('name') ?></a>  /  Theme by <a href="https://www.dnshh.com/" target="_blank">Hang</a> & <a href="http://ben-lab.com/" target="_blank">Ben</a>  /  <a title="自豪地采用WordPress" href="https://cn.wordpress.org" target="_blank">WordPress</a>  </small>
      </blockquote>
    </div>
</div>
<?php if (is_single() or is_page()) : ?>
	<script src="<?php bloginfo('template_url'); ?>/js/post.js"></script>
<?php else: ?>
    <script src="<?php bloginfo('template_url'); ?>/index_ajax_navi.js"></script>
<?php endif ?>
 <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>
 <script src="<?php bloginfo('template_url'); ?>/js/bootstrap-alert.js"></script>
<script type="text/javascript">
$(function () {
$('.post img').hover(
function() {$(this).fadeTo("fast", 0.5);},
function() {$(this).fadeTo("fast", 1.1);
});
});
$(document).ready(function() {
$(".post p:has(img)").css("text-indent","0");
});
</script>
<div data-widget="backtop"><script src="<?php bloginfo('template_url'); ?>/js/backtop.js" charset="utf-8"></script></div>
<?php wp_footer(); ?>	
	</body>
</html>