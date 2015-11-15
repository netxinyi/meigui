@extends('home.layout')

@section('content')

    <form class="am-form">
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
                        <td>真实姓名:</td>
                        <td>唐国强</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>身份证号：</td>
                        <td><input type="text"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>手机号码:</td>
                        <td><input type="text"></td>
                        <td>请填写正确号码，方便联系！</td>
                    </tr>
                    <tr>
                        <td>邮箱:</td>
                        <td><input type="text"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>QQ：</td>
                        <td><input type="text"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>通讯地址：</td>
                        <td>
                            <input type="text">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="button" class="am-btn am-btn-danger dy_btn_color">保存信息</button>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
@stop