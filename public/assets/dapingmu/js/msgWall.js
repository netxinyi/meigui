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
        //播放列表按钮
        //翻第一页
        $('.ctn-player.ctn-player-first').click(function () {
            MW.models.msgWall.first();
        });
        //最后一页
        $('.ctn-player.ctn-player-last').click(function () {
            MW.models.msgWall.last();
        });

        /* 底部公告栏和控制面板轮询显示 */
        var footNoticeTimer;
        fadeShowNotice();
        function fadeShowNotice() {
            clearTimeout(footNoticeTimer);
            footNoticeTimer = setTimeout(function () {
                $('#footer .contrl-list').fadeOut("slow", function () {
                    $(this).hide();
                    $('#footer .notice').fadeIn("slow", function () {
                        $(this).show();
                        $("#footer .notice .notice-wrap").kxbdSuperMarquee({
                            isMarquee: true,
                            isEqual: false,
                            scrollDelay: 30,
                            direction: 'left'
                        });
                    });
                });

            }, 3000);
        }

        function fadeShowContrlList() {
            clearTimeout(footNoticeTimer);
            $('#footer .notice').fadeOut("slow", function () {
                $(this).hide();
                $('#footer .contrl-list').fadeIn("slow", function () {
                    $(this).show();
                });
            });
        }

        $('#footer').mouseenter(function () {
            fadeShowContrlList();

        }).mouseleave(function () {

            fadeShowNotice();
        });
        var headerNoticeInterval;

        function fadeChangeNotice() {
            headerNoticeInterval = setInterval(function () {
                var $active = $("#header .notice-list").find("li.active");
                var $li = $active.next();
                if ($li.length < 1) {
                    $li = $("#header .notice-list").find("li").first();
                }
                $active.fadeOut("slow", function () {
                    $li.fadeIn("slow", function () {
                        $li.addClass('active').siblings().removeClass('active');
                    });
                });
            }, 7000);
        }

        fadeChangeNotice();
        $("#header .notice-list").hover(function () {
            clearInterval(headerNoticeInterval);
        }, function () {
            fadeChangeNotice();
        });




        MW.models.msgWall.start();
    };

    window.MW = MW;
})();
(function (m) {
    m.models.msgWall = new msgWall();


    function msgWall(opt) {
        $.extend(true, this, {
            animate: 700,
            wrap: $('#message-wall .message-list'),
            detailElement: $("#message-wall .content-detail")

        }, opt);

        var parent = this;
        parent.detailElement.find(".close").click(function () {
            parent.detailElement.hide();
            parent.wrap.show();

        });
        return this;
    }

    $.extend(msgWall.prototype, {
        start: function () {
            var parent = this;
            this.requester = m.utils.requester('/weixin/messages');
            this.requester.onmessage = function (result) {
                parent.onmessage(JSON.parse(result.data));
            };
            return this;
        },
        stop: function () {
            this.requester.close();
            return this;
        },
        onmessage: function (data) {
            return this.add(data);
        },
        template: function (message) {

            return $('<li class="message-item" data-id="' + message.message_id + '"><div class="user-avatar"><img src="' + message.user.avatar + '" width="90" height="90" alt=""></div><div class="content-box"><p class="user-name">' + message.user.nickname + ':</p><p class="content">' + message.content + '</p></div><div class="content-more"><i class="arrow"></i></div></li>');

        },
        add: function (object) {

            if (!$.isArray(object)) {
                object = [object];
            }

            var parent = this;

            object.map(function (message) {

                var $item = parent.template(message);

                $item.appendTo(parent.wrap);

                $item.find('.content-more').click(function () {
                    parent.show(message);
                });
            });
            return this.last();
        },
        to: function (top) {
            this.wrap.animate({top: -top + "px"}, this.animate, "linear");
            return this;
        },
        first: function () {
            return this.to(0);
        },
        next: function () {
        },
        prev: function () {

        },
        last: function () {
            var top = this.wrap.height() - (3 * 183);

            return this.to(top > 0 ? top + 15 : 0);
        },
        show: function (message) {
            var parent = this;
            this.wrap.hide();
            this.detailElement.find(".user-avatar img").attr("src", message.user.avatar);
            this.detailElement.find(".user-name").html(message.user.nickname).next("span").html("来自" + (message.user.from || "微信"));
            this.detailElement.find(".detail-content").html(message.content);
            this.detailElement.show();
        }
    });



    window.msgWall = msgWall;
})(MW);
