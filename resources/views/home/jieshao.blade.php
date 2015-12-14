@extends('home.layout')

@section('content')

    <form class="am-form" id="jieshao-form" method="post" onsubmit="return false;" action="/home/jieshao">
        <div class="am-panel am-panel-default">
            <header class="am-panel-hd">
                <h3 class="am-panel-title">自我介绍</h3>
            </header>
            <div class="am-panel-bd">
                <table class="am-table am-table-striped am-table-hover ">
                    <tr>
                        <td colspan="3">
                            <textarea name="introduce" id="" cols="30" rows="10">@if(user()->info->new_introduce){{user()->info->new_introduce}}@else{{user()->info->introduce}}@endif</textarea>
                            @if(user()->info->new_introduce)
                                <span style="color:red">
                                @if(user()->info->introduce_status == \App\Enum\User::INTRODUCE_NOCHECK)
                                        抱歉,您的个人介绍没有通过审核,请修改后重试
                                    @elseif(user()->info->introduce_status == \App\Enum\User::INTRODUCE_CHECK)
                                        您新填写的个人介绍管理员正在审核,审核通过后即可展示
                                    @endif
                                    </span>
                            @endif
                        </td>
                    </tr>
                    <td colspan="3">温馨提示：<br/>
                        1、内心独白字数需在20-1000字之间。<br/>
                        2、内心独白中请勿出现QQ、MSN、电话号码以及网址、广告、色情或其他不健康的内容<br/>
                        3、点击保存后，审核通过后才会显示，请认真检查。
                    </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="am-btn am-btn-danger dy_btn_color">保存信息</button>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
@stop

@section('footer-last-js')
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script>

        $(function () {
            $('#jieshao-form').success(function () {
                //$.redirect(null, 2);
            }).form();

        });
    </script>
@stop