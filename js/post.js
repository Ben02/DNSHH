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
            url = _this.attr("href").replace("#comments", "") + "?action=ajax_comments";
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