@extends('user.layout')

@section('content')

        <!-- 修改头像 -->
<form class="am-form">
    <div class="am-panel am-panel-default">
        <header class="am-panel-hd">
            <h3 class="am-panel-title">修改头像</h3>
        </header>
        <div class="am-panel-bd">
            <table class="am-table am-table-striped am-table-hover ">
                <tr>
                    <td>当前头像</td>
                    <td><img src="./images/home_girl.jpg" alt=""></td>
                    <td>
                        <button type="button" class="am-btn am-btn-danger dy_btn_color">上传头像</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <img src="" alt="">
                    </td>
                </tr>
                <td colspan="3">温馨提示：<br/>
                    1、上传新头像，需要审核后才会显示，请认真检查。<br/>
                    2、头像中请勿出现QQ、MSN、电话号码以及网址、广告、色情或其他不健康的内容。
                </td>
                </tr>
            </table>
        </div>
    </div>
</form>
@stop