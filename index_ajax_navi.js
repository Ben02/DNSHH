function reload()
{
$('h3 a').click(function(){
myloadoriginal = this.text;
$(this).text('请稍等，正在努力加载中...');
var myload = this;
setTimeout(function() { $(myload).text(myloadoriginal); }, 2011);
});
}
reload();

var navi='.page-navigator'; //这是主题分页的容器
var navi_a='.page-navigator a'; //这是主题分页的链接
var content='#content';//这是主题文章内容的容器

$(document).ready(function index_ajax_navi (){
    $(navi_a).click(function() {
        var z = $(this).attr("href");
        $.ajax({
            url: z,
            type:"POST",
            data:"action=index_ajax_navi",
            beforeSend:function()
            {
                document.body.style.cursor = 'wait';
                var C=0.7;
                $(content).css({opacity:C,MozOpacity:C,KhtmlOpacity:C,filter:'alpha(opacity=' + C * 100 + ')'});                
                $(navi).html('<a>载入中...</a>');
            },
            error: function(request) 
            {
                alert(request.responseText);
            },          
            success: function (data)
            {
                $(content).html(data);                  
                document.body.style.cursor = 'auto';
                var C=1; 
                $(content).css({opacity:C,MozOpacity:C,KhtmlOpacity:C,filter:'alpha(opacity=' + C * 100 + ')'});
                //$body.animate({ scrollTop: '0px'}, 1000);
                index_ajax_navi();
                reload();//翻页后DOM变化了,需要重新绑定函数
                //$body.animate( { scrollTop: $(content).offset().top - 150}, 1000);
                //$body.animate({ scrollTop: '0px'}, 1000);
                jQuery('html, body').animate({scrollTop:$(content).offset().top - 100}, 'slow');
            }
        });
        return false;
        });
})