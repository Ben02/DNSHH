// Lazyload
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(5($){$.J.L=5(r){8 1={d:0,A:0,b:"h",v:"N",3:4};6(r){$.D(1,r)}8 m=9;6("h"==1.b){$(1.3).p("h",5(b){8 C=0;m.t(5(){6(!$.k(9,1)&&!$.l(9,1)){$(9).z("o")}j{6(C++>1.A){g B}}});8 w=$.M(m,5(f){g!f.e});m=$(w)})}g 9.t(5(){8 2=9;$(2).c("s",$(2).c("i"));6("h"!=1.b||$.k(2,1)||$.l(2,1)){6(1.u){$(2).c("i",1.u)}j{$(2).K("i")}2.e=B}j{2.e=x}$(2).T("o",5(){6(!9.e){$("<V />").p("X",5(){$(2).Y().c("i",$(2).c("s"))[1.v](1.Z);2.e=x}).c("i",$(2).c("s"))}});6("h"!=1.b){$(2).p(1.b,5(b){6(!2.e){$(2).z("o")}})}})};$.k=5(f,1){6(1.3===E||1.3===4){8 7=$(4).F()+$(4).O()}j{8 7=$(1.3).n().G+$(1.3).F()}g 7<=$(f).n().G-1.d};$.l=5(f,1){6(1.3===E||1.3===4){8 7=$(4).I()+$(4).U()}j{8 7=$(1.3).n().q+$(1.3).I()}g 7<=$(f).n().q-1.d};$.D($.P[\':\'],{"Q-H-7":"$.k(a, {d : 0, 3: 4})","R-H-7":"!$.k(a, {d : 0, 3: 4})","S-y-7":"$.l(a, {d : 0, 3: 4})","q-y-7":"!$.l(a, {d : 0, 3: 4})"})})(W);',62,62,'|settings|self|container|window|function|if|fold|var|this||event|attr|threshold|loaded|element|return|scroll|src|else|belowthefold|rightoffold|elements|offset|appear|bind|left|options|original|each|placeholder|effect|temp|true|of|trigger|failurelimit|false|counter|extend|undefined|height|top|the|width|fn|removeAttr|lazyload|grep|show|scrollTop|expr|below|above|right|one|scrollLeft|img|jQuery|load|hide|effectspeed'.split('|'),0,{}));


// post.js  Ajax评论
jQuery(document).ready(function($) {
    var comments = $("#comments"), // 评论部分id
        loadingText = "\u8bc4\u8bba\u6570\u636e\u52a0\u8f7d\u4e2d\x2e\x2e\x2e", // 加载loading提示
        ajaxed = false;
    comments.on("click", ".page-navigator li a", function(e){
        e.preventDefault();
        var _this = $(this),
            _thisP = _this.parent();
        if(_thisP.hasClass('current') || ajaxed==true) return; // 判断是否是当前页面
        var _list = $('.comment-list'),
            url = _this.attr("href").replace("#comments", "") + "&action=ajax_comments";
        $.ajax({ // Ajax请求
            url: url,
            beforeSend: function() {
                _list.text(loadingText);
                ajaxed = true;
            },
            success: function(data) {
                comments.html(data);
                ajaxed = false;
            }
        });
        return false;
    });
});

// index_ajax_navi.js  Ajax加载、翻页
function reload(){
$('h3 a').click(function(){
    myloadoriginal = this.text;
    $(this).text('请稍等，正在努力加载中...');
    var myload = this;
    setTimeout(function() { 
        $(myload).text(myloadoriginal);
        }, 2011);
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
                jQuery('html, body').animate({scrollTop:$(content).offset().top - 100}, 'slow');
            }
        });
        return false;
    });
});


/* ==========================================================
 * bootstrap-alert.js v2.1.1
 * http://twitter.github.com/bootstrap/javascript.html#alerts
 * ==========================================================
 * Copyright 2012 Twitter, Inc.
 *
 * ========================================================== */
!function ($) {
  "use strict"; // jshint ;_;
  var dismiss = '[data-dismiss="alert"]'
    , Alert = function (el) {
        $(el).on('click', dismiss, this.close)
      }

  Alert.prototype.close = function (e) {
    var $this = $(this)
      , selector = $this.attr('data-target')
      , $parent

    if (!selector) {
      selector = $this.attr('href')
      selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') //strip for ie7
    }

    $parent = $(selector)

    e && e.preventDefault()

    $parent.length || ($parent = $this.hasClass('alert') ? $this : $this.parent())

    $parent.trigger(e = $.Event('close'))

    if (e.isDefaultPrevented()) return

    $parent.removeClass('in')

    function removeElement() {
      $parent
        .trigger('closed')
        .remove()
    }

    $.support.transition && $parent.hasClass('fade') ?
      $parent.on($.support.transition.end, removeElement) :
      removeElement()
  }


  $.fn.alert = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('alert')
      if (!data) $this.data('alert', (data = new Alert(this)))
      if (typeof option == 'string') data[option].call($this)
    })
  }

  $.fn.alert.Constructor = Alert

  $(function () {
    $('body').on('click.alert.data-api', dismiss, Alert.prototype.close)
  })

}(window.jQuery);

// Others
$(document).ready(function() {
    $('.post img').hover(
        function() {$(this).fadeTo("fast", 0.5);},
        function() {$(this).fadeTo("fast", 1.1);
    });
    $(".post p:has(img)").css("text-indent","0");
    
    // Scroll to top
    var scrollSpeed = 500;
    $('#gotop').hide();
    $(window).scroll(function () {      
        var scrollTop = $(document).scrollTop();    
        if (scrollTop > 150 ) {
            $('#gotop').fadeIn(); 
        }else{    
            $('#gotop').fadeOut();
        }
    });
    $('#gotop').click(function(){ 
    $('html,body').animate({scrollTop:0}, scrollSpeed); return false; 
    });
});

