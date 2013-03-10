<?php if(isset($_POST['action'])&& $_POST['action'] == 'index_ajax_navi'){
  $this->need('index_list.php'); 
}else{
  if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
  $this->need('header.php'); ?>
<div class="alert alert-info"><h4><?php $this->archiveTitle('-', '', ''); ?></h4></div>
<div id="content">
 <?php $this->need('index_list.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
<?php }?>