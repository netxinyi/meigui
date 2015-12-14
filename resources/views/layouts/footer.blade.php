<div id="footer_id">
    <div class="footer">
        <div class="footer_list">
            <ul>
                <li><a href="/article/2">客服中心</a></li>
                <li><a href="/article/1">关于我们</a></li>
                <li><a href="/article/4">相亲通道</a></li>
                <li><a href="/article/3">注册条款</a></li>
                <li><a href="/article/5">交友信息</a></li>
                <li><a href="/article/6">隐私保护</a></li>
                <li><a href="/article/7">帮助中心</a></li>
                <li><a href="/article/14">安全中心</a></li>
            </ul>
        </div>
        <div class="footer_list">
            <span>©  2015-2018 版权所有
                @if(option('site_icp'))
                    备案号：{{option('site_icp')}}
                @endif
                @if(option('tel'))
                    不良和违法信息举报专线：
                    {{option('tel')}}
                @endif
            </span>
        </div>

    </div>

</div>

<!-- 代码部分begin -->
<div id="rightArrow"><a href="javascript:;" title="在线客户"></a></div>
<div id="floatDivBoxs">
    <div class="floatDtt">在线客服</div>
    <div class="floatShadow">
        <ul class="floatDqq">
            <?php

            $qqs = explode("\n", option('qq'));

            ?>
            @foreach($qqs as $qq)
                <?php
                    $q = explode('#',$qq);
                    $q[1] =  $q[1]?:$q[0];
                ?>
                @if($q[0])
                    <li>
                        <a target="_blank" href="tencent://message/?uin={{$q[0]}}&Site=sc.chinaz.com&Menu=yes"><img
                                    src="/assets/images/qq.png" align="absmiddle">{{$q[1]}}</a>
                    </li>
                @endif
            @endforeach

        </ul>
        <div class="floatDtxt">热线电话</div>
        <div class="floatDtel">
            {{option('tel')}}
        </div>
        <div class="floatImg"><img src="/assets/images/erweima.jpg" width="100%">微信公众账号</div>
    </div>
    <div class="floatDbg"></div>
</div>