<?php
/**
 * 主题特色：小清新，单栏，简洁，蓝白。
 * 
 * @package DNSHH
 * @author Ben
 * @version 1.2
 * @link http://me.ben-lab.com
 */
 
 if(isset($_POST['action'])&& $_POST['action'] == 'index_ajax_navi'){
  $this->need('index_list.php'); 
}else{
  if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
  $this->need('header.php');
 ?>
 <div id="content">
 <?php $this->need('index_list.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
<?php }?>