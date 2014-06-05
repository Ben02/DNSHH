<?php if(isset($_POST['action'])&& $_POST['action'] == 'index_ajax_navi'){
  include(TEMPLATEPATH . '/index_list.php'); 
}else{
  if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
  get_header();
?>
<?php if (have_posts()) : ?>
	<div class="alert alert-info"><h4>搜索结果：<?php echo get_search_query() ?></h4></div>
	<div id="content">
	 <?php include(TEMPLATEPATH .'/index_list.php'); ?>
	</div>
<?php else: ?>
    <blockquote>没有搜索到与“<?php echo get_search_query() ?>”相关的内容<small>请更换关键词重新搜索</small></blockquote>
    <img style="display:block;margin:0 auto 0 auto" src="<?php echo get_template_directory_uri()?>/img/404.gif" />
<?php endif; ?>

<?php
	get_footer();
}
?>