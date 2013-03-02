<div id="sidebar">
	<?php $this->need('sidebar.php'); ?>
</div>
    <div id="copyr">      
      <blockquote class="pull-right">
  <small>Copyright &copy;   <a title="<?php $this->options->title() ?>" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>  /  Theme by <a href="https://www.dnshh.com/" target="_blank">Hang</a> & <a href="http://ben-lab.com/" target="_blank">Ben</a>  /  <a title="自豪地采用Typecho。" href="http://typecho.org" target="_blank">Typecho)))</a>  </small>
      </blockquote>
    </div>
</div>
 <script src="<?php $this->options->themeUrl(); ?>js/bootstrap.js"></script>
 <script src="<?php $this->options->themeUrl(); ?>js/bootstrap-alert.js"></script>
<script type="text/javascript">
$(function () {
$('.post img').hover(
function() {$(this).fadeTo("fast", 0.5);},
function() {$(this).fadeTo("fast", 1.1);
});
});
$(document).ready(function() {
$('h3 a').click(function(){
myloadoriginal = this.text;
$(this).text('请稍等，正在努力加载中...');
var myload = this;
setTimeout(function() { $(myload).text(myloadoriginal); }, 2011);
});
$(".post p:has(img)").css("text-indent","0");
});
</script>
<div data-widget="backtop"><script src="<?php $this->options->themeUrl(); ?>js/backtop.js" charset="utf-8"></script></div>
<?php $this->footer(); ?>	
	</body>
</html>