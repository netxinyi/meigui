@extends('layouts.master')

@section('last-css')
    <link rel="stylesheet" href="/assets/css/page.css">
    <link rel="stylesheet" href="/assets/css/index.css">
@stop
@section('body')
      <div  id="content">
         <!-- 第一部分 -->
          <div class="content_tu">
                <!-- 报名部分 -->
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
                                        <input type="radio" name="sex" id="sex_1" value="{{\App\Enum\User::SEX_MALE}}" checked>
                                        <label for="sex_1">男</label>
                                        <input type="radio" name="sex" value="{{\App\Enum\User::SEX_FEMALE}}">
                                        <label for="sex_0">女</label><br>
                                    </div>
                                </div>
                                <div>
                                    <span>出生年月</span>
                                    <input id="datepicker" type="text" name="birthday" class="w_input" placeholder="选择日期"/><br>
                                </div>
                                <div>
                                    <span>婚姻状况</span>

                                    <div class="radio_location">
                                        <input type="radio" name="marriage" id="status_1"
                                               value="{{\App\Enum\User::MARRIAGE_UNMARRIED}}" checked="checked">
                                        <label for="status_1">未婚</label>
                                        <input type="radio" name="marriage" id="status_2"
                                               value="{{\App\Enum\User::MARRIAGE_DIVORCED}}">
                                        <label for="status_2">离婚</label>
                                        <input type="radio" name="marriage" id="status_3"
                                               value="{{\App\Enum\User::MARRIAGE_WIDOWED}}">
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
                <!-- 报名部分 end-->
                <!-- 滚动图 -->
                <div class="c_modle">
                    <div data-am-widget="slider" class="am-slider am-slider-b1" data-am-slider='{&quot;controlNav&quot;:false}'>
                        <ul class="am-slides">
                            @if(option('lb_image1'))
                                <li>
                                    <a href="{{option('lb_url1')}}" target="_blank">
                                        <img src="/uploads/images/{{option('lb_image1')}}" width="670" height="335">
                                    </a>

                                </li>
                            @endif
                            @if(option('lb_image2'))
                                <li>
                                    <a href="{{option('lb_url2')}}" target="_blank">
                                        <img src="/uploads/images/{{option('lb_image2')}}" width="670" height="335">
                                    </a>

                                </li>
                            @endif
                            @if(option('lb_image3'))
                                <li>
                                    <a href="{{option('lb_url3')}}" target="_blank">
                                        <img src="/uploads/images/{{option('lb_image3')}}" width="670" height="335">
                                    </a>

                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- 滚动图 end-->
                <div class="c_right">
                    <div class="c_right_1">
                        <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                            <!--列表标题-->
                            <div class="am-list-news-hd am-cf">
                                <!--带更多链接-->
                                <h2>派对集结号</h2>
                                <a href="/assembly/{{$assembly[0]['assembly_id']}}" class="">
                                    <span class="am-list-news-more am-fr">更多 &raquo;</span>
                                </a>
                            </div>
                            <div class="am-list-news-bd">
                                <ul class="am-list" style="line-height: 4px;font-size: 12px;">
                                    @foreach($assembly as $assembly)
                                        <li class="am-g am-list-item-dated">
                                            <a href="/assembly/{{$assembly->assembly_id}}" class="am-list-item-hd ">{{$assembly->title}}</a>
                                            <span class="am-list-date">{{substr($assembly->created_at,0,10)}}</span>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
               
          </div>
          <!-- 第一部分 -->
      </div>
@stop

@section('footer-last-js')
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script>

        $(function () {
            var now = new Date() - 0;
            $('[data-change-sex]').click(function () {
                var sex = $(this).data('change-sex');
                $('#index-recommend').find('li').hide().parent().find('li[data-sex="' + sex + '"]').show();
            });


            $('#register-form').success(function () {
                $.redirect(null, 2);
            }).form();
            $('[data-change-sex="{{\App\Enum\User::SEX_FEMALE}}"]').click();

            $('#datepicker').datepicker({
                theme: "danger",
                format: "yyyy-mm-dd",
                viewMode: "years",
                onRender: function (date, viewMode) {
                    if (date >= now) {
                        return 'am-disabled';
                    }
                }
            });
        });

    </script>
@stop
@if (session('status'))
    <script>
        alert("{{session('status')}}")
    </script>
@endif