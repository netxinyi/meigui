@extends('home.layout')

@section('content')

    <form class="am-form" id="xiangxi-form" method="post" onsubmit="return false;" action="/home/xiangxi">
        <div class="am-panel am-panel-default">
            <header class="am-panel-hd">
                <h3 class="am-panel-title">联系信息</h3>
            </header>
            <div class="am-panel-bd">
                <table class="am-table am-table-striped am-table-hover ">
                    <tr>
                        <td colspan="3">以下资料我们将为您保密，不会显示在您的个人资料页面上。</td>
                    </tr>
                    <tr>
                        <td>真实姓名：</td>
                        <td>{{user()->realname}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>身份证号：</td>
                        <td><input  type="text"  name="card" value="{{user()->info->card}}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>民族：</td>
                        <td><input type="text" name="stock" value="{{user()->info->stock}}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>手机号码：</td>
                        <td><input type="text" name="mobile" value="{{user()->mobile}}"></td>
                        <td>请填写正确号码，方便联系！</td>
                    </tr>
                    <tr>
                        <td>邮箱：</td>
                        <td><input  type="text"  name="email" value="{{user()->info->email}}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>QQ：</td>
                        <td><input type="text"  name="qq" value="{{user()->info->qq}}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>通讯地址：</td>
                        <td>
                            <select name="origin_province" id=""></select>
                           <select name="origin_city" id=""></select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button  class="am-btn am-btn-danger dy_btn_color"  type="submit" >保存信息</button>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
@stop

@section('footer-last-js')
    <script src="/assets/lib/pcas/pcas.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script>
        //省市区三级联动，无默认，无文字提示
       new PCAS("origin_province","origin_city","{{user()->info->origin_province}}","{{user()->info->origin_city}}");
        $(function () {
             $('#xiangxi-form').success(function () {
               //$.redirect(null, 2);
             }).form();

        });
    </script>
@stop