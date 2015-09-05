/**
 * Created by Vicens on 15-9-5.
 */

(function () {

    var MW = {};
    MW.utils = {
        requester: function (url) {
            var event = new EventSource(url);
            event.onopen = function () {
                console.log("开始链接到服务器");
            };
            event.onerror = function () {
                event.close();
                alert("网络链接失败，请链接网络后重新刷新本页面");
                throw new Error("链接到服务器失败");
            };
            return event;
        },
        fullScrren: function () {
            var dom = $('#wrap').get(0);
            var rfs = dom.requestFullScreen || dom.webkitRequestFullScreen || dom.mozRequestFullScreen || dom.msRequestFullScreen;

            if (typeof rfs != "undefined" && rfs) {
                rfs.call(dom);
            } else if (typeof window.ActiveXObject != "undefined") {
// for Internet Explorer
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript != null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }
    };
    MW.models = {};

    MW.start = function () {
        //全屏点击事件
        $('.contrl-list .ctn.ctn-full').click(function () {
            MW.utils.fullScrren();
        });
        //应用列表按钮
        $('.popup.app-list').attr("tabindex", "99");
        $('.contrl-list .ctn.ctn-menu').click(function () {

            $('.popup.app-list').show();
            $('.popup.app-list').focus();
        });

        $('.popup.app-list').blur(function () {
            $(this).hide();
        });
        MW.models.msgWall.start();
    };

    window.MW = MW;
})();
(function (m) {
    m.models.msgWall = new msgWall();


    function msgWall() {
        this.animate = null;

    }

    msgWall.prototype.start = function () {
        this.requester = m.utils.requester('/weixin/messages');
        this.requester.onmessage = this.onmessage;
    };
    msgWall.prototype.stop = function () {
        this.requester.close();
    };
    msgWall.prototype.onmessage = function (message) {
        var data = JSON.parse(message.data);
        msgWall.prototype.addMsg(data);

    };
    msgWall.prototype.addMsg = function (object) {
        if (!$.isArray(object)) {
            object = [object];
        }
        object.map(function (message) {
            var item = '<li class="message-item"><div class="user-avatar"><img src="' + message.user.avatar + '" width="90" height="90" alt=""></div><div class="content-box"><p class="user-name">' + message.user.nickname + ':</p><p class="content">' + message.content + '</p></div><div class="content-more"><i class="arrow"></i></div></li>';
            $('#message-wall .message-list').append($(item));
        });

        var top = parseFloat($('#message-wall .message-list').css('top'));
        $('#message-wall .message-list').animate({top: top - (183 * object.length) + "px"});

    };


    window.msgWall = msgWall;
})(MW);
