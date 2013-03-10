<?php if(isset($_POST['action'])&& $_POST['action'] == 'index_ajax_navi'){
  $this->need('index_list.php'); 
}else{
  if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
  $this->need('header.php'); ?>
<?php if ($this->have()): ?>
<div class="alert alert-info"><h4><?php $this->archiveTitle(' &lt; ','',''); ?></h4></div>
<div id="content">
 <?php $this->need('index_list.php'); ?>
</div>
    <?php else: ?>
        <blockquote>没有搜索到与“<?php $this->archiveTitle(' &lt; ','',''); ?>”相关的内容
          <small>请更换关键词重新搜索</small></blockquote>
<img style="display:block;margin:0 auto 0 auto" src="<?php $this->options->themeUrl(); ?>img/404.gif" />
      <?php endif; ?>

<?php $this->need('footer.php'); ?>
<?php }?>