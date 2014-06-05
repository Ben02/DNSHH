<?php 
if(isset($_POST['action'])&& $_POST['action'] == 'index_ajax_navi'){
	include(TEMPLATEPATH . '/index_list.php'); 
}else{
	if(strpos($_SERVER["PHP_SELF"],"themes")){
		header('Location:/');
	}
 	get_header();
	if(is_category()) {
?>
		<div class="alert alert-info"><h4><?php echo single_cat_title(); ?></h4></div>
<?php
	}elseif(is_tag()) {
?>
		<div class="alert alert-info"><h4><?php echo single_tag_title('', true); ?></h4></div>
<?php
	}
?>
	<div id="content">
	<?php include(TEMPLATEPATH . '/index_list.php'); ?>
	</div>
<?php 
	get_footer(); 
} 
?>