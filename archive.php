<?php if(isset($_POST['action'])&& $_POST['action'] == 'index_ajax_navi'){
  include('index_list.php'); 
}else{
  if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
  get_header(); ?>
<div class="alert alert-info"><h4><?php $this->archiveTitle('-', '', ''); ?></h4></div>
<div id="content">
 <?php include('index_list.php'); ?>
</div>
<?php get_footer(); ?>
<?php }?>