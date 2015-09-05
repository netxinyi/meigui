/**
 * alltosun.com wxscreen.min.js
 * ============================================================================
 * 版权所有 (C) 2009-2014 北京互动阳光科技有限公司，并保留所有权利。
 * 网站地址: http://www.alltosun.com
 * ----------------------------------------------------------------------------
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * @author liw@alltosun.com
 */
!function (t) {
    function e(t, e) {
        return t && t.length ? parseInt($.css(t[0], e)) || 0 : 0
    }

    function i(t) {
        return t && t.length ? t[0].offsetWidth + e(t, "marginLeft") + e(t, "marginRight") : 0
    }

    function s(t) {
        return t && t.length ? t[0].offsetHeight + e(t, "marginTop") + e(t, "marginBottom") : 0
    }

    if (!t.wxscreen) {
        var n = t.wxscreen = {_initialized: !1, _config: {}, _music: {}, _state: "message"};
        n.DEBUG = !0;
        var r = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", o = 0, l = {}, a = ["message", "messageDetail", "lottery", "ddp", "vote", "checkin", "app"], d = "message";
        n.init = function (t) {
            return this._config = $.extend({}, t), this._config.template && this._config.visibleNum && this._config.autoTime && this._config.stepTime && this._config.domain && this._config.siteUrl && this._config.companyId && this._config.timerColorMap || this.throwErr("in wxscreen.init config params is empty"), this._initialized = !0, this
        }, n.getConf = function (t) {
            return this._initialized || this.throwErr("in func wxscreen.getConf wxscreen is not _initialized"), "string" == typeof t && t || this.throwErr("in func wxscreen.getConf name is empty or not string type"), "undefined" != typeof this._config[t] ? this._config[t] : void this.throwErr("in func wxscreen.getConf config[" + t + "] is not exists")
        }, n.setConf = function (t, e) {
            return "string" == typeof t && t || this.throwErr("in func wxscreen.getConf name is empty or not string type"), "undefined" == typeof this._config[t] && this.throwErr("in func wxscreen.getConf config[" + t + "] is not exists"), this._config[t] = e, this
        }, n.getStartState = function () {
            return d
        }, n.setStartState = function (t) {
            d = t
        }, n.isAdmin = function () {
            return this._initialized || this.throwErr("in func wxscreen.isAdmin wxscreen is not _initialized"), this._config.isAdmin
        }, n.url = function (t) {
            this._initialized || this.throwErr("in func wxscreen.url wxscreen is not _initialized");
            var t = this._config.siteUrl + "/" + this._config.domain + "/" + t;
            sysConfig.urlSkin && (t = t.indexOf("?") > -1 ? t + "&skin=" + sysConfig.urlSkin : t + "?skin=" + sysConfig.urlSkin);
            var e = this.getState();
            return t.indexOf("?") > -1 ? t + "&state=" + e : t + "?state=" + e
        }, n.registerState = function (e, i) {
            return -1 != this.inArray(e, a, !0) ? (t.throwErr("state has been registered: ", e), !1) : (a.push(e), this[e] = i, this)
        }, n.getStateList = function () {
            return $.extend([], a)
        }, n.getState = function () {
            return this._state
        }, n.setState = function (t) {
            return -1 != this.inArray(t, a, !0) ? (this._state && this[this._state] && this[this._state].off && this[this._state].off(), this._state = t, this[this._state] && this[this._state].on && this[this._state].on(), "ddp" == this.getState() || "lottery" == this.getState() || "messageDetail" == this.getState() ? $(".scrollBox").css({visibility: "hidden"}) : $(".scrollBox").css({visibility: "visible"}), this.pub && this.pub("screenStateChange", {state: t}), !0) : !1
        }, n.fontNum = function (t) {
            if (!t || !t.length)return 0;
            var e = 0, i = /[\u4E00-\u9FA5\uF900-\uFA2D]/g, s = /[\uFF00-\uFFEF]|[\u3000-\u303F]|[\u2E80-\u2EFF]|[\u31C0-\u31EF]|[\u2F00-\u2FDF]|[\u2FF0-\u2FFF]|[\u3100-\u312F]|[\u31A0-\u31BF]|[\uFE10-\uFE1F]|[\uFE30-\uFE4F]/g, n = /[A-Za-z]/g, r = 1.1, o = t.match(i);
            return o && (e += o.length, t = t.replace(i, "")), o = t.match(s), o && (e += o.length, t = t.replace(s, "")), o = t.match(n), o && (e += o.length * r / 2, t = t.replace(n, "")), e += t.length * r / 2, Math.ceil(e)
        }, n.loop = function () {
        }, n.showMsg = function (t, e, i, s) {
            alert(t)
        }, n.randomStr = function (t) {
            if (isNaN(t))return "";
            for (var e = "", i = 0; t > i; i++) {
                var s = this.rand(0, 61);
                e += r.charAt(s)
            }
            return e
        }, n.trim = function (t, e) {
            return e ? this.rtrim(this.ltrim(t, e), e) : t.replace(/(^\s*)|(\s*$)/g, "")
        }, n.ltrim = function (t, e) {
            if (t = String(t), !e)return t.replace(/(^\s*)/g, "");
            e = String(e);
            var i = t.charAt(0);
            return -1 != e.indexOf(i) ? (t = t.substr(1), 0 == t.length ? t : this.ltrim(t, e)) : t
        }, n.rtrim = function (t, e) {
            if (t = String(t), !e)return t.replace(/(\s*$)/g, "");
            e = String(e);
            var i = t.charAt(t.length - 1);
            return -1 != e.indexOf(i) ? (t = t.substr(0, t.length - 1), 0 == t.length ? t : this.rtrim(t, e)) : t
        }, n.rand = function (t, e) {
            return Math.floor(Math.random() * (e - t + 1)) + t
        }, n.isNull = function (t) {
            return t || "object" != typeof t ? !1 : !0
        }, n.inArray = function (t, e, i) {
            if (e instanceof Array || this.throwErr("function wxs.inArray param two is not a Array type", "TypeError"), i && Array.prototype.indexOf)return e.indexOf(t);
            for (var s = 0; s < e.length; s++) {
                if (i && t === e[s])return s;
                if (t == e[s])return s
            }
            return -1
        }, n.log = function () {
            return this.DEBUG && arguments.length ? void(window.console && console.log && console.log.apply && (console.log("========= log start ========="), console.log.apply(console, Array.prototype.slice.call(arguments, 0, arguments.length)), console.log(" "))) : !1
        }, n.throwErr = function (t, e) {
            ("string" != typeof t || e && "string" != typeof e) && (this.log("function wxs.throwErr params", t, e), this.throwErr("wxs.throwErr function error: params TypeError", "TypeError"));
            try {
                switch (e) {
                    case"SyntaxError":
                        throw new SyntaxError(t);
                    case"TypeError":
                        throw new TypeError(t);
                    case"URIError":
                        throw new URIError(t);
                    case"ReferenceError":
                        throw new ReferenceError(t);
                    case"RangeError":
                        throw new RangeError(t);
                    case"EvalError":
                        throw new EvalError(t);
                    default:
                        throw new Error(t)
                }
            } catch (i) {
                throw window.console && console.trace && console.trace(), i
            }
        }, n.preLoadAvatar = function (t) {
            this.loadImage(t)
        }, n.loadImage = function (t, e, i) {
            if (t) {
                if ("undefined" == typeof i && (i = document.createElement("img")), i.src = t, i.complete)return void(e && e(null, t, i));
                i.onload = function () {
                    i.onload = null, e && e(null, t, i)
                }, i.onerror = function () {
                    e && e("loadimage-error:" + t, null)
                }
            }
        }, n.btnLoading = function (t, e) {
            "show" == e ? (t.attr("data-disabled", "yes"), t.children("span").hide().siblings("img").show()) : (t.attr("data-disabled", "no"), t.children("span").show().siblings("img").hide())
        }, n.uniqueInsert = function (t, e, i) {
            return e instanceof Array || this.throwErr("wxscreen.uniqueInsert arr is not Array"), -1 != this.inArray(t, e) ? !1 : (i = i || "push", "push" == i ? (e.push(t), !0) : "unshift" == i ? (e.unshift(t), !0) : !1)
        }, n.deleteByElem = function (t, e) {
            var i = this.inArray(t, e);
            return i >= 0 ? (e.splice(i, 1), !0) : !1
        }, n.cid = function () {
            return ++o
        }, n.counter = function (e, i) {
            "string" == typeof e && e || t.throwErr("wxs.counter name is not a string type or empty", e);
            var s = typeof i;
            return "undefined" == s ? ("undefined" == typeof l[e] && (l[e] = 0), ++l[e]) : (l[e] = 0, !0)
        }, n.parseVisibleTime = function (t) {
            var e = this.getConf(t + "VisibleTime");
            if (!e)return this.DEBUG && this.log("wxs.parseVisibleTime error: ", t + "VisibleTime"), !1;
            if (e.latest_hour > 0) {
                var i = new Date;
                return [i.getTime() - 3600 * e.latest_hour * 1e3, Date.parse(this._generateDateStr("2099-01-01 00:00:00"))]
            }
            return e.start_time ? [Date.parse(this._generateDateStr(e.start_time)), Date.parse(this._generateDateStr(e.end_time))] : [0, Date.parse(this._generateDateStr("2099-01-01 00:00:00"))]
        }, n._generateDateStr = function (t) {
            return t.replace(/\-/g, "/")
        }, n.autoSizeTheme = function () {
            var t, e, i = this, s = this.getConf("showCampusLogo"), n = this.getConf("isV6"), r = s ? 300 : 338;
            return $.each($(".themeBox"), function () {
                if (e = $(this), t = $.trim(e.html()), !t)return !1;
                if (t.indexOf("<br>") > -1 || t.indexOf("<br/>") > -1 || t.indexOf("<br />") > -1)return s && e.css({"font-size": "23px"}), !0;
                if (!n)return !0;
                var o = i.fontNum(t);
                if (o > 14)return s && e.css({"font-size": "23px"}), !0;
                var l = r / o;
                l > 46 && (l = 46), e.css({"line-height": "86px", "font-size": l + "px"})
            }), !0
        }, n.autoCenterLogo = function () {
            if (this.getConf("showCampusLogo") && !this.getConf("customLogo"))return this.DEBUG && this.log("showCampusLogo true, ig."), !1;
            this.getConf("showCampusLogo") && $(".logo-t").css({padding: 0, width: "220px", height: "96px"});
            var t = 220, e = 96, i = $(".logoScreenLeft"), s = i.attr("src");
            this.loadImage(s, function (s, n, r) {
                var o = r.width, l = r.height, a = l, d = o, h = 0, u = 0;
                a > e && (a = e, d = o / l * e), d > t && (d = t, a = l / o * t), t > d && (h = (t - d) / 2), e > a && (u = (e - a) / 2), i.css({
                    position: "relative",
                    width: d + "px",
                    height: a + "px",
                    left: h + "px",
                    top: u + "px"
                })
            })
        }, n.initNetworkState = function () {
            var t = null, e = this;
            this.sub("network.disconnected", function (i) {
                e.getConf("isV6") && (t || (t = setInterval(function () {
                    $(".btnNetwork").show().toggleClass("btn-wifi-disable")
                }, 200)))
            }), this.sub("network.ok", function () {
                e.getConf("isV6") && t && (clearInterval(t), t = null, setTimeout(function () {
                    $(".btnNetwork").hide()
                }, 210))
            }), window.onbeforeunload = function () {
                wxscreen.subLock(!0)
            }
        }, n.hashTrigger = function () {
            var t = window.location.hash;
            switch (t) {
                case"#trigger_ddp":
                    $(".btnDdp").trigger("click");
                    break;
                case"#trigger_lottery":
                    $(".btnLottery").trigger("click");
                    break;
                case"#trigger_vote":
                    $(".btnVote").trigger("click");
                    break;
                case"#trigger_skin_free_show":
                    $(".btnSkinSel").trigger("click"), setTimeout(function () {
                        $(".skinNavList li[data-id='0']").trigger("click")
                    }, 200);
                    break;
                case"#trigger_checkin":
                    $(function () {
                        setTimeout(function () {
                            $(".btnCheckin").trigger("click")
                        }, 1200)
                    });
                    break;
                case"#trigger_shake":
                    $(".btnShake").trigger("click");
                    break;
                default:
                    if (-1 != t.indexOf("trigger_key")) {
                        var e = t.replace("#trigger_key_", "");
                        n.pub("key." + e + ".down", {from: "hashTrigger"})
                    } else t && n.pub("main.hashTrigger", t)
            }
        }, n._css = function (t, i) {
            return e(t, i)
        }, n._width = function (t) {
            return i(t)
        }, n._height = function (t) {
            return s(t)
        }, n.addMusic = function (t) {
            var e = t.id;
            e || this.throwErr("wxs.addMusic failed: conf.id empty");
            var i = this;
            return this._soundManagerReady ? this._music[e] = soundManager.createSound(t).load() : this.subOnce("soundManager.ready", function () {
                i._music[e] = soundManager.createSound(t).load()
            }), this
        }, n.music = function (e) {
            return this._music[e] ? this._music[e] : (t.log("music not added: id"), null)
        }
    }
}(window), function (t) {
    if (!t.template) {
        var e = t.template = {}, i = {};
        e.getAll = function () {
            return $.extend({}, i)
        }, e.add = function (e, s) {
            return e && "undefined" != typeof s || t.throwErr("template.add failed: param empty"), i[e] = s, this
        }, e.get = function (t) {
            return i[t]
        }
    }
}(wxscreen), function (t) {
    if ("undefined" != typeof t.indexedDB)return !1;
    var e = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
    return e ? void(t.indexedDB = !0) : (t.DEBUG && t.log("indexedDB not support"), t.indexedDB = !1, !1)
}(wxscreen), function (t) {
    function e(t) {
        for (var e = {}, i = 0; i < t.length; i++)e[t[i]] = null;
        return {channel: t, callback: [], data: e, fired: []}
    }

    function i(e) {
        return "string" != typeof e && t.throwErr("wxscreen.sub params error: channel is not a string type"), e = t.trim(t.trim(e), ","), e || t.throwErr("wxscreen.sub params error: channel is empty."), -1 != e.indexOf(",") && (e = e.replace(/\s+/g, "")), e
    }

    if (t.sub)return !1;
    var s = {}, n = {}, r = !1;
    t.pub = function (e, o) {
        if (e = i(e), r)return t.DEBUG && t.log("in g.pub eventBlocked"), !1;
        if (-1 != e.indexOf(","))for (var l = e.split(","), a = 0; a < l.length; a++)t.pub(l[a], o); else {
            if (s[e])for (var a = 0; a < s[e].length; a++)isNaN(s[e][a].times) ? s[e][a].callback(e, o) : (s[e][a].times-- > 0 && s[e][a].callback(e, o), s[e][a].times <= 0 && (s[e].splice(a, 1), a--));
            for (var d in n)if (-1 != t.inArray(e, n[d].channel) && (t.uniqueInsert(e, n[d].fired), n[d].data[e] = o, n[d].channel.length == n[d].fired.length)) {
                for (var h = 0; h < n[d].callback.length; h++)isNaN(n[d].callback[h].times) ? n[d].callback[h].callback(n[d].channel, n[d].data) : (n[d].callback[h].times-- > 0 && n[d].callback[h].callback(n[d].channel, n[d].data), n[d].callback[h].times <= 0 && (n[d].callback.splice(h, 1), h--));
                n[d].data = {}, n[d].fired = []
            }
        }
        return !0
    }, t.sub = function (r, o, l) {
        if (r = i(r), -1 != r.indexOf(" ")) {
            var a, d;
            a = r.replace(/\s+/g, " ").split(" ").sort(), d = a.join(","), n[d] || (n[d] = e(a)), n[d].callback.push({
                callback: o,
                times: l
            })
        } else if (-1 != r.indexOf(","))for (var a = r.split(","), h = 0; h < a.length; h++)t.sub(a[h], o); else s[r] || (s[r] = []), s[r].push({
            callback: o,
            times: l
        });
        return !0
    }, t.unSub = function (t, e) {
        if (t = i(t), -1 != t.indexOf(" ")) {
            var r = t.replace(/\s+/g, " ").split(" ").sort().join(",");
            if (n[r])if (e)for (var o = 0; o < n[r].callback.length; o++)n[r].callback[o].callback === e && (n[r].callback.splice(o, 1), o--); else n[r] = void 0, delete n[r]
        } else if (s[t])if (e)for (var o = 0; o < s[t].length; o++)s[t][o].callback === e && (s[t].splice(o, 1), o--); else s[t] = void 0, delete s[t];
        return !0
    }, t.subOnce = function (t, e) {
        return this.sub(t, e, 1)
    }, t.subLock = function (t) {
        return r = t ? !0 : !1, this
    }, t._getSubscribeData = function () {
        return {_callbackList: s, _andCallbackList: n, _lock: r}
    }
}(wxscreen), function (t) {
    function e(t) {
        var e = typeof t;
        return "string" != e && "number" != e ? !1 : t ? !0 : !1
    }

    if (!t.MemoryStorage) {
        t.MemoryStorage = function () {
            this.clear()
        };
        var i = t.MemoryStorage.prototype;
        i.setItem = function (t, i) {
            return e(t) ? (this._store[t] = i, !0) : !1
        }, i.getItem = function (t) {
            return e(t) ? this._store[t] : null
        }, i.removeItem = function (t) {
            return e(t) ? (delete this._store[t], !0) : !1
        }, i.clear = function (t) {
            return t = t || {}, this._store = t, !0
        }
    }
}(wxscreen), function (t) {
    function e(t) {
        return !0
    }

    function i() {
        for (var t = [], e = 0; e < localStorage.length; e++)t.push(localStorage.key(e));
        return t
    }

    if (!t.Storage && (t.MemoryStorage || window.localStorage)) {
        var s = "undefined" != typeof t.MemoryStorage, n = {};
        t.Storage = function (e, i) {
            this._ns = this._defNs = "An", this._nsInitialized = !1, this._type = "memory" == e ? "memory" : "storage", this._isMemory = "memory" == this._type, "storage" != this._type || window.localStorage || (this._type = "memory", this._isMemory = !0), this._isMemory && !s && t.throwErr("wxscreen.MemoryStorage not initialized"), this._s = null, i && this.NS(i)
        };
        var r = t.Storage.prototype;
        r.NS = function (e) {
            return this._nsInitialized ? this : ("string" != typeof e && "number" != typeof e && t.throwErr("func s.NS param is not a string type", "TypeError"), e += "", -1 != e.indexOf(":") && t.throwErr('func s.NS param include char ":"', "SyntaxError"), e ? this._ns += ":" + e : this._ns = this._defNs, this._isMemory ? n[this._ns] ? this._s = n[this._ns] : this._s = n[this._ns] = new t.MemoryStorage : this._s = localStorage, this._nsInitialized = !0, this)
        }, r._getNSList = function () {
            return n
        }, r.set = function (e, i) {
            return this._nsInitialized || t.throwErr("sp.NS: NS failed ns not initialized"), "string" != typeof e && "number" != typeof e && t.throwErr("func s.set param is not a string type", "TypeError"), e += "", -1 != e.indexOf(":") && t.throwErr('func s.set param include char ":"', "SyntaxError"), e || t.throwErr("func s.set param key is empty", "TypeError"), this._isMemory || "object" != typeof i || (i = JSON.stringify(i)), this._isMemory || (e = this._ns + ":" + e), this._s.setItem(e, i), this
        }, r.get = function (e) {
            ("string" != typeof e && "number" != typeof e || !e) && (t.log("sp.get key", e), t.throwErr("func s.get param is not a string type or is empty", "TypeError")), this._isMemory || (e = this._ns + ":" + e);
            var i = this._s.getItem(e);
            return this._isMemory || !i || "string" != typeof i || 0 != i.indexOf("{") && 0 != i.indexOf("[") || (i = JSON.parse(i)), i
        }, r["delete"] = function (e) {
            return ("string" != typeof e && "number" != typeof e || !e) && t.throwErr("func s.set param is not a string type or is empty", "TypeError"), this._isMemory || (e = this._ns + ":" + e), this._s.removeItem(e), this
        }, r.deleteNs = function (t) {
            if (this._isMemory)return this._s.clear(t), !0;
            for (var i = this.getNSKeys(), s = 0; s < i.length; s++)this._s.removeItem(i[s]), e(i[s]);
            return !0
        }, r.getNSKeys = function () {
            if (this._isMemory)return !1;
            for (var t = i(), e = [], s = 0; s < t.length; s++)0 == t[s].indexOf(this._ns) && e.push(t[s]);
            return e
        }
    }
}(wxscreen), function (t) {
    if (!t.LinkList) {
        t.Storage || t.throwErr("LinkList module depend on Storage module"), t.LinkList = function (i) {
            "object" != typeof i && t.throwErr("LinkList param is not a Object type", "TypeError"), this._storeType = e[i.storeType], ("undefined" == typeof this._storeType || this._storeType < 0) && t.throwErr("LinkList param storeType is undefined", "TypeError"), this._storeName = i.storeType, this._name = "string" == typeof i.name && i.name ? i.name : t.throwErr("LinkList param name is undefined", "TypeError"), this._unique = "string" == typeof i.unique && i.unique ? i.unique : null, 1 == this._storeType && ("memoryStorage" == this._storeName ? this._storage = new t.Storage("memory", "l-" + this._name) : this._storage = new t.Storage("storage", "l-" + this._name)), this._init_head(), this._init_length()
        };
        var e = {memory: 0, storage: 1, memoryStorage: 1}, i = t.LinkList.prototype;
        i._init_head = function () {
            var t;
            return 0 == this._storeType ? t = this._generateElem("head") : 1 == this._storeType && (t = this._storage.get("headElem"), t || (t = this._generateElem("head"), this._storage.set("headElem", t))), this._head = t, t
        }, i.checkUnique = function (t) {
            if (this._unique && t[this._unique]) {
                var e = {};
                e[this._unique] = t[this._unique];
                var i = this.search(e);
                if (i)return !1
            }
            return !0
        }, i.insertAfterIndex = function (e, i) {
            this.checkUnique(e) || t.throwErr("in lp.insertAfter unique check failed " + JSON.stringify(e));
            var s = this._generateElem(e);
            0 > i && t.throwErr("List insertAfter failed: index < 0", "Error");
            var n = this.length();
            i > n && t.throwErr("List insertAfter failed: index > List length", "Error");
            var r = !1, o = this.getElemByIndex(i), l = this.getElemByPointer(o.next);
            return s.prev = o.cid, s.next = l ? l.cid : "", l ? l.prev = s.cid : (this._head.prev = s.cid, r = !0), o.next = s.cid, r ? this._saveChanged(o, s, l, this._head) : this._saveChanged(o, s, l), this._lengthHandler(1), this.length()
        }, i.push = function (t) {
            return this.insertAfterIndex(t, this.length())
        }, i.unshift = function (t) {
            return this.insertAfterIndex(t, 0)
        }, i.deleteByIndex = function (e) {
            (1 > e || e > this.length()) && t.throwErr("func lp.deleteByIndex param index is overflow.", "Error");
            var i = this.getElemByIndex(e), s = this.getElemByPointer(i.prev), n = this.getElemByPointer(i.next), r = !1;
            return n ? (s.next = n.cid, n.prev = s.cid) : (s.next = "", this._head.prev = s.cid, r = !0), r ? this._saveChanged(s, n, this._head) : this._saveChanged(s, n), this._remove(i), this._lengthHandler(-1), i
        }, i.deleteByCid = function (t) {
            var e = this.getElemByPointer(t);
            if (!e)return !1;
            var i = this.getElemByPointer(e.prev), s = this.getElemByPointer(e.next), n = !1;
            return s ? (i.next = s.cid, s.prev = i.cid) : (i.next = "", this._head.prev = i.cid, n = !0), n ? this._saveChanged(i, s, this._head) : this._saveChanged(i, s), this._remove(e), this._lengthHandler(-1), e
        }, i.pop = function () {
            var t = this.length();
            if (t > 0) {
                var e = this.deleteByIndex(t);
                if (e)return e
            }
            return !1
        }, i.shift = function () {
            var t = this.length();
            if (t > 0) {
                var e = this.deleteByIndex(1);
                if (e)return e
            }
            return !1
        }, i["delete"] = function (e, i) {
            if ("string" != typeof e && "number" != typeof e && t.throwErr("LinkList.delete param field is not a string,number type"), "string" != typeof i && "number" != typeof i && t.throwErr("LinkList.delete param val is not a string,number type"), this._unique && e == this._unique)return this.deleteByCid(i), 1;
            var s;
            e ? (s = {}, s[e] = i) : s = i;
            var n = this.search(s, !0);
            if (!n)return 0;
            if (!n.length)return this.deleteByCid(n.cid), 1;
            for (var r = 0; r < n.length; r++)this.deleteByCid(n[r].cid);
            return n.length
        }, i.edit = function (t, e) {
            if ("stirng" == typeof t || "number" == typeof t) {
                if (i = this.getElemByPointer(t), !i)return 0
            } else {
                var i = this.search(t, !0);
                if (!i)return 0
            }
            i.length || (i = [i]);
            for (var s = 0, n = 0; n < i.length; n++) {
                var r = i[n].data;
                for (var o in e)"undefined" != typeof r[o] && (r[o] = e[o]);
                i[n].data = r, this._saveChanged(i[n]), s++
            }
            return s
        }, i.clear = function (t) {
            return 1 == this._storeType && this._storage.deleteNs(t), this._init_head(), this._init_length(), !0
        }, i.search = function (t, e, i) {
            if (t && this._unique && t[this._unique]) {
                var s = this.getElemByPointer(t[this._unique]);
                return s ? e ? s : s.data : !1
            }
            for (var n, r, s = [], o = this.length(), l = typeof t, a = !isNaN(i), d = !1, h = 1; o >= h; h++) {
                n = this.getElemByIndex(h), r = typeof n.data;
                var u = e ? n : n.data;
                if ("undefined" == l) {
                    if (s.push(u), a && s.length >= i)break
                } else if ("string" != r && "number" != r || "string" != l && "number" != l || t != n.data) {
                    if ("object" == r && "object" == l) {
                        d = !1;
                        for (var _ in t)if ("undefined" != typeof n.data[_] && t[_] != n.data[_]) {
                            d = !0;
                            break
                        }
                        if (d === !1 && (s.push(u), a && s.length >= i))break
                    }
                } else if (s.push(u), a && s.length >= i)break
            }
            return 0 == s.length ? !1 : 1 == s.length ? s[0] : s
        }, i.sort = function (e, i) {
            "string" == typeof e && e || t.throwErr("lp.sort param field is empty or TypeError", "TypeError"), i ? (i = i.toLowerCase(), "asc" != i && "desc" != i && t.throwErr("lp.sort param flag is not supported", "Error")) : i = "asc";
            var s = this.length();
            if (!s || 2 > s)return !0;
            if (!this._lock())return !1;
            try {
                for (var n = [], r = 1; s >= r; r++)n.push(this.getElemByIndex(r));
                if (!n.length)return this._unlock(), !0;
                ("object" != typeof n[0].data || "undefined" == typeof n[0].data[e]) && (this._unlock(), t.throwErr("lp.sort param " + e + " is not exists", "Error")), n.sort(function (t, s) {
                    return isNaN(t.data[e]) || (t.data[e] += ""), isNaN(s.data[e]) || (s.data[e] += ""), t.data[e] == s.data[e] ? 0 : "asc" == i ? t.data[e] < s.data[e] ? -1 : 1 : t.data[e] < s.data[e] ? 1 : -1
                }), t.DEBUG, this._head.next = n[0].cid;
                for (var r = 1; r < n.length; r++)n[r + 1] ? n[r].next = n[r + 1].cid : n[r].next = "", n[r].prev = n[r - 1].cid, this._saveChanged(n[r]);
                return this._saveChanged(n[0]), this._saveChanged(this._head), this._unlock(), !0
            } catch (o) {
                throw this._unlock(), o
            }
        }, i._saveChanged = function () {
            if (arguments.length && 1 == this._storeType)for (var t = 0; t < arguments.length; t++)arguments[t] && "undefined" != typeof arguments[t].cid && ("head" == arguments[t].data ? this._storage.set("headElem", arguments[t]) : this._storage.set(arguments[t].cid, arguments[t]));
            return !0
        }, i._remove = function (t) {
            return t && "undefined" != typeof t.cid && 1 == this._storeType ? this._storage["delete"](t.cid) : !0
        }, i._generateElem = function (t) {
            var e = {data: t, prev: "", next: ""};
            return "head" == t ? e.cid = 0 : e.cid = this._getPointer(e), e
        }, i._getPointer = function (e) {
            if (0 == this._storeType)return e;
            if (1 == this._storeType) {
                if (this._unique)return e.data[this._unique] || t.throwErr("lp._getPointer elem has no unique id"), e.data[this._unique];
                var i = this._storage.get("cid");
                return i ? i++ : i = 1, this._storage.set("cid", i), i
            }
        }, i.getElemByIndex = function (e) {
            if (0 == e)return this._head;
            if ((1 > e || e > this.length()) && t.throwErr("List insertAfter failed: index > List length or index < 1", "Error"), e == this.length())return this.getElemByPointer(this._head.prev);
            for (var i = this._head, s = 0; i.next;)if (i = this.getElemByPointer(i.next), s++, e == s)return i;
            return !1
        }, i.getDataByIndex = function (t) {
            var e = this.getElemByIndex(t);
            return e && "head" != e.data ? e.data : !1
        }, i.getElemByPointer = function (t) {
            return 0 == this._storeType && t ? t : 1 == this._storeType ? 0 == t ? this._head : this._storage.get(t) : !1
        }, i.length = function () {
            if (0 == this._storeType)return this._length;
            if (1 == this._storeType) {
                var t = this._storage.get("listLength");
                return isNaN(t) ? !1 : parseInt(t)
            }
        }, i._lengthHandler = function (t) {
            if (0 == this._storeType)return this._length += t, this._length;
            if (1 == this._storeType) {
                var e = this.length();
                return e || (e = 0), e += t, this._storage.set("listLength", e), e
            }
        }, i._init_length = function () {
            return 0 == this._storeType ? (this._length = 0, this._length) : 1 == this._storeType ? this._lengthHandler(0) : void 0
        }, i._lock = function () {
            if (0 == this._storeType)return !0;
            var t = this._storage.get("listLock");
            return 1 == t ? !1 : (t || this._storage.set("listLock", 1), !0)
        }, i._unlock = function () {
            return 0 == this._storeType ? !0 : (this._storage["delete"]("listLock"), !0)
        }
    }
}(wxscreen), /**
 * 进度条
 * @author lij
 */
    function (t) {
        function e(t, e, i, s) {
            a && (a.beginPath(), a.lineWidth = y, a.strokeStyle = s, a.arc(0, 0, t, e, i, !1), a.stroke())
        }

        function i(t) {
            l.innerHTML = t
        }

        if (!t.progress) {
            var s, n, r, o, l, a, d, h, u, _ = t.progress = {
                _timer: null,
                state: null
            }, c = -Math.PI / 2, g = -Math.PI / 2, f = 2 * Math.PI, p = g + f, m = 18, y = 2, v = !1;
            _.step = function () {
                var r = Math.ceil((p - g) / f * n);
                return 0 == r || t.getConf("isV6") || i(r), p > g ? (e(m, g, g + h, u), g += h) : (a && a.clearRect(-30, -30, 60, 60), e(18, 0, 2 * Math.PI, s[1]), g = c, t.pub("event.progress.compelete")), this
            }, _.restart = function (e) {
                return this.stop().start(e), t.pub("progress.restarted"), this
            }, _.start = function (e) {
                var i = this;
                return clearInterval(this._timer), this._timer = setInterval(function () {
                    i.step()
                }, t.getConf("stepTime")), this.state = "running", e && e(), this
            }, _.stop = function (t) {
                return clearInterval(this._timer), v || (a && a.translate(25, 25), v = !0), a && a.clearRect(-30, -30, 60, 60), e(18, 0, f, s[1]), g = c, this.state = "stoped", t && t(), this
            }, _.pause = function (t) {
                return clearInterval(this._timer), this.state = "paused", t && t(), this
            }, _.resume = function (t) {
                return this.start(t)
            }, _.init = function () {
                return s = t.getConf("timerColorMap"), n = t.getConf("autoTime"), r = t.getConf("stepTime"), o = document.getElementById("cirProgress"), l = document.getElementById("remainTime"), a = o.getContext ? o.getContext("2d") : null, d = 1e3 * n, h = f / d * r, u = s[0], y = t.getConf("isV6") ? 2 : 5, this.stop(), this
            }
        }
    }(wxscreen), function (t) {
    if (!t.btnKeys) {
        var e = t.btnKeys = {}, i = {
            13: "key.enter.down",
            32: "key.whitespace.down",
            37: "key.left.down",
            38: "key.up.down",
            39: "key.right.down",
            40: "key.down.down"
        };
        e.init = function () {
            return $ || t.throwErr("btnKeys depend on jQuery"), this.bindBtns().bindKeys(), this
        }, e.bindBtns = function () {
            return t.sub("progress.restarted", function () {
                setTimeout(function () {
                    var e = t.getConf("template");
                    "paused" == t.progress.state || "stoped" == t.progress.state ? "bo2" == e ? $(".btnPause").removeClass("btn-pause").addClass("btn-resume") : t.getConf("isV6") ? $(".btnPause").addClass("btn-pause") : $(".btnPause").text("启动") : "bo2" == e ? $(".btnPause").removeClass("btn-resume").addClass("btn-pause") : t.getConf("isV6") ? $(".btnPause").removeClass("btn-pause") : $(".btnPause").text("暂停")
                }, 100)
            }), $(".btnFullScreen").click(function (e) {
                e.preventDefault(), e.stopPropagation();
                var i = document.documentElement, s = i.webkitRequestFullscreen || i.requestFullScreen || i.webkitRequestFullScreen || i.mozRequestFullScreen;
                s && s.call(i), t.pub("control.btn.btnFullScreen.clicked", e)
            }), $(".btnPause").click(function (e) {
                var i = t.getConf("template");
                "paused" == t.progress.state || "stoped" == t.progress.state ? (t.progress.resume(), "bo2" == i ? $(this).removeClass("btn-resume").addClass("btn-pause") : t.getConf("isV6") ? $(this).removeClass("btn-pause") : $(this).text("暂停")) : (t.progress.pause(), "bo2" == i ? $(this).removeClass("btn-pause").addClass("btn-resume") : t.getConf("isV6") ? $(this).addClass("btn-pause") : $(this).text("启动")), t.pub("control.btn.btnPause.clicked", e)
            }), $(".btnNewest").click(function (e) {
                t.pub("control.btn.btnNewest.clicked", e)
            }), $(".btnOldest").click(function (e) {
                t.pub("control.btn.btnOldest.clicked", e)
            }), $(".btnPrev").click(function (e) {
                t.pub("control.btn.btnPrev.clicked", e)
            }), $(".btnNext").click(function (e) {
                t.pub("control.btn.btnNext.clicked", e)
            }), this
        }, e.bindKeys = function () {
            $(document).on("keydown", function (e) {
                var s = e.keyCode ? e.keyCode : e.which;
                i.hasOwnProperty(s) ? t.pub(i[s], e) : t.pub("key." + s + ".down", e)
            })
        }
    }
}(wxscreen), function (t) {
    if (!t.Countdown) {
        var e = [], i = t.Countdown = function (i, s, n) {
            i || t.throwErr("new g.Countdown failed: canvasNode empty"), this.canvasNode = i, this.textNode = s, n = n || {}, this.conf = {}, this.conf.colorMap = n.colorMap || ["#ffcc00", "#b91a16"], this.conf.stepTime = n.stepTime || 10, this.conf.totalTime = n.totalTime || 5, this.conf.radius = n.radius || 130, this.conf.lineWidth = n.lineWidth || 22, this.conf.id = n.id || t.randomStr(10), this.inibegin = -Math.PI / 2, this.begin = -Math.PI / 2, this.range = 2 * Math.PI, this.end = this.begin + this.range, this.step = this.range / (1e3 * this.conf.totalTime) * this.conf.stepTime, this.context = this.canvasNode.getContext ? i.getContext("2d") : null, this.state = "stoped", this.lastReminTime = -9999, this.context || t.throwErr("new g.Countdown failed: canvasNode.getContext failed"), -1 == t.inArray(this.canvasNode, e, !0) && (this.context.translate(this.canvasNode.width / 2, this.canvasNode.height / 2), e.push(this.canvasNode)), this.stop(), this.drawText(this.conf.totalTime), this.isInited = !0
        }, s = i.prototype;
        s.getCanvasNodeList = function () {
            return e
        }, s.drawCircle = function (t, e, i) {
            return this.context && (this.context.beginPath(), this.context.lineWidth = this.conf.lineWidth, this.context.strokeStyle = i, this.context.arc(0, 0, this.conf.radius, t, e, !1), this.context.stroke()), this
        }, s.drawText = function (t) {
            return this.textNode.innerHTML = t, this
        }, s.drawStep = function () {
            var e = Math.ceil((this.end - this.begin) / this.range * this.conf.totalTime);
            return this.lastReminTime != e && (this.drawText(e), t.pub("countdown." + this.conf.id + ".step", e)), this.lastReminTime = e, this.begin < this.end ? (this.drawCircle(this.begin, this.begin + this.step, this.conf.colorMap[0]), this.begin = this.begin + this.step) : (this.clear(), this.begin = this.inibegin, t.pub("countdown." + this.conf.id + ".complete")), this
        }, s.restart = function (e) {
            return this.stop().start(e), t.pub("countdown." + this.conf.id + ".rebegined"), this
        }, s.start = function (t) {
            var e = this;
            return clearInterval(this._timer), this.begin == this.inibegin && this.clear(), this._timer = setInterval(function () {
                e.drawStep()
            }, this.conf.stepTime), this.state = "running", t && t(), this
        }, s.stop = function (t) {
            return clearInterval(this._timer), this.clear(), this.begin = this.inibegin, this.state = "stoped", t && t(), this
        }, s.pause = function (t) {
            return clearInterval(this._timer), this.state = "paused", t && t(), this
        }, s.resume = function (t) {
            return this.start(t)
        }, s.clear = function (t) {
            return this.context.clearRect(-this.canvasNode.width, -this.canvasNode.height, this.canvasNode.width, this.canvasNode.height), t || this.drawCircle(0, this.range, this.conf.colorMap[1]), this
        }
    }
}(wxscreen), function (t) {
    if (!t.message) {
        t.LinkList || t.throwErr("module message depend on module LinkList"), t.progress || t.throwErr("module message depend on module progress"), jQuery || t.throwErr("module message depend on jQuery");
        var e = t.message = {
            _total: 0,
            _tag_id: 0,
            _tag_relation_ids: [],
            _linkList: null,
            _linkListPlayed: null,
            _tagLinkList: null,
            _likeSyncLastId: 0,
            _storage: null,
            _lastId: 0,
            _tag_lastId: 0,
            _syncProgress: "stoped",
            _pullTimer: null,
            _pullLikeTimer: null,
            _ajaxObj: null,
            _progressTimer: null,
            _currentDomList: [],
            _currentList: [],
            _laterOffWallList: [],
            _scrollSpeed: 800,
            _scrollState: "stoped",
            _tmpProgressState: null,
            _scrollType: "next",
            _viewIds: [],
            _transitions: null,
            _dom_scrollBox: null,
            _dom_scrollBoxTextW: null,
            _dom_scrollBoxTextH: null,
            _dom_totalBox: null,
            _liHeight: null,
            _loadComplete: !1,
            _tag_loadComplete: !1,
            _isInLoading: !1,
            _isAutoScroll: null,
            _proxyObj: null,
            _firstLoaded: !1
        };
        e.init = function (e, i, s, n) {
            var r = this;
            this._tag_id = parseInt(n) || 0;
            var o = "memoryStorage";
            if (this._linkList = new t.LinkList({
                    name: "m-" + t.getConf("companyId"),
                    storeType: o,
                    unique: "id"
                }), this._linkListPlayed = new t.LinkList({
                    name: "mp-" + t.getConf("companyId"),
                    storeType: o,
                    unique: "id"
                }), this._tagLinkList = new t.LinkList({
                    name: "mtag-" + t.getConf("companyId"),
                    storeType: o,
                    unique: "id"
                }), this._linkList.clear(), this._linkListPlayed.clear(), this._tagLinkList.clear(), this._storage = new t.Storage("storage", "msg-played-" + t.getConf("companyId")), this._transitions = function (t) {
                    var e = ["transformProperty", "WebkitTransform", "MozTransform", "OTransform", "msTransform"];
                    for (var i in e)if (void 0 !== t.style[e[i]])return !0;
                    return !1
                }(document.createElement("div")), this._dom_totalBox = $(".messageTotal"), this._dom_scrollBox = $("#container .scrollBox ul"), this._dom_scrollBox.css({position: "relative"}).parent().css({
                    visibility: "visible",
                    overflow: "hidden",
                    position: "relative"
                }), this.bindEvent(), !this._dom_scrollBoxTextW) {
                var l = {id: 0, username: "&nbsp;", avatar: "#", photo_ori: "", photo_small: "", content: "&nbsp;"};
                this._dom_scrollBox.html(this.renderOne(l));
                var a = $(".displayContent").closest(".c-word");
                this._dom_scrollBoxTextW = a.width(), this._dom_scrollBoxTextH = a.height() - a.find(".msgUserName").height(), this._liHeight = t._height(this._dom_scrollBox.children("li:eq(0)")), this._transitions || this._dom_scrollBox.height(t.getConf("visibleNum") * this._liHeight), this._dom_scrollBox.html("")
            }
            t.subOnce("message.addCompleted", function () {
                r._tag_id ? r._tag_loadComplete = !0 : r._loadComplete = !0, r.updateLoading(r.length(), r.length()), r.sort(), r.initView(), r.hideLoading(), t.log("subOnce: message.addCompleted"), r._firstLoaded = !0, t.pub("message.loadComplete")
            });
            var d = t.getStartState();
            return this.renderTotal(s), t.progress.start(), this.pause(), "message" != d ? this : (this.showLoading(0, s), this.add(i), t.setState("message"), this)
        }, e.saveViewIds = function () {
            this._tag_id ? this._storage.set("tagViewIds", this._viewIds) : this._storage.set("viewIds", this._viewIds)
        }, e.setViewIds = function (t) {
            var e = typeof t;
            ("string" == e || "number" == e) && (t = [t]);
            for (var i = 0; i < t.length; i++)t[i] = parseInt(t[i]);
            this._viewIds = t, this.saveViewIds()
        }, e.initView = function () {
            var e = t.getConf("visibleNum");
            this._tag_id ? this._viewIds = this._storage.get("tagViewIds") || [] : this._viewIds = this._storage.get("viewIds") || [];
            var i = this._tag_id ? this._tagLinkList : this._linkListPlayed, s = 0;
            if (this._viewIds && this._viewIds.length && i.length() > e) {
                for (var n = 0; n < this._viewIds.length; n++)if (this.getElem(this._viewIds[n], i)) {
                    s = this._viewIds[n];
                    break
                }
                0 == s && this.setViewIds([])
            }
            var r, o, l = [];
            if (i.length() < e)l = i.search(), 1 == i.length() && (l = [l]); else {
                for (0 != s && (r = this.getElem(s, i), r ? l.push(r.data) : (t.DEBUG && t.log("message.initView failed: pointer=", s), s = 0)), o = s; l.length < e && (r = this.getSublingElem(s, i, "next"));)l.push(r.data), s = parseInt(r.data.id);
                if (l.length < e)for (s = o; l.length < e && (r = this.getSublingElem(s, i, "prev"));)l.unshift(r.data), s = parseInt(r.data.id)
            }
            for (var a = "", d = [], n = 0; n < l.length; n++)a += this.renderOne(l[n]), d.push(l[n].id);
            this.setViewIds(d), a && (this._dom_scrollBox.html(a), this.scrollFn(this._dom_scrollBox, 0, 0)), this.afterScrollEnd(), this.resume(), "running" == t.progress.state && t.progress.restart()
        }, e.pullStop = function () {
            return clearTimeout(this._pullTimer), this._pullTimer = null, this._ajaxObj && this._ajaxObj.abort(), this._ajaxObj = null, this
        }, e.pull = function () {
            var e = this;
            return this.pullStop(), this.sync(function (i, s) {
                i && t.DEBUG && t.log("message.pull: sync return err:", i);
                var n = e.length();
                e._dom_scrollBox.children("li").length < t.getConf("visibleNum") && n && !e._isInLoading && !e._proxyObj ? e.initView() : n || e._dom_scrollBox.html(""), e._pullTimer = setTimeout(function () {
                    e.pull()
                }, e._loadComplete ? 5e3 : 800)
            }), this
        }, e.pullLikeStop = function () {
            return clearTimeout(this._pullLikeTimer), this._pullLikeTimer = null, this
        }, e.pullLike = function () {
            var t = ((new Date).getTime(), this);
            return this.pullLikeStop(), this.syncLike(function () {
                t._pullLikeTimer = setTimeout(function () {
                    t.pullLike()
                }, 5e3)
            }), this
        }, e.syncLike = function (e) {
            var i, s = this._likeSyncLastId, n = this;
            i = {last_id: s}, $.post(t.url("message/sync_like"), i, function (t) {
                if (t.list) {
                    var i = t.list;
                    0 == i.length && (n._likeSyncLastId = 0);
                    for (var s = 0; s < i.length; s++)oldElem = n.getElem(i[s].id, n._linkList), oldElem ? oldElem.data.like_num != i[s].like_num && n._linkList.edit({id: i[s].id}, i[s]) : (oldElem = n.getElem(i[s].id, n._linkListPlayed), oldElem && oldElem.data.like_num != i[s].like_num && n._linkListPlayed.edit({id: i[s].id}, i[s])), oldElem = n.getElem(i[s].id, n._tagLinkList), oldElem && oldElem.data.like_num != i[s].like_num && n._tagLinkList.edit({id: i[s].id}, i[s]), n._likeSyncLastId = i[s].id;
                    e()
                }
            }, "json")
        }, e.sync = function (e) {
            var i = location.hostname;
            if (-1 == i.indexOf("wxscreen.sinaapp.com") && -1 == i.indexOf("wxscreen.com") && -1 == i.indexOf("alltosun.net"))return void window.location.reload();
            if ("started" == this._syncProgress)return e("started");
            this._syncProgress = "started";
            var s, n = this._tag_id ? this._tag_lastId : this._lastId, r = this;
            return e = e || t.loop, s = {
                last_id: n,
                tag_id: this._tag_id,
                tag_relation_ids: this._tag_relation_ids
            }, this._ajaxObj = $.post(t.url("message/sync"), s, function (i) {
                t.pub("network.ok");
                var s = null, n = !1;
                "ok" != i.info ? s = i.info : (r.renderTotal(i.all_total), i.message_list && (i.message_list && i.message_list.length && r._loadComplete && t.pub("message.newMsgReceived", i.message_list), r.add(i.message_list)), i.off_wall_ids && r.offWall(i.off_wall_ids), 0 == i.all_total && (r._tag_id ? r._tagLinkList.clear() : (r._linkList.clear(), r._linkListPlayed.clear()), r.setViewIds([]), t.pub("message.pull.empty")), n = !0), r._syncProgress = "stoped", e(s, n)
            }, "json").error(function (i, s, n) {
                t.DEBUG && t.log("message.sync ajax-error: jqXHR, textStatus, errorThrown ", i, s, n), r._syncProgress = "stoped", i.readyState < 2 && "error" == s && t.pub("network.disconnected", i), e("ajax-error:" + s)
            }), this
        }, e.add = function (i) {
            if (!i || !i.length)return e.updateLoading(), t.pub("message.addCompleted"), !1;
            this._tag_id ? this._tag_lastId = i[i.length - 1].tag_relation_id : this._lastId = i[i.length - 1].update_time_ms;
            for (var s = 0; s < i.length; s++) {
                t.preLoadAvatar(i[s].avatar), i[s].photo_small && t.loadImage(i[s].photo_small);
                var n;
                this._tag_id ? (n = this.getElem(i[s].id, this._tagLinkList), n ? n.data.update_time_ms < i[s].update_time_ms ? (this._tagLinkList["delete"]("id", i[s].id), this._tagLinkList.push(i[s])) : this._tagLinkList.edit({id: i[s].id}, i[s]) : this._tagLinkList.push(i[s])) : 1 == t.getConf("isCycleScroll") && this._firstLoaded && this._linkListPlayed.length() > t.getConf("visibleNum") || 2 == i[s].is_on_wall || this._firstLoaded && 1 == t.getConf("newMessageAddType") ? (n = this.getElem(i[s].id, this._linkList), n ? n.data.update_time_ms < i[s].update_time_ms ? (this._linkList["delete"]("id", i[s].id), 2 == i[s].is_on_wall ? this._linkList.unshift(i[s]) : this._linkList.push(i[s])) : this._linkList.edit({id: i[s].id}, i[s]) : 2 == i[s].is_on_wall ? this._linkList.unshift(i[s]) : this._linkList.push(i[s])) : (n = this.getElem(i[s].id, this._linkListPlayed), n ? n.data.update_time_ms < i[s].update_time_ms ? (this._linkListPlayed["delete"]("id", i[s].id), this._linkListPlayed.push(i[s])) : this._linkListPlayed.edit({id: i[s].id}, i[s]) : this._linkListPlayed.push(i[s])), this._tag_id && i[s].tag_relation_id && t.uniqueInsert(i[s].tag_relation_id, this._tag_relation_ids), e.updateLoading()
            }
            return i.length < 100 ? (e.updateLoading(), t.pub("message.addCompleted"), this) : (e.updateLoading(), this)
        }, e.addToPlayed = function (t) {
            if (!t.length)return !1;
            for (var e = 0; e < t.length; e++) {
                var i = this.info(t[e]);
                if (i) {
                    this._linkList["delete"]("id", t[e]);
                    for (var s = 0; s < this._currentList.length; s++)this._currentList[s].data.id == t[e] && (this._currentList.splice(s, 1), s--);
                    this._tag_id ? this.getElem(t[e], this._tagLinkList) || this._tagLinkList.push(i) : this.getElem(t[e], this._linkListPlayed) || this._linkListPlayed.push(i)
                }
            }
        }, e.showLoading = function (t, e) {
            this._isInLoading = !0, e = "undefined" == typeof e ? this.length() : e, t = "undefined" == typeof t ? this.nowLength() : t;
            var i = Math.ceil(t / e * 100);
            $(".messageLoading .messageLoadProgress").text(t + "/" + e), $(".messageLoading .messageLoadBar").css({width: i + "%"}), $(".messageLoading").show()
        }, e.updateLoading = function (t, e) {
            e = "undefined" == typeof e ? this.length() : e, t = "undefined" == typeof t ? this.nowLength() : t;
            var i = Math.ceil(t / e * 100);
            $(".messageLoading .messageLoadProgress").text(t + "/" + e), $(".messageLoading .messageLoadBar").css({width: i + "%"})
        }, e.hideLoading = function (t) {
            var e = this;
            setTimeout(function () {
                $(".messageLoading").hide(), e._isInLoading = !1, t && t()
            }, 200)
        }, e.offWall = function (e) {
            if (!e || !e.length)return !1;
            for (var i = t.getConf("visibleNum"), s = 0; s < e.length; s++) {
                if (t.deleteByElem(e[s], this._tag_relation_ids), -1 != t.inArray(e[s], this._currentDomList) || e[s] == t.messageDetail._currentId || -1 != t.inArray(e[s], this._viewIds)) {
                    if (this.length() > i) {
                        this._laterOffWallList.push(e[s]);
                        continue
                    }
                    try {
                        this._dom_scrollBox.find('li[data-id="' + e[s] + '"]').remove(), "messageDetail" == t.getState() && t.messageDetail.hide()
                    } catch (n) {
                    }
                }
                if (this._linkList["delete"]("id", e[s]), this._linkListPlayed["delete"]("id", e[s]), this._tagLinkList["delete"]("id", e[s]), this._currentList.length)for (var r = 0; r < this._currentList.length; r++)this._currentList[r].data.id == e[s] && (this._currentList.splice(r, 1), r--)
            }
            return !0
        }, e.newest = function (e) {
            e = e || 1;
            var i, s = [];
            e > this.length() && (e = this.length());
            var n = this._tag_id ? this._tagLinkList : this._linkListPlayed, r = this._linkList.search();
            if (r.length) {
                for (var o = [], l = 0; l < r.length; l++)o.push(parseInt(r[l].id));
                this.addToPlayed(o)
            }
            var a = 0, d = this.getSublingElem(a, n, "prev");
            if (d && d.data.id == this._viewIds[this._viewIds.length - 1])return t.DEBUG && t.log("lastElem.data.id == this._viewIds[this._viewIds.length -1]"), this.noticeScrollEnd(), !1;
            for (; s.length < e && (i = this.getSublingElem(a, n, "prev"));)s.unshift(i), a = parseInt(i.data.id);
            if (!s.length)return t.DEBUG && t.log("message.newest: list.length = 0"), !1;
            for (var o = [], l = 0; l < s.length; l++)o.push(s[l].data.id);
            return this.setViewIds(o.slice(-t.getConf("visibleNum"))), 1 == e ? s[0] : s
        }, e.oldest = function (e) {
            e = e || 1;
            var i, s = [];
            e > this.length() && (e = this.length());
            var n = this._tag_id ? this._tagLinkList : this._linkListPlayed, r = 0, o = this.getSublingElem(r, n, "next");
            if (o && o.data.id == this._viewIds[0])return t.DEBUG && t.log("firstElem.data.id == this._viewIds[0]"), this.noticeScrollEnd(), !1;
            for (; s.length < e && (i = this.getSublingElem(r, n, "next"));)s.push(i), r = parseInt(i.data.id);
            if (!s.length)return t.DEBUG && t.log("message.oldest list.length = 0"), !1;
            for (var l = [], a = 0; a < s.length; a++)l.push(s[a].data.id);
            return this.setViewIds(l.slice(0, t.getConf("visibleNum"))), 1 == e ? s[0] : s
        }, e.next = function (e) {
            e = e || 1;
            var i, s, n = [];
            e > this.length() && (e = this.length());
            for (var r = this._tag_id ? this._tagLinkList : this._linkListPlayed, o = []; n.length < e && (i = this._linkList.shift());)n.push(i), o.push(i.data.id);
            this._currentList = this._currentList.concat(n);
            var l = 0;
            if (this._viewIds.length > 0 && (l = this._viewIds[this._viewIds.length - 1]), elemPointer = this.getElem(l, r), 0 == l || elemPointer) {
                for (; n.length < e && (s = this.getSublingElem(l, r, "next"));)n.push(s), l = parseInt(s.data.id);
                if (t.getConf("isCycleScroll") && n.length < e)for (l = 0; n.length < e && (s = this.getSublingElem(l, r, "next"));)n.push(s), l = parseInt(s.data.id)
            } else if (t.DEBUG)return t.DEBUG && t.log("message.prev elemPointer is null"), !1;
            if (!n.length)return t.DEBUG && t.log("message.prev list.length = 0"), this.noticeScrollEnd(), !1;
            for (var a = [], d = 0; d < n.length; d++)-1 == t.inArray(n[d].data.id, o) && a.push(n[d].data.id);
            if (a.length && this.setViewIds(a), this._currentList.length) {
                a = [];
                for (var d = 0; d < this._currentList.length; d++)a.push(this._currentList[d].data.id);
                this.addToPlayed(a)
            }
            return 1 == e ? n[0] : n
        }, e.prev = function (e) {
            e = e || 1;
            var i, s, n, r = [];
            e > this.length() && (e = this.length());
            var o = this._tag_id ? this._tagLinkList : this._linkListPlayed, l = 0;
            if (this._viewIds.length > 0 && (l = this._viewIds[0]), s = this.getElem(l, o), 0 == l || s) {
                for (n = s; r.length < e && (i = this.getSublingElem(l, o, "prev"));)r.unshift(i), n = i, l = parseInt(n.data.id);
                if (t.getConf("isCycleScroll") && r.length < e)for (l = 0; r.length < e && (i = this.getSublingElem(l, o, "prev"));)r.unshift(i), l = parseInt(i.data.id)
            } else if (t.DEBUG)return t.DEBUG && t.log("message.prev elemPointer is null"), !1;
            if (!r.length)return t.DEBUG && t.log("message.prev list.length = 0"), this.noticeScrollEnd(), !1;
            for (var a = [], d = 0; d < r.length; d++)a.push(r[d].data.id);
            return this.setViewIds(a), 1 == e ? r[0] : r
        }, e.indexOf = function (t) {
            return this._linkList.getDataByIndex(t)
        }, e.info = function (t) {
            if (!t || isNaN(t))return !1;
            var e = this.getElem(t, this._linkList);
            if (e || (e = this.getElem(t, this._linkListPlayed)), e || (e = this.getElem(t, this._tagLinkList)), !e)for (var i = 0; i < this._currentList.length; i++)if (this._currentList[i].data.id == t) {
                e = this._currentList[i];
                break
            }
            return e ? e.data : !1
        }, e.getElem = function (t, e) {
            var i = e.getElemByPointer(t);
            return i && "head" != i.data ? i : !1
        }, e.getSublingElem = function (e, i, s) {
            e = parseInt(e), s = s || "next", s = s.toLowerCase();
            var n = i.getElemByPointer(e);
            if (!n)return t.DEBUG && t.log("message.getPrevElem failed: no elem exists", e), !1;
            var r = n[s];
            return r ? this.getElem(r, i) : (t.DEBUG && t.log("message.getPrevElem failed: no sublingId is empty."), !1)
        }, e.length = function () {
            return this._total
        }, e.nowLength = function () {
            return this._tag_id ? this._tagLinkList.length() : this._linkListPlayed.length() + this._linkList.length() + this._currentList.length
        }, e.sort = function () {
            return this._linkList.sort("update_time_ms", "asc"), this._linkListPlayed.sort("update_time_ms", "asc"), this._tagLinkList.sort("update_time_ms", "asc"), this
        }, e.renderTotal = function (e) {
            isNaN(e) || (this._total = parseInt(e)), e = e || this.length();
            var i = t.getState();
            return "checkin" != i && this._dom_totalBox && this._dom_totalBox.text(e), this
        }, e.renderList = function (t) {
            if (!t.length)return "";
            for (var e = "", i = 0; i < t.length; i++)e += this.renderOne(t[i]);
            return e
        }, e.renderOne = function (e) {
            if (!e)return "";
            var i = !!e.photo_small, s = t.getConf("visibleNum"), n = this.getFontSize(e.content, s), r = s >= 3 ? 'style="max-width:158px;max-height:112px;display:block;"' : 'style="max-width:600px;max-height:160px;display:block;"', o = "", l = "";
            if (i)l = "<img " + (s >= 3 ? 'class="with-map msgImage"' : 'class="msgImage"') + ' src="' + e.photo_small + '" ' + r + " />"; else {
                var a = e.content ? e.content.replace(/<br(.*?)>/gi, " ") : "";
                o = '<span class="cont displayContent" style="font-size:' + n + 'px;">' + a + "</span>"
            }
            if (i && s >= 3 ? e.content = "分享一张照片：" : i && (e.content = l), e.user_id > 0) {
                var d = t.user.info(e.user_id);
                d && (e.avatar = d.avatar)
            }
            return html = '<li class="clearfix ' + (s >= 3 ? "t-row" : "") + '" data-id="' + e.id + '" data-update_time_ms="' + e.update_time_ms + '" style="display:block;">', 1 == t._config.showLike && (html += ' <div class="zan_xin">        <img src="http://wxscreen.com/images/xin.png"><div class="zan_shadow"></div>        <span class="zan_span">' + e.like_num + "</span>        </div>"), html += '<div class="userimg left">          <i class="elem"></i>      <span class="elem2"></span>      <a href="javascript:void(0);" class="head"><img class="msgAvatar" src="' + e.avatar + '" width="90" height="90" alt=""></a>    </div>        <div class="cont-box left">          <p class="c-word">            <a href="javascript:void(0);" class="user-name msgUserName">' + e.username + ":</a>            " + (i && 2 == s ? l : o) + "          </p>          " + (s >= 3 && i ? l : "") + '        </div>        <div class="btn-detail messageDetailBtn" style="display: none;">          <div class="btn-style">            <a href="javascript:void(0);" class="icon-arrow"></a>          </div>        </div>      </li>', html
        }, e.renderLi = function (t, e) {
            return t.after(this.renderOne(e)).remove(), this
        }, e.getFontSize = function (e, i) {
            e = t.trim(e), -1 != e.indexOf("<img") && (e = e.replace(/\<img.+?\>/g, "") ? e.replace(/\<img.+?\>/g, "11") : ""), -1 != e.indexOf("<span") && -1 != e.indexOf("emoji") && (e = e.replace(/<span.+?emoji.+?><\/span>/g, "") ? e.replace(/<span.+?emoji.+?><\/span>/g, "11") : "");
            var s = t.fontNum(e);
            if (!s || !this._dom_scrollBoxTextW)return 24;
            if (-1 == location.search.indexOf("fontsize=autoscale"))r = 11 >= s ? 60 : 12 >= s ? 55 : 13 >= s ? 51 : 14 >= s ? 48 : 15 >= s ? 45 : 16 >= s ? 42 : 17 >= s ? 40 : 18 >= s ? 37 : 19 >= s ? 36 : 40 >= s ? 34 : 42 >= s ? 32 : 44 >= s ? 31 : 46 >= s ? 30 : 48 >= s ? 28 : 50 >= s ? 27 : 52 >= s ? 26 : 54 >= s ? 25 : 24; else {
                var n = i >= 3 ? 55 : 120, r = Math.sqrt(this._dom_scrollBoxTextW * this._dom_scrollBoxTextH / s) / 1.6;
                r > n && (r = n)
            }
            return 24 > r ? 24 : r
        }, e.addProxy = function (e) {
            return e && e.on && e.off ? void(this._proxyObj = e) : void t.throwErr("message.addProxy failed: obj or obj.show or obj.hide is not a function type")
        }, e.getProxyObj = function () {
            return this._proxyObj
        }, e.setScrollType = function (t, e) {
            this._scrollType = t, this._isAutoScroll = e ? !0 : !1
        }, e.noticeScrollEnd = function () {
            if (this._isAutoScroll)return void(t.DEBUG && t.log("message.noticeScrollEnd: this._isAutoScroll true"));
            if (this._hideTooltip)return void(t.DEBUG && t.log("message.noticeScrollEnd: this._hideTooltip true"));
            if ("hidden" == $("#footer").css("visibility") || !$("#footer:visible").length)return void(t.DEBUG && t.log("message.noticeScrollEnd: footer not visible"));
            var e = this._scrollType;
            switch (e) {
                case"next":
                    $(".btnNext").tooltipster("content", "暂无新消息上墙").tooltipster("show"), setTimeout(function () {
                        $(".btnNext").tooltipster("hide").tooltipster("content", "下一屏（快捷键“↓”）")
                    }, 1500);
                    break;
                case"prev":
                    $(".btnPrev").tooltipster("content", "已经滚动到最旧消息").tooltipster("show"), setTimeout(function () {
                        $(".btnPrev").tooltipster("hide").tooltipster("content", "上一屏（快捷键“↑”）")
                    }, 1500);
                    break;
                case"newest":
                    $(".btnNewest").tooltipster("content", "已经滚动到最新消息").tooltipster("show"), setTimeout(function () {
                        $(".btnNewest").tooltipster("hide").tooltipster("content", "最新一屏（快捷键“→”）")
                    }, 1500);
                    break;
                case"oldest":
                    $(".btnOldest").tooltipster("content", "已经滚动到最旧消息").tooltipster("show"), setTimeout(function () {
                        $(".btnOldest").tooltipster("hide").tooltipster("content", "最旧一屏（快捷键“←”）")
                    }, 1500)
            }
        }, e.getScrollType = function () {
            return this._scrollType
        }, e.scrollCheck = function () {
            return "running" == this._scrollState ? (t.DEBUG && t.log("message.scrollCheck is running"), !1) : this._currentDomList.length ? this.length() > t.getConf("visibleNum") ? !0 : (0 == this.length() && this._dom_scrollBox.html(""), t.DEBUG && t.log("message.scrollCheck message.length <= visibleNum"), !1) : (t.DEBUG && t.log("message.scrollCheck _currentDomList.length == 0"), !1)
        }, e.renderScroll = function (e, i) {
            var s = Math.abs(this._dom_scrollBox.attr("data-to") || 0) / this._liHeight, n = this._dom_scrollBox.children("li:eq(" + s + ")"), r = s + this._currentDomList.length - 1, o = this._dom_scrollBox.children("li:eq(" + r + ")");
            n && o && n.length && o.length || t.throwErr("message.renderScroll firstLi or lastLi not exists");
            for (var l = "", a = [], d = 0; d < e.length; d++)e[d].data || (e[d].data = e[d]), a.push(e[d].data.id), l += this.renderOne(e[d].data);
            if (!l)return t.DEBUG && t.log("message.renderScroll failed: html is empty. isCycleScroll:", t.getConf("isCycleScroll")), !1;
            if (o.nextAll("li").remove(), n.prevAll("li").remove(), this.scrollFn(this._dom_scrollBox, 0, 0), "prev" == i || "oldest" == i) {
                if (a.slice(0, this._currentDomList.length).join(",") == this._currentDomList.join(","))return this._scrollState = "stoped", !1;
                n.before(l), this.scrollFn(this._dom_scrollBox, -e.length * this._liHeight, 0), this.scrollFn(this._dom_scrollBox, 0)
            } else {
                if (a.slice(a.length - this._currentDomList.length).join(",") == this._currentDomList.join(","))return this._scrollState = "stoped", !1;
                o.after(l), this.scrollFn(this._dom_scrollBox, -e.length * this._liHeight)
            }
            return $('.scrollBox img[src*="res.wx.qq"]').css({"vertical-align": "middle"}), this
        }, e.scrollNext = function (e) {
            if (!this.scrollCheck())return !1;
            this.setScrollType("next", e);
            var i = this.next(t.getConf("visibleNum"));
            return this.renderScroll(i, "next"), this
        }, e.scrollPrev = function () {
            if (!this.scrollCheck())return !1;
            this.setScrollType("prev");
            var e = this.prev(t.getConf("visibleNum"));
            return this.renderScroll(e, "prev")
        }, e.scrollNewest = function () {
            if (!this.scrollCheck())return !1;
            this.setScrollType("newest");
            var e = this.newest(2 * t.getConf("visibleNum"));
            return this.renderScroll(e, "newest")
        }, e.scrollOldest = function () {
            if (!this.scrollCheck())return !1;
            this.setScrollType("oldest");
            var e = this.oldest(2 * t.getConf("visibleNum"));
            return this.renderScroll(e, "oldest")
        }, e.beforeScrollStart = function () {
            return this._tmpProgressState = t.progress.state, this.pause()
        }, e.pause = function () {
            return "running" == t.progress.state && $(".btnPause").trigger("click"), !0
        }, e.off = function (t) {
            this._dom_scrollBox && this._dom_scrollBox.hide(), this.pause(), this._proxyObj && this._proxyObj.off(), t || this.pullStop()
        }, e.on = function () {
            this._proxyObj ? this._proxyObj.on() : (this._dom_scrollBox.show(), this.renderTotal(this._total), $(".messageTotal").siblings("span").text(t.template.get("message.msg_total_desc")), this.resume()), this.pull(), 1 == t._config.showLike && this.pullLike()
        }, e.resume = function () {
            return "paused" == t.progress.state && $(".btnPause").trigger("click"), !0
        }, e.afterScrollEnd = function () {
            this._scrollState = "stoped";
            var e = this._dom_scrollBox.attr("data-to") || 0, i = Math.abs(e) / this._liHeight;
            if (0 == i)var s = this._dom_scrollBox.children("li:lt(" + t.getConf("visibleNum") + ")"); else var s = this._dom_scrollBox.children("li:gt(" + (i - 1) + "):lt(" + (i + t.getConf("visibleNum")) + ")");
            var n = this;
            this._currentDomList = [], $.each(s, function () {
                var t = $(this);
                n._currentDomList.push(t.attr("data-id"))
            }), t.pub("message.afterScrollEnd"), "running" == this._tmpProgressState ? this.resume() : this.pause()
        }, e.scrollFn = function (t, e, i) {
            var s = this, n = "animate";
            this._transitions && (n = "translate"), "translate" != n && this._dom_scrollBox.height(this._dom_scrollBox.children("li").length * this._liHeight), t.attr("data-to", e), this._scrollState = "running", s[n](t, e, i)
        }, e.translate = function (t, e, i) {
            if (i = "undefined" == typeof i ? this._scrollSpeed : i, 0 != i && this.beforeScrollStart() === !1)return !1;
            var s = this;
            return 0 == i ? t.css({y: e + "px"}) : t.transition({y: e + "px"}, i, function () {
                s.afterScrollEnd()
            }), this
        }, e.animate = function (t, e, i) {
            if (0 === i)return t.css("top", e + "px"), this;
            if (this.beforeScrollStart() === !1)return !1;
            var s = this;
            return i = "undefined" == typeof i ? this._scrollSpeed : i, t.animate({top: e}, i, function (t) {
                s.afterScrollEnd()
            }), this
        }, e.bindEvent = function () {
            var e = this;
            t.sub("event.progress.compelete", function () {
                t.DEBUG && t.log("event.progress.compelete subed in message"), "message" != t.getState() || e._isInLoading || e._proxyObj || e.scrollNext("progress.compelete")
            }), t.sub("control.btn.btnNewest.clicked, key.right.down", function () {
                "message" != t.getState() || e._isInLoading || ("running" == t.progress.state && t.progress.restart(), e.scrollNewest())
            }), t.sub("control.btn.btnOldest.clicked, key.left.down", function () {
                "message" != t.getState() || e._isInLoading || ("running" == t.progress.state && t.progress.restart(), e.scrollOldest())
            }), t.sub("control.btn.btnPrev.clicked, key.up.down", function () {
                "message" != t.getState() || e._isInLoading || ("running" == t.progress.state && t.progress.restart(), e.scrollPrev())
            }), t.sub("control.btn.btnNext.clicked, key.down.down", function () {
                "message" != t.getState() || e._isInLoading || ("running" == t.progress.state && t.progress.restart(), e.scrollNext())
            }), t.sub("key.whitespace.down", function (i, s) {
                var n = t.getState();
                "message" != n && "messageDetail" != n || e._isInLoading || $(".btnPause").trigger("click")
            }), t.sub("message.afterScrollEnd, messageDetail.afterScrollEnd", function (i) {
                for (var s = 0; s < e._laterOffWallList.length; s++)if (-1 == t.inArray(e._laterOffWallList[s], e._currentDomList) && e._laterOffWallList[s] != t.messageDetail._currentId && -1 == t.inArray(e._laterOffWallList[s], e._viewIds)) {
                    if (e._linkList["delete"]("id", e._laterOffWallList[s]), e._linkListPlayed["delete"]("id", e._laterOffWallList[s]), e._tagLinkList["delete"]("id", e._laterOffWallList[s]), e._currentList.length)for (var n = 0; n < e._currentList.length; n++)e._currentList[n].data.id == e._laterOffWallList[s] && (e._currentList.splice(n, 1), n--);
                    e._laterOffWallList.splice(s, 1), s--
                }
            }), $(".btnStar").click(function () {
                t.pub("key.74.down")
            }), t.sub("key.74.down", function () {
                return e._isInLoading ? (t.DEBUG && t.log("message._isInLoading=true, can't turnToTag"), !1) : ("message" != t.getState() && t.setState("message"), void(e._tag_id ? e.turnToTag(0) : e.turnToTag(1)))
            })
        }, e.turnToTag = function (e) {
            e = parseInt(e) || 0;
            var i = this;
            this.pause(), this.pullStop(), this._tag_id = e, this.pull(), this.showLoading(), t.subOnce("message.addCompleted", function () {
                i._tag_id ? i._tag_loadComplete = !0 : i._loadComplete = !0, i.hideLoading(function () {
                    i.initView()
                })
            })
        }
    }
}(wxscreen), function (t) {
    if (!t.user) {
        t.LinkList || t.throwErr("module user depend on module LinkList");
        var e = t.user = {
            _u: null,
            _m_ids: [],
            _f_ids: [],
            _o_ids: [],
            _ids: [],
            _pullTimer: null,
            _syncProgress: "stoped",
            _ajaxObj: null,
            _isReady: !1,
            _lotteryed_ids: [],
            _lotteryed_list: [],
            _lotteryed_not_synced_ids: [],
            _lotteryed_not_synced_ids_award: {},
            _lottery_deleted_not_synced_ids: [],
            _ddped_ids: [],
            _lottery_ids: [],
            _pre_lottery_ids: [],
            _pre_lottery_list: [],
            _ddp_ids: {_m_ids: [], _f_ids: []},
            _whitelist_user: [],
            _last_whitelist_id: "",
            _needPullState: ["lottery", "ddp", "app"],
            _is_main_screen: !1
        };
        e.init = function () {
            this._u = new t.LinkList({
                name: "user-" + t.getConf("companyId"),
                storeType: "memoryStorage",
                unique: "id"
            }), this.pull(), this.lotteryPull(), this.ddpPull();
            var e = this;
            t.subOnce("user.ready user.lotterySynced user.ddpSynced", function (i, s) {
                for (var n = 0; n < e._lotteryed_ids.length; n++)t.deleteByElem(e._lotteryed_ids[n], e._lottery_ids);
                for (var n = 0; n < e._ddped_ids.length; n++) {
                    var r = e._ddped_ids[n].user_id, o = e._ddped_ids[n].to_user_id;
                    t.deleteByElem(r, e._m_ids), t.deleteByElem(o, e._f_ids)
                }
                e._isReady = !0, t.pub("user.all_ready")
            }), this.lotteryPollNotSynced(), this.lotteryShareToDom(), t.sub("reset_last_whitelist_id", function (t, i) {
                e._last_whitelist_id = isNaN(i) ? 0 : i
            })
        }, e.pullStop = function () {
            return clearTimeout(this._pullTimer), this._pullTimer = null, this._ajaxObj && this._ajaxObj.abort(), this._ajaxObj = null, this
        }, e.pull = function () {
            if (!this.checkAuth())return !1;
            this.pullStop();
            var e = this;
            return e.sync(function (i, s) {
                i && t.DEBUG && t.log("user.pull: sync return err:", i), e._pullTimer = setTimeout(function () {
                    return -1 == t.inArray(t.getState(), e._needPullState) && e._isReady ? void(t.DEBUG && t.log("user pull stoped. _needPullState == -1")) : void e.pull();
                }, 5e3)
            }), this
        }, e.sync = function (e) {
            if ("running" == this._syncProgress)return void(t.DEBUG && t.log("user.sync _syncProgress == running and return"));
            e = e || t.loop;
            var i, s = this._u.getDataByIndex(this._u.length()), n = 0, r = this;
            s && (n = s.update_time_ms);
            var o = this._last_whitelist_id;
            i = {
                last_id: n,
                last_whitelist_id: o
            }, this._syncProgress = "running", this._ajaxObj = $.post(t.url("user/sync"), i, function (i) {
                var s = null, n = !1;
                "ok" != i.info ? s = i.info : (i.user_list && (i.user_list.length ? r.add(i.user_list) : (r._user_ready = !0, t.pub("user.ready", r))), i.whitelist_user_list.length ? r.addWhitelist(i.whitelist_user_list) : (r._whitelist_user_ready = !0, t.pub("user.whitelist.ready")), n = !0, t.pub("user.synced", r)), r._syncProgress = "stoped", t.pub("network.ok"), e(s, n)
            }, "json").error(function (i, s, n) {
                t.DEBUG && t.log("user.sync ajax-error: jqXHR, textStatus, errorThrown ", i, s, n), r._syncProgress = "stoped", i.readyState < 2 && "error" == s ? t.pub("network.disconnected", i) : t.pub("network.ok"), e("ajax-error:" + s)
            })
        }, e.add = function (e) {
            if (e instanceof Array)for (var i = 0; i < e.length; i++) {
                var s = this._u.getElemByPointer(e[i].id);
                s ? s.data.update_time_ms < e[i].update_time_ms ? (this._u["delete"]("id", e[i].id), this._u.push(e[i])) : this._u.edit({id: e[i].id}, e[i]) : this._u.push(e[i]), 1 == e[i].is_on_wall ? t.uniqueInsert(e[i].id, this._ids) : t.deleteByElem(e[i].id, this._ids), t.preLoadAvatar(e[i].avatar);
                var n = e[i].id, r = parseInt(e[i].is_on_wall);
                r ? 1 == e[i].gender ? (t.uniqueInsert(n, this._m_ids), t.deleteByElem(n, this._f_ids), t.deleteByElem(n, this._o_ids)) : 2 == e[i].gender ? (t.uniqueInsert(n, this._f_ids), t.deleteByElem(n, this._m_ids), t.deleteByElem(n, this._o_ids)) : (t.uniqueInsert(n, this._o_ids), t.deleteByElem(n, this._m_ids), t.deleteByElem(n, this._f_ids)) : (t.deleteByElem(n, this._m_ids), t.deleteByElem(n, this._f_ids), t.deleteByElem(n, this._o_ids))
            } else t.DEBUG && t.log("func user.add param list is not an Array type", e);
            return this
        }, e.addWhitelist = function (e) {
            if (!e || !e.length)return void(t.DEBUG && t.log("user.addWhitelist failed: list empty"));
            for (var i = [], s = 0; s < e.length; s++) {
                for (var n = e[s].id, r = !1, o = 0; o < this._whitelist_user.length; o++)if (n == this._whitelist_user[o].id) {
                    this._whitelist_user[o] = e[s], r = !0;
                    break
                }
                r || i.push(e[s])
            }
            return i.length && (this._whitelist_user = this._whitelist_user.concat(i)), this._last_whitelist_id = e[e.length - 1].update_time_ms, !0
        }, e.inWhitelist = function (t) {
            for (var e = 0; e < this._whitelist_user.length; e++)if (this._whitelist_user[e].user_id == t && 1 != this._whitelist_user[e].is_bingo)return !0;
            return !1
        }, e.getWhitelistUserIds = function () {
            for (var t = [], e = 0; e < this._whitelist_user.length; e++)this._whitelist_user[e].user_id > 0 && t.push(this._whitelist_user[e].user_id);
            return t
        }, e.length = function () {
            return this._u.length()
        }, e.info = function (t) {
            var e = this._u.getElemByPointer(t);
            return e ? e.data : !1
        }, e.isInTimeArr = function (e, i) {
            var s = this.info(e);
            if (!s)return !1;
            var n = "0000-00-00 00:00:00" != s.on_wall_time ? s.on_wall_time : s.add_time;
            return n && "string" == typeof n ? (n = Date.parse(t._generateDateStr(n)), n >= i[0] && n <= i[1] ? !0 : !1) : (t.log("user.isInTimeArr failed: no tmpTime", s), !1)
        }, e.random = function () {
            var e = this._ids.length - 1;
            if (0 > e)return !1;
            randId = this._ids[t.rand(0, e)];
            var i = this.info(randId);
            return i ? i : !1
        }, e._lotteryPullTimer = null, e._lotteryPullNotSyncTimer = null, e._lotteryShareToDomTimer = null, e._lotteryPullAjaxObj = null, e._firstGetLenInitLotteryUserFlag = !1, e.lotteryInitUser = function () {
            var e = t.parseVisibleTime("lottery");
            this._lottery_ids = [];
            for (var i = 0; i < this._ids.length; i++)this.isInTimeArr(this._ids[i], e) && -1 == t.inArray(this._ids[i], this._lotteryed_ids) && t.uniqueInsert(this._ids[i], this._lottery_ids);
            if (this._whitelist_user.length)for (var i = 0; i < this._whitelist_user.length; i++) {
                var s = parseInt(this._whitelist_user[i].user_id);
                -1 == t.inArray(s, this._lotteryed_ids) && t.uniqueInsert(s, this._lottery_ids)
            }
            return !0
        }, e.lotteryPullStop = function () {
            return clearTimeout(this._lotteryPullTimer), this._lotteryPullAjaxObj && (this._lotteryPullAjaxObj.abort(), this._lotteryPullAjaxObj = null), this
        }, e.lotteryPull = function () {
            var e = this;
            return this.lotteryPullStop(), this.checkAuth("lotteryPlug") ? t.getConf("isDemo") ? (this._lotteryPullTimer = setTimeout(function () {
                e.lotteryInitUser(), t.pub("user.lotterySynced")
            }, 1e3), !1) : void e.lotterySync(function () {
                "lottery" == t.getState() && (e._lotteryPullTimer = setTimeout(function () {
                    e.lotteryPull()
                }, 1e3 * t.rand(7, 10)))
            }) : (this._lotteryPullTimer = setTimeout(function () {
                e.lotteryInitUser(), t.pub("user.lotterySynced")
            }, 1e3), !1)
        }, e.lotterySync = function (e) {
            e = e || t.loop;
            var i = this;
            i._lotteryPullAjaxObj = $.post(t.url("lottery/sync"), function (s) {
                var n = null, r = null;
                "ok" == s.info ? (i._lottery_deleted_not_synced_ids.length || i._lotteryed_not_synced_ids.length || (i._lotteryed_ids = s.ids, i._lotteryed_list = s.list), i._pre_lottery_ids = s.pre_ids, i._pre_lottery_list = s.pre_list, n = !0, i.lotteryInitUser(), t.pub("user.lotterySynced", i)) : r = s.info, e(r, n), i._is_main_screen = s.is_main_screen, !s.is_main_screen && s.state && "lottery" != s.state && t.setState(s.state)
            }, "json").error(function (i, s, n) {
                i.readyState < 2 && "error" == s && t.pub("network.disconnected", i), e("user.lotterySync: ajax-error")
            })
        }, e.lotteryGetIds = function () {
            this._firstGetLenInitLotteryUserFlag || (this.lotteryInitUser(), this._firstGetLenInitLotteryUserFlag = !0);
            for (var e = [], i = 0; i < this._lottery_ids.length; i++) {
                var s = this._lottery_ids[i];
                this._whitelist_user.length && this.inWhitelist(s) && -1 == t.inArray(s, this._pre_lottery_ids) && -1 == t.inArray(s, this._lottery_deleted_not_synced_ids) ? e.push(s) : this._whitelist_user.length || -1 != t.inArray(s, this._pre_lottery_ids) || -1 != t.inArray(s, this._lottery_deleted_not_synced_ids) || e.push(s)
            }
            return e
        }, e.lotteryGetIdsLength = function () {
            var t = this.lotteryGetIds();
            return t.length
        }, e.lotteryRandom = function () {
            var e = this._lottery_ids.length - 1;
            if (0 > e)return !1;
            var i, s, n = this._lotteryed_ids.length;
            if (this._pre_lottery_list && this._pre_lottery_list.length)for (var r = 0; r < this._pre_lottery_list.length; r++)if (s = this._pre_lottery_list[r], (s.rank == n + 1 || 0 == parseInt(s.rank)) && -1 == t.inArray(s.user_id, this._lotteryed_ids)) {
                i = parseInt(s.user_id);
                break
            }
            if (!i) {
                for (var o = [], r = 0; r < this._lottery_ids.length; r++) {
                    var l = this._lottery_ids[r];
                    this._whitelist_user.length && this.inWhitelist(l) && -1 == t.inArray(l, this._pre_lottery_ids) && -1 == t.inArray(l, this._lottery_deleted_not_synced_ids) ? o.push(l) : this._whitelist_user.length || -1 != t.inArray(l, this._pre_lottery_ids) || -1 != t.inArray(l, this._lottery_deleted_not_synced_ids) || o.push(l)
                }
                if (!o.length)return t.DEBUG && t.log("user.lotteryRandom failed: lottery_ids empty"), !1;
                i = o[t.rand(0, o.length - 1)]
            }
            var a = this.info(i);
            return a || t.throwErr("user.lotteryRandom getElemByPointer failed uid=", i), a
        }, e.lotterySave = function (e, i, s, n) {
            if (i = i || t.loop, n = n || 0, !e || -1 == t.inArray(e, this._lottery_ids))return void i("没有在大屏幕中找到此用户" + e);
            if (t.inArray(e, this._lotteryed_ids) > -1)return void i("保存失败，此用户已经中奖");
            var r = this, o = function () {
                t.uniqueInsert(e, r._lotteryed_ids), r.lotteryAddToList({
                    id: "tmp",
                    award_id: n,
                    user_id: e
                }), t.deleteByElem(e, r._lottery_ids), i(null, !0)
            };
            return t.getConf("isDemo") ? void o() : (t.uniqueInsert(e, r._lotteryed_not_synced_ids), r._lotteryed_not_synced_ids_award[e] = n, void(s ? (t.log("user.lotterySave-notice: quickSave = true"), o()) : ($.ajax({
                type: "POST",
                url: t.url("lottery/lottery_save"),
                data: {user: e, award_category_id: n},
                dataType: "json",
                timeout: 1e4,
                success: function (i) {
                    "ok" == i.info && (t.deleteByElem(e, r._lotteryed_not_synced_ids), delete r._lotteryed_not_synced_ids_award[e])
                },
                error: function (e, i, s) {
                    e.readyState < 2 && "error" == i && t.pub("network.disconnected", e)
                }
            }), setTimeout(function () {
                o()
            }, 10))))
        }, e.lotteryDelete = function (e, i) {
            var s = this, n = function () {
                t.deleteByElem(e, s._lotteryed_ids), t.deleteByElem(e, s._lotteryed_not_synced_ids), delete s._lotteryed_not_synced_ids_award[e], t.uniqueInsert(e, s._lottery_ids), i(null, !0)
            };
            return t.getConf("isDemo") ? void n() : (t.uniqueInsert(e, s._lottery_deleted_not_synced_ids), $.post(t.url("lottery/del_win_user"), {id: e}, function (i) {
                "ok" == i.info && t.deleteByElem(e, s._lottery_deleted_not_synced_ids), n()
            }, "json").error(function (e, i) {
                e.readyState < 2 && "error" == i && t.pub("network.disconnected", e)
            }), void setTimeout(function () {
                n()
            }, 10))
        }, e.lotteryReset = function (e, i) {
            e = e || t.loop, i = i || 0;
            var s = this, n = function () {
                if (s._lotteryed_ids = [], s._lotteryed_not_synced_ids = [], s._lotteryed_not_synced_ids_award = {}, i > 0)for (var n = 0; n < s._lotteryed_list.length; n++)s._lotteryed_list[n].award_id == i && (s._lotteryed_list[n].award_id = null); else s._lotteryed_list = [];
                s.lotteryInitUser(), t.pub("reset_last_whitelist_id", 0), e(null, !0)
            };
            return t.getConf("isDemo") ? void n() : void $.post(t.url("lottery/lottery_reset"), {award_category_id: i}, function (e) {
                if ("ok" != e.info)for (var i = 0; i < s._lotteryed_ids.length; i++)t.uniqueInsert(s._lotteryed_ids[i], s._lottery_deleted_not_synced_ids);
                n()
            }, "json").error(function (e, i) {
                for (var r = 0; r < s._lotteryed_ids.length; r++)t.uniqueInsert(s._lotteryed_ids[r], s._lottery_deleted_not_synced_ids);
                n(), e.readyState < 2 && "error" == i && t.pub("network.disconnected", e)
            })
        }, e.lotteryPollNotSynced = function () {
            var e = this;
            clearInterval(this._lotteryPullNotSyncTimer), this._lotteryPullNotSyncTimer = setInterval(function () {
                if (e._lotteryed_not_synced_ids.length || e._lottery_deleted_not_synced_ids.length) {
                    for (var i, s, n = e._lottery_deleted_not_synced_ids.concat(), r = e._lotteryed_not_synced_ids.concat(), o = [], l = 0; l < e._lotteryed_not_synced_ids.length; l++)i = e._lotteryed_not_synced_ids[l], s = e._lotteryed_not_synced_ids_award[i] || 0, o.push(i + ":" + s);
                    $.post(t.url("lottery/lottery_not_synced"), {
                        deleted: n.join(","),
                        lotteryed: o.join(",")
                    }, function (i) {
                        if ("ok" == i.info) {
                            for (var s = 0; s < n.length; s++)t.deleteByElem(n[s], e._lottery_deleted_not_synced_ids);
                            for (var s = 0; s < r.length; s++)t.deleteByElem(r[s], e._lotteryed_not_synced_ids), delete e._lotteryed_not_synced_ids_award[r[s]]
                        } else t.DEBUG && t.log("user.lotteryPollNotSynced failed:", i)
                    }, "json").error(function (e, i) {
                        t.DEBUG && t.log("user.lotteryPollNotSynced failed: ajax-error"), e.readyState < 2 && "error" == i && t.pub("network.disconnected", e)
                    })
                }
            }, 7e3)
        }, e.lotteryShareToDom = function () {
            if (!window.JSON)return void(t.DEBUG && t.log("user.lotteryShareToDom failed: window.JSON is undefined"));
            clearInterval(this._lotteryShareToDomTimer);
            var e = this;
            this._lotteryShareToDomTimer = setInterval(function () {
                for (var i, s = [], n = 0; n < e._lotteryed_ids.length; n++) {
                    var r = e.info(e._lotteryed_ids[n]);
                    s.push(r)
                }
                var i = JSON.stringify({data: s, companyId: t.getConf("domain")});
                $("#lotteryDataJsonBox").length || $("body").append('<div id="lotteryDataJsonBox" style="display:none;"></div>'), $("#lotteryDataJsonBox").text(i)
            }, 2e3)
        }, e.lotteryAddToList = function (t) {
            for (var e, i = t.user_id, s = !0, n = 0; n < this._lotteryed_list.length; n++)e = this._lotteryed_list[n], e.user_id == i && (s = !1, this._lotteryed_list[n].award_id = t.award_id);
            s && this._lotteryed_list.push(t)
        }, e.getAwardLotteryedIds = function (t) {
            if (t = parseInt(t), !t)return this._lotteryed_ids;
            for (var e, i = [], s = 0; s < this._lotteryed_list.length; s++)e = this._lotteryed_list[s], e.award_id == t && i.push(e.user_id);
            return i
        }, e._ddpPullTimer = null, e._ddpPullAjaxObj = null, e._firstGetLenInitDdpUserFlag = !1, e.ddpGetUserLen = function () {
            return this._firstGetLenInitDdpUserFlag || (this.ddpInitUser(), this._firstGetLenInitDdpUserFlag = !0), this._ddp_ids._m_ids.length + this._ddp_ids._f_ids.length
        }, e.ddpInitUser = function () {
            var e = t.parseVisibleTime("ddp");
            this._ddp_ids = {_m_ids: [], _f_ids: []};
            var i;
            for (i = 0; i < this._m_ids.length; i++)this.isInTimeArr(this._m_ids[i], e) && -1 == this.inDdp(this._m_ids[i]) && t.uniqueInsert(this._m_ids[i], this._ddp_ids._m_ids);
            for (i = 0; i < this._f_ids.length; i++)this.isInTimeArr(this._f_ids[i], e) && -1 == this.inDdp(this._f_ids[i]) && t.uniqueInsert(this._f_ids[i], this._ddp_ids._f_ids);
            return !0
        }, e.ddpPullStop = function () {
            return clearTimeout(this._ddpPullTimer), this._ddpPullAjaxObj && (this._ddpPullAjaxObj.abort(), this._ddpPullAjaxObj = null), this
        }, e.ddpPull = function () {
            var e = this;
            if (this.ddpPullStop(), !this.checkAuth("ddpPlug"))return void(this._ddpPullTimer = setTimeout(function () {
                e.ddpInitUser(), t.pub("user.ddpSynced")
            }, 1e3));
            if (t.getConf("isDemo"))return this._ddpPullTimer = setTimeout(function () {
                e.ddpInitUser(), t.pub("user.ddpSynced")
            }, 1e3), !1;
            var e = this;
            e.ddpSync(function () {
                "ddp" == t.getState() && (e._ddpPullTimer = setTimeout(function () {
                    e.ddpPull()
                }, 1e3 * t.rand(5, 9)))
            })
        }, e.ddpSync = function (e) {
            e = e || t.loop;
            var i = this;
            i._ddpPullAjaxObj = $.post(t.url("ddp/sync"), function (s) {
                var n = null, r = null;
                "ok" == s.info ? (i._ddped_ids = s.ids, n = !0, i.ddpInitUser()) : r = s.info, t.pub("user.ddpSynced", i), e(r, n)
            }, "json").error(function (i, s, n) {
                i.readyState < 2 && "error" == s && t.pub("network.disconnected", i), e("user.ddpSync: ajax-error")
            })
        }, e.ddpRandom = function (e) {
            if (!this._ddp_ids._m_ids.length || !this._ddp_ids._f_ids.length)return !1;
            if ("m" == e) {
                if (!this._ddp_ids._m_ids.length)return !1;
                var i = this._ddp_ids._m_ids[t.rand(0, this._ddp_ids._m_ids.length - 1)];
                return this.info(i)
            }
            if ("f" == e) {
                if (!this._ddp_ids._f_ids.length)return !1;
                var s = this._ddp_ids._f_ids[t.rand(0, this._ddp_ids._f_ids.length - 1)];
                return this.info(s)
            }
            if ("all" == e) {
                var n = this.ddpRandom("m");
                if (!n)return !1;
                var r = this.ddpRandom("f");
                return r ? {user: n, to_user: r} : !1
            }
            return !1
        }, e.ddpSave = function (e, i, s) {
            if (s = s || t.loop, !e || !i)return void s("ddpSave: id or to_id is not exists");
            var n = this.ddpInfo(e) || this.ddpInfo(i);
            if (n && n.user_id > 0 && n.to_user_id > 0)return void s("ddpSave: id or to_id is in ddp list");
            var r = this.info(e), o = this.info(i), l = {
                id: 0,
                user_id: e,
                name: r.name,
                avatar: r.avatar,
                to_user_id: i,
                to_name: o.name,
                to_avatar: o.avatar
            }, a = this, d = function (n) {
                var r = a.ddpInfo(e) || a.ddpInfo(i);
                r ? (r.user_id = l.user_id, r.name = l.name, r.avatar = l.avatar, r.to_user_id = l.to_user_id, r.to_name = l.to_name, r.to_avatar = l.to_avatar) : (l.id = n, a._ddped_ids.push(l)), t.deleteByElem(l.user_id, a._ddp_ids._m_ids), t.deleteByElem(l.to_user_id, a._ddp_ids._f_ids), s(null, r || l)
            };
            return t.getConf("isDemo") ? void d(t.cid()) : void $.post(t.url("ddp/save"), {
                user: e,
                to_user: i
            }, function (n) {
                return n && "object" == typeof n && n.info ? void("ok" == n.info ? d(n.matched_info.id) : s(n.info)) : void(t.counter("user_ddpsave") < 2 ? a.ddpSave(e, i, s) : (t.counter("user_ddpsave", "reset"), s("ddpsave: the wxscreen server not response")))
            }, "json").error(function (e, i, n) {
                e.readyState < 2 && "error" == i && t.pub("network.disconnected", e), s("user.ddpSave: ajax-error")
            })
        }, e.ddpDelete = function (e, i, s) {
            if (isNaN(e) || isNaN(i))return s("ddpDelete: arguments is empty");
            var n = this.ddpInfo(e) || this.ddpInfo(i);
            if (!n)return s("ddpInfo not found");
            var r = e ? e : i, o = this.inDdp(r), l = this, a = function () {
                e > 0 && i > 0 ? (l._ddped_ids.splice(o, 1), t.uniqueInsert(e, l._ddp_ids._m_ids), t.uniqueInsert(i, l._ddp_ids._f_ids), n.user_id = 0, n.to_user_id = 0) : e ? (n.user_id = 0, t.uniqueInsert(e, l._ddp_ids._m_ids)) : i && (n.to_user_id = 0, t.uniqueInsert(i, l._ddp_ids._f_ids)), s(null, n)
            };
            return t.getConf("isDemo") ? void a() : void $.post(t.url("ddp/del_user"), {id: e, to_id: i}, function (n) {
                return n && "object" == typeof n && n.info ? void("ok" == n.info ? a() : s(n.info)) : void(t.counter("user_ddpdelete") < 2 ? l.ddpDelete(e, i, s) : (t.counter("user_ddpdelete", "reset"), s("the wxscreen server not response")))
            }, "json").error(function (e, i, n) {
                e.readyState < 2 && "error" == i && t.pub("network.disconnected", e), s("user.ddpDelete: ajax-error")
            })
        }, e.ddpReset = function (e) {
            e = e || t.loop;
            var i = this, s = function () {
                i._ddped_ids = [], i.ddpInitUser(), e(null, !0)
            };
            return t.getConf("isDemo") ? void s() : void $.post(t.url("ddp/reset"), function (n) {
                return n && "object" == typeof n && n.info ? void("ok" == n.info ? s() : e(n.info)) : void(t.counter("user_ddpreset") < 2 ? i.ddpReset(e) : (t.counter("user_ddpreset", "reset"), e("ddpreset: the wxscreen server not response")))
            }, "json").error(function (i, s, n) {
                i.readyState < 2 && "error" == s && t.pub("network.disconnected", i), e("ddpReset: ajax-error")
            })
        }, e.inDdp = function (t) {
            for (var e, i = -1, s = 0; s < this._ddped_ids.length; s++)if (e = this._ddped_ids[s], e.user_id == t || e.to_user_id == t) {
                i = s;
                break
            }
            return i
        }, e.ddpInfo = function (t) {
            if (!t)return !1;
            var e = this.inDdp(t);
            return 0 > e ? !1 : this._ddped_ids[e]
        }, e.checkAuth = function (e) {
            return e && !t.getConf(e) ? !1 : !0
        }, e.getLotteryIds = function () {
            console.log("待抽奖的用户ID", this._lottery_ids), console.log("中奖的用户ID", this._lotteryed_ids), console.log("待抽奖的预置用户ID", this._pre_lottery_ids)
        }
    }
}(wxscreen), function (t) {
    if (!t.moving) {
        var e = t.moving = {effects: {}};
        e.show = function (e, i) {
            this.effects[e] || t.throwErr("moving.show: movieName is empty"), this.effects[e].show(i)
        }, e.hide = function (e, i) {
            this.effects[e] || t.throwErr("moving.hide: movieName is empty"), this.effects[e].hide(i)
        }
    }
}(wxscreen), function (t) {
    function e(e) {
        var r = o[e], l = Math.random() < .5 ? "clockwiseSpin" : "counterclockwiseSpinAndFlip", a = n(i(0, 5)), d = n(i(r.fadeAndDropDuration[0], r.fadeAndDropDuration[1])), h = n(i(r.spinDuration[0], r.spinDuration[1])), u = "auto";
        r.sizeScale && (u = t.rand(r.sizeScale[0], r.sizeScale[1]) + "px");
        var _ = t.getConf("siteUrl") + "/images/moving/" + e + t.rand(1, r.imageNum) + ".png", c = ["width:" + u, "-webkit-animation-name:" + l, "-webkit-animation-duration:" + h];
        c = c.join(";");
        var g = ["top:-180px", "left: " + s(t.rand(-180, document.body.clientWidth)), "-webkit-animation-name:fade, drop", "-webkit-animation-duration:" + d + ", " + d, "-webkit-animation-delay:" + a + ", " + a];
        return g = g.join(";"), '<span class="moving-child" style="' + g + '"><img src="' + _ + '" style="' + c + '" /></span>'
    }

    function i(t, e) {
        return t + Math.random() * (e - t)
    }

    function s(t) {
        return t + "px"
    }

    function n(t) {
        return t + "s"
    }

    if (t.moving || t.throwErr("falling depend on g.moving"), t.moving.effects.falling)return !1;
    var r = t.moving.effects.falling = {}, o = {
        rose: {
            id: "moving_fallingRose",
            num: 100,
            imageNum: 2,
            sizeScale: [50, 80],
            fadeAndDropDuration: [3, 7],
            spinDuration: [1, 5]
        },
        snow: {id: "moving_fallingSnow", num: 100, imageNum: 5, fadeAndDropDuration: [3, 7], spinDuration: [1, 5]},
        fl: {id: "moving_fallingFl", num: 50, imageNum: 18, fadeAndDropDuration: [3, 7], spinDuration: [1, 5]}
    };
    r.show = function (i) {
        var s = i.effectName;
        s || t.throwErr("falling.show: effectName is empty"), o[s] || t.throwErr("falling.show: effect not found"), o[s] = $.extend(o[s], i);
        var n = $("#" + o[s].id);
        if (n.length || ($("body").append('<div id="' + o[s].id + '" style="position:absolute;top:0;left:0;width:100%;height: ' + $(document).height() + 'px;overflow:hidden;z-index:9999999999;"></div>'), n = $("#" + o[s].id)), n.children().length)return n.show(), !0;
        for (var r = "", l = 0; l < o[s].num; l++)r += e(s);
        return n.html(r), !0
    }, r.hide = function (t) {
        return o[t] && $("#" + o[t].id).hide(), !0
    }
}(wxscreen), function (t) {
    $(function () {
        function e(e, i, s) {
            $.post(t.url("listening/add_listening"), {companyid: e, res_name: i, imgsrc: s}, function (t) {
                "ok" == t.info || alert(t.info)
            }, "json")
        }

        var i = 1, s = 1, n = 1;
        setInterval(function () {
            var r = t.getConf("companyId");
            if (0 == $(".logoScreenLeft").length || "" == $(".logoScreenLeft").attr("src"))return void(i && (e(r, "delete_top_logo", ""), i = 0));
            var o = $(".logoScreenLeft").attr("src");
            if (0 == $("#wrap").length || "none" == $("#wrap").css("background-image"))return void(n && (e(r, "delete_wrap_bg", ""), n = 0));
            var l = $("#wrap").css("background-image");
            if (0 == $(".logo-sun").length || "none" == $(".logo-sun").css("background-image")) {
                if (0 == $(".logo-b").length || "none" == $(".logo-b").css("background-image"))return void(s && (e(r, "delete_bottom_logo", ""), s = 0));
                var a = $(".logo-b").css("background-image")
            } else var a = $(".logo-sun").css("background-image");
            "-1" == a.indexOf(t.getConf("siteUrl")) && a.indexOf(t.getConf("staticUrl")) && s && ("-1" != a.indexOf(t.getConf("siteUrl")) ? e(r, "bottom_logo", a.slice(4, -1)) : e(r, "bottom_logo", a), s = 0), "-1" == o.indexOf(t.getConf("siteUrl")) && a.indexOf(t.getConf("staticUrl")) && i && (e(r, "top_logo", o), i = 0), "-1" == l.indexOf(t.getConf("siteUrl")) && a.indexOf(t.getConf("staticUrl")) && n && ("-1" != l.indexOf(t.getConf("siteUrl")) ? e(r, "wrap_bg", l.slice(4, -1)) : e(r, "wrap_bg", l), n = 0)
        }, 1e4)
    })
}(wxscreen), function (g) {
    if (!g.yaokongqi) {
        var yaokongqi = g.yaokongqi = {};
        yaokongqi.init = function () {
            if (!g.getConf("isAdmin"))return void g.log("yaokongqi: not admin init failed");
            var conf = g.getConf("ioConfig");
            conf || g.throwErr("ioConfig empty"), this._conf = conf;
            var socket = io(conf.ioAddress), me = this;
            socket.on("connect", function () {
                g.log("yaokongqi: socket connected"), socket.emit("bindScreen", {companyId: g.getConf("companyId")})
            }), socket.on("disconnect", function () {
                g.log("yaokongqi: socket disconnected")
            }), socket.on("bindScreen_ret", function (t) {
                "ok" == t.info ? me._bindOk = !0 : me._bindOk = !1, g.log("bindScreen_ret", t)
            }), socket.on("exec_command", function (msg) {
                msg.triggerBtn && $(msg.triggerBtn).trigger("click", {source: "yaokongqi"}), msg.triggerEvent && (msg.source = "yaokongqi", g.pub(msg.triggerEvent, msg)), msg.triggerScript && eval(msg.triggerScript), socket.emit("command_execed", msg)
            }), this.socket = socket, g.sub("message_detail_1, message_detail_2, message_detail_3", function (t) {
                if ("messageDetail" == g.getState())return void g.setState("message");
                var e = t.replace("message_detail_", "") - 1;
                $(".scrollBox .user-list li:eq(" + e + ")").trigger("click")
            }), g.sub("screenStateChange", function (t, e) {
                e.companyId = g.getConf("companyId"), yaokongqi._bindOk && socket.emit("screenStateChange", e)
            }), g.sub("lotteryNumSelChange", function (t, e) {
                var i = e.value;
                $("#lotteryNumSel").val(i)
            })
        }, $(function () {
            yaokongqi.init()
        })
    }
}(wxscreen);