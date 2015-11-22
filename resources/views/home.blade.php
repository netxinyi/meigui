@extends('layouts.master')

@section('last-css')
    <link rel="stylesheet" href="/assets/css/index.css">
    @stop

    @section('body')

            <!-- 导航栏 -->
    <div class="wap_content1">
        <div class="content">
            <div class="c_left">
                <div class="baomingTit">
                    <h2>我要报名</h2>
                </div>
                <div class="baomingInner">
                    <form action="/auth/register" method="post" onsubmit="return false;" id="register-form">
                        {{csrf_field()}}
                        <div>
                            <span>真实姓名</span><input type="text" class="w_input" name="realname">
                        </div>
                        <div>
                            <span>手机号码</span><input type="text " class="w_input" name="mobile">
                        </div>
                        <div>
                            <span>性别</span>

                            <div class="radio_location">
                                <input type="radio" name="sex" id="sex_1" value="{{\App\Enum\User::SEX_MALE}}">
                                <label for="sex_1">男</label>
                                <input type="radio" name="sex" value="{{\App\Enum\User::SEX_MALE}}">
                                <label for="sex_0">女</label><br>
                            </div>
                        </div>
                        <div>
                            <span>出生年月</span>
                            <input type="text" class="w_input" name="birthday"><br>
                        </div>
                        <div>
                            <span>婚姻状况</span>

                            <div class="radio_location">
                                <input type="radio" name="marital_status" id="status_1"
                                       value="{{\App\Enum\User::MARITAL_STATUS_UNMARRIED}}" checked="checked">
                                <label for="status_1">未婚</label>
                                <input type="radio" name="marital_status" id="status_2"
                                       value="{{\App\Enum\User::MARITAL_STATUS_DIVORCED}}">
                                <label for="status_2">离婚</label>
                                <input type="radio" name="marital_status" id="status_3"
                                       value="{{\App\Enum\User::MARITAL_STATUS_WIDOWED}}">
                                <label for="status_3">丧偶</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="am-btn am-btn-danger am-btn-block">马上报名</button>
                        </div>
                    </form>

                </div>
                <div class="baomingtishi">
                    <div>
                        <span>报名说明：报名成功后，我司客户代表会第一时间与您取得联系，请确保信息的真实性。客户代表审核您的报名后，即可登录使用</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="c_modle">
            <div data-am-widget="slider" class="am-slider am-slider-b1" data-am-slider='{&quot;controlNav&quot;:false}'>
                <ul class="am-slides">
                    <li>
                        <img src="/assets/images/tu_1.jpg">
                    </li>
                    <li>
                        <img src="/assets/images/tu_2.jpg">
                    </li>
                    <li>
                        <img src="/assets/images/tu_3.jpg">
                    </li>
                </ul>
            </div>
        </div>
        <div class="c_right">
            <div class="c_right_1">
                <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                    <!--列表标题-->
                    <div class="am-list-news-hd am-cf">
                        <!--带更多链接-->
                        <h2>派对集结号</h2>
                        <a href="./bottom.html" class="">
                            <span class="am-list-news-more am-fr">更多 &raquo;</span>
                        </a>
                    </div>
                    <div class="am-list-news-bd">
                        <ul class="am-list">
                            <li class="am-g am-list-item-dated">
                                <a href="./bottom.html" class="am-list-item-hd ">八月北京千人相亲会报名中</a>
                                <span class="am-list-date">2013-09-18</span>
                            </li>
                            <li class="am-g am-list-item-dated">
                                <a href="./bottom.html" class="am-list-item-hd ">七月爱情季节报名要脱光啦</a>
                                <span class="am-list-date">2013-10-14</span>
                            </li>
                            <li class="am-g am-list-item-dated">
                                <a href="./bottom.html" class="am-list-item-hd ">六月浪漫每一天报名相亲会</a>
                                <span class="am-list-date">2013-11-18</span>
                            </li>
                            <li class="am-g am-list-item-dated">
                                <a href="./bottom.html" class="am-list-item-hd ">5月浪漫每一天报名相亲会</a>
                                <span class="am-list-date">2013-11-18</span>
                            </li>
                            <li class="am-g am-list-item-dated">
                                <a href="./bottom.html" class="am-list-item-hd ">4月浪漫每一天报名相亲会</a>
                                <span class="am-list-date">2013-11-18</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="c_right_2">
                <div id="show_huodong">
                    <a href="./hd.html"><img src="/assets/images/huodong1.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>


    <!-- 切换男女 -->
    <div class="wap_content">
        <div class="content">
            <div class="qienannv">
                <button class="am-btn am-btn-success" onclick="see(2)"><i
                            class="am-icon-user am-success am-text-color"></i>看女生
                </button>
                <button class="am-btn am-btn-success" onclick="see(1)"><i
                            class="am-icon-user am-success am-text-color"></i>看男生
                </button>
            </div>
        </div>
    </div>
    <!-- 展示女用户 -->
    <div class="wap_content2" id="show_girl">
        <div class="content">
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2
  am-avg-md-3 am-avg-lg-6 am-gallery-bordered" data-am-gallery="{  }">
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/001.jpg" alt="白富美1号"
                            />

                            <h3 class="am-gallery-title">白富美1号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/002.jpg" alt="白富美1号"
                            />

                            <h3 class="am-gallery-title">白富美2号</h3>

                            <div class="am-gallery-desc">2015-02-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/003.jpg" alt="不要太担心 只因为我相信"
                            />

                            <h3 class="am-gallery-title">白富美3号</h3>

                            <div class="am-gallery-desc">2015-02-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/004.jpg" alt="终会走过这条遥远的道路"
                            />

                            <h3 class="am-gallery-title">白富美4号</h3>

                            <div class="am-gallery-desc">2015-02-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/005.jpg" alt="某天 也许会相遇 相遇在这个好地方"
                            />

                            <h3 class="am-gallery-title">白富美5号</h3>

                            <div class="am-gallery-desc">2015-02-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/006.jpg" alt="不要太担心 只因为我相信"
                            />

                            <h3 class="am-gallery-title">白富美6号</h3>

                            <div class="am-gallery-desc">2015-02-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/007.jpg" alt="终会走过这条遥远的道路"
                            />

                            <h3 class="am-gallery-title">白富美7号</h3>

                            <div class="am-gallery-desc">2015-02-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/008.jpg" alt="某天 也许会相遇 相遇在这个好地方"
                            />

                            <h3 class="am-gallery-title">白富美8号</h3>

                            <div class="am-gallery-desc">2015-02-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/009.jpg" alt="不要太担心 只因为我相信"
                            />

                            <h3 class="am-gallery-title">白富美9号</h3>

                            <div class="am-gallery-desc">2015-02-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/010.jpg" alt="终会走过这条遥远的道路"
                            />

                            <h3 class="am-gallery-title">白富美10号</h3>

                            <div class="am-gallery-desc">2015-02-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/011.jpg" alt="终会走过这条遥远的道路"
                            />

                            <h3 class="am-gallery-title">白富美11号</h3>

                            <div class="am-gallery-desc">2015-02-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/012.jpg" alt="终会走过这条遥远的道路"
                            />

                            <h3 class="am-gallery-title">白富美12号</h3>

                            <div class="am-gallery-desc">2015-02-26</div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- 展示男用户 -->

    <div class="wap_content2" id="show_boy" style="display:none">
        <div class="content">
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2
  am-avg-md-3 am-avg-lg-6 am-gallery-bordered" data-am-gallery="{  }">
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/101.jpg" alt="远方 有一个地方 那里种有我们的梦想"
                            />

                            <h3 class="am-gallery-title">高富帅1号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/102.jpg" alt="某天 也许会相遇 相遇在这个好地方"
                            />

                            <h3 class="am-gallery-title">高富帅2号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/103.jpg" alt="不要太担心 只因为我相信"
                            />

                            <h3 class="am-gallery-title">高富帅3号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/104.jpg" alt="终会走过这条遥远的道路"
                            />

                            <h3 class="am-gallery-title">高富帅1号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/105.jpg" alt="某天 也许会相遇 相遇在这个好地方"
                            />

                            <h3 class="am-gallery-title">高富帅5号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/images/user_img/106.jpg" alt="不要太担心 只因为我相信"
                            />

                            <h3 class="am-gallery-title">高富帅6号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/107.jpg" alt="终会走过这条遥远的道路"
                            />

                            <h3 class="am-gallery-title">高富帅7号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/108.jpg" alt="某天 也许会相遇 相遇在这个好地方"
                            />

                            <h3 class="am-gallery-title">高富帅8号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/109.jpg" alt="不要太担心 只因为我相信"
                            />

                            <h3 class="am-gallery-title">高富帅9号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/110.jpg" alt="终会走过这条遥远的道路"
                            />

                            <h3 class="am-gallery-title">高富帅10号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/111.jpg" alt="终会走过这条遥远的道路"
                            />

                            <h3 class="am-gallery-title">高富帅11号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="./vip.html" class="">
                            <img src="/assets/images/user_img/112.jpg" alt="终会走过这条遥远的道路"
                            />

                            <h3 class="am-gallery-title">高富帅12号</h3>

                            <div class="am-gallery-desc">2015-01-26</div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@stop

@section('footer-last-js')
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script>
        function see(num) {
            var num = num;
            if (num == 1) {
                $("#show_girl").hide();
                $("#show_boy").show();
            } else {
                $("#show_boy").hide();
                $("#show_girl").show();
            }

        }

        $('#register-form').success(function () {
            $.redirect(null, 2);
        }).form();
    </script>
@stop