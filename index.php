<?php 
 if(isset($_POST['action'])&& $_POST['action'] == 'index_ajax_navi'){
  include('index_list.php'); 
}
else
{
  if(strpos($_SERVER["PHP_SELF"],"themes"))
	  {
	  header('Location:/');
	  }
  get_header();
  }
?>
 <div id="content">
 <?php include('index_list.php'); ?>
</div>
<?php get_footer(); ?>
